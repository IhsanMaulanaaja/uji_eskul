<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\Ekstrakurikuler;
use App\Models\AnggotaEkskul;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AbsensiController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        
        if ($user?->role === 'admin' || $user?->role === 'pembina') {
            $query = Absensi::with(['user', 'ekskul']);
            $ekskulName = null;
            $ekskulNames = null;
            $isPembina = $user->role === 'pembina';
            
            if ($isPembina) {
                // Pembina hanya bisa melihat absensi ekskul yang mereka bina
                $ekskulIds = Ekstrakurikuler::where('pembina_id', $user->id)->pluck('id');
                $query->whereIn('ekskul_id', $ekskulIds);
                $ekskuls = Ekstrakurikuler::where('pembina_id', $user->id)->get();
                $ekskulName = $ekskuls->first()?->nama; // Get pembina's ekstrakurikuler name
                $ekskulNames = $ekskuls->pluck('nama')->toArray();
            } else {
                // Admin bisa lihat semua
                $ekskuls = Ekstrakurikuler::all();
            }

            // Tanggal Filter
            $tanggal = $request->query('tanggal', Carbon::now()->format('Y-m-d'));
            if ($tanggal) {
                $query->whereDate('tanggal', $tanggal);
            }

            // Status Filter
            $status = $request->query('status');
            if ($status && $status !== 'semua') {
                $query->where('status', $status);
            }

            // Nama Filter
            $nama = $request->query('nama');
            if ($nama) {
                $query->whereHas('user', function ($q) use ($nama) {
                    $q->where('name', 'like', '%' . $nama . '%');
                });
            }

            // Sort by ekskul_id, then by user name
            $query->orderBy('ekskul_id')->orderBy('user_id');
            
            // Pagination: 10 items per page
            $absensiList = $query->paginate(10);
            
            return view('absensi-admin', compact('absensiList', 'tanggal', 'status', 'nama', 'user', 'ekskuls', 'ekskulName', 'isPembina', 'ekskulNames'));
        }
        
        return view('absensi-ekskul-siswa');
    }

    public function update(Request $request, $id)
    {
        if (auth()->user()?->role !== 'admin') {
            abort(403);
        }
        
        $request->validate([
            'status' => 'required|in:hadir,izin,sakit,alfa',
            'keterangan' => 'nullable|string'
        ]);

        $absensi = Absensi::findOrFail($id);
        $absensi->update([
            'status' => $request->status,
            'keterangan' => $request->keterangan
        ]);

        return back()->with('success', 'Absensi berhasil diupdate');
    }

    public function siswa()
    {
        $user = auth()->user();
        
        // Ambil daftar ekskul yang diikuti oleh siswa
        $ekskulDikuti = DB::table('anggota_ekskul')
            ->join('ekstrakurikuler', 'anggota_ekskul.ekskul_id', '=', 'ekstrakurikuler.id')
            ->where('anggota_ekskul.user_id', $user->id)
            ->where('anggota_ekskul.status', 'aktif')
            ->select('ekstrakurikuler.*')
            ->get();

        // Ambil data jadwal untuk setiap ekskul
        $jadwalMap = [];
        foreach ($ekskulDikuti as $ekskul) {
            $jadwalMap[$ekskul->id] = DB::table('jadwal_ekskul')
                ->where('ekskul_id', $ekskul->id)
                ->get();
        }

        // Hari hari ini dalam format lowercase Indonesia
        $hariIniMapping = [
            'Monday' => 'senin',
            'Tuesday' => 'selasa',
            'Wednesday' => 'rabu',
            'Thursday' => 'kamis',
            'Friday' => 'jumat',
            'Saturday' => 'sabtu',
            'Sunday' => 'minggu',
        ];
        $hariIni = now()->format('l');
        $hariIniLower = $hariIniMapping[$hariIni];
        
        // Nama hari Indonesia untuk tampilan
        $hariIniIndonesia = [
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu',
            'Sunday' => 'Minggu',
        ][$hariIni];
        
        $tanggalHariIni = now()->format('d F Y');

        return view('absensi-ekskul-siswa', compact('ekskulDikuti', 'jadwalMap', 'hariIniIndonesia', 'tanggalHariIni', 'hariIniLower'));
    }

    public function storeSiswa(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'ekskul_id' => 'required|exists:ekstrakurikuler,id',
            'status' => 'required|in:hadir,izin,sakit,alfa',
            'keterangan' => 'nullable|string'
        ]);

        // Cek apakah siswa memang anggota ekskul tersebut
        $isAnggota = DB::table('anggota_ekskul')
            ->where('user_id', $user->id)
            ->where('ekskul_id', $request->ekskul_id)
            ->where('status', 'aktif')
            ->exists();

        if (!$isAnggota) {
            return back()->with('error', 'Anda tidak terdaftar di ekskul ini.');
        }

        // Cek apakah sudah absen hari ini untuk ekskul tersebut
        $today = Carbon::today()->toDateString();
        $alreadyAbsent = Absensi::where('user_id', $user->id)
            ->where('ekskul_id', $request->ekskul_id)
            ->whereDate('tanggal', $today)
            ->exists();

        if ($alreadyAbsent) {
            return back()->with('error', 'Anda sudah melakukan absensi hari ini untuk ekskul ini.');
        }

        Absensi::create([
            'user_id' => $user->id,
            'ekskul_id' => $request->ekskul_id,
            'tanggal' => $today,
            'status' => $request->status,
            'keterangan' => $request->keterangan
        ]);

        return back()->with('success', 'Absensi berhasil disimpan!');
    }
}
