<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class ChatSettings extends Settings
{
    public string $access_code;

    public string $disclaimer_title;

    public string $disclaimer_content;

    public string $privacy_notice;

    public bool $require_disclaimer;

    public static function group(): string
    {
        return 'chat';
    }
}
