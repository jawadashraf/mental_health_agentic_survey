<?php

namespace App\Livewire;

use App\Ai\Agents\RaftAgent;
use App\Models\SurveySession;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ChatAi extends Component
{
    public $surveyStarted = false;

    public $conversationId;

    #[Validate('required|max:1000')]
    public string $body = '';

    public array $messages = [];

    public array $metadata = [];

    public function mount(): void
    {
        $sessionId = session()->getId();

        SurveySession::firstOrCreate([
            'session_id' => $sessionId,
        ]);

        if (request()->has('new')) {
            Session::forget([
                'survey_ai_conversation_id',
                'survey_ai_messages',
                'survey_ai_metadata',
                'survey_ai_started',
                'survey_ai_responses',
            ]);
        }

        if (! Session::has('survey_ai_conversation_id')) {
            $agent = new RaftAgent;
            $participant = (object) ['id' => $sessionId];

            $response = $agent->forUser($participant)->prompt('Begin the mental health awareness survey session with a warm greeting.');

            $this->conversationId = $response->conversationId;

            Session::put('survey_ai_conversation_id', $this->conversationId);

            $this->messages[] = ['role' => 'assistant', 'content' => $response->text];
            $this->metadata[] = ['role' => 'assistant', 'content' => $response->text, 'type' => 'default'];

            Session::put('survey_ai_messages', $this->messages);
            Session::put('survey_ai_metadata', $this->metadata);
        } else {
            $this->conversationId = Session::get('survey_ai_conversation_id');
            $this->messages = Session::get('survey_ai_messages', []);
            $this->metadata = Session::get('survey_ai_metadata', []);
        }

        $this->surveyStarted = Session::get('survey_ai_started', false);
    }

    #[On('refreshChat')]
    public function handleRefresh($body = null)
    {
        if ($body) {
            $this->messages[] = ['role' => 'user', 'content' => $body];
            $this->metadata[] = ['role' => 'user', 'content' => $body];
            Session::put('survey_ai_messages', $this->messages);
            Session::put('survey_ai_metadata', $this->metadata);
        }

        $this->dispatch('$refresh');
    }

    public function send(): void
    {
        $this->validate();

        $this->messages[] = ['role' => 'user', 'content' => $this->body];
        $this->metadata[] = ['role' => 'user', 'content' => $this->body];

        $this->messages[] = ['role' => 'assistant', 'content' => ''];
        $this->metadata[] = ['role' => 'assistant', 'content' => '', 'type' => 'stream'];

        $this->body = '';

        Session::put('survey_ai_messages', $this->messages);
        Session::put('survey_ai_metadata', $this->metadata);
    }

    public function render()
    {
        return view('livewire.chat-ai');
    }
}
