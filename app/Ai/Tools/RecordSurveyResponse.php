<?php

namespace App\Ai\Tools;

use App\Services\SurveyResponseRecorder;
use Illuminate\Contracts\JsonSchema\JsonSchema;
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

        $flagEvaluation = app(SurveyResponseRecorder::class)->record(
            sessionId: $sessionId,
            questionId: (int) $id,
            questionText: $questionText,
            response: (string) $response,
            questionData: $questionData,
        );

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
