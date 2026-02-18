<?php

namespace Tests\Feature;

use App\Livewire\ChatbotAccess;
use Livewire\Livewire;
use Tests\TestCase;

class ChatbotAccessTest extends TestCase
{
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
    }

    public function test_it_allows_access_with_correct_code(): void
    {
        Livewire::test(ChatbotAccess::class)
            ->set('code', '123456')
            ->call('verify')
            ->assertHasNoErrors()
            ->assertRedirect(route('chat'));

        // Since redirection handles session, we verify session directly here as well if needed
        // but Livewire test followed by a standard GET should work if it persists.
        $this->withSession(['chatbot_access_granted' => true])
            ->get(route('chat'))
            ->assertOk();
    }

    public function test_it_fails_with_incorrect_code(): void
    {
        Livewire::test(ChatbotAccess::class)
            ->set('code', 'wrong-code')
            ->call('verify')
            ->assertHasErrors(['code']);

        $this->get(route('chat'))
            ->assertRedirect(route('chatbot-access'));
    }

    public function test_it_allows_access_via_qr_code_parameter(): void
    {
        $this->get(route('chat', ['access_code' => '123456']))
            ->assertRedirect(route('chat')) // Redirects to same URL without query param
            ->assertSessionHas('chatbot_access_granted', true);

        $this->get(route('chat'))
            ->assertOk();
    }
}
