<?php
require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$prestasi = \App\Models\Dokumentasi::with(['ekstrakurikuler'])->get();

echo "=== CHECKING WHAT WILL BE RENDERED ===\n";
foreach ($prestasi as $item) {
    echo "Item ID: {$item->id}\n";
    echo "  foto field exists: " . ($item->foto ? 'YES' : 'NO') . "\n";
    echo "  foto value: {$item->foto}\n";
    echo "  fotoUrl: {$item->fotoUrl}\n";
    echo "  nama_lomba: {$item->nama_lomba}\n";
    echo "  keterangan: {$item->keterangan}\n\n";
}
