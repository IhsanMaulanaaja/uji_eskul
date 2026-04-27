<?php

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

// Run the seeder
$kernel->call('db:seed', ['--class' => 'DokumentasiSeeder']);

echo "Seeder DokumentasiSeeder berhasil dijalankan!\n";
