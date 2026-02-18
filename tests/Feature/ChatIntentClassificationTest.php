<?php

namespace Tests\Feature;

use App\Ai\Agents\IntentClassificationAgent;
use App\Livewire\ChatResponse;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Livewire\Livewire;
use Tests\TestCase;

class ChatIntentClassificationTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Mock survey config
        Config::set('survey', [
            [
                'id' => 1,
                'type' => 'text',
                'question' => 'How are you?',
                'options' => [],
            ],
        ]);

        Session::put('survey_index', 0);

        // Mock PromptSettings
        $this->mock(\App\Settings\PromptSettings::class, function ($mock) {
            $mock->shouldReceive('getAttribute')
                ->with('intent_classification_prompt')
                ->andReturn('Classify this: {{userInput}}');
            // Alternatively, just set the property if it's public
            $mock->intent_classification_prompt = 'Classify this: {{userInput}}';
        });

        // Actually, Spatie settings can be mocked like this:
        app(\App\Settings\PromptSettings::class)->intent_classification_prompt = 'Classify this: {{userInput}}';
    }

    public function test_it_can_detect_intent_using_ai_agent(): void
    {
        IntentClassificationAgent::fake([
            ['intent' => 'consent'],
        ]);

        $component = Livewire::test(ChatResponse::class, [
            'prompt' => ['content' => 'Yes, I want to start'],
            'message' => ['content' => ''],
            'metadata' => ['type' => 'user'],
        ]);

        $intent = $component->instance()->detectIntentWithAI('Yes, I want to start');

        $this->assertEquals('consent', $intent);

        IntentClassificationAgent::assertPrompted(function ($prompt) {
            return str_contains($prompt->prompt, 'Yes, I want to start');
        });
    }

    public function test_it_defaults_to_answer_intent_if_response_is_missing_intent(): void
    {
        IntentClassificationAgent::fake([
            [],
        ]);

        $component = Livewire::test(ChatResponse::class, [
            'prompt' => ['content' => 'My answer is blue'],
            'message' => ['content' => ''],
            'metadata' => ['type' => 'user'],
        ]);

        $intent = $component->instance()->detectIntentWithAI('My answer is blue');

        $this->assertEquals('answer', $intent);
    }
}
