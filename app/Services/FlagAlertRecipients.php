<?php

namespace App\Services;

use App\Models\Survey;
use App\Models\User;
use App\Settings\MailSettings;

class FlagAlertRecipients
{
    public const string ChannelSafeguarding = 'safeguarding';

    public const string ChannelInfo = 'info';

    public function __construct(protected MailSettings $mailSettings) {}

    /**
     * The alert channel a flag is routed to, or null when the flag should not send an email.
     */
    public function channelFor(?string $flagType, ?string $flagSeverity): ?string
    {
        if ($flagSeverity === 'critical' || $flagType === 'safeguarding') {
            return self::ChannelSafeguarding;
        }

        if (in_array($flagType, ['accessibility_complaint', 'event_safety'], true)) {
            return self::ChannelInfo;
        }

        return null;
    }

    /**
     * Resolve the email addresses that should be alerted about a flag on the given survey.
     *
     * Recipients are the survey's own list for the channel plus every opted-in user of the
     * survey's organisation. When none are configured, the global mail settings are used.
     *
     * @return list<string>
     */
    public function for(?Survey $survey, ?string $flagType, ?string $flagSeverity): array
    {
        $channel = $this->channelFor($flagType, $flagSeverity);

        if ($channel === null) {
            return [];
        }

        $recipients = collect();

        if ($survey !== null) {
            $surveyEmails = $channel === self::ChannelSafeguarding
                ? $survey->safeguarding_emails
                : $survey->info_emails;

            $organizationUserEmails = User::query()
                ->where('organization_id', $survey->organization_id)
                ->receivingFlagAlerts()
                ->pluck('email');

            $recipients = $recipients
                ->merge($surveyEmails ?? [])
                ->merge($organizationUserEmails);
        }

        $recipients = $recipients
            ->map(fn (?string $email): string => strtolower(trim((string) $email)))
            ->filter(fn (string $email): bool => filter_var($email, FILTER_VALIDATE_EMAIL) !== false)
            ->unique()
            ->values();

        if ($recipients->isEmpty()) {
            $fallback = $channel === self::ChannelSafeguarding
                ? $this->mailSettings->safeguarding_recipient_email
                : $this->mailSettings->info_recipient_email;

            return filled($fallback) ? [$fallback] : [];
        }

        return $recipients->all();
    }
}
