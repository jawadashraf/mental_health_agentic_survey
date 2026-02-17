<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton('openai', function () {
            return \OpenAI::client(config('openai.secret'));
        });

        $this->app->singleton(\Laravel\Ai\Contracts\ConversationStore::class, function ($app) {
            return new \App\Ai\Storage\CustomConversationStore;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
