<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PrestasiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('beranda');
})->name('landing');

Route::get('/login-admin', function () {
    return view('auth.login-admin');
})->middleware('guest')->name('login-admin');

Route::get('/login-pembina', function () {
    return view('auth.login-pembina');
})->middleware('guest')->name('login-pembina');

Route::get('/role-selection', function () {
    return view('role-selection');
})->middleware('guest')->name('role-selection');

// HALAMAN PUBLIK
Route::get('/tentang', function () {
    return view('tentang');
})->name('tentang');

Route::get('/prestasi', [PrestasiController::class, 'indexPublic'])->name('prestasi');

Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak.index');

// KONTAK CONTROLLER
use App\Http\Controllers\KontakController;
Route::post('/kontak', [KontakController::class, 'send'])->name('kontak.send');

// DASHBOARD
use App\Http\Controllers\DashboardController;
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard-siswa', [DashboardController::class, 'siswa'])->middleware(['auth', 'verified'])->name('dashboard-siswa');
Route::get('/dashboard-admin', [DashboardController::class, 'admin'])->middleware(['auth', 'verified'])->name('dashboard-admin');
Route::get('/dashboard-pembina', [DashboardController::class, 'pembina'])->middleware(['auth', 'verified'])->name('dashboard-pembina');

// USERS MANAGEMENT
use App\Http\Controllers\UsersController;
Route::resource('/users', UsersController::class)->middleware(['auth', 'verified']);

// PILIHAN EKSKUL
use App\Http\Controllers\EkskulController;
Route::get('/pilihan-ekskul', [EkskulController::class, 'pilihanEkskul'])->middleware(['auth', 'verified'])->name('pilihan-ekskul');
Route::resource('/ekstrakurikuler', EkskulController::class)->middleware(['auth', 'verified']);


// PENDAFTARAN EKSKUL
use App\Http\Controllers\PendaftaranController;
Route::get('/pendaftaran-ekskul', [PendaftaranController::class, 'index'])->middleware(['auth', 'verified'])->name('pendaftaran-ekskul');
Route::put('/pendaftaran-ekskul/{id}/status', [PendaftaranController::class, 'updateStatus'])->middleware(['auth', 'verified'])->name('pendaftaran.status');
Route::post('/pendaftaran-ekskul', [PendaftaranController::class, 'store'])->middleware(['auth', 'verified'])->name('pendaftaran.store');

// ABSENSI EKSKUL
use App\Http\Controllers\AbsensiController;
Route::get('/absensi-ekskul', [AbsensiController::class, 'index'])->middleware(['auth', 'verified'])->name('absensi-admin');
Route::put('/absensi-ekskul/{id}', [AbsensiController::class, 'update'])->middleware(['auth', 'verified'])->name('absensi.update');
Route::get('/absensi-siswa', [AbsensiController::class, 'siswa'])->middleware(['auth', 'verified'])->name('absensi-siswa');
Route::post('/absensi-siswa', [AbsensiController::class, 'storeSiswa'])->middleware(['auth', 'verified'])->name('absensi-siswa.store');

// ANGGOTA EKSKUL
use App\Http\Controllers\AnggotaController;
Route::get('/anggota-ekskul', [AnggotaController::class, 'indexAdmin'])->middleware(['auth', 'verified'])->name('anggota-admin');
Route::put('/anggota-ekskul/{id}/status', [AnggotaController::class, 'updateStatus'])->middleware(['auth', 'verified'])->name('anggota.status');
Route::delete('/anggota-ekskul/{id}', [AnggotaController::class, 'destroy'])->middleware(['auth', 'verified'])->name('anggota.destroy');

// JADWAL EKSKUL
use App\Http\Controllers\JadwalController;
Route::get('/jadwal-ekskul', [JadwalController::class, 'index'])->middleware(['auth', 'verified'])->name('jadwal-admin');
Route::get('/jadwal-ekskul/create', [JadwalController::class, 'create'])->middleware(['auth', 'verified'])->name('jadwal.create');
Route::post('/jadwal-ekskul', [JadwalController::class, 'store'])->middleware(['auth', 'verified'])->name('jadwal.store');
Route::get('/jadwal-ekskul/{id}/edit', [JadwalController::class, 'edit'])->middleware(['auth', 'verified'])->name('jadwal.edit');
Route::put('/jadwal-ekskul/{id}', [JadwalController::class, 'update'])->middleware(['auth', 'verified'])->name('jadwal.update');
Route::delete('/jadwal-ekskul/{id}', [JadwalController::class, 'destroy'])->middleware(['auth', 'verified'])->name('jadwal.destroy');

Route::get('/prestasi-ekskul', [PrestasiController::class, 'indexAdmin'])
    ->middleware(['auth', 'verified'])
    ->name('prestasi-admin');

Route::post('/prestasi-ekskul/dokumentasi', [PrestasiController::class, 'storeDokumentasi'])
    ->middleware(['auth', 'verified'])
    ->name('dokumentasi.store');

Route::put('/prestasi-ekskul/dokumentasi/{id}', [PrestasiController::class, 'updateDokumentasi'])
    ->middleware(['auth', 'verified'])
    ->name('dokumentasi.update');

Route::delete('/prestasi-ekskul/dokumentasi/{id}', [PrestasiController::class, 'destroyDokumentasi'])
    ->middleware(['auth', 'verified'])
    ->name('dokumentasi.destroy');

Route::get('/prestasi-siswa', [PrestasiController::class, 'indexSiswa'])
    ->middleware(['auth', 'verified'])
    ->name('prestasi-siswa');

Route::get('/prestasi-ekskul/detail', [PrestasiController::class, 'detailAdmin'])
    ->middleware(['auth', 'verified'])
    ->name('prestasi-detail-admin');

Route::post('/prestasi-ekskul/lomba', [PrestasiController::class, 'storeLomba'])
    ->middleware(['auth', 'verified'])
    ->name('lomba.store');

Route::put('/prestasi-ekskul/lomba/{id}', [PrestasiController::class, 'updateLomba'])
    ->middleware(['auth', 'verified'])
    ->name('lomba.update');

Route::delete('/prestasi-ekskul/lomba/{id}', [PrestasiController::class, 'destroyLomba'])
    ->middleware(['auth', 'verified'])
    ->name('lomba.destroy');

// PENGUMUMAN EKSKUL
use App\Http\Controllers\PengumumanController;
Route::get('/pengumuman-ekskul', [PengumumanController::class, 'index'])->middleware(['auth', 'verified'])->name('pengumuman.index');
Route::get('/pengumuman-ekskul/create', [PengumumanController::class, 'create'])->middleware(['auth', 'verified'])->name('pengumuman.create');
Route::post('/pengumuman-ekskul', [PengumumanController::class, 'store'])->middleware(['auth', 'verified'])->name('pengumuman.store');
Route::get('/pengumuman-ekskul/{id}/edit', [PengumumanController::class, 'edit'])->middleware(['auth', 'verified'])->name('pengumuman.edit');
Route::put('/pengumuman-ekskul/{id}', [PengumumanController::class, 'update'])->middleware(['auth', 'verified'])->name('pengumuman.update');
Route::delete('/pengumuman-ekskul/{id}', [PengumumanController::class, 'destroy'])->middleware(['auth', 'verified'])->name('pengumuman.destroy');

// NILAI SISWA
use App\Http\Controllers\NilaiController;
Route::get('/nilai-ekskul', [NilaiController::class, 'index'])->middleware(['auth', 'verified'])->name('nilai.index');
Route::post('/nilai-ekskul/input', [NilaiController::class, 'inputNilai'])->middleware(['auth', 'verified'])->name('nilai.input');
Route::delete('/nilai-ekskul/{id}', [NilaiController::class, 'destroy'])->middleware(['auth', 'verified'])->name('nilai.destroy');

Route::get('/prestasi-detail-siswa', [PrestasiController::class, 'detailSiswa'])
    ->middleware(['auth', 'verified'])
    ->name('prestasi-detail-siswa');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
