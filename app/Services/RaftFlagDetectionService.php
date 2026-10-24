<?php

namespace App\Services;

use App\Models\Survey;
use Prism\Prism\Enums\Provider;
use Prism\Prism\Facades\Prism;

class RaftFlagDetectionService
{
    /**
     * Phrases that signal an immediate safeguarding risk.
     */
    protected const array SafeguardingKeywords = [
        'harming', 'harming myself', 'harming others', 'self-harm', 'suicide', 'suicidal',
        'abuse', 'abusing', 'neglect', 'safeguarding concern', 'unsafe at home',
        'danger', 'violence', 'hit', 'hitting', 'domestic abuse',
    ];

    /**
     * Phrases that signal hopelessness or that someone can't cope.
     */
    protected const array StruggleKeywords = [
        'can\'t carry on', 'cannot carry on', 'cant carry on',
        'nothing has worked', 'nothing works', 'i can\'t do this anymore',
        'i cannot do this anymore', 'giving up',
    ];

    /**
     * Find the first safeguarding or struggle phrase in the text, matched from the start of a word
     * so that e.g. "hit" does not match "white".
     *
     * @return array{flag_type: 'safeguarding'|'struggle_burnout', keyword: string}|null
     */
    public function matchDistressKeyword(string $text): ?array
    {
        $normalized = str_replace(['’', '‘'], "'", strtolower(trim($text)));

        foreach (['safeguarding' => self::SafeguardingKeywords, 'struggle_burnout' => self::StruggleKeywords] as $flagType => $keywords) {
            foreach ($keywords as $keyword) {
                if (preg_match('/(?<![a-z])'.preg_quote($keyword, '/').'/', $normalized) === 1) {
                    return ['flag_type' => $flagType, 'keyword' => $keyword];
                }
            }
        }

        return null;
    }

    /**
     * Whether the text suggests the person may be at risk or struggling to cope.
     */
    public function detectsDistress(string $text): bool
    {
        return $this->matchDistressKeyword($text) !== null;
    }

    /**
     * Analyze a survey response and detect if a red flag should be raised.
     *
     * @param  string  $userResponse  The response text provided by the user.
     * @param  array  $questionData  Question array from raft-survey configuration.
     * @param  Survey|null  $survey  The survey being answered, whose contact emails are used for signposting.
     * @return array Result shape: [is_flagged, flag_type, flag_severity, flag_reason, flag_action_taken, signpost_guidance]
     */
    public function evaluateResponse(string $userResponse, array $questionData, ?Survey $survey = null): array
    {
        $responseLower = strtolower(trim($userResponse));
        $contacts = app(FlagAlertRecipients::class);
        $infoEmail = $contacts->contactEmail($survey, FlagAlertRecipients::ChannelInfo);
        $safeguardingEmail = $contacts->contactEmail($survey, FlagAlertRecipients::ChannelSafeguarding);

        if (empty($responseLower)) {
            return $this->noFlag();
        }

        // 1 & 2. Direct rule checks for immediate safeguarding risk, then hopelessness / cannot carry on
        $distress = $this->matchDistressKeyword($userResponse);

        if ($distress !== null && $distress['flag_type'] === 'safeguarding') {
            return [
                'is_flagged' => true,
                'flag_type' => 'safeguarding',
                'flag_severity' => 'critical',
                'flag_reason' => "Explicit safeguarding keyword detected: '{$distress['keyword']}'",
                'flag_action_taken' => "Automatic referral email sent to {$safeguardingEmail}",
                'signpost_guidance' => "Please provide immediate supportive signposting: if anyone is in immediate danger or expressing self-harm/safeguarding risks, advise them to contact local emergency services or email {$safeguardingEmail} immediately.",
            ];
        }

        if ($distress !== null) {
            return [
                'is_flagged' => true,
                'flag_type' => 'struggle_burnout',
                'flag_severity' => 'high',
                'flag_reason' => "Severe struggle / hopelessness phrase detected: '{$distress['keyword']}'",
                'flag_action_taken' => 'Flagged for RAFT team attention and user signposted to support services',
                'signpost_guidance' => "Acknowledge how overwhelming things feel, and gently encourage them to seek support from their social worker, trusted adult, support services like FosterTalk or Adoption UK, or The Raft ({$infoEmail}).",
            ];
        }

        // 3. Direct Rule Checks for Event Safety / Inclusion Complaints
        if (str_contains($responseLower, 'raft event') || str_contains($responseLower, 'previous event') || str_contains($responseLower, 'raft activity')) {
            if (str_contains($responseLower, 'not safe') || str_contains($responseLower, 'unsafe') || str_contains($responseLower, 'not included') || str_contains($responseLower, 'excluded')) {
                return [
                    'is_flagged' => true,
                    'flag_type' => 'event_safety',
                    'flag_severity' => 'medium',
                    'flag_reason' => 'Reported feeling unsafe or excluded at a previous Raft event/activity',
                    'flag_action_taken' => "Flagged for RAFT attention and user encouraged to email {$infoEmail}",
                    'signpost_guidance' => "Express sincere empathy that they felt unsafe or excluded at a Raft event, and encourage them to get in touch with Raft ({$infoEmail}, or {$safeguardingEmail} if they felt unsafe) so the team can address this immediately.",
                ];
            }
        }

        // 4. Direct Rule Checks for Accessibility Complaints (e.g. Q8)
        if (str_contains($responseLower, 'inaccessible') || str_contains($responseLower, 'wheelchair') || str_contains($responseLower, 'disability access') || (str_contains($responseLower, 'barrier') && str_contains($responseLower, 'access'))) {
            return [
                'is_flagged' => true,
                'flag_type' => 'accessibility_complaint',
                'flag_severity' => 'medium',
                'flag_reason' => 'Accessibility concern or complaint raised regarding services',
                'flag_action_taken' => "Flagged for RAFT attention and user invited to email {$infoEmail}",
                'signpost_guidance' => "Thank them for pointing out accessibility barriers and invite them to email {$infoEmail} so Raft can improve access.",
            ];
        }

        // 5. LLM Classification via Prism for nuanced responses against question red_flag_criteria
        try {
            $criteria = $contacts->fillContactPlaceholders($survey, $questionData['red_flag_criteria'] ?? 'Detect safeguarding concerns, severe burnout, or complaints.');
            $questionText = $questionData['question'] ?? '';

            $prompt = <<<PROMPT
You are a safeguarding and risk analysis classifier for a UK foster care charity (The Raft).
Analyze the user's survey response to determine if it should raise a red flag for RAFT's attention.

Question: "{$questionText}"
Question Red Flag Criteria: "{$criteria}"
User Response: "{$userResponse}"
Raft contacts for signposting: {$infoEmail} (general support, feedback, complaints) and {$safeguardingEmail} (safeguarding concerns or risk of harm).

Respond strictly in JSON format with no markdown wrappers:
{
  "is_flagged": boolean,
  "flag_type": "safeguarding" | "struggle_burnout" | "event_safety" | "accessibility_complaint" | "ill_equipped" | "none",
  "flag_severity": "critical" | "high" | "medium" | "none",
  "flag_reason": "string describing why it was flagged or empty string",
  "signpost_guidance": "short instruction on how to signpost help to the user, including the relevant Raft email address, or empty string"
}
PROMPT;

            $aiResponse = Prism::text()
                ->using(Provider::OpenAI, 'gpt-4o-mini')
                ->withPrompt($prompt)
                ->generate();

            $rawText = trim($aiResponse->text);
            $cleanJson = str_replace(['```json', '```'], '', $rawText);
            $parsed = json_decode($cleanJson, true);

            if (is_array($parsed) && ($parsed['is_flagged'] ?? false) === true) {
                $type = $parsed['flag_type'] ?? 'struggle_burnout';
                $actionTaken = $type === 'safeguarding'
                    ? "Automatic referral email sent to {$safeguardingEmail}"
                    : 'Flagged for RAFT team review and user signposted to support';

                return [
                    'is_flagged' => true,
                    'flag_type' => $type,
                    'flag_severity' => $parsed['flag_severity'] ?? 'high',
                    'flag_reason' => $parsed['flag_reason'] ?? 'Flagged based on question criteria evaluation',
                    'flag_action_taken' => $actionTaken,
                    'signpost_guidance' => $parsed['signpost_guidance'] ?? "Suggest seeking support or contacting Raft ({$infoEmail}).",
                ];
            }
        } catch (\Throwable $e) {
            \Log::warning('LLM Flag classification error: '.$e->getMessage());
        }

        return $this->noFlag();
    }

    protected function noFlag(): array
    {
        return [
            'is_flagged' => false,
            'flag_type' => null,
            'flag_severity' => null,
            'flag_reason' => null,
            'flag_action_taken' => null,
            'signpost_guidance' => null,
        ];
    }
}
