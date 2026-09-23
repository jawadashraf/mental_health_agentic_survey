<?php

namespace App\Services;

use App\Mail\SafeguardingAlertMail;
use App\Models\SurveyResponse;
use App\Models\SurveySession;
use App\Settings\MailSettings;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class SurveyResponseRecorder
{
    public function __construct(
        protected RaftFlagDetectionService $flagDetection,
        protected FlagAlertRecipients $alertRecipients,
        protected MailSettings $mailSettings,
    ) {}

    /**
     * Evaluate a survey answer for red flags, store it, and alert the survey's recipients when flagged.
     *
     * @param  array<string, mixed>  $questionData
     * @return array{is_flagged: bool, flag_type: ?string, flag_severity: ?string, flag_reason: ?string, flag_action_taken: ?string, signpost_guidance: ?string}
     */
    public function record(string $sessionId, int $questionId, string $questionText, string $response, array $questionData): array
    {
        $flagEvaluation = $this->flagDetection->evaluateResponse($response, $questionData);

        $session = SurveySession::query()->with('survey.organization')->where('session_id', $sessionId)->first();

        $recipients = $flagEvaluation['is_flagged']
            ? $this->alertRecipients->for($session?->survey, $flagEvaluation['flag_type'], $flagEvaluation['flag_severity'])
            : [];

        if ($recipients !== []) {
            $flagEvaluation['flag_action_taken'] = 'Alert email sent to '.implode(', ', $recipients);
        }

        SurveyResponse::updateOrCreate(
            [
                'question_id' => $questionId,
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

        if (! $flagEvaluation['is_flagged']) {
            return $flagEvaluation;
        }

        $session?->update([
            'has_flags' => true,
            'flag_count' => SurveyResponse::query()->where('session_id', $sessionId)->flagged()->count(),
        ]);

        foreach ($recipients as $recipient) {
            $this->sendAlert($recipient, new SafeguardingAlertMail(
                sessionId: $sessionId,
                questionId: $questionId,
                questionText: $questionText,
                userResponse: $response,
                flagType: $flagEvaluation['flag_type'],
                flagSeverity: $flagEvaluation['flag_severity'],
                flagReason: $flagEvaluation['flag_reason'],
                recipientEmail: $recipient,
                organizationName: $session?->survey?->organization?->name,
            ));
        }

        return $flagEvaluation;
    }

    protected function sendAlert(string $recipient, SafeguardingAlertMail $mailable): void
    {
        try {
            if ($this->mailSettings->enable_background_queue ?? true) {
                Mail::to($recipient)->queue($mailable);
            } else {
                Mail::to($recipient)->sendNow($mailable);
            }
        } catch (Throwable $e) {
            Log::error("Failed sending flag alert email to {$recipient}: ".$e->getMessage());
        }
    }
}
