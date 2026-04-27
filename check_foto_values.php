<?php
require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$docs = \Illuminate\Support\Facades\DB::table('dokumentasi')->get();

foreach ($docs as $doc) {
    echo "ID: {$doc->id}\n";
    echo "  foto (raw): " . var_export($doc->foto, true) . "\n";
    echo "  foto is null: " . ($doc->foto === null ? 'YES' : 'NO') . "\n";
    echo "  foto is empty string: " . ($doc->foto === '' ? 'YES' : 'NO') . "\n";
    echo "  foto is falsy: " . (!$doc->foto ? 'YES' : 'NO') . "\n";
    echo "  foto length: " . strlen($doc->foto ?? '') . "\n\n";
}
