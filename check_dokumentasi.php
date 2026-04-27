<?php

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$docs = \App\Models\Dokumentasi::all();
foreach ($docs as $doc) {
    echo "ID: {$doc->id} | Foto: " . ($doc->foto ?? 'NULL') . "\n";
    if ($doc->foto) {
        echo "  FotoUrl: {$doc->fotoUrl}\n";
    }
}
