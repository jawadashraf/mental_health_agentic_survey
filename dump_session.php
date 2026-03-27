<?php

use Illuminate\Support\Facades\Session;

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$kernel->handle(Illuminate\Http\Request::capture());

$messages = Session::get('survey_messages', []);
$metadata = Session::get('survey_metadata', []);

echo "MESSAGES COUNT: " . count($messages) . "\n";
foreach ($messages as $i => $m) {
    echo "[$i] " . $m['role'] . ": " . substr($m['content'], 0, 50) . (strlen($m['content']) > 50 ? "..." : "") . "\n";
}

echo "\nMETADATA COUNT: " . count($metadata) . "\n";
foreach ($metadata as $i => $m) {
    echo "[$i] " . ($m['type'] ?? 'null') . "\n";
}
