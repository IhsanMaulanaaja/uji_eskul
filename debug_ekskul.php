<?php
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/bootstrap/app.php';

use App\Models\User;
use Illuminate\Support\Facades\DB;

$user = User::where('name', 'Muhammad Alfathdry')->first();

if (!$user) {
    echo "User tidak ditemukan\n";
    exit;
}

echo "User ID: " . $user->id . "\n";
echo "User: " . $user->name . "\n\n";

// Query anggota_ekskul dengan status 'aktif'
$aktif = DB::table('anggota_ekskul')
    ->join('ekstrakurikuler', 'anggota_ekskul.ekskul_id', '=', 'ekstrakurikuler.id')
    ->where('anggota_ekskul.user_id', $user->id)
    ->where('anggota_ekskul.status', 'aktif')
    ->select('ekstrakurikuler.*', 'anggota_ekskul.status')
    ->get();

echo "Status AKTIF (" . count($aktif) . " items):\n";
foreach ($aktif as $e) {
    echo "  - " . $e->nama . " (ID: " . $e->id . ")\n";
}

echo "\n";

// Query semua anggota_ekskul
$semua = DB::table('anggota_ekskul')
    ->join('ekstrakurikuler', 'anggota_ekskul.ekskul_id', '=', 'ekstrakurikuler.id')
    ->where('anggota_ekskul.user_id', $user->id)
    ->select('ekstrakurikuler.*', 'anggota_ekskul.status')
    ->get();

echo "Status SEMUA (" . count($semua) . " items):\n";
foreach ($semua as $e) {
    echo "  - " . $e->nama . " (status: " . $e->status . ")\n";
}

echo "\n";

// Check ekstrakurikuler yang ada
$totalEkskul = DB::table('ekstrakurikuler')->count();
echo "Total ekstrakurikuler di sistem: " . $totalEkskul . "\n";
