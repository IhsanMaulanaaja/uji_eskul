<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$dokumentasi = \App\Models\Dokumentasi::first();

if ($dokumentasi) {
    echo "=== Dokumentasi Debug ===\n";
    echo "ID: " . $dokumentasi->id . "\n";
    echo "Foto (raw): " . ($dokumentasi->foto ?? 'NULL') . "\n";
    echo "FotoUrl (accessor): " . $dokumentasi->fotoUrl . "\n";
    echo "Storage disk exists: " . (\Illuminate\Support\Facades\Storage::disk('public')->exists($dokumentasi->foto) ? 'YES' : 'NO') . "\n";
    echo "All data: " . json_encode($dokumentasi->toArray(), JSON_PRETTY_PRINT) . "\n";
} else {
    echo "No dokumentasi found!\n";
}
?>
