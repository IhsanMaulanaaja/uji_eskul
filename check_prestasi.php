<?php
require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';

$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);

$kernel->bootstrap();

// Get all dokumentasi with relationships
$dokumentasi = \App\Models\Dokumentasi::with(['lomba', 'ekstrakurikuler'])->get();

echo "Total Dokumentasi Records: " . count($dokumentasi) . "\n\n";

foreach ($dokumentasi as $item) {
    echo "=== Record ID: {$item->id} ===\n";
    echo "Foto: " . ($item->foto ?? 'NULL') . "\n";
    echo "Keterangan: " . ($item->keterangan ?? 'NULL') . "\n";
    echo "Lomba: " . ($item->lomba?->nama_lomba ?? 'NULL') . "\n";
    echo "Ekstrakurikuler: " . ($item->ekstrakurikuler?->nama ?? 'NULL') . "\n";
    echo "FotoUrl: " . $item->fotoUrl . "\n";
    echo "\n";
}
