<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Ekstrakurikuler;
use App\Models\Pendaftaran;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user?->role === 'admin') {
            return redirect()->route('dashboard-admin');
        }
        if ($user?->role === 'pembina') {
            return redirect()->route('dashboard-pembina');
        }
        
        return redirect()->route('dashboard-siswa');
    }

    public function siswa()
    {
        $user = auth()->user();

        // 1. Ambil Ekskul Saya (yang sudah join dan status aktif) + Gabungkan jadwalnya untuk tampilan tabel
        $connection = DB::getDriverName();
        $jadwalRaw = '';

        if ($connection === 'sqlite') {
            $jadwalRaw = "GROUP_CONCAT(jadwal_ekskul.hari || ' ' || strftime('%H:%M', jadwal_ekskul.jam_mulai), ', ') as jadwal_lengkap";
        } else {
            $jadwalRaw = "GROUP_CONCAT(CONCAT(jadwal_ekskul.hari, ' ', TIME_FORMAT(jadwal_ekskul.jam_mulai, '%H:%i')) SEPARATOR ', ') as jadwal_lengkap";
        }

        $ekskulSiswa = DB::table('anggota_ekskul')
            ->join('ekstrakurikuler', 'anggota_ekskul.ekskul_id', '=', 'ekstrakurikuler.id')
            ->leftJoin('jadwal_ekskul', 'ekstrakurikuler.id', '=', 'jadwal_ekskul.ekskul_id')
            ->where('anggota_ekskul.user_id', $user->id)
            ->where('anggota_ekskul.status', 'aktif')
            ->select(
                'ekstrakurikuler.id',
                'ekstrakurikuler.nama',
                'ekstrakurikuler.foto',
                DB::raw($jadwalRaw)
            )
            ->groupBy('ekstrakurikuler.id', 'ekstrakurikuler.nama', 'ekstrakurikuler.foto')
            ->get();

        // 2. Ambil Jadwal Terdekat (untuk ekskul yang diikuti)
        $ekskulIds = $ekskulSiswa->pluck('id')->toArray();
        
        $jadwalTerdekat = [];
        if (!empty($ekskulIds)) {
            $jadwalTerdekat = DB::table('jadwal_ekskul')
                ->join('ekstrakurikuler', 'jadwal_ekskul.ekskul_id', '=', 'ekstrakurikuler.id')
                ->whereIn('jadwal_ekskul.ekskul_id', $ekskulIds)
                ->select('jadwal_ekskul.*', 'ekstrakurikuler.nama as nama_ekskul')
                ->get()
                ->toArray();

            // Urutkan jadwal berdasarkan hari saat ini
            $hariMapping = [
                'senin' => 1, 'selasa' => 2, 'rabu' => 3, 'kamis' => 4,
                'jumat' => 5, 'sabtu' => 6, 'minggu' => 7
            ];
            $currentDayNum = Carbon::now()->dayOfWeekIso;

            usort($jadwalTerdekat, function($a, $b) use ($hariMapping, $currentDayNum) {
                $dayA = $hariMapping[strtolower($a->hari)];
                $dayB = $hariMapping[strtolower($b->hari)];
                
                $diffA = ($dayA >= $currentDayNum) ? ($dayA - $currentDayNum) : (7 - $currentDayNum + $dayA);
                $diffB = ($dayB >= $currentDayNum) ? ($dayB - $currentDayNum) : (7 - $currentDayNum + $dayB);
                
                return $diffA <=> $diffB;
            });
        }

        // 3. Kegiatan Bulan Ini (berdasarkan data Absensi)
        $bulanSekarang = Carbon::now()->month;
        $tahunSekarang = Carbon::now()->year;
        $jumlahKegiatan = DB::table('absensi')
            ->where('user_id', $user->id)
            ->whereMonth('tanggal', $bulanSekarang)
            ->whereYear('tanggal', $tahunSekarang)
            ->count();

        // 4. Data tanggal untuk tampilan widget
        $today = Carbon::now();
        $namaBulanShort = strtoupper($today->locale('id')->isoFormat('MMM'));
        $tanggalHariIni = $today->day;

        // 5. Prestasi (juara dari lomba di ekskul yang diikuti)
        $jumlahPrestasi = 0;
        if (!empty($ekskulIds)) {
            $jumlahPrestasi = DB::table('lomba')
                ->whereIn('ekskul_id', $ekskulIds)
                ->whereNotNull('juara')
                ->count();
        }

        // 6. Ambil Status Pendaftaran (menunggu, disetujui, ditolak)
        $statusPendaftaran = Pendaftaran::with('ekskul')
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        // 7. Ambil Pengumuman (UMUM + sesuai ekskul yang diikuti)
        $pengumuman = DB::table('pengumuman')
            ->where(function($query) use ($ekskulIds) {
                $query->whereNull('ekskul_id')
                      ->orWhereIn('ekskul_id', $ekskulIds);
            })
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // 8. Ambil Nilai Siswa (untuk ekskul yang diikuti)
        $nilaiSiswa = [];
        if (!empty($ekskulIds)) {
            $nilaiSiswa = DB::table('nilai')
                ->join('ekstrakurikuler', 'nilai.ekskul_id', '=', 'ekstrakurikuler.id')
                ->where('nilai.user_id', $user->id)
                ->whereIn('nilai.ekskul_id', $ekskulIds)
                ->select('nilai.*', 'ekstrakurikuler.nama as ekskul_name')
                ->get()
                ->map(function($item) {
                    return (object)array_merge((array)$item, [
                        'ekskul' => (object)['nama' => $item->ekskul_name]
                    ]);
                });
        }

        return view('dashboard-siswa', compact(
            'ekskulSiswa', 
            'jadwalTerdekat', 
            'jumlahKegiatan', 
            'namaBulanShort', 
            'tanggalHariIni',
            'jumlahPrestasi',
            'pengumuman',
            'statusPendaftaran',
            'nilaiSiswa'
        ));
    }

    public function admin()
    {
        // 1. Stats Pendaftaran
        $totalPendaftar = DB::table('pendaftaran')->count();
        $totalDitolak = DB::table('pendaftaran')->where('status', 'ditolak')->count();
        $totalDiterima = DB::table('pendaftaran')->where('status', 'disetujui')->count();

        // 2. Pendaftaran Terbaru (join dengan user dan ekskul)
        $pendaftaranTerbaru = DB::table('pendaftaran')
            ->join('users', 'pendaftaran.user_id', '=', 'users.id')
            ->join('ekstrakurikuler', 'pendaftaran.ekskul_id', '=', 'ekstrakurikuler.id')
            ->select('pendaftaran.*', 'users.name as nama_siswa', 'ekstrakurikuler.nama as nama_ekskul')
            ->orderBy('pendaftaran.created_at', 'desc')
            ->take(5)
            ->get();

        // 3. Data untuk "Grafik" (misal: Jumlah Siswa per Ekskul)
        $siswaPerEkskul = DB::table('anggota_ekskul')
            ->join('ekstrakurikuler', 'anggota_ekskul.ekskul_id', '=', 'ekstrakurikuler.id')
            ->where('anggota_ekskul.status', 'aktif')
            ->select('ekstrakurikuler.nama', DB::raw('count(*) as total'))
            ->groupBy('ekstrakurikuler.id', 'ekstrakurikuler.nama')
            ->get();

        return view('dashboard-admin', compact(
            'totalPendaftar', 
            'totalDitolak', 
            'totalDiterima', 
            'pendaftaranTerbaru',
            'siswaPerEkskul'
        ));
    }

    public function pembina()
    {
        $user = auth()->user();
        
        if ($user?->role !== 'pembina') {
            abort(403);
        }

        // Get ekstrakurikuler yang dibina oleh pembina ini
        $ekskul = Ekstrakurikuler::where('pembina_id', $user->id)->first();
        
        if (!$ekskul) {
            // Jika pembina tidak memiliki ekskul, redirect ke halaman info
            return view('Admin.berandapembina', ['ekskul' => null]);
        }

        // 1. Total Pendaftar untuk ekskul ini
        $totalPendaftar = DB::table('pendaftaran')
            ->where('ekskul_id', $ekskul->id)
            ->count();

        $totalDitolak = DB::table('pendaftaran')
            ->where('ekskul_id', $ekskul->id)
            ->where('status', 'ditolak')
            ->count();

        $totalDiterima = DB::table('pendaftaran')
            ->where('ekskul_id', $ekskul->id)
            ->where('status', 'disetujui')
            ->count();

        $totalMenunggu = DB::table('pendaftaran')
            ->where('ekskul_id', $ekskul->id)
            ->where('status', 'menunggu')
            ->count();

        // 2. Total Anggota Aktif
        $totalAnggota = DB::table('anggota_ekskul')
            ->where('ekskul_id', $ekskul->id)
            ->where('status', 'aktif')
            ->count();

        // 3. Pendaftaran Terbaru (hanya untuk ekskul ini)
        $pendaftaranTerbaru = Pendaftaran::with('user', 'ekskul')
            ->where('ekskul_id', $ekskul->id)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // 4. Absensi hari ini
        $tanggalHariIni = Carbon::today()->toDateString();
        $absensiHariIni = DB::table('absensi')
            ->where('ekskul_id', $ekskul->id)
            ->whereDate('tanggal', $tanggalHariIni)
            ->count();

        $hadirHariIni = DB::table('absensi')
            ->where('ekskul_id', $ekskul->id)
            ->where('status', 'hadir')
            ->whereDate('tanggal', $tanggalHariIni)
            ->count();

        // 5. Prestasi/Dokumentasi terbaru
        $prestasiTerbaru = DB::table('dokumentasi')
            ->where('ekstrakurikuler_id', $ekskul->id)
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        // 6. Jadwal Latihan untuk ekskul ini
        $jadwalLatihan = DB::table('jadwal_ekskul')
            ->where('ekskul_id', $ekskul->id)
            ->orderByRaw("CASE 
                WHEN hari = 'senin' THEN 1
                WHEN hari = 'selasa' THEN 2
                WHEN hari = 'rabu' THEN 3
                WHEN hari = 'kamis' THEN 4
                WHEN hari = 'jumat' THEN 5
                WHEN hari = 'sabtu' THEN 6
                WHEN hari = 'minggu' THEN 7
                ELSE 8
            END")
            ->get();

        return view('Admin.berandapembina', compact(
            'ekskul',
            'totalPendaftar',
            'totalDitolak',
            'totalDiterima',
            'totalMenunggu',
            'totalAnggota',
            'pendaftaranTerbaru',
            'absensiHariIni',
            'hadirHariIni',
            'prestasiTerbaru',
            'jadwalLatihan'
        ));
    }
}
