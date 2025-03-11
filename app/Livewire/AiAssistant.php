<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

use OpenAI\Laravel\Facades\OpenAI;
use Prism\Prism\Prism;

class AiAssistant extends Component
{
    public $threadId;
    public $inputMessage;

    public function mount() {
        $this->threadId = $this->setThread();
    }

    /**
     * Create a thread where the AI assistant will respond to messages.
     */
    public function setThread(array $parameters = [])
    {
        $thread = OpenAI::threads()->create($parameters);
        return $thread->id;
    }

    /**
     * Send a message to the AI assistant.
     */
    public function sendMessage(): static
    {
        OpenAI::threads()->messages()->create($this->threadId, [
            'role' => 'user',
            'content' => $this->inputMessage,
        ]);

        $this->streamAiResponse($this->inputMessage);

        return $this;
    }

//    public function sendMessage()
//    {
//        $response = Prism::stream()
//            ->using('openai', 'gpt-4')
//            ->withPrompt($this->inputMessage)
//            ->generate();
//
//// Process each chunk as it arrives
//        foreach ($response as $chunk) {
//            echo $chunk->text;
//            // Flush the output buffer to send text to the browser immediately
////            ob_flush();
////            flush();
//
//            $this->stream(to: 'answer', content: $chunk->text);
//
//            // Check if this is the final chunk
//            if ($chunk->finishReason) {
//                ds("Generation complete: " . $chunk->finishReason->name);
//            }
//        }
//    }

    /**
     * Stream the AI assistant's response to the user's message.
     * */
    public function streamAiResponse($message)
    {
        $stream = \OpenAI\Laravel\Facades\OpenAI::threads()->runs()->createStreamed(
            threadId: $this->threadId,
            parameters: [
                'assistant_id' => config('openai.assistant_id'),
            ]);

        $streamResponse = '';

        foreach($stream as $response){
            if($response->event == 'thread.message.delta') {
                $this->stream(to: 'answer', content: $response->response->delta->content[0]->text->value);
                $streamResponse .= $response->response->delta->content[0]->text->value;
            }

            if($response->event == 'thread.run.completed') {
                $this->messages[] = [
                    'role' => 'assistant',
                    'content' => $streamResponse,
                ];

            }
        }
    }

    #[Layout('layouts.minimal')]
    public function render()
    {
        return view('livewire.ai-assistant');
    }
}
