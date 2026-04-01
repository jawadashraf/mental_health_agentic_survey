<?php

namespace Tests\Feature;

use App\Livewire\RaftChat;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class RaftChatTest extends TestCase
{
    use RefreshDatabase;

    public function test_raft_chat_loads_test_config_with_three_questions(): void
    {
        $questions = config('raft-survey-test');

        $this->assertCount(3, $questions);
        $this->assertEquals('text', $questions[0]['type']);
        $this->assertEquals('radio', $questions[1]['type']);
        $this->assertEquals('text', $questions[2]['type']);
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
        $component = Livewire::withoutLazyLoading()
            ->test(RaftChat::class);

        $component->call('askQuestion');

        $component->assertSet('surveyStarted', true)
            ->assertSee('Progress');
    }

    public function test_raft_chat_marks_survey_completed_after_all_questions(): void
    {
        $component = Livewire::withoutLazyLoading()
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
        $component = Livewire::withoutLazyLoading()
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
}
