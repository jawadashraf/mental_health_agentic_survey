<?php

namespace App\Livewire;

use App\Models\SurveyResponse;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Request;
use Session;

class Chat extends Component
{
    public $questions = [
        [
            "id" => 1,
            "type" => "radio",
            "question" => "How satisfied are you with our service?",
            "options" => ["Very Satisfied", "Satisfied", "Neutral", "Dissatisfied", "Very Dissatisfied"]
        ],
        [
            "id" => 2,
            "type" => "text",
            "question" => "What improvements would you like to see?"
        ],
        [
            "id" => 3,
            "type" => "radio",
            "question" => "Would you recommend us to others?",
            "options" => ["Yes", "No"]
        ]
    ];

    public string $greetings = "Hi there! I'm here to chat about mental health awareness.
    Would you be interested in taking a short survey to help us understand your perspective better?";

    public $systemPrompt = null;


    public $currentIndex;
    public $surveyStarted = false;
    public $response = "";
    public $responses;
    public $summary = "";

    #[Validate('required|max:1000')]
    public string $body = '';

    public array $messages = [];
    public array $metadata = [];


    public function mount()
    {


        $this->systemPrompt = <<<EOT
    You are a compassionate AI conducting a mental health awareness survey.
    Your responses should be **warm, encouraging, and non-judgmental**.
    Generate a comforting and engaging introduction before asking the question.

    **Now generate a very brief, two liner, empathetic introduction, telling the user that you will ask demographic questions
    followed by some question that will help us understand your mental health awareness. ask politely to proceed**"
    EOT;

        $this->messages[] = ['role' => 'system', 'content' => $this->systemPrompt];
        $this->metadata[] = ['role' => 'system', 'content' => $this->systemPrompt, 'type' => null];
        $this->messages[] = ['role' => 'assistant', 'content' => $this->greetings];
        $this->metadata[] = ['role' => 'assistant', 'content' => $this->greetings, 'type' => 'greetings'];


        // Check if user has an ongoing thread, else create a new one
//        if (!Session::has('openai_thread_id')) {
//            $response = app('openai')->threads()->create([]);
//            Session::put('openai_thread_id', $response['id']);
//        }

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

    public function send()
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
