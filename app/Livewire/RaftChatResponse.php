<?php

namespace App\Livewire;

use App\Models\Intent;
use App\Models\SurveyResponse;
use App\Services\RaftRagService;
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

    public ?int $msgIndex = null;

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
        $this->currentIndex = $this->resolveAskingIndex();
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

    protected function resolveAskingIndex(): int
    {
        $index = Session::get('raft_survey_asking_index', Session::get('raft_survey_index', 0));

        return isset($this->questions[$index]) ? $index : 0;
    }

    protected function currentQuestion(): ?array
    {
        return $this->questions[$this->currentIndex] ?? null;
    }

    public function getResponse(): void
    {
        try {
            $this->dispatch('stream-started')->to(RaftChat::class);

            $intent = $this->detectIntentWithAI($this->prompt['content']);
            $intent = strtolower(trim(str_replace("'", '', $intent)));
            $promptForAssistant = '';

            $questionObj = $this->currentQuestion() ?? [];
            $aiGuidance = $questionObj['ai_guidance'] ?? null;
            $expectedBehavior = $questionObj['participant_behavior'] ?? null;

            $ragService = app(RaftRagService::class);
            $relevantChunks = $ragService->searchSimilarChunks($this->prompt['content'], topK: 3, minScore: 0.05);

            if ($relevantChunks->isNotEmpty()) {
                $this->storeIntentForQuestion('rag-knowledge', $this->prompt['content']);
                $contextText = $relevantChunks->map(fn ($c) => "Source: {$c->source_file} ({$c->section_heading})\n{$c->content}")->implode("\n\n---\n\n");

                $ragSystemPrompt = <<<RAG
You are the official Knowledge & Policy Assistant for The Raft.
Answer user questions STRICTLY using ONLY the official context provided below.

CONTEXT FROM THE RAFT DOCUMENTS:
---
{$contextText}
---

STRICT RULES:
1. If the user asks for core values, principles, or lists, present them as a clear bulleted list using the EXACT names from the context:
   - We are living it
   - We’re together
   - We’re safe
   - We’re informed
   - We’re fun
2. Do NOT use outside knowledge, general assumptions, or unlisted terms.
3. Keep the response brief and warm. After answering, politely invite the user to continue with the survey when ready.
RAG;

                $promptForAssistant = $this->prompt['content'];
            } else {
                // If query contains a question mark or starts with a question word, do not force consent
                $isQuestion = preg_match('/\?|what|who|where|when|why|how|can|is|are|does|do/i', strtolower(trim($this->prompt['content'])));

                switch ($intent) {
                    case 'progress-question':
                        $promptForAssistant = $this->getProgressPrompt($this->currentIndex, count($this->questions));
                        break;
                    case 'consent':
                        if ($isQuestion) {
                            $this->storeIntentForQuestion('meta-question', $this->prompt['content']);
                            $promptForAssistant = $this->getMetaQuestionPrompt();
                            break;
                        }

                        $this->response = ' ';
                        $this->updateSessionMessage();
                        $this->askQuestion();

                        return;
                    case 'repeat':
                        $promptForAssistant = $this->getRepeatPrompt();
                        break;
                    case 'off-topic':
                        $this->storeIntentForQuestion($intent, $this->prompt['content']);
                        $promptForAssistant = $this->getOffTopicPrompt();
                        break;
                    case 'refused':
                        $this->storeIntentForQuestion($intent, $this->prompt['content']);
                        $promptForAssistant = $this->generateEncouragingPrompt();
                        break;

                    case 'clarify':
                        $this->storeIntentForQuestion($intent, $this->prompt['content']);
                        $promptForAssistant = $this->getClarifyPrompt($questionObj['question'] ?? 'the current question', $aiGuidance);
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
                        $promptForAssistant = $this->getDefaultPrompt();
                }
            }

            if ($relevantChunks->isEmpty() && $aiGuidance && ! in_array($intent, ['progress-question', 'technical-issue', 'clarify'])) {
                $guidancePrompt = "\n\nCRITICAL CONTEXT FOR THIS QUESTION: ";
                if ($expectedBehavior) {
                    $guidancePrompt .= "If the user exhibits the behavior/intent '{$expectedBehavior}', you MUST prioritize this guidance: ";
                } else {
                    $guidancePrompt .= 'You MUST prioritize this guidance: ';
                }
                $guidancePrompt .= "{$aiGuidance}\nEnsure your response natively weaves this guidance into a comforting answer.";
                $promptForAssistant .= $guidancePrompt;
            }

            $messages = Session::get('raft_survey_messages', []);
            $apiMessages = array_filter($messages, fn ($msg) => ! empty($msg['content']));
            $apiMessages = array_map(fn ($msg) => ['role' => $msg['role'], 'content' => $msg['content']], $apiMessages);

            if ($relevantChunks->isNotEmpty() && isset($ragSystemPrompt)) {
                // Replace system prompt with strict RAG directive
                if (isset($apiMessages[0]) && $apiMessages[0]['role'] === 'system') {
                    $apiMessages[0]['content'] = $ragSystemPrompt;
                } else {
                    array_unshift($apiMessages, ['role' => 'system', 'content' => $ragSystemPrompt]);
                }
            } else {
                $apiMessages[] = ['role' => 'user', 'content' => $promptForAssistant];
            }

            $stream = app('openai')->chat()->createStreamed([
                'model' => 'gpt-4o-mini',
                'messages' => array_values($apiMessages),
                'temperature' => 0.7,
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
        } catch (\Throwable $e) {
            \Log::error('RaftChat error in getResponse: '.$e->getMessage());

            $this->response = "I'm sorry, something went wrong on my end. Please try again — your previous answers are safe.";
            $this->updateSessionMessage();
        } finally {
            $this->dispatch('stream-finished');
        }
    }

    public function updateSessionMessage()
    {
        $messages = Session::get('raft_survey_messages', []);

        if ($this->msgIndex !== null && isset($messages[$this->msgIndex])) {
            $messages[$this->msgIndex]['content'] = $this->response ?? '';
            Session::put('raft_survey_messages', $messages);

            return;
        }

        $metadata = Session::get('raft_survey_metadata', []);

        foreach ($metadata as $index => $meta) {
            if (($meta['type'] ?? '') === 'stream' && empty($messages[$index]['content'])) {
                $messages[$index]['content'] = $this->response ?? '';
                break;
            }
        }

        Session::put('raft_survey_messages', $messages);
    }

    public function detectIntentWithAI($userInput): ?string
    {
        $currentQuestion = $this->currentQuestion();

        if ($this->surveyStarted && $currentQuestion) {
            $question = $currentQuestion['question'];
            $options = $currentQuestion['options'] ?? [];
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
            $msg = "Generate an encouraging statement, since the user is almost at the end of the survey. Like: You're nearly there! Just $remaining more questions to go.";
        } else {
            $msg = "Generate an encouraging statement, since the user is making steady progress through the survey. Like: You're on a roll! Just {$remaining} more questions to go.";
        }

        return $msg;
    }

    public function askQuestion(): void
    {
        $this->dispatch('askQuestion');
    }

    public function storeIntentForQuestion($intent, $prompt): void
    {
        $question = $this->currentQuestion();

        if (! $question) {
            return;
        }

        Intent::create(
            [
                'question_id' => $question['id'],
                'session_id' => session()->getId(),
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

    public function getRepeatPrompt(): string
    {
        if (! $this->surveyStarted) {
            return 'You are a compassionate AI conducting a foster care support survey for Raft charity.

The user asked you to repeat what you said.

**Warmly restate the introduction: this conversation helps Raft understand the experiences of families and carers, responses are anonymous, and ask politely if they would be interested in taking a short survey. Two lines.**';
        }

        $question = $this->currentQuestion();
        $questionText = $question['question'] ?? '';
        $options = $question['options'] ?? [];
        $optionsText = count($options) > 0 ? ' The options are: '.implode(', ', $options).'.' : '';

        return "You are a compassionate AI conducting a foster care support survey for Raft charity.

The user asked you to repeat the current question.

**Warmly restate this survey question once, without adding new information: \"{$questionText}\"{$optionsText} Keep it to two lines.**";
    }

    public function getDefaultPrompt(): string
    {
        $questionText = $this->currentQuestion()['question'] ?? '';

        return "You are a compassionate AI conducting a foster care support survey for Raft charity.
Your responses should be **two lines, warm, encouraging, and non-judgmental**.

The user said something that doesn't directly answer the current question: \"{$questionText}\"

**Gently acknowledge what they said and guide them back to the question above.**";
    }

    public function getClarifyPrompt($question, ?string $aiGuidance = null): string
    {
        if ($aiGuidance) {
            return "You are a compassionate AI conducting a foster care support survey for Raft charity.
The user asked for clarification about: \"$question\"

Follow this guidance: {$aiGuidance}

**Generate a warm, empathetic two-line response acknowledging their question and offering the guidance above. Ask if they'd like to continue or need anything else.**";
        }

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
        if (Session::get('raft_survey_completed', false)) {
            return;
        }

        $question = $this->metadata['content'] ?? null;

        if (! is_array($question) || ! isset($question['id'], $question['type'], $question['question'])) {
            return;
        }

        $response = $question['type'] === 'radio' ? $this->selectedOption : $this->textResponse;

        if (! $response) {
            return;
        }

        $this->storeResponse($question['id'], $response, $question['question']);
        $this->saveResponseInSession($response, $question['question'], $question['id']);
        session()->flash('message', 'Response submitted!');

        $this->selectedOption = null;
        $this->textResponse = '';

        $this->dispatch('stream-finished')->to(RaftChat::class);

        $askingIndex = Session::get('raft_survey_asking_index', Session::get('raft_survey_index', 0));
        $askingQuestion = $this->questions[$askingIndex] ?? null;

        if ($askingQuestion && $askingQuestion['id'] === $question['id']) {
            $this->dispatch('incrementCurrentIndex');
        } else {
            $skipped = Session::get('raft_survey_skipped', []);
            $skipped = array_values(array_filter(
                $skipped,
                fn ($idx) => ($this->questions[$idx]['id'] ?? null) !== $question['id']
            ));
            Session::put('raft_survey_skipped', $skipped);

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

    public function saveResponseInSession($response, $question, $questionId): void
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
