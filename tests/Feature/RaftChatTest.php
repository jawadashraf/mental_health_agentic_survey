<?php

namespace Tests\Feature;

use App\Livewire\RaftChat;
use App\Livewire\RaftChatResponse;
use App\Models\DocumentChunk;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Laravel\Ai\Embeddings;
use Livewire\Livewire;
use Prism\Prism\Facades\Prism;
use Tests\TestCase;

class RaftChatTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Artisan::call('migrate', ['--database' => 'sqlite_vector']);
        Prism::fake();
    }

    public function test_raft_chat_loads_test_config_with_three_questions(): void
    {
        $questions = config('raft-survey-test');

        $this->assertCount(3, $questions);
        $this->assertEquals('text', $questions[0]['type']);
        $this->assertEquals('text', $questions[1]['type']);
        $this->assertEquals('text', $questions[2]['type']);
        $this->assertEquals('Children', $questions[0]['section_title']);
        $this->assertEquals('Parents & Carers', $questions[1]['section_title']);
        $this->assertEquals('Training & Development', $questions[2]['section_title']);
    }

    public function test_raft_chat_mounts_with_initial_state(): void
    {
        Livewire::withoutLazyLoading()
            ->test(RaftChat::class)
            ->assertSet('surveyStarted', false)
            ->assertSet('surveyCompleted', false)
            ->assertSee('Raft AI Assistant');
    }

    public function test_raft_chat_shows_progress_bar_when_survey_started(): void
    {
        $component = Livewire::withQueryParams(['mode' => 'test'])
            ->withoutLazyLoading()
            ->test(RaftChat::class);

        $component->call('askQuestion');

        $component->assertSet('surveyStarted', true)
            ->assertSee('Progress');
    }

    public function test_raft_chat_marks_survey_completed_after_all_questions(): void
    {
        $component = Livewire::withQueryParams(['mode' => 'test'])
            ->withoutLazyLoading()
            ->test(RaftChat::class);

        $questions = config('raft-survey-test');

        // Start the survey
        $component->call('askQuestion');

        // Advance through all questions
        foreach ($questions as $index => $question) {
            session()->increment('raft_survey_index');

            if ($index < count($questions) - 1) {
                $component->call('askQuestion');
            }
        }

        // This should trigger completion
        $component->call('askQuestion');

        $component->assertSet('surveyCompleted', true);
    }

    public function test_raft_chat_hides_input_form_when_completed(): void
    {
        $component = Livewire::withQueryParams(['mode' => 'test'])
            ->withoutLazyLoading()
            ->test(RaftChat::class);

        $questions = config('raft-survey-test');

        $component->call('askQuestion');

        foreach ($questions as $index => $question) {
            session()->increment('raft_survey_index');
            if ($index < count($questions) - 1) {
                $component->call('askQuestion');
            }
        }

        $component->call('askQuestion');

        $component->assertSee('Survey complete')
            ->assertDontSee('Type your message...');
    }

    public function test_session_lifetime_is_at_least_one_hour(): void
    {
        $lifetime = (int) config('session.lifetime');

        $this->assertGreaterThanOrEqual(60, $lifetime, 'Session lifetime should be at least 60 minutes.');
    }

    public function test_skipped_question_can_be_answered_in_skip_phase(): void
    {
        $chat = Livewire::withQueryParams(['mode' => 'test'])
            ->withoutLazyLoading()
            ->test(RaftChat::class);

        $questions = config('raft-survey-test');

        $chat->call('askQuestion');
        $this->assertSame(0, session('raft_survey_asking_index'));

        $chat->call('skipQuestion');
        $this->assertSame(1, session('raft_survey_asking_index'));

        $this->answerViaChild($questions[1], 'Yes')->assertDispatched('incrementCurrentIndex');
        $chat->call('incrementCurrentIndex');

        $this->answerViaChild($questions[2], 'A mentoring service')->assertDispatched('incrementCurrentIndex');
        $chat->call('incrementCurrentIndex');

        $this->assertSame(0, session('raft_survey_asking_index'));
        $this->assertTrue($chat->get('inSkipPhase'));

        $this->answerViaChild($questions[0], 'Family support')->assertDispatched('incrementCurrentIndex');
        $chat->call('incrementCurrentIndex');

        $chat->assertSet('surveyCompleted', true);

        $this->assertDatabaseHas('survey_responses', ['question_id' => 1, 'response' => 'Family support']);
        $this->assertDatabaseHas('survey_responses', ['question_id' => 2, 'response' => 'Yes']);
        $this->assertDatabaseHas('survey_responses', ['question_id' => 3, 'response' => 'A mentoring service']);
    }

    public function test_skipping_a_recycled_question_twice_drops_it(): void
    {
        $chat = Livewire::withQueryParams(['mode' => 'test'])
            ->withoutLazyLoading()
            ->test(RaftChat::class);

        $chat->call('askQuestion');

        $chat->call('skipQuestion');
        $chat->call('skipQuestion');
        $chat->call('skipQuestion');
        $this->assertSame([0, 1, 2], session('raft_survey_skipped'));

        $chat->call('skipQuestion');
        $chat->call('skipQuestion');
        $chat->call('skipQuestion');
        $this->assertSame([0, 1, 2], session('raft_survey_skipped'));
        $chat->assertSet('surveyCompleted', false);

        $chat->call('skipQuestion');
        $chat->call('skipQuestion');
        $this->assertSame([2], session('raft_survey_skipped'));

        $chat->call('skipQuestion');
        $this->assertSame([], session('raft_survey_skipped'));
        $chat->assertSet('surveyCompleted', true);
    }

    public function test_finish_survey_completes_with_unanswered_questions(): void
    {
        $chat = Livewire::withQueryParams(['mode' => 'test'])
            ->withoutLazyLoading()
            ->test(RaftChat::class);

        $chat->call('askQuestion');
        $chat->call('skipQuestion');

        $chat->call('finishSurvey');

        $this->assertSame([], session('raft_survey_skipped'));
        $chat->assertSet('surveyCompleted', true)
            ->assertSee('Survey complete');
    }

    public function test_completion_is_idempotent(): void
    {
        $chat = Livewire::withQueryParams(['mode' => 'test'])
            ->withoutLazyLoading()
            ->test(RaftChat::class);

        $chat->call('askQuestion');
        $chat->call('finishSurvey');

        $chat->call('askQuestion');
        $chat->call('incrementCurrentIndex');
        $chat->call('skipQuestion');

        $conclusions = array_filter(
            session('raft_survey_metadata'),
            fn ($meta) => ($meta['type'] ?? '') === 'conclusion'
        );

        $this->assertCount(1, $conclusions);
    }

    public function test_out_of_order_answer_is_stored_against_its_own_question(): void
    {
        $chat = Livewire::withQueryParams(['mode' => 'test'])
            ->withoutLazyLoading()
            ->test(RaftChat::class);

        $questions = config('raft-survey-test');

        $chat->call('askQuestion');

        $this->answerViaChild($questions[2], 'Early answer')->assertDispatched('refreshChat');

        $this->assertSame(0, session('raft_survey_index'));
        $this->assertSame(0, session('raft_survey_asking_index'));
        $this->assertDatabaseHas('survey_responses', ['question_id' => 3, 'response' => 'Early answer']);

        $responses = session('raft_survey_responses');
        $this->assertArrayHasKey(3, $responses);
        $this->assertArrayNotHasKey(1, $responses);
    }

    public function test_transition_message_not_shown_when_previous_question_skipped(): void
    {
        $chat = Livewire::withQueryParams(['mode' => 'test'])
            ->withoutLazyLoading()
            ->test(RaftChat::class);

        $chat->call('askQuestion');
        $chat->call('skipQuestion');
        $chat->call('skipQuestion');

        $transitions = array_filter(
            session('raft_survey_metadata'),
            fn ($meta) => ($meta['type'] ?? '') === 'transition'
        );

        $this->assertCount(0, $transitions);
    }

    public function test_transition_message_shown_when_previous_question_answered(): void
    {
        $chat = Livewire::withQueryParams(['mode' => 'test'])
            ->withoutLazyLoading()
            ->test(RaftChat::class);

        $questions = config('raft-survey-test');

        $chat->call('askQuestion');

        $this->answerViaChild($questions[0], 'Family');
        $chat->call('incrementCurrentIndex');

        $this->answerViaChild($questions[1], 'Yes');
        $chat->call('incrementCurrentIndex');

        $transitions = array_filter(
            session('raft_survey_metadata'),
            fn ($meta) => ($meta['type'] ?? '') === 'transition'
        );

        $this->assertCount(1, $transitions);
    }

    public function test_radio_inputs_are_grouped_per_question(): void
    {
        Livewire::withQueryParams(['mode' => 'test'])
            ->withoutLazyLoading()
            ->test(RaftChat::class);

        $radioQuestion = [
            'id' => 99,
            'type' => 'radio',
            'question' => 'Sample Radio Question',
            'options' => ['Option A', 'Option B'],
        ];

        Livewire::test(RaftChatResponse::class, [
            'message' => ['role' => 'assistant', 'content' => 'plain text'],
            'metadata' => ['role' => 'assistant', 'content' => $radioQuestion, 'type' => 'question'],
            'prompt' => [],
        ])->assertSee('name="options-99"', false);
    }

    public function test_send_appends_message_even_when_client_has_already_set_processing_flag(): void
    {
        $chat = Livewire::withQueryParams(['mode' => 'test'])
            ->withoutLazyLoading()
            ->test(RaftChat::class);

        // The two-way @entangle races the optimistic client-side "isProcessing = true"
        // into the same Livewire request as the send() call. send() must not be blocked.
        $chat->set('body', 'sure');
        $chat->set('isProcessing', true);
        $chat->call('send');

        $messages = session('raft_survey_messages');
        $this->assertCount(4, $messages);
        $this->assertSame('user', $messages[2]['role']);
        $this->assertSame('sure', $messages[2]['content']);
        $this->assertSame('assistant', $messages[3]['role']);
        $this->assertSame('', $messages[3]['content']);
        $chat->assertSet('body', '');
    }

    public function test_send_appends_message_and_clears_body_on_normal_submit(): void
    {
        $chat = Livewire::withQueryParams(['mode' => 'test'])
            ->withoutLazyLoading()
            ->test(RaftChat::class);

        $chat->set('body', 'Hello');
        $chat->call('send');

        $messages = session('raft_survey_messages');
        $this->assertSame('Hello', $messages[2]['content']);
        $this->assertSame('', $messages[3]['content']);
        $chat->assertSet('body', '');
    }

    public function test_switching_mode_resets_survey_state(): void
    {
        $chat = Livewire::withQueryParams(['mode' => 'test'])
            ->withoutLazyLoading()
            ->test(RaftChat::class);

        $chat->call('askQuestion');
        $this->assertTrue(session('raft_survey_started'));

        Livewire::withQueryParams(['mode' => 'live'])
            ->withoutLazyLoading()
            ->test(RaftChat::class);

        $this->assertFalse(session('raft_survey_started'));
        $this->assertSame([], session('raft_survey_responses'));
    }

    public function test_consent_response_triggers_ask_question_dispatch(): void
    {
        session(['raft_survey_started' => true]);

        Livewire::test(RaftChatResponse::class, [
            'message' => ['role' => 'assistant', 'content' => ''],
            'metadata' => ['role' => 'assistant', 'content' => '', 'type' => 'stream'],
            'prompt' => ['role' => 'user', 'content' => 'next question'],
        ])
            ->call('getResponse')
            ->assertDispatched('askQuestion');
    }

    public function test_rag_question_answers_without_auto_resuming_survey_question(): void
    {
        session(['raft_survey_started' => true]);

        Embeddings::fake();
        DocumentChunk::create([
            'source_file' => 'values.md',
            'section_heading' => 'Core Values',
            'content' => 'We are living it, We are together',
            'embedding' => array_fill(0, 1536, 0.05),
        ]);

        $fakeStream = [
            (object) [
                'choices' => [
                    (object) [
                        'delta' => (object) ['content' => 'The Raft core values are...'],
                        'toArray' => fn () => ['delta' => ['content' => 'The Raft core values are...']],
                    ],
                ],
            ],
        ];

        $mockChat = \Mockery::mock();
        $mockChat->shouldReceive('createStreamed')->andReturn($fakeStream);
        $mockOpenAi = \Mockery::mock();
        $mockOpenAi->shouldReceive('chat')->andReturn($mockChat);
        $this->app->instance('openai', $mockOpenAi);

        Livewire::test(RaftChatResponse::class, [
            'message' => ['role' => 'assistant', 'content' => ''],
            'metadata' => ['role' => 'assistant', 'content' => '', 'type' => 'stream'],
            'prompt' => ['role' => 'user', 'content' => 'What are the core values?'],
        ])
            ->call('getResponse')
            ->assertNotDispatched('askQuestion');
    }

    protected function answerViaChild(array $question, string $response)
    {
        $child = Livewire::test(RaftChatResponse::class, [
            'message' => ['role' => 'assistant', 'content' => 'plain text'],
            'metadata' => ['role' => 'assistant', 'content' => $question, 'type' => 'question'],
            'prompt' => [],
        ]);

        if ($question['type'] === 'radio') {
            $child->set('selectedOption', $response);
        } else {
            $child->set('textResponse', $response);
        }

        return $child->call('handleUserInput');
    }
}
