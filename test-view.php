<?php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';

$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$html = view('components.chat.raft-chat')->render();
if (strpos($html, 'wire:loading.attr') !== false) {
    echo "FAILED: wire:loading.attr found in the rendered view!\n";
    $lines = explode("\n", $html);
    foreach($lines as $i => $line) {
        if(strpos($line, 'wire:loading.attr') !== false) {
            echo "Line " . ($i+1) . ": " . trim($line) . "\n";
        }
    }
} else {
    echo "SUCCESS: wire:loading.attr is NOT in the rendered view.\n";
}
