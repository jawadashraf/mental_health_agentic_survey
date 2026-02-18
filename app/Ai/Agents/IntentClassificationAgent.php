<?php

namespace App\Ai\Agents;

use App\Settings\PromptSettings;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Laravel\Ai\Contracts\Agent;
use Laravel\Ai\Contracts\HasStructuredOutput;
use Laravel\Ai\Promptable;
use Stringable;

class IntentClassificationAgent implements Agent, HasStructuredOutput
{
    use Promptable;

    /**
     * Get the instructions that the agent should follow.
     */
    public function instructions(): Stringable|string
    {
        return app(PromptSettings::class)->intent_classification_prompt;
    }

    /**
     * Get the agent's structured output schema definition.
     */
    public function schema(JsonSchema $schema): array
    {
        return [
            'intent' => $schema->string()
                ->description('The classified intent of the user response.')
                ->enum([
                    'consent', 'refused', 'repeat', 'clarify', 'answer',
                    'off-topic', 'meta-question', 'technical-issue',
                    'low-motivation', 'no-motivation',
                ])
                ->required(),
        ];
    }
}
