<?php

use Illuminate\Foundation\Console\ClosureCommand;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    /** @var ClosureCommand $this */
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

/*
 * Drain the queue (flag alert emails, user invites, exports) every minute.
 * The overlap lock expires after 10 minutes so a crashed worker can't block the queue for long.
 */
Schedule::command('queue:work --stop-when-empty --tries=3 --max-time=540')
    ->everyMinute()
    ->withoutOverlapping(10);
