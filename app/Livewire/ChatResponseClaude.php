<?php

namespace App\Livewire;

use App\Models\SurveyResponse;
use Illuminate\Support\Str;
use Livewire\Component;
use Prism\Prism\Prism;

class ChatResponseClaude extends Component
{
    public $questions = [
        [
            'id' => 1,
            'type' => 'radio',
            'question' => 'How would you rate your overall mental health awareness?',
            'options' => ['Very High', 'High', 'Moderate', 'Low', 'Very Low'],
        ],
        [
            'id' => 2,
            'type' => 'text',
            'question' => 'What strategies do you use to manage stress in your daily life?',
        ],
        [
            'id' => 3,
            'type' => 'radio',
            'question' => 'How comfortable are you discussing mental health with others?',
            'options' => ['Very Comfortable', 'Comfortable', 'Neutral', 'Uncomfortable', 'Very Uncomfortable'],
        ],
    ];

    public array $prompt;

    public array $messages = [];

    public ?string $response = null;

    public ?array $currentQuestion = null;

    public int $currentIndex = 0;

    public array $responses = [];

    public string $greetings = "Hi there! I'm here to chat about mental health awareness. Would you be interested in taking a short survey to help us understand your perspective better?";

    public bool $surveyStarted = false;

    public string $responseType = 'normal'; // 'normal' or 'stream'

    public function mount()
    {
        $this->js('$wire.displayGreeting()');
    }

    public function displayGreeting()
    {
        $this->messages[] = [
            'sender' => 'bot',
            'content' => $this->greetings,
            'type' => 'normal',
        ];
    }

    public function handleUserInput($input)
    {
        // Add user message to chat
        $this->messages[] = [
            'sender' => 'user',
            'content' => $input,
            'type' => 'normal',
        ];

        if (! $this->surveyStarted) {
            $intent = $this->detectIntentWithAI($input);
            if ($intent === 'consent') {
                $this->startSurvey();
            } else {
                $this->sendNonStreamedResponse($this->generateEncouragingResponse());
            }
        } else {
            // Handle survey responses
            $this->processQuestionResponse($input);
        }
    }

    public function startSurvey()
    {
        $this->surveyStarted = true;
        $this->sendNonStreamedResponse("Thank you for agreeing to take the survey! Let's begin.");
        $this->askCurrentQuestion();
    }

    public function askCurrentQuestion()
    {
        if ($this->currentIndex >= count($this->questions)) {
            $this->sendNonStreamedResponse('Thank you for completing the survey! Your responses will help us understand mental health awareness better.');
            $this->surveyStarted = false;

            return;
        }

        $question = $this->questions[$this->currentIndex];
        $this->currentQuestion = $question;

        // Send the question as a form
        $this->messages[] = [
            'sender' => 'bot',
            'content' => $question,
            'type' => 'question',
        ];
    }

    public function processQuestionResponse($response)
    {
        // Store the response
        $this->storeResponse(
            $this->currentQuestion['id'],
            $response,
            Str::uuid()->toString(), // thread_id
            session()->getId(),
            $this->currentQuestion['question']
        );

        $this->responses[] = [
            'question' => $this->currentQuestion,
            'response' => $response,
        ];

        // Move to next question
        $this->currentIndex++;

        // Provide acknowledgment based on sentiment
        $sentiment = $this->detectSentiment($response);
        $acknowledgment = $this->generateEmpatheticSentimentResponse($sentiment);

        $this->sendStreamedResponse($acknowledgment);

        // After a short delay, ask the next question
        $this->askCurrentQuestion();
    }

    public function sendStreamedResponse($message)
    {
        $this->responseType = 'stream';
        $this->response = '';

        $this->messages[] = [
            'sender' => 'bot',
            'content' => '',
            'type' => 'stream',
        ];

        // Simulate streaming for demo, or use actual streaming with OpenAI
        $words = explode(' ', $message);

        foreach ($words as $word) {
            $this->response .= $word.' ';

            $this->stream(
                to: 'stream-'.$this->getId(),
                content: $word.' ',
                replace: false
            );

            // In a real implementation, this would come from the API stream
            // No need for sleep here as the actual API would control timing
        }
    }

    public function sendNonStreamedResponse($message)
    {
        $this->responseType = 'normal';

        $this->messages[] = [
            'sender' => 'bot',
            'content' => $message,
            'type' => 'normal',
        ];
    }

    public function render()
    {
        return view('livewire.chat-response');
    }

    public function storeResponse($questionId, $response, $threadId, $sessionId, $question): void
    {
        SurveyResponse::create([
            'question_id' => $questionId,
            'response' => $response,
            'thread_id' => $threadId,
            'session_id' => $sessionId,
            'question' => $question,
        ]);
    }

    public function generateEmpatheticSentimentResponse($sentiment)
    {
        if ($sentiment === 'negative') {
            return "I'm really sorry you're feeling this way. Please know that your feelings are valid, and you're not alone. Would you like to talk more about what's been on your mind?";
        } elseif ($sentiment === 'positive') {
            return "That's wonderful to hear! Taking care of your mental health is important, and I'm glad you're finding things that bring you joy.";
        } else {
            return 'I appreciate you sharing. Mental health is a journey, and every step matters.';
        }
    }

    public function detectSentiment($userInput)
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

    public function generateEncouragingResponse()
    {
        $aiAgent = Prism::text()->using('openai', 'gpt-4');

        $prompt = 'You are a compassionate AI conducting a mental health awareness survey.
    Your responses should be **two lines, warm, encouraging, and non-judgmental**.

    The user seems hesitant about taking the survey.

    **Generate a comforting and encouraging statement to take the survey:**';

        return trim($aiAgent->withPrompt($prompt)->generate()->text);
    }

    public function detectIntentWithAI($userInput)
    {
        $aiAgent = Prism::text()->using('openai', 'gpt-4');

        $prompt = "You are an advanced conversational AI conducting a survey.
    Your task is to **classify user responses** into one of the following categories:
    - **'consent'** → if the user is ready to proceed for the survey.
    - **'refused'** → if the user is not ready to proceed for the survey.
    - **'repeat'** → if the user asks you to repeat, reword, or rephrase the last question.
    - **'clarify'** → if the user asks for more explanation, examples, or further details about the question.
    - **'answer'** → if the user is responding to the question.
    - **'off-topic'** → if the user says something unrelated to the survey, like asking personal questions or giving random statements.

    **Examples:**
    - 'Yes I'll take the survey' → consent
    - 'Sure I can do that' → consent
    - 'No thanks' → refused
    - 'I don't want to' → refused
    - 'Can you repeat that?' → repeat
    - 'Say that again' → repeat
    - 'I don't get it, explain' → clarify
    - 'What do you mean by that?' → clarify
    - 'My answer is Yes' → answer
    - 'The website is slow' → answer
    - 'What's your name?' → off-topic
    - 'Tell me a joke' → off-topic

    **User Input:** \"$userInput\"
    **Response:** (only return 'consent', 'refused', 'repeat', 'clarify', 'answer', or 'off-topic')";

        return strtolower(trim($aiAgent->withPrompt($prompt)->generate()->text));
    }
}
