<?php

namespace Tests\Feature;

use App\Livewire\RaftChat;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class RaftChatThemeTest extends TestCase
{
    use RefreshDatabase;

    public function test_raft_chat_defaults_to_bright_theme(): void
    {
        Livewire::withoutLazyLoading()
            ->test(RaftChat::class)
            ->assertSet('theme', 'bright');
    }

    public function test_raft_chat_can_switch_to_valid_theme(): void
    {
        $component = Livewire::withoutLazyLoading()
            ->test(RaftChat::class);

        $component->call('setTheme', 'ocean')
            ->assertSet('theme', 'ocean');

        $this->assertEquals('ocean', session('raft_chat_theme'));
    }

    public function test_raft_chat_rejects_invalid_theme(): void
    {
        $component = Livewire::withoutLazyLoading()
            ->test(RaftChat::class);

        $component->call('setTheme', 'invalid-theme')
            ->assertSet('theme', 'bright');

        $this->assertNull(session('raft_chat_theme'));
    }

    public function test_raft_chat_persists_theme_in_session(): void
    {
        session(['raft_chat_theme' => 'sunset']);

        Livewire::withoutLazyLoading()
            ->test(RaftChat::class)
            ->assertSet('theme', 'sunset');
    }

    public function test_raft_chat_can_switch_between_all_themes(): void
    {
        $component = Livewire::withoutLazyLoading()
            ->test(RaftChat::class);

        $validThemes = ['bright', 'aurora', 'ocean', 'sunset', 'forest', 'midnight', 'skyblue', 'peach', 'alabaster'];

        foreach ($validThemes as $theme) {
            $component->call('setTheme', $theme)
                ->assertSet('theme', $theme);
        }
    }

    public function test_raft_chat_theme_switcher_is_visible(): void
    {
        session(['raft_survey_entered_chat' => true]);

        Livewire::withoutLazyLoading()
            ->test(RaftChat::class)
            ->assertSee('Choose Theme');
    }
}
