<?php

namespace App\Livewire;

use App\Models\Survey;
use App\Settings\ChatSettings;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ChatbotAccess extends Component
{
    #[Validate('required')]
    public string $code = '';

    public bool $showDisclaimerModal = false;

    public function verify(): void
    {
        $this->validate();

        $code = trim($this->code);

        // Check if code matches a specific organisation's survey
        $survey = Survey::query()->where('access_code', $code)->first();

        if ($survey) {
            session([
                'chatbot_access_granted' => true,
                'active_survey_id' => $survey->id,
                'active_survey_slug' => $survey->slug,
            ]);

            $this->redirectIntended(route('raft-chat', ['survey' => $survey->slug]));

            return;
        }

        // Check against global chat settings code
        $expectedCode = (string) app(ChatSettings::class)->access_code;

        if (hash_equals($expectedCode, $code)) {
            session(['chatbot_access_granted' => true]);

            $params = array_filter([
                'mode' => request()->query('mode'),
                'survey' => request()->query('survey'),
            ]);

            $this->redirectIntended(route('raft-chat', $params));

            return;
        }

        $this->addError('code', 'Invalid access code.');
    }

    public function render()
    {
        $settings = app(ChatSettings::class);

        return view('livewire.chatbot-access', [
            'privacyNotice' => $settings->privacy_notice,
            'disclaimerTitle' => $settings->disclaimer_title,
            'disclaimerContent' => $settings->disclaimer_content,
        ]);
    }
}
