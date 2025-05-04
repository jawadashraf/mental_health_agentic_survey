<?php

namespace App\Livewire;

use App\Models\Intent;
use App\Models\SurveyResponse;
use App\Settings\PromptSettings;
use Illuminate\Support\Arr;
use Livewire\Component;
use Prism\Prism\Prism;
use Request;
use Session;
use function Termwind\ask;

class ChatResponse extends Component
{
    public $questions = [];
    public $responses = [];
//    public $questions = [
//        [
//            "id" => 1,
//            "type" => "radio",
//            "question" => "How satisfied are you with our service?",
//            "options" => ["Very Satisfied", "Satisfied", "Neutral", "Dissatisfied", "Very Dissatisfied"]
//        ],
//        [
//            "id" => 2,
//            "type" => "text",
//            "question" => "What improvements would you like to see?"
//        ],
//        [
//            "id" => 3,
//            "type" => "radio",
//            "question" => "Would you recommend us to others?",
//            "options" => ["Yes", "No"]
//        ]
//    ];

    public $currentIndex = 0;
    public $surveyStarted = false;

    public array $prompt;

    public array $messages;
    public $metadata = []; // Metadata for the current message

    public ?string $response = null;

    public $selectedOption = null; // For radio button responses
    public $textResponse = ''; // For text responses

    public function mount()
    {
        $this->questions = config('survey');

        $this->currentIndex = Session::get('survey_index');

        $message = end($this->messages);
        $metadata = end($this->metadata);


        // If the content is already provided, display it
        if (!empty($message['content']) && $metadata['type'] != 'question') {
            $this->response = $message['content'];
//            dd($message['content']);
            return;
        }

        if (!empty($message['content']) && $metadata['type'] == 'question') {
//            dd($message['content']);
            return;
        }


        $this->js('$wire.getResponse()');
    }

    public function getResponse(): void
    {


        $intent = $this->detectIntentWithAI($this->prompt["content"]);

        ds($intent);

        $intent = str_replace("'", "", $intent);
        $promptForAssistant = "";
        switch ($intent) {

            case 'progress-question':
                $promptForAssistant = $this->getProgressPrompt($this->currentIndex, count($this->questions));
                break;
            case 'consent':
            case 'repeat':
                $this->js("updateExpression('2')"); //Happy
                $this->askQuestion();
                return;
            case 'off-topic':
                $this->js("updateExpression('5')"); //Surprised
                $this->storeIntentForQuestion($intent, $this->prompt["content"]);
                $promptForAssistant = $this->getOffTopicPrompt();
                break;
            case 'refused':
                $this->js("updateExpression('3')"); //Sad
                $this->storeIntentForQuestion($intent, $this->prompt["content"]);
                $promptForAssistant = $this->generateEncouragingPrompt();
                break;

            case 'clarify':
                $this->js("updateExpression('2')"); //Happy
                $this->storeIntentForQuestion($intent, $this->prompt["content"]);
                $promptForAssistant = $this->getClarifyPrompt($this->questions[$this->currentIndex]['question']);
                break;

            case 'term-explanation':
                $term = $this->extractTerm($this->prompt["content"]); // you'd write a helper for this
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
//                $this->js("updateExpression('2')"); //Happy
                $this->storeIntentForQuestion('default', $this->prompt["content"]);
                $promptForAssistant = $this->generateEncouragingPrompt();

        }

        $this->messages[] = ['role' => 'user', 'content' => $promptForAssistant];
        $this->messages[] = ['role' => 'assistant', 'content' => ''];

        $stream = app('openai')->chat()->createStreamed([
            'model' => 'gpt-4',
            'messages' => $this->messages,
            'temperature' => 1.0
        ]);


        foreach ($stream as $response) {
            $content = Arr::get($response->choices[0]->toArray(), 'delta.content');

            $this->response .= $content;

            $this->stream(
                to: 'stream-' . $this->getId(),
                content: $content,
                replace: false
            );
        }
    }

    function detectIntentWithAI($userInput): ?string
    {
        $aiAgent = Prism::text()->using('openai', 'gpt-4');
        $question = $this->questions[$this->currentIndex]['question'];
        $options = $this->questions[$this->currentIndex]['options'];

//        $prompt = "You are an advanced conversational AI conducting a survey.
//    Your task is to **classify user responses** into one of the following categories:
//    - **'consent'** → if the user is ready to proceed for the survey.
//    - **'refused'** → if the user is not ready to proceed for the survey.
//    - **'repeat'** → if the user asks you to repeat, reword, or rephrase the last question.
//    - **'clarify'** → if the user asks for more explanation, examples, or further details about the question.
//    - **'answer'** → if the user is responding to the question.
//    - **'off-topic'** → if the user says something unrelated to the survey, like asking personal questions or giving random statements.
//    - **'low-motivation'** → if the user is hesitant, reluctant, or unenthusiastic but hasn’t outright refused.
//    - **'no-motivation'** → if the user appears disengaged, apathetic, or shows no interest or willingness to proceed.
//
//    **Examples:**
//    - 'Can you repeat that?' → repeat
//    - 'Say that again' → repeat
//    - 'I don’t get it, explain' → clarify
//    - 'What do you mean by that?' → clarify
//    - 'My answer is Yes' → answer
//    - 'The website is slow' → answer
//    - 'What’s your name?' → off-topic
//    - 'Tell me a joke' → off-topic
//    - 'Maybe later, I am a bit tired' → low-motivation
//    - 'I do not care about this survey' → no-motivation
//
//    **User Input:** \"$userInput\"
//    **Response:** (only return consent, refused, repeat, clarify, answer, off-topic, no-motivation, low-motivation)";

        $stored_intent_classification_prompt = app(PromptSettings::class)->intent_classification_prompt;

//        $prompt = str_replace(
//            ['{{userInput}}', '{{question}}', '{{options}}'],
//            [$userInput, $question, implode(', ', $options)],
//            $storedPrompt
//        );

        $prompt = str_replace(
            ['{{userInput}}', '{{question}}', '{{options}}'],
            [$userInput, $question, implode(', ', $options)],
            $stored_intent_classification_prompt
        );

        return strtolower(trim($aiAgent->withPrompt($prompt)->generate()->text));
    }

    function getProgressPrompt($currentIndex, $total): string
    {
        $remaining = $total - $currentIndex;
        if ($remaining == $total) {

            $msg = "**Generate a statement to inform user about the total number of questions, that is:" . $total . " questions.**";
        } elseif ($remaining <= 3) {
            $msg = "Generate an encouraging statement, since the user is at the start of the survey. Like: You're doing great! Just $remaining more questions to go.";
        } else {
            $msg = "Generate an encouraging statement, since the user is going further into the survey. Like: You're on a roll! Just {$remaining} more questions to go.";
        }

//        $prompt = $remaining . " questions remaining. **Generate a encouraging statement , like: I’m here to assist with the survey. Let’s continue with the questions!**";

//        return $msg . " Let me know if you'd like a quick pause.";
        return $msg;
    }

    function askQuestion(): void
    {

        $this->dispatch('askQuestion', currentLivewireComponentId: $this->getId());
    }

    public function storeIntentForQuestion($intent, $prompt): void
    {

        $question = $this->questions[session()->get('survey_index', 0)];
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

    function getOffTopicPrompt(): string
    {
        return "**Generate a comforting and encouraging statement to take survey, like: I’m here to assist with the survey. Let’s continue with the questions!**";
    }

    function generateEncouragingPrompt(): string
    {


        return "You are a compassionate AI conducting a mental health awareness survey.
    Your responses should be **two lines, warm, encouraging, and non-judgmental**.

    The user refused to conduct survey

    **Generate a comforting and encouraging statement to take survey.**";

    }

    function getClarifyPrompt($question): string
    {

        return "You are a compassionate AI conducting a mental health awareness survey.
        user wants clarification about the question asked.
    Your responses should be **two lines, warm, encouraging, and non-judgmental**.

    The user was asked: \"$question\"

    **Now generate an empathetic and comforting clarification of the question:**";

    }

    function getTermExplanationPrompt($term): string
    {
        return "You are a compassionate AI conducting a mental health awareness survey.
The user asked about the meaning of the term: \"$term\" in the question.

Generate a simple, empathetic, two-line explanation of this term in the context of mental health. End by inviting the user to continue.";
    }

    function getMetaQuestionPrompt(): string
    {
        return "You are a trustworthy AI conducting a mental health awareness survey.

The user asked about the survey’s purpose, data usage, or background.

Generate a two-line, friendly and reassuring explanation of the survey’s purpose and invite the user to continue.";
    }

    function getTechnicalIssuePrompt(): string
    {
        return "You are a helpful AI assistant.

The user reported a technical issue. Generate a short, polite response acknowledging the issue and suggest they refresh or contact support if the issue persists.";
    }

    function getLowMotivationPrompt(): string
    {
        return "You are a compassionate AI conducting a mental health awareness survey.

The user appears unsure or hesitant. Generate a warm, two-line message encouraging them gently to give it a try and continue.";
    }

    function getNoMotivationPrompt(): string
    {
        return "You are a compassionate AI conducting a mental health awareness survey.

The user seems disengaged or uninterested. Generate a gentle, empathetic message that acknowledges their feeling and offers to pause or opt out, while leaving the door open for return.";
    }

    public function render()
    {
        return view('livewire.chat-response');
    }

    protected function extractTerm(string $userInput): string
    {
        // Predefined fallback if nothing is found
        $defaultTerm = 'this term';

        // Common patterns users use to ask about a term
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
                // Clean up trailing punctuation or filler words
                $term = preg_replace('/\?|\.$/', '', $term);
                return ucfirst($term);
            }
        }

        return $defaultTerm;
    }


    function generateEmpatheticSentimentResponse($sentiment)
    {
        if ($sentiment === 'negative') {
            return "I'm really sorry you're feeling this way. Please know that your feelings are valid, and you're not alone. Would you like to talk more about what’s been on your mind?";
        } elseif ($sentiment === 'positive') {
            return "That’s wonderful to hear! Taking care of your mental health is important, and I’m glad you’re finding things that bring you joy.";
        } else {
            return "I appreciate you sharing. Mental health is a journey, and every step matters.";
        }
    }

    function detectSentiment($userInput)
    {

        $prompt = "Analyze the sentiment of the following user response in a mental health awareness survey.
Response: \"$userInput\"

Classify it into one of these categories:
- 'positive' → if the user seems happy or hopeful
- 'neutral' → if the response is neither very positive nor very negative
- 'negative' → if the response suggests sadness, frustration, stress, or distress

**Response:** (Only return 'positive', 'neutral', or 'negative')";

        $response = app('openai')->chat()->create([
            'model' => 'gpt-4',
            'messages' => [['role' => 'assistant', 'content' => $prompt]],
            'temperature' => 0,
        ]);

        return strtolower(trim($response['choices'][0]['message']['content'] ?? 'neutral'));
    }

    function generateFollowUpQuestion($response, $originalQuestion)
    {
        $aiAgent = Prism::text()->using('openai', 'gpt-4');

        $prompt = "A user answered a mental health awareness survey question.

    **Original Question:** \"$originalQuestion\"
    **User's Response:** \"$response\"

    If the response is **short or vague**, generate a **gentle follow-up question** that encourages them to share more.

    **Example:**
    - Q: 'How have you been feeling lately?'
      A: 'Okay'
      Follow-up: 'That’s understandable. Would you like to share what has been making you feel this way?'

    - Q: 'What helps you manage stress?'
      A: 'Not sure'
      Follow-up: 'That’s completely okay. Have you found anything that makes you feel even a little better, like music or talking to a friend?'

    Generate a follow-up question for this response:";

        return trim($aiAgent->withPrompt($prompt)->generate()->text);
    }

    function generateEmpatheticResponse($question)
    {
        $aiAgent = Prism::text()->using('openai', 'gpt-4');

        $prompt = "You are a compassionate AI conducting a mental health awareness survey.
    Your responses should be **two lines, warm, encouraging, and non-judgmental**.

    The user was asked: \"$question\"

    Generate a comforting and engaging introduction before asking the question.

    **Example:**
    - Question: 'How have you been feeling lately?'
    - Response: 'I appreciate you sharing. Your feelings are important, and this is a safe space. How have you been feeling lately?'

    **Now generate an empathetic introduction for this question:**";

        return trim($aiAgent->withPrompt($prompt)->generate()->text);
    }

    function generateEncouragingResponse()
    {
        $aiAgent = Prism::text()->using('openai', 'gpt-4');

        $prompt = "You are a compassionate AI conducting a mental health awareness survey.
    Your responses should be **two lines, warm, encouraging, and non-judgmental**.

    The user refused to conduct survey

    **Generate a comforting and encouraging statement to take survey.**";

        return trim($aiAgent->withPrompt($prompt)->generate()->text);
    }

    public function handleUserInput(Request $request)
    {

        $question = $this->questions[session()->get('survey_index', 0)];
        $response = $this->questions[$this->currentIndex]['type'] === 'radio' ? $this->selectedOption : $this->textResponse;

        if (!$response) {
            return; // Prevent empty submissions
        }


        $this->storeResponse($question['id'], $response, $question['question']);
        $this->saveResponseInSession($this->currentIndex, $response, $question['question'], $question['id']);
        // Save response logic (e.g., store in DB)
        session()->flash('message', 'Response submitted!');

        // Clear input after submission

//        $response = $request->input('response');
//        $sentiment = $this->detectSentiment($response);

        $this->selectedOption = null;
        $this->textResponse = '';

        $this->dispatch('incrementCurrentIndex');
    }

    function storeResponse($questionId, $response, $question): void
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

//        $this->dispatchBrowserEvent('update-expression', ['value' => 3]);


    }

    public function saveResponseInSession($currentIndex, $response, $question, $questionId): void
    {
//        if (empty($response)) {
//            return;
//        }

        $this->responses = Session::get('survey_responses', []);
        // Store response in session
        $this->responses[$questionId] = [
            'question' => $question,
            'response' => $response
        ];
        Session::put('survey_responses', $this->responses);


//        session()->push('survey_responses', ['question' => $this->questions[session()->get('survey_index', 0)], 'response' => $response]);
//        session()->push('survey_responses', ['question' => $question, 'response' => $response]);

        // Clear input field
//        $this->response = "";
    }
}
