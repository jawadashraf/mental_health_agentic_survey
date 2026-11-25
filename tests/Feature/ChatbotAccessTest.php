<?php

namespace Tests\Feature;

use App\Livewire\ChatbotAccess;
use App\Livewire\RaftChat;
use App\Models\Organization;
use App\Models\Survey;
use App\Models\User;
use App\Settings\ChatSettings;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class ChatbotAccessTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_redirects_unauthorized_users_from_chatbot_routes(): void
    {
        $this->get(route('chat'))
            ->assertRedirect(route('chatbot-access'));

        $this->get(route('chat-v2'))
            ->assertRedirect(route('chatbot-access'));

        $this->get(route('simple-chat'))
            ->assertRedirect(route('chatbot-access'));

        $this->get(route('conversation-bot'))
            ->assertRedirect(route('chatbot-access'));

        $this->get(route('raft-chat'))
            ->assertRedirect(route('chatbot-access'));
    }

    public function test_it_allows_access_with_correct_code(): void
    {
        $settings = app(ChatSettings::class);
        $settings->access_code = 'secret-999';
        $settings->save();

        Livewire::test(ChatbotAccess::class)
            ->set('code', 'secret-999')
            ->call('verify')
            ->assertHasNoErrors()
            ->assertRedirect(route('raft-chat'));

        $this->withSession(['chatbot_access_granted' => true])
            ->get(route('raft-chat'))
            ->assertOk();
    }

    public function test_it_fails_with_incorrect_code(): void
    {
        Livewire::test(ChatbotAccess::class)
            ->set('code', 'wrong-code')
            ->call('verify')
            ->assertHasErrors(['code']);

        $this->get(route('raft-chat'))
            ->assertRedirect(route('chatbot-access'));
    }

    public function test_it_allows_access_via_qr_code_parameter(): void
    {
        $settings = app(ChatSettings::class);
        $settings->access_code = 'new-random-secret-123';
        $settings->save();

        $this->get(route('raft-chat', ['access_code' => 'new-random-secret-123']))
            ->assertRedirect(route('raft-chat'))
            ->assertSessionHas('chatbot_access_granted', true);

        $this->get(route('raft-chat'))
            ->assertOk();
    }

    public function test_qrcode_is_removed_from_survey_start_page(): void
    {
        $response = $this->get(route('chatbot-access'));

        $response->assertOk();
        $response->assertDontSee('api.qrserver.com');
        $response->assertDontSee('Or scan with your phone');
    }

    public function test_privacy_notice_and_disclaimer_are_on_survey_start_page(): void
    {
        $response = $this->get(route('chatbot-access'));

        $response->assertOk();
        $response->assertSee('Confidentiality & Privacy Notice', escape: false);
        $response->assertSee('AI Trial Project Disclaimer');
        $response->assertSee('Users should not enter confidential, sensitive, personal or commercially sensitive information');
    }

    public function test_survey_chat_displays_disclaimer_and_privacy_notice(): void
    {
        $response = $this->withSession(['chatbot_access_granted' => true])
            ->get(route('raft-chat'));

        $response->assertOk();
        $response->assertSee('AI Trial Project Disclaimer');
        $response->assertSee('Privacy:');
        $response->assertSee('I Understand & Accept', escape: false);
    }

    public function test_admin_can_download_qr_code(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get(route('admin.chat-access.qr-code.download', [
                'target' => 'raft',
                'code' => 'test-code',
            ]));

        $response->assertOk();
        $response->assertHeader('Content-Type', 'image/png');
        $response->assertHeader('Content-Disposition', 'attachment; filename="survey-access-qrcode-raft.png"');
    }

    public function test_it_routes_to_specific_survey_when_entering_survey_access_code(): void
    {
        $org = Organization::factory()->create();
        $survey = Survey::factory()->for($org)->create([
            'slug' => 'custom-foster-survey',
            'access_code' => 'custom-pass-888',
        ]);

        Livewire::test(ChatbotAccess::class)
            ->set('code', 'custom-pass-888')
            ->call('verify')
            ->assertHasNoErrors()
            ->assertRedirect(route('raft-chat', ['survey' => 'custom-foster-survey']));
    }

    public function test_it_allows_direct_access_with_survey_code_via_qr_parameter(): void
    {
        $org = Organization::factory()->create();
        $survey = Survey::factory()->for($org)->create([
            'slug' => 'direct-qr-survey',
            'access_code' => 'direct-code-555',
        ]);

        $this->get(route('raft-chat', [
            'survey' => 'direct-qr-survey',
            'access_code' => 'direct-code-555',
        ]))
            ->assertRedirect(route('raft-chat', ['survey' => 'direct-qr-survey']))
            ->assertSessionHas('chatbot_access_granted', true)
            ->assertSessionHas('active_survey_slug', 'direct-qr-survey');
    }

    public function test_admin_can_download_survey_specific_qr_code(): void
    {
        $user = User::factory()->create();
        $org = Organization::factory()->create();
        $survey = Survey::factory()->for($org)->create([
            'slug' => 'partner-survey',
            'access_code' => 'partner-123',
        ]);

        $response = $this->actingAs($user)
            ->get(route('admin.chat-access.qr-code.download', [
                'survey' => 'partner-survey',
            ]));

        $response->assertOk();
        $response->assertHeader('Content-Type', 'image/png');
        $response->assertHeader('Content-Disposition', 'attachment; filename="survey-access-qrcode-partner-survey.png"');
    }

    public function test_welcome_screen_requires_disclaimer_agreement_before_starting_survey(): void
    {
        $org = Organization::factory()->create(['name' => 'The Raft']);
        $survey = Survey::factory()->for($org)->create([
            'name' => 'Family & Carer Survey',
            'slug' => 'raft-welcome',
            'welcome_title' => 'Welcome to The Raft Family Survey',
            'welcome_message' => 'We would love to hear about your experiences.',
            'brand_color' => '#0D9488',
        ]);

        Livewire::withQueryParams(['survey' => $survey->slug])
            ->withoutLazyLoading()
            ->test(RaftChat::class)
            ->assertSet('hasEnteredChat', false)
            ->assertSet('disclaimerAccepted', false)
            ->assertSee('Welcome to The Raft Family Survey')
            ->assertSee('We would love to hear about your experiences.')
            ->assertSee('Agree & Start Survey')
            ->call('startSurvey')
            ->assertHasErrors(['disclaimerCheckbox'])
            ->assertSet('hasEnteredChat', false)
            ->assertSet('surveyStarted', false)
            ->set('disclaimerCheckbox', true)
            ->call('startSurvey')
            ->assertHasNoErrors()
            ->assertSet('disclaimerAccepted', true)
            ->assertSet('hasEnteredChat', true)
            ->assertSet('surveyStarted', true)
            ->assertSet('showGuide', false);
    }

    public function test_welcome_screen_displays_uploaded_survey_logo_and_allows_entering_chat_first(): void
    {
        $org = Organization::factory()->create(['name' => 'The Raft']);
        $survey = Survey::factory()->for($org)->create([
            'name' => 'Raft Listening Survey',
            'slug' => 'raft-logo-test',
            'logo_path' => 'survey-logos/raft-logo.png',
            'brand_color' => '#EA580C',
        ]);

        Livewire::withQueryParams(['survey' => $survey->slug])
            ->withoutLazyLoading()
            ->test(RaftChat::class)
            ->assertSee('/storage/survey-logos/raft-logo.png')
            ->assertSee('#EA580C')
            ->call('acceptDisclaimer')
            ->assertSet('disclaimerAccepted', true)
            ->assertSet('disclaimerCheckbox', true)
            ->call('enterChat')
            ->assertSet('hasEnteredChat', true)
            ->assertSet('surveyStarted', false)
            ->assertSee('Start the Survey');
    }

    public function test_welcome_screen_allows_starting_without_checkbox_when_disclaimer_is_not_required(): void
    {
        $settings = app(ChatSettings::class);
        $settings->require_disclaimer = false;
        $settings->save();

        Livewire::withQueryParams(['mode' => 'test'])
            ->withoutLazyLoading()
            ->test(RaftChat::class)
            ->assertSee('Start the Survey')
            ->call('startSurvey')
            ->assertHasNoErrors()
            ->assertSet('hasEnteredChat', true)
            ->assertSet('surveyStarted', true);
    }

    public function test_chatbot_access_page_shows_survey_branding(): void
    {
        $org = Organization::factory()->create(['name' => 'The Raft']);
        $survey = Survey::factory()->for($org)->create([
            'slug' => 'branded-access-survey',
            'welcome_title' => 'Hello Raft Families',
            'welcome_message' => 'Pop your code in below to begin.',
            'logo_path' => 'survey-logos/raft.png',
        ]);

        $this->get(route('chatbot-access', ['survey' => $survey->slug]))
            ->assertOk()
            ->assertSee('Hello Raft Families')
            ->assertSee('Pop your code in below to begin.')
            ->assertSee('/storage/survey-logos/raft.png');
    }
}
