<?php

namespace App\Livewire;

use App\Models\SurveyResponse;
use App\Models\SurveySession;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Request;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;

class Chat extends Component
{

        public $questions = [];

    protected $listeners = ['incrementCurrentIndex' => 'incrementCurrentIndex', 'askQuestion' => 'askQuestion'];


    public string $greetings = "Hi there! I'm here to chat about mental health awareness.
    Would you be interested in taking a short survey to help us understand your perspective better?";

    public $systemPrompt;


    public $currentIndex;
    public $surveyStarted = false;
    public $surveyCompleted = false;
    public $response = "";
    public $responses;
    public $summary = "";

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
        $this->systemPrompt = <<<EOT
    You are a compassionate AI conducting a mental health awareness survey.
    Your responses should be **warm, encouraging, and non-judgmental**.
    Generate a comforting and engaging introduction before asking the question.

    **Now generate a very brief, two liner, empathetic introduction, telling the user that you will ask demographic questions
    followed by some question that will help us understand your mental health awareness. ask politely to proceed**"
    EOT;

        if(!Session::has('survey_messages')){
            $this->messages[] = ['role' => 'system', 'content' => $this->systemPrompt];
            $this->metadata[] = ['role' => 'system', 'content' => $this->systemPrompt, 'type' => null];
            $this->messages[] = ['role' => 'assistant', 'content' => $this->greetings];
            $this->metadata[] = ['role' => 'assistant', 'content' => $this->greetings, 'type' => 'greetings'];
            Session::put('survey_messages', $this->messages);
            Session::put('survey_metadata', $this->metadata);
        } else {
            $this->messages = Session::get('survey_messages', []);
            $this->metadata = Session::get('survey_metadata', []);
        }

        if(!Session::has('survey_index')){
            Session::put('survey_index', 0);
            $this->currentIndex = Session::get('survey_index');
        }

        if(!Session::has('survey_responses')){
            Session::put('survey_responses', []);
            $this->responses = Session::get('survey_responses');
        }

        if(!Session::has('survey_started')){
            Session::put('survey_started', false);
            $this->surveyStarted = Session::get('survey_started');
        }
    }


    public function incrementCurrentIndex(): void
    {
        session()->increment('survey_index');
        $this->askQuestion();

    }

    public function askQuestion($currentLivewireComponentId = null): void
    {
        $this->currentIndex = Session::get('survey_index');

        if($this->surveyStarted){
            if ($this->currentIndex >= count($this->questions) - 1) {
                session()->flash('message', 'Survey completed!');
                $session = SurveySession::query()->where('session_id', session()->getId());
                if($session){
                    $session->update([
                        'completed' => true,
                        'completed_at' => now(),
                    ]);
                }
                session()->flush();
                return;
            }

        } else {
            $this->surveyStarted = true;
        }

        if($currentLivewireComponentId){
            $this->js('hideBotDiv(\'next-bot-response-'. $currentLivewireComponentId . "')");
        }

        $question = $this->questions[$this->currentIndex];
        $this->metadata[] = [
            'role' => 'assistant',
            'content' => $question,
            'type' => 'question'
        ];

        $plainQuestion = $this->convertQuestionToPlainText($question);

        $this->messages[] = [
            'role' => 'assistant',
            'content' => $plainQuestion,
        ];

    }

    function convertQuestionToPlainText($question): string  {

        $questionText = "Question-" . $question['id'] . ": " . $question['question'];

        if ($question['type'] === 'radio') {
            // Add options as a numbered list
            $optionsText = implode("\n", array_map(function ($option, $index) {
                return ($index + 1) . ". " . $option;
            }, $question['options'], array_keys($question['options'])));

            return $questionText . " Please choose one of the following options:\n" . $optionsText;
        } elseif ($question['type'] === 'text') {
            // Return only the question
            return $questionText;
        } else {
            // Handle unknown question types (optional)
            return $questionText . " (Unknown question type)";
        }
    }

    public function send(): void
    {
        $this->validate();

        $this->messages[] = ['role' => 'user', 'content' => $this->body];
        $this->metadata[] = ['role' => 'user', 'content' => $this->body];

        $this->messages[] = ['role' => 'assistant', 'content' => ''];
        $this->metadata[] = ['role' => 'assistant', 'content' => '', 'type'=>'stream'];

        $this->body = '';
    }


    public function render()
    {
        return view('livewire.chat');
    }









}
