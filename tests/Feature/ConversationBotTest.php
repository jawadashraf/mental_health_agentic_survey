<?php

namespace Tests\Feature;

use App\Ai\Agents\ConversationAssistant;
use App\Livewire\ConversationBot;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class ConversationBotTest extends TestCase
{
    use RefreshDatabase;

    public function test_component_renders_successfully(): void
    {
        Livewire::test(ConversationBot::class)
            ->assertStatus(200)
            ->assertSee('Conversation AI');
    }

    public function test_it_can_send_a_message(): void
    {
        ConversationAssistant::fake(['Hello! How can I help?']);

        Livewire::test(ConversationBot::class)
            ->set('body', 'Hi assistant')
            ->call('send')
            ->assertSet('body', '')
            ->assertCount('messages', 3); // Initial greeting + User message + Assistant response
    }

    public function test_it_can_clear_conversation(): void
    {
        session()->put('conversation_bot_id', 'old-id');

        Livewire::test(ConversationBot::class)
            ->call('clear')
            ->assertSet('conversationId', null)
            ->assertSee('Conversation cleared!');

        $this->assertNull(session()->get('conversation_bot_id'));
    }
}
