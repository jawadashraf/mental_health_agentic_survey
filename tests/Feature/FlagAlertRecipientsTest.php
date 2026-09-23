<?php

namespace Tests\Feature;

use App\Models\Organization;
use App\Models\Survey;
use App\Models\User;
use App\Services\FlagAlertRecipients;
use App\Settings\MailSettings;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FlagAlertRecipientsTest extends TestCase
{
    use RefreshDatabase;

    public function test_safeguarding_flags_go_to_survey_emails_and_opted_in_organization_users(): void
    {
        $organization = Organization::factory()->create();
        $survey = Survey::factory()->for($organization)
            ->withAlertEmails(['safeguarding@charity.test', 'Lead@Charity.test'], ['info@charity.test'])
            ->create();

        User::factory()->organizationMember($organization)->create(['email' => 'lead@charity.test']);
        User::factory()->organizationAdmin($organization)->create(['email' => 'admin@charity.test']);
        User::factory()->organizationMember($organization)->withoutFlagAlerts()->create(['email' => 'quiet@charity.test']);
        User::factory()->organizationMember()->create(['email' => 'outsider@other.test']);

        $recipients = app(FlagAlertRecipients::class)->for($survey, 'safeguarding', 'critical');

        $this->assertEqualsCanonicalizing(
            ['safeguarding@charity.test', 'lead@charity.test', 'admin@charity.test'],
            $recipients,
        );
    }

    public function test_info_flags_use_the_surveys_info_list(): void
    {
        $organization = Organization::factory()->create();
        $survey = Survey::factory()->for($organization)
            ->withAlertEmails(['safeguarding@charity.test'], ['info@charity.test'])
            ->create();

        $recipients = app(FlagAlertRecipients::class)->for($survey, 'event_safety', 'medium');

        $this->assertSame(['info@charity.test'], $recipients);
    }

    public function test_critical_severity_is_routed_to_safeguarding_regardless_of_type(): void
    {
        $survey = Survey::factory()->withAlertEmails(['safeguarding@charity.test'], ['info@charity.test'])->create();

        $recipients = app(FlagAlertRecipients::class)->for($survey, 'ill_equipped', 'critical');

        $this->assertSame(['safeguarding@charity.test'], $recipients);
    }

    public function test_flags_without_an_alert_channel_send_no_email(): void
    {
        $survey = Survey::factory()->withAlertEmails(['safeguarding@charity.test'], ['info@charity.test'])->create();

        $this->assertSame([], app(FlagAlertRecipients::class)->for($survey, 'struggle_burnout', 'high'));
        $this->assertSame([], app(FlagAlertRecipients::class)->for($survey, 'ill_equipped', 'high'));
    }

    public function test_falls_back_to_global_mail_settings_when_nothing_is_configured(): void
    {
        $settings = app(MailSettings::class);
        $settings->safeguarding_recipient_email = 'global-safeguarding@scope.test';
        $settings->info_recipient_email = 'global-info@scope.test';
        $settings->save();

        $survey = Survey::factory()->create();

        $this->assertSame(['global-safeguarding@scope.test'], app(FlagAlertRecipients::class)->for($survey, 'safeguarding', 'critical'));
        $this->assertSame(['global-info@scope.test'], app(FlagAlertRecipients::class)->for($survey, 'accessibility_complaint', 'medium'));
        $this->assertSame(['global-safeguarding@scope.test'], app(FlagAlertRecipients::class)->for(null, 'safeguarding', 'critical'));
    }
}
