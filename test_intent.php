<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$component = app(\App\Livewire\ChatResponse::class);
$component->surveyStarted = false;
$component->questions = config('survey');
try {
    $intent = $component->detectIntentWithAI('Yes, I am ready');
    echo "INTENT: " . $intent . "\n";
} catch (\Exception $e) {
    echo "EXCEPTION: " . $e->getMessage() . "\n";
}
