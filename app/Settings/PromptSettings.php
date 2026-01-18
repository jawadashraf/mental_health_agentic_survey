<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class PromptSettings extends Settings
{
    public string $intent_classification_prompt;

    public static function group(): string
    {
        return 'prompt';
    }
}
