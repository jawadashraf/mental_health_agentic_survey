<?php

namespace App\Livewire;

use App\Ai\Agents\ConversationAssistant;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ConversationBot extends Component
{
    /** @var array<int, array{role: string, content: string}> */
    public array $messages = [];

    #[Validate('required|min:1')]
    public string $body = '';

    public ?string $conversationId = null;

    public function mount(): void
    {
        $agent = new ConversationAssistant;
        $participant = (object) ['id' => session()->getId()];

        $agent->continueLastConversation($participant);
        $this->conversationId = $agent->currentConversation();

        if ($this->conversationId) {
            $this->messages = collect($agent->messages())
                ->map(fn ($message) => [
                    'role' => $message->role->value,
                    'content' => $message->content,
                ])
                ->all();
        } else {
            $this->messages = [
                ['role' => 'assistant', 'content' => "Hello! I'm an AI that remembers our conversation. How can I help you today?"],
            ];
        }
    }

    public bool $isTyping = false;

    public function send(): void
    {
        $this->validate();

        $userMessage = $this->body;
        $this->messages[] = ['role' => 'user', 'content' => $userMessage];
        $this->body = '';
        $this->isTyping = true;

        // Add a placeholder for the assistant response
        $this->messages[] = ['role' => 'assistant', 'content' => ''];

        $this->dispatch('respond');
    }

    #[\Livewire\Attributes\On('respond')]
    public function respond(): void
    {
        $assistantMessageIndex = count($this->messages) - 1;
        $userMessage = $this->messages[$assistantMessageIndex - 1]['content'];

        $agent = new ConversationAssistant;

        $participant = (object) ['id' => session()->getId()];

        $agent->continueLastConversation($participant);

        $response = $agent->stream($userMessage);

        $fullResponse = '';

        foreach ($response as $event) {
            if ($event instanceof \Laravel\Ai\Streaming\Events\TextDelta) {
                $fullResponse .= $event->delta;

                $this->messages[$assistantMessageIndex]['content'] = $fullResponse;

                $this->stream(
                    to: "stream-{$assistantMessageIndex}",
                    content: $event->delta,
                    replace: false
                );
            }
        }

        if (! $this->conversationId) {
            $this->conversationId = $response->conversationId;
        }

        $this->isTyping = false;
    }

    public function clear(): void
    {
        Session::forget(['conversation_bot_id']);
        $this->conversationId = null;
        $this->messages = [
            ['role' => 'assistant', 'content' => 'Conversation cleared! How can I help you today?'],
        ];
    }

    public function render()
    {
        return view('livewire.conversation-bot');
    }
}
