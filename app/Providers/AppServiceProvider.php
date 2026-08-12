<?php

namespace App\Providers;

use App\Ai\Storage\CustomConversationStore;
use App\Settings\MailSettings;
use Illuminate\Support\ServiceProvider;
use Laravel\Ai\Contracts\ConversationStore;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton('openai', function () {
            return \OpenAI::client(config('openai.api_key'));
        });

        $this->app->singleton(ConversationStore::class, function ($app) {
            return new CustomConversationStore;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        try {
            /** @var MailSettings $mailSettings */
            $mailSettings = app(MailSettings::class);

            config([
                'mail.default' => $mailSettings->mailer ?: config('mail.default'),
                'mail.mailers.smtp.host' => $mailSettings->host ?: config('mail.mailers.smtp.host'),
                'mail.mailers.smtp.port' => $mailSettings->port ?: config('mail.mailers.smtp.port'),
                'mail.mailers.smtp.username' => $mailSettings->username ?: config('mail.mailers.smtp.username'),
                'mail.mailers.smtp.password' => $mailSettings->password ?: config('mail.mailers.smtp.password'),
                'mail.mailers.smtp.encryption' => ($mailSettings->encryption === 'none' ? null : $mailSettings->encryption) ?: config('mail.mailers.smtp.scheme'),
                'mail.from.address' => $mailSettings->from_address ?: config('mail.from.address'),
                'mail.from.name' => $mailSettings->from_name ?: config('mail.from.name'),
            ]);
        } catch (\Throwable $e) {
            // Settings database table not yet migrated or during console setup
        }
    }
}
