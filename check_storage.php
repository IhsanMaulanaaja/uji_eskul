<?php
require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$docs = \App\Models\Dokumentasi::all();

foreach ($docs as $doc) {
    echo "=== Doc ID: {$doc->id} ===\n";
    echo "Nama Lomba: {$doc->nama_lomba}\n";
    echo "Foto DB: {$doc->foto}\n";
    
    // Check if file exists in storage
    $exists = \Illuminate\Support\Facades\Storage::disk('public')->exists($doc->foto);
    echo "File Exists: " . ($exists ? 'YES' : 'NO') . "\n";
    
    // Get the URL
    $url = \Illuminate\Support\Facades\Storage::disk('public')->url($doc->foto);
    echo "URL: {$url}\n";
    
    // Check full filesystem path
    $path = \Illuminate\Support\Facades\Storage::disk('public')->path($doc->foto);
    echo "Full Path: {$path}\n";
    echo "File exists at path: " . (file_exists($path) ? 'YES' : 'NO') . "\n";
    echo "\n";
}
