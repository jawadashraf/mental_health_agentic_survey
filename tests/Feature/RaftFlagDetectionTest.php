<?php

namespace Tests\Feature;

use App\Ai\Tools\RecordSurveyResponse;
use App\Mail\SafeguardingAlertMail;
use App\Models\SurveySession;
use App\Services\RaftFlagDetectionService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Laravel\Ai\Tools\Request;
use Prism\Prism\Facades\Prism;
use Tests\TestCase;

class RaftFlagDetectionTest extends TestCase
{
    use RefreshDatabase;

    public function test_flag_detection_service_detects_safeguarding_triggers(): void
    {
        $service = new RaftFlagDetectionService;
        $question = [
            'id' => 1,
            'question' => 'What are the main challenges your child is facing right now?',
            'red_flag_criteria' => 'Flag if someone mentions safeguarding concerns, risk of harming self or others.',
        ];

        $result = $service->evaluateResponse('I am worried about my child self-harming at home.', $question);

        $this->assertTrue($result['is_flagged']);
        $this->assertEquals('safeguarding', $result['flag_type']);
        $this->assertEquals('critical', $result['flag_severity']);
    }

    public function test_flag_detection_service_detects_burnout_struggle_triggers(): void
    {
        $service = new RaftFlagDetectionService;
        $question = [
            'id' => 2,
            'question' => 'What support has helped your child so far, and what has not worked?',
            'red_flag_criteria' => 'Flag if user says nothing has worked and I can’t carry on.',
        ];

        $result = $service->evaluateResponse('Nothing has worked for my child, I can’t carry on anymore.', $question);

        $this->assertTrue($result['is_flagged']);
        $this->assertEquals('struggle_burnout', $result['flag_type']);
        $this->assertEquals('high', $result['flag_severity']);
    }

    public function test_record_survey_response_tool_persists_flag_and_sends_email(): void
    {
        Mail::fake();
        $sessionId = session()->getId();

        SurveySession::create([
            'session_id' => $sessionId,
            'survey_type' => 'raft',
        ]);

        $tool = new RecordSurveyResponse;
        $request = new Request([
            'id' => 1,
            'response' => 'I am at risk of self-harm and feeling in danger',
        ]);

        $responseMsg = $tool->handle($request);

        $this->assertStringContainsString('Response for question 1 recorded successfully', (string) $responseMsg);
        $this->assertDatabaseHas('survey_responses', [
            'session_id' => $sessionId,
            'question_id' => 1,
            'is_flagged' => true,
            'flag_type' => 'safeguarding',
        ]);

        $this->assertDatabaseHas('survey_sessions', [
            'session_id' => $sessionId,
            'has_flags' => true,
            'flag_count' => 1,
        ]);

        Mail::assertSent(SafeguardingAlertMail::class, function ($mail) {
            return $mail->hasTo('safeguarding@theraftleicester.co.uk') &&
                   $mail->flagType === 'safeguarding';
        });
    }

    public function test_clean_response_does_not_trigger_flag_or_mail(): void
    {
        Mail::fake();
        Prism::fake();
        $sessionId = session()->getId();

        SurveySession::create([
            'session_id' => $sessionId,
            'survey_type' => 'raft',
        ]);

        $tool = new RecordSurveyResponse;
        $request = new Request([
            'id' => 10,
            'response' => 'I prefer virtual training sessions on weekends.',
        ]);

        $tool->handle($request);

        $this->assertDatabaseHas('survey_responses', [
            'session_id' => $sessionId,
            'question_id' => 10,
            'is_flagged' => false,
        ]);

        $this->assertDatabaseHas('survey_sessions', [
            'session_id' => $sessionId,
            'has_flags' => false,
            'flag_count' => 0,
        ]);

        Mail::assertNothingSent();
    }
}
