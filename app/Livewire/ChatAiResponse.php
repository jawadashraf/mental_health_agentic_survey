<?php

namespace App\Livewire;

use App\Ai\Agents\RaftAgent;
use App\Models\SurveyResponse;
use Illuminate\Support\Facades\Session;
use Laravel\Ai\Streaming\Events\TextDelta;
use Laravel\Ai\Streaming\Events\ToolCall;
use Livewire\Component;

class ChatAiResponse extends Component
{
    public $questions = [];

    public $responses = [];

    public array $prompt;

    public array $message;

    public array $metadata = [];

    public ?string $response = null;

    public $selectedOption;

    public $textResponse = '';

    public $conversationId;

    public function mount()
    {
        $this->questions = config('survey');
        $this->conversationId = Session::get('survey_ai_conversation_id');
        $this->responses = Session::get('survey_ai_responses', []);

        if (! empty($this->message['content']) && ($this->metadata['type'] ?? '') != 'question') {
            $this->response = $this->message['content'];

            return;
        }

        if (($this->metadata['type'] ?? '') == 'question') {
            return;
        }
    }

    public function getResponse(): void
    {
        $userInput = $this->prompt['content'] ?? '';

        $agent = new RaftAgent;
        $participant = (object) ['id' => session()->getId()];

        // We continue the conversation. The Agent will use its tools based on its instructions.
        $streamResponse = $agent->continue($this->conversationId, as: $participant)
            ->stream($userInput);

        $this->response = '';

        foreach ($streamResponse as $event) {
            if ($event instanceof TextDelta) {
                $content = $event->delta;
                $this->response .= $content;
                $this->stream(to: 'stream-'.$this->getId(), content: $content, replace: false);
            }

            if ($event instanceof ToolCall && $event->toolCall->name === 'ask_survey_question') {
                // If the agent calls ask_survey_question, we need to signal the frontend to show the form.
                // We'll update the session metadata for the NEXT message or current state.
                $index = $event->toolCall->arguments['index'];
                $questionData = config('survey')[$index - 1] ?? null;

                if ($questionData) {
                    $this->handleQuestionTrigger($questionData);
                }
            }
        }

        $this->updateSessionMessage();
        $this->dispatch('refreshChat');
    }

    protected function handleQuestionTrigger(array $questionData)
    {
        // We push a "Question" marker into the session so that the next render cycle
        // includes the interactive form component.
        $messages = Session::get('survey_ai_messages', []);
        $metadata = Session::get('survey_ai_metadata', []);

        // We append a "question" type message to the flow
        $messages[] = ['role' => 'assistant', 'content' => 'Question-'.$questionData['id']];
        $metadata[] = [
            'role' => 'assistant',
            'content' => $questionData,
            'type' => 'question',
        ];

        Session::put('survey_ai_messages', $messages);
        Session::put('survey_ai_metadata', $metadata);

        // This will cause ChatAi to re-render and include the new question component
    }

    protected function updateSessionMessage()
    {
        $messages = Session::get('survey_ai_messages', []);
        $metadata = Session::get('survey_ai_metadata', []);

        foreach ($metadata as $index => $meta) {
            if (($meta['type'] ?? '') === 'stream' && empty($messages[$index]['content'])) {
                $messages[$index]['content'] = $this->response;
                break;
            }
        }

        Session::put('survey_ai_messages', $messages);
        Session::put('survey_ai_metadata', $metadata);
    }

    public function handleUserInput()
    {
        $question = $this->metadata['content'];
        $response = $question['type'] === 'radio' ? $this->selectedOption : $this->textResponse;

        if (! $response) {
            return;
        }

        // We store the response in the DB
        SurveyResponse::updateOrCreate(
            [
                'question_id' => $question['id'],
                'session_id' => session()->getId(),
            ],
            [
                'response' => $response,
                'question' => $question['question'],
            ]
        );

        // Update session
        $this->responses = Session::get('survey_ai_responses', []);
        $this->responses[$question['id']] = [
            'question' => $question['question'],
            'response' => $response,
        ];
        Session::put('survey_ai_responses', $this->responses);

        $this->selectedOption = null;
        $this->textResponse = '';

        // Notify the agent by sending the user's response as a new prompt
        // This is handled by the "send" flow in the parent or by refreshing.
        $this->dispatch('refreshChat', body: "I answered: $response");
    }

    public function render()
    {
        return view('livewire.chat-ai-response');
    }
}
