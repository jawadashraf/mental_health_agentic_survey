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

    public $systemPrompt = null;


    public $currentIndex;
    public $response = "";
    public $responses;
    public $summary = "";

    #[Validate('required|max:1000')]
    public string $body = '';

    public array $messages = [];

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


        $this->messages[] = ['role' => 'assistant', 'content' => '<>'];

        // Check if user has an ongoing thread, else create a new one
        if (!Session::has('openai_thread_id')) {
            $response = app('openai')->threads()->create([]);
            Session::put('openai_thread_id', $response['id']);
        }

        $this->currentIndex = Session::get('survey_index', 0);
        $this->responses = Session::get('survey_responses', []);
    }

    public function send()
    {
        $this->validate();

        $this->messages[] = ['role' => 'user', 'content' => $this->body];
        $this->messages[] = ['role' => 'assistant', 'content' => ''];

        $this->body = '';
    }

    public function render()
    {
        return view('livewire.chat');
    }









}
