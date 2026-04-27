<?php
require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Get the data that would be passed to the view
$prestasi = \App\Models\Dokumentasi::with(['ekstrakurikuler'])
    ->orderBy('created_at', 'desc')
    ->get();

echo "=== HTML THAT WOULD BE RENDERED ===\n\n";

foreach ($prestasi as $item) {
    echo "<div class=\"prestasi-card\">\n";
    echo "  <div class=\"prestasi-card-image\">\n";
    
    if ($item->foto) {
        echo "    <img src=\"" . $item->fotoUrl . "\" alt=\"" . ($item->nama_lomba ?? 'Prestasi') . "\" />\n";
    } else {
        echo "    <div class=\"prestasi-card-image-placeholder\">\n";
        echo "      <i class=\"fas fa-image\"></i>\n";
        echo "    </div>\n";
    }
    
    echo "  </div>\n";
    echo "  <div class=\"prestasi-card-content\">\n";
    echo "    <h3>" . ($item->nama_lomba ?? 'Prestasi') . "</h3>\n";
    echo "    <p>" . ($item->keterangan ?? '-') . "</p>\n";
    echo "  </div>\n";
    echo "</div>\n\n";
}
