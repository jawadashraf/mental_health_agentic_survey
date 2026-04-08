<?php

namespace App\Livewire;

use App\Models\Intent;
use App\Models\SurveyResponse;
use App\Settings\PromptSettings;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Prism\Prism\Enums\Provider;
use Prism\Prism\Facades\Prism;

class RaftChatResponse extends Component
{
    public $questions = [];

    public $responses = [];

    public $currentIndex = 0;

    public $surveyStarted = false;

    public array $prompt;

    public array $message;

    public array $metadata = [];

    public ?string $response = null;

    public $selectedOption;

    public $textResponse = '';

    public string $theme = 'aurora';

    public function mount()
    {
        $mode = session('raft_survey_mode');
        $this->questions = $mode === 'test'
            ? config('raft-survey-test')
            : config('raft-survey');
        $this->currentIndex = Session::get('raft_survey_index', 0);
        $this->surveyStarted = Session::get('raft_survey_started', false);
        $this->responses = Session::get('raft_survey_responses', []);

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
        $this->dispatch('stream-started');
        $intent = $this->detectIntentWithAI($this->prompt['content']);
        $intent = strtolower(trim(str_replace("'", '', $intent)));
        $promptForAssistant = '';
        switch ($intent) {

            case 'progress-question':
                $promptForAssistant = $this->getProgressPrompt($this->currentIndex, count($this->questions));
                break;
            case 'consent':
            case 'repeat':
                $this->response = ' ';
                $this->updateSessionMessage();
                $this->dispatch('stream-finished');
                $this->askQuestion();

                return;
            case 'off-topic':
                $this->js("updateExpression('5')");
                $this->storeIntentForQuestion($intent, $this->prompt['content']);
                $promptForAssistant = $this->getOffTopicPrompt();
                break;
            case 'refused':
                $this->js("updateExpression('3')");
                $this->storeIntentForQuestion($intent, $this->prompt['content']);
                $promptForAssistant = $this->generateEncouragingPrompt();
                break;

            case 'clarify':
                $this->js("updateExpression('2')");
                $this->storeIntentForQuestion($intent, $this->prompt['content']);
                $promptForAssistant = $this->getClarifyPrompt($this->questions[$this->currentIndex]['question']);
                break;

            case 'term-explanation':
                $term = $this->extractTerm($this->prompt['content']);
                $promptForAssistant = $this->getTermExplanationPrompt($term);
                break;

            case 'meta-question':
                $promptForAssistant = $this->getMetaQuestionPrompt();
                break;

            case 'technical-issue':
                $promptForAssistant = $this->getTechnicalIssuePrompt();
                break;

            case 'low-motivation':
                $promptForAssistant = $this->getLowMotivationPrompt();
                break;

            case 'no-motivation':
                $promptForAssistant = $this->getNoMotivationPrompt();
                break;

            default:
                $this->storeIntentForQuestion('default', $this->prompt['content']);
                $promptForAssistant = $this->generateEncouragingPrompt();

        }

        $questionObj = $this->questions[$this->currentIndex] ?? [];
        $aiGuidance = $questionObj['ai_guidance'] ?? null;
        $expectedBehavior = $questionObj['participant_behavior'] ?? null;

        if ($aiGuidance && !in_array($intent, ['progress-question', 'technical-issue'])) {
            $guidancePrompt = "\n\nCRITICAL CONTEXT FOR THIS QUESTION: ";
            if ($expectedBehavior) {
                $guidancePrompt .= "If the user exhibits the behavior/intent '{$expectedBehavior}', you MUST prioritize this guidance: ";
            } else {
                $guidancePrompt .= "You MUST prioritize this guidance: ";
            }
            $guidancePrompt .= "{$aiGuidance}\nEnsure your response natively weaves this guidance into a comforting answer.";
            $promptForAssistant .= $guidancePrompt;
        }

        $messages = Session::get('raft_survey_messages', []);
        $apiMessages = array_filter($messages, fn ($msg) => ! empty($msg['content']));
        $apiMessages = array_map(fn ($msg) => ['role' => $msg['role'], 'content' => $msg['content']], $apiMessages);
        $apiMessages[] = ['role' => 'user', 'content' => $promptForAssistant];

        $stream = app('openai')->chat()->createStreamed([
            'model' => 'gpt-5',
            'messages' => array_values($apiMessages),
            'temperature' => 1.0,
        ]);

        foreach ($stream as $response) {
            $content = Arr::get($response->choices[0]->toArray(), 'delta.content');

            $this->response .= $content;

            $this->stream(
                to: 'stream-'.$this->getId(),
                content: $content,
                replace: false
            );
        }

        $this->updateSessionMessage();
        $this->dispatch('stream-finished');
    }

    public function updateSessionMessage()
    {
        $messages = Session::get('raft_survey_messages', []);
        $metadata = Session::get('raft_survey_metadata', []);

        foreach ($metadata as $index => $meta) {
            if (($meta['type'] ?? '') === 'stream' && empty($messages[$index]['content'])) {
                $messages[$index]['content'] = $this->response;
                break;
            }
        }

        Session::put('raft_survey_messages', $messages);
    }

    public function detectIntentWithAI($userInput): ?string
    {
        if ($this->surveyStarted) {
            $question = $this->questions[$this->currentIndex]['question'];
            $options = $this->questions[$this->currentIndex]['options'] ?? [];
        } else {
            $question = 'Hi there! This conversation is designed to help Raft understand the experiences of families and carers. Would you be interested in taking a short survey?';
            $options = ['Yes', 'No'];
        }

        $stored_intent_classification_prompt = app(PromptSettings::class)->raft_intent_classification_prompt;

        $prompt = str_replace(
            ['{{userInput}}', '{{question}}', '{{options}}'],
            [$userInput, $question, is_array($options) ? implode(', ', $options) : $options],
            $stored_intent_classification_prompt
        );

        $response = Prism::text()
            ->using(Provider::OpenAI, 'gpt-4')
            ->withPrompt($prompt)
            ->generate();

        return strtolower(trim($response->text));
    }

    public function getProgressPrompt($currentIndex, $total): string
    {
        $remaining = $total - $currentIndex;
        if ($remaining == $total) {
            $msg = '**Generate a statement to inform user about the total number of questions, that is:'.$total.' questions.**';
        } elseif ($remaining <= 3) {
            $msg = "Generate an encouraging statement, since the user is at the start of the survey. Like: You're doing great! Just $remaining more questions to go.";
        } else {
            $msg = "Generate an encouraging statement, since the user is going further into the survey. Like: You're on a roll! Just {$remaining} more questions to go.";
        }

        return $msg;
    }

    public function askQuestion(): void
    {
        $this->dispatch('askQuestion', currentLivewireComponentId: $this->getId());
    }

    public function storeIntentForQuestion($intent, $prompt): void
    {
        $question = $this->questions[session()->get('raft_survey_index', 0)];
        $sessionId = session()->getId();

        Intent::create(
            [
                'question_id' => $question['id'],
                'session_id' => $sessionId,
                'question' => $question['question'],
                'intent' => $intent,
                'prompt' => $prompt,
            ]
        );
    }

    public function getOffTopicPrompt(): string
    {
        return '**Generate a comforting and encouraging statement to take survey, like: I\'m here to assist with the survey. Let\'s continue with the questions!**';
    }

    public function generateEncouragingPrompt(): string
    {
        return 'You are a compassionate AI conducting a foster care support survey for Raft charity.
    Your responses should be **two lines, warm, encouraging, and non-judgmental**.

    The user refused to conduct survey

    **Generate a comforting and encouraging statement to take survey.**';
    }

    public function getClarifyPrompt($question): string
    {
        return "You are a compassionate AI conducting a foster care support survey for Raft charity.
        user wants clarification about the question asked.
    Your responses should be **two lines, warm, encouraging, and non-judgmental**.

    The user was asked: \"$question\"

    **Now generate an empathetic and comforting clarification of the question:**";
    }

    public function getTermExplanationPrompt($term): string
    {
        return "You are a compassionate AI conducting a foster care support survey for Raft charity.
The user asked about the meaning of the term: \"$term\" in the question.

Generate a simple, empathetic, two-line explanation of this term in the context of foster care and adoption. End by inviting the user to continue.";
    }

    public function getMetaQuestionPrompt(): string
    {
        return 'You are a trustworthy AI conducting a foster care support survey for Raft charity.

The user asked about the survey\'s purpose, data usage, or background.

Generate a two-line, friendly and reassuring explanation of the survey\'s purpose — helping Raft understand the experiences of families and carers to improve support services — and invite the user to continue.';
    }

    public function getTechnicalIssuePrompt(): string
    {
        return 'You are a helpful AI assistant.

The user reported a technical issue. Generate a short, polite response acknowledging the issue and suggest they refresh or contact support if the issue persists.';
    }

    public function getLowMotivationPrompt(): string
    {
        return 'You are a compassionate AI conducting a foster care support survey for Raft charity.

The user appears unsure or hesitant. Generate a warm, two-line message encouraging them gently to give it a try and continue.';
    }

    public function getNoMotivationPrompt(): string
    {
        return 'You are a compassionate AI conducting a foster care support survey for Raft charity.

The user seems disengaged or uninterested. Generate a gentle, empathetic message that acknowledges their feeling and offers to pause or opt out, while leaving the door open for return.';
    }

    public function render()
    {
        return view('components.chat.raft-chat-response');
    }

    public function handleUserInput(): void
    {
        $question = $this->questions[$this->currentIndex];
        $response = $question['type'] === 'radio' ? $this->selectedOption : $this->textResponse;

        if (! $response) {
            return;
        }

        $this->storeResponse($question['id'], $response, $question['question']);
        $this->saveResponseInSession($this->currentIndex, $response, $question['question'], $question['id']);
        session()->flash('message', 'Response submitted!');

        $this->selectedOption = null;
        $this->textResponse = '';

        if ($this->currentIndex === session()->get('raft_survey_index', 0)) {
            $this->dispatch('incrementCurrentIndex');
        } else {
            $this->dispatch('refreshChat');
        }
    }

    public function storeResponse($questionId, $response, $question): void
    {
        $sessionId = session()->getId();

        SurveyResponse::updateOrCreate(
            [
                'question_id' => $questionId,
                'session_id' => $sessionId,
            ],
            [
                'response' => $response,
                'question' => $question,
            ]
        );
    }

    public function saveResponseInSession($currentIndex, $response, $question, $questionId): void
    {
        $this->responses = Session::get('raft_survey_responses', []);
        $this->responses[$questionId] = [
            'question' => $question,
            'response' => $response,
        ];
        Session::put('raft_survey_responses', $this->responses);
    }

    protected function extractTerm(string $userInput): string
    {
        $defaultTerm = 'this term';

        $patterns = [
            '/what does (.+?) mean/i',
            '/what is (.+?)[\?]?$/i',
            '/define (.+?)[\?]?$/i',
            '/what do you mean by (.+?)[\?]?$/i',
            '/can you explain (.+?)[\?]?$/i',
            '/meaning of (.+?)[\?]?$/i',
        ];

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $userInput, $matches)) {
                $term = trim($matches[1]);
                $term = preg_replace('/\?|\.$/', '', $term);

                return ucfirst($term);
            }
        }

        return $defaultTerm;
    }
}
