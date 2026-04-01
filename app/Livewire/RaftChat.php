<?php

namespace App\Livewire;

use App\Models\SurveySession;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Validate;
use Livewire\Component;

class RaftChat extends Component
{
    public $questions = [];

    protected $listeners = ['incrementCurrentIndex' => 'incrementCurrentIndex', 'askQuestion' => 'askQuestion', 'refreshChat' => 'refreshChat'];

    public string $greetings = "Hi there! This conversation is designed to help Raft understand the experiences of families and carers. Your responses are anonymous and will only be used to understand common themes and improve support services.\n\nWould you be interested in taking a short survey?";

    public $systemPrompt;

    public $currentIndex;

    public $surveyStarted = false;

    public $surveyCompleted = false;

    public $response = '';

    public $responses;

    public $summary = '';

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
            ],
            [
                'survey_type' => 'raft',
            ]
        );

        $this->questions = config('raft-survey');
        $this->systemPrompt = <<<'EOT'
    You are a compassionate AI conducting a foster care support survey for Raft, a foster care charity.
    Your responses should be **warm, encouraging, and non-judgmental**.
    Generate a comforting and engaging introduction before asking the question.

    **Now generate a very brief, two liner, empathetic introduction, telling the user that you will ask
    questions about their experiences as a foster or adoptive family to help Raft improve support services.
    Ask politely to proceed.**"
    EOT;

        if (! Session::has('raft_survey_messages')) {
            $this->messages[] = ['role' => 'system', 'content' => $this->systemPrompt];
            $this->metadata[] = ['role' => 'system', 'content' => $this->systemPrompt, 'type' => null];
            $this->messages[] = ['role' => 'assistant', 'content' => $this->greetings];
            $this->metadata[] = ['role' => 'assistant', 'content' => $this->greetings, 'type' => 'greetings'];
            Session::put('raft_survey_messages', $this->messages);
            Session::put('raft_survey_metadata', $this->metadata);
        } else {
            $this->messages = Session::get('raft_survey_messages', []);
            $this->metadata = Session::get('raft_survey_metadata', []);
        }

        if (! Session::has('raft_survey_index')) {
            Session::put('raft_survey_index', 0);
            $this->currentIndex = Session::get('raft_survey_index');
        }

        if (! Session::has('raft_survey_responses')) {
            Session::put('raft_survey_responses', []);
            $this->responses = Session::get('raft_survey_responses');
        }

        if (! Session::has('raft_survey_started')) {
            Session::put('raft_survey_started', false);
        }
        $this->surveyStarted = Session::get('raft_survey_started');
    }

    public function incrementCurrentIndex(): void
    {
        session()->increment('raft_survey_index');
        $this->askQuestion();
    }

    public function askQuestion($currentLivewireComponentId = null): void
    {
        $this->currentIndex = Session::get('raft_survey_index');
        $this->messages = Session::get('raft_survey_messages', []);
        $this->metadata = Session::get('raft_survey_metadata', []);

        if ($this->surveyStarted) {
            if ($this->currentIndex >= count($this->questions) - 1) {
                session()->flash('message', 'Survey completed!');
                $session = SurveySession::query()->where('session_id', session()->getId());
                if ($session) {
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
            Session::put('raft_survey_started', true);
        }

        if ($currentLivewireComponentId) {
            // $this->js('hideBotDiv(\'next-bot-response-'.$currentLivewireComponentId."')");
        }

        $question = $this->questions[$this->currentIndex];
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

        Session::put('raft_survey_messages', $this->messages);
        Session::put('raft_survey_metadata', $this->metadata);
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

        $this->messages = Session::get('raft_survey_messages', []);
        $this->metadata = Session::get('raft_survey_metadata', []);

        $this->messages[] = ['role' => 'user', 'content' => $this->body];
        $this->metadata[] = ['role' => 'user', 'content' => $this->body];

        $this->messages[] = ['role' => 'assistant', 'content' => ''];
        $this->metadata[] = ['role' => 'assistant', 'content' => '', 'type' => 'stream'];

        $this->body = '';

        Session::put('raft_survey_messages', $this->messages);
        Session::put('raft_survey_metadata', $this->metadata);
    }

    public function refreshChat()
    {
        $this->messages = Session::get('raft_survey_messages', []);
        $this->metadata = Session::get('raft_survey_metadata', []);
    }

    public function render()
    {
        return view('components.chat.raft-chat');
    }
}
