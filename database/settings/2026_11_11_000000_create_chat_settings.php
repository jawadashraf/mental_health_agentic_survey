<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $disclaimer = <<<'EOT'
Please note: This AI chat service is currently part of a trial and development project and is not yet fully functional. Some features may be incomplete, unavailable, or may not operate as intended. The service may also be subject to changes, interruptions, errors or withdrawal while development and testing continue.

The AI-generated responses are provided for testing, demonstration and general informational purposes only. They should not be relied upon as professional, legal, financial, medical, safeguarding or other specialist advice. Where appropriate, users should seek advice from a suitably qualified professional and independently verify important information before relying on it or taking action.

Although reasonable efforts may be made to improve the accuracy and reliability of the service, no guarantee or warranty is given that the information, responses or functionality provided by the AI are complete, accurate, current, reliable or suitable for any particular purpose. AI systems can occasionally produce inaccurate, incomplete, misleading or inappropriate information.

To the extent permitted by law, the project owner, developers and contributors accept no responsibility or liability for any loss, damage, cost or consequence arising from reliance on information provided by this trial service or from the use, inability to use, interruption or failure of the service. Nothing in this disclaimer is intended to exclude or limit liability where such exclusion or limitation would be unlawful.

Users should not enter confidential, sensitive, personal or commercially sensitive information into the trial service unless they have been specifically informed that appropriate safeguards are in place.

By using this AI trial service, you acknowledge that it is an experimental system under development, that its outputs may contain errors, and that you use the service at your own discretion and risk.

Thank you for your patience and for helping us test, develop and improve the service.
EOT;

        $this->migrator->add('chat.access_code', '123456');
        $this->migrator->add('chat.disclaimer_title', 'AI Trial Project Disclaimer');
        $this->migrator->add('chat.disclaimer_content', trim($disclaimer));
        $this->migrator->add('chat.privacy_notice', 'Please do not enter confidential, sensitive, personal or private information into this chat.');
        $this->migrator->add('chat.require_disclaimer', true);
    }
};
