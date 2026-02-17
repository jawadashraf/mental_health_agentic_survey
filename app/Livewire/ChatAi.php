<?php

namespace App\Livewire;

use App\Ai\Agents\SurveyAgent;
use App\Models\SurveySession;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ChatAi extends Component
{
    public $questions = [];

    protected $listeners = ['incrementCurrentIndex' => 'incrementCurrentIndex', 'askQuestion' => 'askQuestion', 'refreshChat' => '$refresh'];

    public string $greetings = "Hi there! I'm here to chat about mental health awareness.
    Would you be interested in taking a short survey to help us understand your perspective better?";

    public $currentIndex;

    public $surveyStarted = false;

    public $surveyCompleted = false;

    public $conversationId;

    #[Validate('required|max:1000')]
    public string $body = '';

    public array $messages = [];

    public array $metadata = [];

    public function mount(): void
    {
        $sessionId = session()->getId();

        SurveySession::firstOrCreate(
            [
                'session_id' => $sessionId,
            ]
        );

        $this->questions = config('survey');

        if (! Session::has('survey_ai_conversation_id')) {
            $agent = new SurveyAgent();
            // Start a new conversation for this session
            $participant = (object) ['id' => $sessionId];
            $response = $agent->forUser($participant)->prompt($this->greetings);
            $this->conversationId = $response->conversationId;
            
            Session::put('survey_ai_conversation_id', $this->conversationId);
            
            $this->messages[] = ['role' => 'assistant', 'content' => $this->greetings];
            $this->metadata[] = ['role' => 'assistant', 'content' => $this->greetings, 'type' => 'greetings'];
            
            Session::put('survey_ai_messages', $this->messages);
            Session::put('survey_ai_metadata', $this->metadata);
        } else {
            $this->conversationId = Session::get('survey_ai_conversation_id');
            $this->messages = Session::get('survey_ai_messages', []);
            $this->metadata = Session::get('survey_ai_metadata', []);
        }

        if (! Session::has('survey_ai_index')) {
            Session::put('survey_ai_index', 0);
            $this->currentIndex = 0;
        } else {
            $this->currentIndex = Session::get('survey_ai_index');
        }

        if (! Session::has('survey_ai_started')) {
            Session::put('survey_ai_started', false);
            $this->surveyStarted = false;
        } else {
            $this->surveyStarted = Session::get('survey_ai_started');
        }
    }

    public function incrementCurrentIndex(): void
    {
        session()->increment('survey_ai_index');
        $this->askQuestion();
    }

    public function askQuestion($currentLivewireComponentId = null): void
    {
        $this->currentIndex = Session::get('survey_ai_index');

        if ($this->surveyStarted) {
            if ($this->currentIndex >= count($this->questions)) {
                session()->flash('message', 'Survey completed!');
                $session = SurveySession::query()->where('session_id', session()->getId());
                if ($session) {
                    $session->update([
                        'completed' => true,
                        'completed_at' => now(),
                    ]);
                }
                
                return;
            }
        } else {
            $this->surveyStarted = true;
            Session::put('survey_ai_started', true);
        }

        if ($currentLivewireComponentId) {
            $this->js('hideBotDiv(\'next-bot-response-'.$currentLivewireComponentId."')");
        }

        $question = $this->questions[$this->currentIndex];
        
        // We track metadata for the frontend grouping/rendering
        $this->metadata[] = [
            'role' => 'assistant',
            'content' => $question,
            'type' => 'question',
        ];

        $plainQuestion = $this->convertQuestionToPlainText($question);

        $this->messages[] = [
            'role' => 'assistant',
            'content' => $plainQuestion,
        ];
        
        Session::put('survey_ai_messages', $this->messages);
        Session::put('survey_ai_metadata', $this->metadata);
    }

    public function convertQuestionToPlainText($question): string
    {
        $questionText = 'Question-'.$question['id'].': '.$question['question'];

        if ($question['type'] === 'radio') {
            $optionsText = implode("\n", array_map(function ($option, $index) {
                return ($index + 1).'. '.$option;
            }, $question['options'], array_keys($question['options'])));

            return $questionText." Please choose one of the following options:\n".$optionsText;
        } elseif ($question['type'] === 'text') {
            return $questionText;
        } else {
            return $questionText.' (Unknown question type)';
        }
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
