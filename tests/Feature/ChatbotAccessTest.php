<?php

namespace Tests\Feature;

use App\Livewire\ChatbotAccess;
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
}
