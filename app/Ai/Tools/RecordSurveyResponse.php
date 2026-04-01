<?php

namespace App\Ai\Tools;

use App\Models\SurveyResponse;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Laravel\Ai\Contracts\Tool;
use Laravel\Ai\Tools\Request;
use Stringable;

class RecordSurveyResponse implements Tool
{
    /**
     * Get the description of the tool's purpose.
     */
    public function description(): Stringable|string
    {
        return 'Records the user\'s answer to a survey question into the database.';
    }

    /**
     * Execute the tool.
     */
    public function handle(Request $request): Stringable|string
    {
        $id = $request['id'];
        $response = $request['response'];
        $questions = config('survey');
        $questionData = collect($questions)->firstWhere('id', $id);

        SurveyResponse::updateOrCreate(
            [
                'question_id' => $id,
                'session_id' => session()->getId(),
            ],
            [
                'response' => $response,
                'question' => $questionData['question'] ?? 'Unknown',
            ]
        );

        return "Response for question $id recorded successfully.";
    }

    /**
     * Get the tool's schema definition.
     */
    public function schema(JsonSchema $schema): array
    {
        return [
            'id' => $schema->integer()->description('The ID of the question.')->required(),
            'response' => $schema->string()->description('The user\'s provided answer.')->required(),
        ];
    }
}
