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

    public ?string $surveySlug = null;

    public function mount(): void
    {
        $this->surveySlug = request()->query('survey');
    }

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
                'survey' => $this->surveySlug ?? request()->query('survey'),
            ]);

            $this->redirectIntended(route('raft-chat', $params));

            return;
        }

        $this->addError('code', 'That access code didn\'t match. Please double-check and try again.');
    }

    public function render()
    {
        $settings = app(ChatSettings::class);

        $survey = $this->surveySlug
            ? Survey::query()->with('organization')->where('slug', $this->surveySlug)->first()
            : Survey::query()->with('organization')->where('slug', 'raft')->first();

        return view('livewire.chatbot-access', [
            'privacyNotice' => $settings->privacy_notice,
            'disclaimerTitle' => $settings->disclaimer_title,
            'disclaimerContent' => $settings->disclaimer_content,
            'surveyName' => $survey?->name ?? 'The Raft Survey',
            'organizationName' => $survey?->organization?->name ?? 'The Raft',
            'logoUrl' => $survey?->logoUrl(),
            'brandColor' => $survey?->effectiveBrandColor() ?? Survey::DEFAULT_BRAND_COLOR,
            'welcomeTitle' => $survey?->effectiveWelcomeTitle() ?? 'Welcome to The Raft Survey',
            'welcomeMessage' => $survey?->effectiveWelcomeMessage() ?? Survey::DEFAULT_WELCOME_MESSAGE,
        ]);
    }
}
