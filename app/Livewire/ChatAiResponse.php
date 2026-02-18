<?php

namespace App\Livewire;

use App\Ai\Agents\SurveyAgent;
use App\Models\Intent;
use App\Models\SurveyResponse;
use App\Settings\PromptSettings;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class ChatAiResponse extends Component
{
    public $questions = [];

    public $responses = [];

    public $currentIndex = 0;

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
        $this->currentIndex = Session::get('survey_ai_index', 0);
        $this->conversationId = Session::get('survey_ai_conversation_id');

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
        $intent = $this->detectIntentWithAI($userInput);
        $intent = str_replace("'", '', $intent);

        $promptForAssistant = '';

        switch ($intent) {
            case 'progress-question':
                $promptForAssistant = $this->getProgressPrompt($this->currentIndex, count($this->questions));
                break;
            case 'consent':
            case 'repeat':
                $this->js("updateExpression('2')");
                $this->askQuestion();

                return;
            case 'off-topic':
                $this->js("updateExpression('5')");
                $this->storeIntentForQuestion($intent, $userInput);
                $promptForAssistant = $this->getOffTopicPrompt();
                break;
            case 'refused':
                $this->js("updateExpression('3')");
                $this->storeIntentForQuestion($intent, $userInput);
                $promptForAssistant = $this->generateEncouragingPrompt();
                break;
            case 'clarify':
                $this->js("updateExpression('2')");
                $this->storeIntentForQuestion($intent, $userInput);
                $promptForAssistant = $this->getClarifyPrompt($this->questions[$this->currentIndex]['question']);
                break;
            case 'term-explanation':
                $term = $this->extractTerm($userInput);
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
            case 'answer':
            default:
                $this->storeIntentForQuestion('default', $userInput);
                $promptForAssistant = $this->generateEncouragingPrompt();
        }

        $agent = new SurveyAgent;

        $participant = (object) ['id' => session()->getId()];

        // Use the native continue() method with the stored conversationId
        $streamResponse = $agent->continue($this->conversationId, as: $participant)
            ->stream($promptForAssistant);

        $this->response = '';
        foreach ($streamResponse as $chunk) {
            if ($chunk instanceof \Laravel\Ai\Streaming\Events\TextDelta) {
                $content = $chunk->delta;
                $this->response .= $content;
                $this->stream(to: 'stream-'.$this->getId(), content: $content, replace: false);
            }
        }

        $this->updateSessionMessage();

        // Notify parent to refresh from session if needed (optional but good practice)
        $this->dispatch('refreshChat');
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
    }

    public function detectIntentWithAI($userInput): ?string
    {
        $question = $this->questions[$this->currentIndex]['question'];
        $options = $this->questions[$this->currentIndex]['options'] ?? [];

        $prompt = str_replace(
            ['{{userInput}}', '{{question}}', '{{options}}'],
            [$userInput, $question, implode(', ', $options)],
            app(PromptSettings::class)->intent_classification_prompt
        );

        $agent = new \App\Ai\Agents\IntentClassificationAgent;

        $response = $agent->prompt($prompt);

        return $response['intent'] ?? 'answer';
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
        $question = $this->questions[session()->get('survey_ai_index', 0)];
        $sessionId = session()->getId();

        Intent::create([
            'question_id' => $question['id'],
            'session_id' => $sessionId,
            'question' => $question['question'],
            'intent' => $intent,
            'prompt' => $prompt,
        ]);
    }

    public function getOffTopicPrompt(): string
    {
        return '**Generate a comforting and encouraging statement to take survey, like: I’m here to assist with the survey. Let’s continue with the questions!**';
    }

    public function generateEncouragingPrompt(): string
    {
        return 'You are a compassionate AI conducting a mental health awareness survey.
    Your responses should be **two lines, warm, encouraging, and non-judgmental**.
    The user seems to need encouragement or has strayed from the survey.
    **Generate a comforting and encouraging statement to continue the survey.**';
    }

    public function getClarifyPrompt($question): string
    {
        return "You are a compassionate AI conducting a mental health awareness survey.
        user wants clarification about the question asked.
    Your responses should be **two lines, warm, encouraging, and non-judgmental**.
    The user was asked: \"$question\"
    **Now generate an empathetic and comforting clarification of the question:**";
    }

    public function getTermExplanationPrompt($term): string
    {
        return "You are a compassionate AI conducting a mental health awareness survey.
The user asked about the meaning of the term: \"$term\" in the question.
Generate a simple, empathetic, two-line explanation of this term in the context of mental health. End by inviting the user to continue.";
    }

    public function getMetaQuestionPrompt(): string
    {
        return 'You are a trustworthy AI conducting a mental health awareness survey.
The user asked about the survey’s purpose, data usage, or background.
Generate a two-line, friendly and reassuring explanation of the survey’s purpose and invite the user to continue.';
    }

    public function getTechnicalIssuePrompt(): string
    {
        return 'You are a helpful AI assistant.
The user reported a technical issue. Generate a short, polite response acknowledging the issue and suggest they refresh or contact support if the issue persists.';
    }

    public function getLowMotivationPrompt(): string
    {
        return 'You are a compassionate AI conducting a mental health awareness survey.
The user appears unsure or hesitant. Generate a warm, two-line message encouraging them gently to give it a try and continue.';
    }

    public function getNoMotivationPrompt(): string
    {
        return 'You are a compassionate AI conducting a mental health awareness survey.
The user seems disengaged or uninterested. Generate a gentle, empathetic message that acknowledges their feeling and offers to pause or opt out, while leaving the door open for return.';
    }

    public function render()
    {
        return view('livewire.chat-ai-response');
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

    public function handleUserInput()
    {
        $question = $this->questions[session()->get('survey_ai_index', 0)];
        $response = $this->questions[$this->currentIndex]['type'] === 'radio' ? $this->selectedOption : $this->textResponse;

        if (! $response) {
            return;
        }

        $this->storeResponse($question['id'], $response, $question['question']);
        $this->saveResponseInSession($this->currentIndex, $response, $question['question'], $question['id']);
        session()->flash('message', 'Response submitted!');

        $this->selectedOption = null;
        $this->textResponse = '';

        $this->dispatch('incrementCurrentIndex');
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
        $this->responses = Session::get('survey_ai_responses', []);
        $this->responses[$questionId] = [
            'question' => $question,
            'response' => $response,
        ];
        Session::put('survey_ai_responses', $this->responses);
    }
}
