<?php
require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$db = \Illuminate\Support\Facades\DB::getFacadeRoot();

// Check the schema of dokumentasi table
echo "=== DOKUMENTASI TABLE COLUMNS ===\n";
$columns = $db->getSchemaBuilder()->getColumnListing('dokumentasi');
foreach ($columns as $column) {
    echo "- " . $column . "\n";
}

echo "\n=== DOKUMENTASI TABLE DATA ===\n";
$dokumentasi = $db->table('dokumentasi')->get();
foreach ($dokumentasi as $doc) {
    echo "ID: {$doc->id}\n";
    echo json_encode((array)$doc, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . "\n\n";
}
