<?php

namespace App\Ai\Tools;

use Illuminate\Contracts\JsonSchema\JsonSchema;
use Laravel\Ai\Contracts\Tool;
use Laravel\Ai\Tools\Request;
use Stringable;

class AskSurveyQuestion implements Tool
{
    /**
     * Get the description of the tool's purpose.
     */
    public function description(): Stringable|string
    {
        return 'Presents a specific survey question to the user and triggers the UI form.';
    }

    /**
     * Execute the tool.
     */
    public function handle(Request $request): Stringable|string
    {
        $index = $request['index'];
        $questions = config('survey');
        $question = $questions[$index - 1] ?? null;

        if (! $question) {
            return "Error: Question index $index out of range.";
        }

        return json_encode([
            'id' => $question['id'],
            'question' => $question['question'],
            'type' => $question['type'],
            'options' => $question['options'] ?? [],
            'instruction' => 'FORM_INDICATOR_FOR_FRONTEND',
        ]);
    }

    /**
     * Get the tool's schema definition.
     */
    public function schema(JsonSchema $schema): array
    {
        return [
            'index' => $schema->integer()->description('The unique index of the question (1-40).')->required(),
        ];
    }
}
