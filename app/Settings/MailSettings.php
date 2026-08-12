<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class MailSettings extends Settings
{
    public string $mailer;

    public ?string $host;

    public ?int $port;

    public ?string $username;

    public ?string $password;

    public ?string $encryption;

    public string $from_address;

    public string $from_name;

    public string $safeguarding_recipient_email;

    public string $info_recipient_email;

    public bool $enable_background_queue;

    public static function group(): string
    {
        return 'mail';
    }
}
