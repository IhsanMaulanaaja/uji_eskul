<?php

$source = __DIR__ . '/storage/app/public/dokumentasi';
$destination = __DIR__ . '/public/dokumentasi';

// Create destination folder if not exists
if (!is_dir($destination)) {
    mkdir($destination, 0755, true);
    echo "Created folder: $destination\n";
}

// Copy all files
$files = glob($source . '/*');
foreach ($files as $file) {
    if (is_file($file)) {
        $filename = basename($file);
        $dest_file = $destination . '/' . $filename;
        copy($file, $dest_file);
        echo "Copied: $filename\n";
    }
}

echo "\n✅ Done!\n";
echo "Files in public/dokumentasi:\n";
foreach (glob($destination . '/*') as $f) {
    echo "  - " . basename($f) . "\n";
}
