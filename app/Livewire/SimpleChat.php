<?php

namespace App\Livewire;

use Illuminate\Support\Arr;
use Livewire\Attributes\Validate;
use Livewire\Component;

class SimpleChat extends Component
{
    /** @var array<int, array{role: string, content: string}> */
    public array $messages = [];

    #[Validate('required|min:1')]
    public string $body = '';

    public function mount(): void
    {
        $this->messages = [
            ['role' => 'assistant', 'content' => "Hi! I'm your simple AI assistant using the new wire:stream pattern. How can I help you today?"],
        ];
    }

    public function send(): void
    {
        $this->validate();

        $userMessage = $this->body;
        $this->messages[] = ['role' => 'user', 'content' => $userMessage];
        $this->body = '';

        // Add a placeholder for the assistant response
        $this->messages[] = ['role' => 'assistant', 'content' => ''];
        $assistantMessageIndex = count($this->messages) - 1;

        $stream = app('openai')->chat()->createStreamed([
            'model' => 'gpt-4o', // Using gpt-4o for speed and capability
            'messages' => $this->messages,
            'temperature' => 0.7,
        ]);

        $fullResponse = '';

        foreach ($stream as $response) {
            $content = Arr::get($response->choices[0]->toArray(), 'delta.content');

            if ($content) {
                $fullResponse .= $content;

                // Update the state so it persists on the next request
                $this->messages[$assistantMessageIndex]['content'] = $fullResponse;

                // Stream the chunk to the UI
                $this->stream(
                    to: "stream-{$assistantMessageIndex}",
                    content: $content,
                    replace: false
                );
            }
        }
    }

    public function render()
    {
        return view('livewire.simple-chat');
    }
}
