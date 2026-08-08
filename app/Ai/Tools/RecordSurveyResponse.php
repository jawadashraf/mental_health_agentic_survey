<?php

namespace App\Ai\Tools;

use App\Mail\SafeguardingAlertMail;
use App\Models\SurveyResponse;
use App\Models\SurveySession;
use App\Services\RaftFlagDetectionService;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Illuminate\Support\Facades\Mail;
use Laravel\Ai\Contracts\Tool;
use Laravel\Ai\Tools\Request;
use Stringable;

class RecordSurveyResponse implements Tool
{
    /**
     * Get the description of the tool's purpose.
     */
    public function description(): Stringable|string
    {
        return 'Records the user\'s answer to a survey question into the database.';
    }

    /**
     * Execute the tool.
     */
    public function handle(Request $request): Stringable|string
    {
        $id = $request['id'];
        $response = $request['response'];
        $mode = session('raft_survey_mode');
        $questions = $mode === 'test' ? config('raft-survey-test') : config('raft-survey');

        if (empty($questions)) {
            $questions = config('survey');
        }

        $questionData = collect($questions)->firstWhere('id', $id) ?? [];
        $questionText = $questionData['question'] ?? 'Unknown';
        $sessionId = session()->getId();

        $flagService = app(RaftFlagDetectionService::class);
        $flagEvaluation = $flagService->evaluateResponse($response, $questionData);

        $surveyResponse = SurveyResponse::updateOrCreate(
            [
                'question_id' => $id,
                'session_id' => $sessionId,
            ],
            [
                'response' => $response,
                'question' => $questionText,
                'is_flagged' => $flagEvaluation['is_flagged'],
                'flag_type' => $flagEvaluation['flag_type'],
                'flag_severity' => $flagEvaluation['flag_severity'],
                'flag_reason' => $flagEvaluation['flag_reason'],
                'flag_action_taken' => $flagEvaluation['flag_action_taken'],
                'flagged_at' => $flagEvaluation['is_flagged'] ? now() : null,
            ]
        );

        if ($flagEvaluation['is_flagged']) {
            $session = SurveySession::query()->where('session_id', $sessionId)->first();
            if ($session) {
                $flagCount = SurveyResponse::query()->where('session_id', $sessionId)->where('is_flagged', true)->count();
                $session->update([
                    'has_flags' => true,
                    'flag_count' => $flagCount,
                ]);
            }

            if ($flagEvaluation['flag_severity'] === 'critical' || $flagEvaluation['flag_type'] === 'safeguarding') {
                try {
                    Mail::to('safeguarding@theraftleicester.co.uk')->send(new SafeguardingAlertMail(
                        sessionId: $sessionId,
                        questionId: $id,
                        questionText: $questionText,
                        userResponse: $response,
                        flagType: $flagEvaluation['flag_type'],
                        flagSeverity: $flagEvaluation['flag_severity'],
                        flagReason: $flagEvaluation['flag_reason'],
                        recipientEmail: 'safeguarding@theraftleicester.co.uk'
                    ));
                } catch (\Throwable $e) {
                    \Log::error('Failed sending safeguarding email alert: '.$e->getMessage());
                }
            } elseif (in_array($flagEvaluation['flag_type'], ['accessibility_complaint', 'event_safety'])) {
                try {
                    Mail::to('info@theraftleicester.co.uk')->send(new SafeguardingAlertMail(
                        sessionId: $sessionId,
                        questionId: $id,
                        questionText: $questionText,
                        userResponse: $response,
                        flagType: $flagEvaluation['flag_type'],
                        flagSeverity: $flagEvaluation['flag_severity'],
                        flagReason: $flagEvaluation['flag_reason'],
                        recipientEmail: 'info@theraftleicester.co.uk'
                    ));
                } catch (\Throwable $e) {
                    \Log::error('Failed sending info email alert: '.$e->getMessage());
                }
            }
        }

        $resultMsg = "Response for question $id recorded successfully.";
        if ($flagEvaluation['is_flagged'] && ! empty($flagEvaluation['signpost_guidance'])) {
            $resultMsg .= " Note: Flag detected ({$flagEvaluation['flag_type']}). Guidance for assistant: {$flagEvaluation['signpost_guidance']}";
        }

        return $resultMsg;
    }

    /**
     * Get the tool's schema definition.
     */
    public function schema(JsonSchema $schema): array
    {
        return [
            'id' => $schema->integer()->description('The ID of the question.')->required(),
            'response' => $schema->string()->description('The user\'s provided answer.')->required(),
        ];
    }
}
