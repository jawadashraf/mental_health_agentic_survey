<?php

namespace App\Livewire;

use App\Models\SurveyResponse;
use Illuminate\Support\Arr;
use Livewire\Component;
use Prism\Prism\Prism;
use Request;
use Session;
use function Termwind\ask;

class ChatResponse extends Component
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

    public array $prompt;

    public array $messages;

    public ?string $response = null;
    public function mount()
    {

        $this->js('$wire.getResponse()');
    }

    public function getResponse(): void
    {
        $this->askQuestion($this->questions[0]);
        return;

        $intent = $this->detectIntentWithAI($this->prompt["content"]);

        $promptForAssistant = "";
        switch($intent) {
//            case 'consent': $this->askQuestion($this->questions[0]); break;
//            case 'refused': $this->generateEncouragingResponse(); break;
            case 'consent': $promptForAssistant = "Cheer the user for consent"; break;
            case 'refused': $promptForAssistant = "Encourage the user to take survey"; break;
        }

        $this->messages[] = ['role' => 'user', 'content' => $promptForAssistant];

        $stream = app('openai')->chat()->createStreamed([
            'model' => 'gpt-4',
            'messages' => $this->messages,
            'temperature' => 0.5
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

    public function displayGreeting(): void
    {
        $this->messages[] = [
            'role' => 'assistant',
            'content' => $this->greetings,
            'type' => 'normal'
        ];

    }

    public function render()
    {
        return view('livewire.chat-response');
    }

    function storeResponse($questionId, $response, $threadId, $sessionId, $question) : void
    {
        SurveyResponse::create([
            'question_id' => $questionId,
            'response' => $response,
            'thread_id' => $threadId,
            'session_id' => $sessionId,
            'question' => $question
        ]);
    }

    function askQuestion($question): void
    {
        $this->messages[] = [
            'role' => 'assistant',
            'content' => $question,
            'type' => 'question'
        ];
    }

//    function askQuestion($question) {
//        $aiAgent = Prism::text()->using('openai', 'gpt-4');
//
//        if ($question['type'] === 'radio') {
//            $options = implode(", ", $question['options']);
//            $prompt = "{$question['question']} (Options: $options)";
//        } else {
//            $prompt = $question['question'];
//        }
//
//        return $aiAgent->withPrompt($prompt)->generate()->text;
//    }

    public function submitResponse()
    {
        if (empty($this->response)) {
            return;
        }

        // Store response in session
        $this->responses[] = [
            'question' => $this->questions[$this->currentIndex],
            'response' => $this->response
        ];
        Session::put('survey_responses', $this->responses);

        // Move to the next question or generate a summary
        if ($this->currentIndex < count($this->questions) - 1) {
            $this->currentIndex++;
            Session::put('survey_index', $this->currentIndex);
        } else {
//            $this->generateSummary();
            Session::forget('survey_index'); // Clear session after survey completion
        }

        // Clear input field
        $this->response = "";
    }

//    public function exitSurveyStatement()
//    {
//        $ai = Prism::text()->using('openai', 'gpt-4');
//        $this->summary = $ai->withPrompt("Summarize these responses empathetically: " . json_encode($this->responses))->generate()->text;
//    }

    function generateEmpatheticSentimentResponse($sentiment) {
        if ($sentiment === 'negative') {
            return "I'm really sorry you're feeling this way. Please know that your feelings are valid, and you're not alone. Would you like to talk more about what’s been on your mind?";
        } elseif ($sentiment === 'positive') {
            return "That’s wonderful to hear! Taking care of your mental health is important, and I’m glad you’re finding things that bring you joy.";
        } else {
            return "I appreciate you sharing. Mental health is a journey, and every step matters.";
        }
    }

    function detectSentiment($userInput) {

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

    function generateFollowUpQuestion($response, $originalQuestion) {
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


    function generateEmpatheticResponse($question) {
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

    function generateEncouragingResponse() {
        $aiAgent = Prism::text()->using('openai', 'gpt-4');

        $prompt = "You are a compassionate AI conducting a mental health awareness survey.
    Your responses should be **two lines, warm, encouraging, and non-judgmental**.

    The user refused to conduct survey

    **Generate a comforting and encouraging statement to take survey.**";

        return trim($aiAgent->withPrompt($prompt)->generate()->text);
    }


    function handleOffTopicResponse() {
        return "I’m here to assist with the survey. Let’s continue with the questions!";
    }


    function detectIntentWithAI($userInput) {
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
    - 'Can you repeat that?' → repeat
    - 'Say that again' → repeat
    - 'I don’t get it, explain' → clarify
    - 'What do you mean by that?' → clarify
    - 'My answer is Yes' → answer
    - 'The website is slow' → answer
    - 'What’s your name?' → off-topic
    - 'Tell me a joke' → off-topic

    **User Input:** \"$userInput\"
    **Response:** (only return 'consent', 'refused', 'repeat', 'clarify', 'answer', or 'off-topic')";

        return strtolower(trim($aiAgent->withPrompt($prompt)->generate()->text));
    }

    public function handleResponse(Request $request) {
        $response = $request->input('response');
        $sentiment = $this->detectSentiment($response);

        $request->session()->push('survey_responses', ['question' => $this->questions[$request->session()->get('survey_index', 0)], 'response' => $response]);

        $request->session()->increment('survey_index');

        return redirect()->route('survey');
    }
}
