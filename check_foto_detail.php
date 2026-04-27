<?php

require __DIR__ . '/vendor/autoload.php';

$app = require __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$dokumentasis = \App\Models\Dokumentasi::all();

echo "=== DOKUMENTASI DATA ===\n";
foreach ($dokumentasis as $dok) {
    echo "ID: {$dok->id}\n";
    echo "Foto: {$dok->foto}\n";
    echo "Nama Lomba: {$dok->nama_lomba ?? $dok->lomba?->nama_lomba}\n";
    echo "Foto URL: {$dok->fotoUrl}\n";
    echo "---\n";
}
