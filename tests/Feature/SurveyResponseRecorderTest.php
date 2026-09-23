<?php

namespace Tests\Feature;

use App\Mail\SafeguardingAlertMail;
use App\Models\Organization;
use App\Models\Survey;
use App\Models\SurveyResponse;
use App\Models\SurveySession;
use App\Models\User;
use App\Services\SurveyResponseRecorder;
use App\Settings\MailSettings;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Prism\Prism\Facades\Prism;
use Tests\TestCase;

class SurveyResponseRecorderTest extends TestCase
{
    use RefreshDatabase;

    protected SurveySession $session;

    protected function setUp(): void
    {
        parent::setUp();

        Mail::fake();

        $organization = Organization::factory()->create(['name' => 'The Raft']);
        $survey = Survey::factory()->for($organization)
            ->withAlertEmails(['safeguarding@charity.test'])
            ->create();

        User::factory()->organizationMember($organization)->create(['email' => 'staff@charity.test']);

        $this->session = SurveySession::factory()->for($survey)->create();
    }

    public function test_flagged_response_is_stored_and_queues_one_alert_per_recipient(): void
    {
        $result = app(SurveyResponseRecorder::class)->record(
            sessionId: $this->session->session_id,
            questionId: 1,
            questionText: 'What are the main challenges?',
            response: 'My child is <b>self-harming</b> at home',
            questionData: ['id' => 1, 'question' => 'What are the main challenges?'],
        );

        $this->assertTrue($result['is_flagged']);

        $storedResponse = SurveyResponse::query()->where('session_id', $this->session->session_id)->sole();
        $this->assertTrue($storedResponse->is_flagged);
        $this->assertSame('safeguarding', $storedResponse->flag_type);
        $this->assertStringContainsString('safeguarding@charity.test', $storedResponse->flag_action_taken);
        $this->assertStringContainsString('staff@charity.test', $storedResponse->flag_action_taken);

        $this->session->refresh();
        $this->assertTrue($this->session->has_flags);
        $this->assertSame(1, $this->session->flag_count);

        Mail::assertQueuedCount(2);
        Mail::assertQueued(SafeguardingAlertMail::class, fn (SafeguardingAlertMail $mail): bool => $mail->hasTo('safeguarding@charity.test'));
        Mail::assertQueued(SafeguardingAlertMail::class, fn (SafeguardingAlertMail $mail): bool => $mail->hasTo('staff@charity.test')
            && $mail->organizationName === 'The Raft');
    }

    public function test_alert_email_escapes_the_participants_response(): void
    {
        $mail = new SafeguardingAlertMail(
            sessionId: 'abc',
            questionId: 1,
            questionText: 'Question?',
            userResponse: '<script>alert(1)</script> self-harm',
            flagType: 'safeguarding',
            flagSeverity: 'critical',
            flagReason: 'Keyword',
            recipientEmail: 'staff@charity.test',
            organizationName: 'The Raft',
        );

        $mail->assertDontSeeInHtml('<script>', false);
        $mail->assertSeeInHtml('&lt;script&gt;', false);
        $mail->assertHasSubject('[THE RAFT ALERT - CRITICAL] Survey Response Flagged (safeguarding) - Session abc');
    }

    public function test_alerts_are_sent_immediately_when_background_queue_is_disabled(): void
    {
        $settings = app(MailSettings::class);
        $settings->enable_background_queue = false;
        $settings->save();

        app(SurveyResponseRecorder::class)->record(
            sessionId: $this->session->session_id,
            questionId: 1,
            questionText: 'What are the main challenges?',
            response: 'I am worried about neglect',
            questionData: ['id' => 1],
        );

        Mail::assertSentCount(2);
        Mail::assertNothingQueued();
    }

    public function test_clean_response_is_stored_without_alerts(): void
    {
        Prism::fake();

        $result = app(SurveyResponseRecorder::class)->record(
            sessionId: $this->session->session_id,
            questionId: 10,
            questionText: 'How do you prefer training?',
            response: 'I prefer virtual training sessions on weekends.',
            questionData: ['id' => 10],
        );

        $this->assertFalse($result['is_flagged']);
        $this->assertDatabaseHas('survey_responses', [
            'session_id' => $this->session->session_id,
            'question_id' => 10,
            'is_flagged' => false,
        ]);
        $this->assertFalse($this->session->refresh()->has_flags);

        Mail::assertNothingOutgoing();
    }
}
