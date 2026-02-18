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
        Livewire::test(ConversationBot::class)
            ->call('clear')
            ->assertSet('conversationId', null)
            ->assertSee('Conversation cleared!');
    }

    public function test_it_resumes_previous_conversation(): void
    {
        // Simulate a previous conversation in the database
        $conversationId = (string) \Illuminate\Support\Str::uuid7();
        \Illuminate\Support\Facades\DB::table('agent_conversations')->insert([
            'id' => $conversationId,
            'user_id' => null,
            'session_id' => session()->getId(),
            'title' => 'Test Conversation',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        \Illuminate\Support\Facades\DB::table('agent_conversation_messages')->insert([
            'id' => (string) \Illuminate\Support\Str::uuid7(),
            'conversation_id' => $conversationId,
            'user_id' => null,
            'session_id' => session()->getId(),
            'agent' => ConversationAssistant::class,
            'role' => 'assistant',
            'content' => 'Old message',
            'attachments' => '[]',
            'tool_calls' => '[]',
            'tool_results' => '[]',
            'usage' => '[]',
            'meta' => '[]',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Livewire::test(ConversationBot::class)
            ->assertSet('conversationId', $conversationId)
            ->assertSee('Old message');
    }
}
