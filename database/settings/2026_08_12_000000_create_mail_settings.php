<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('mail.mailer', 'smtp');
        $this->migrator->add('mail.host', '127.0.0.1');
        $this->migrator->add('mail.port', 2525);
        $this->migrator->add('mail.username', null);
        $this->migrator->add('mail.password', null);
        $this->migrator->add('mail.encryption', null);
        $this->migrator->add('mail.from_address', 'hello@example.com');
        $this->migrator->add('mail.from_name', 'Scope AI Safeguarding');
        $this->migrator->add('mail.safeguarding_recipient_email', 'jawadashraf78@gmail.com');
        $this->migrator->add('mail.info_recipient_email', 'jawadashraf78@gmail.com');
        $this->migrator->add('mail.enable_background_queue', true);
    }
};
