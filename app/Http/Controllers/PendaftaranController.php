<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\Ekstrakurikuler;
use App\Models\Absensi;
use App\Models\JadwalEkskul;
use App\Models\AnggotaEkskul;

class PendaftaranController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        
        // IF ADMIN OR PEMBINA
        if ($user && in_array($user->role, ['admin', 'pembina'])) {
            $isPembina = $user->role === 'pembina';
            $ekskulNames = null;
            
            if ($isPembina) {
                // Pembina bisa melihat pendaftaran dari semua ekskul yang mereka bina
                $ekskulIds = Ekstrakurikuler::where('pembina_id', $user->id)->pluck('id');
                $ekskul = Ekstrakurikuler::where('pembina_id', $user->id)->first(); // untuk display utama
                $ekskulNames = Ekstrakurikuler::where('pembina_id', $user->id)->pluck('nama')->toArray();
                
                $pendaftarTerbaru = Pendaftaran::with('user', 'ekskul')
                    ->whereIn('ekskul_id', $ekskulIds)
                    ->orderBy('ekskul_id')
                    ->orderBy('created_at', 'desc')
                    ->paginate(10);
                    
                $totalPendaftar = Pendaftaran::whereIn('ekskul_id', $ekskulIds)->where('status', 'menunggu')->count();
                
                $totalAnggota = AnggotaEkskul::whereIn('ekskul_id', $ekskulIds)->count();

                $pertemuanKe = Absensi::whereIn('ekskul_id', $ekskulIds)->select('tanggal')->distinct()->count('tanggal');
                
                if ($pertemuanKe == 0) $pertemuanKe = 12; // visual fallback per mockup

                $jadwals = JadwalEkskul::whereIn('ekskul_id', $ekskulIds)->get();
            } else {
                // Admin melihat semua
                $ekskul = Ekstrakurikuler::first(); // fallback default untuk admin
                
                $pendaftarTerbaru = Pendaftaran::with('user', 'ekskul')
                    ->orderBy('ekskul_id')
                    ->orderBy('created_at', 'desc')
                    ->paginate(10);
                    
                $totalPendaftar = Pendaftaran::where('status', 'menunggu')->count();
                
                $totalAnggota = AnggotaEkskul::count();

                $pertemuanKe = Absensi::select('tanggal')->distinct()->count('tanggal');
                
                if ($pertemuanKe == 0) $pertemuanKe = 12; // visual fallback per mockup

                $jadwals = JadwalEkskul::all();
            }

            // Group by ekstrakurikuler for display
            $groupedByEkskul = $pendaftarTerbaru->groupBy('ekskul_id');

            return view('pendaftaran-ekskul-admin', compact('ekskul', 'pendaftarTerbaru', 'groupedByEkskul', 'totalPendaftar', 'totalAnggota', 'pertemuanKe', 'user', 'jadwals', 'isPembina', 'ekskulNames'));
        }

        // IF SISWA
        $ekskulList = Ekstrakurikuler::all();
        $ekskulSelected = null;
        
        // Jika datang dari link ekskul tertentu, filter hanya ekskul itu
        if (request('ekskul_id')) {
            $ekskulSelected = Ekstrakurikuler::find(request('ekskul_id'));
            if ($ekskulSelected) {
                $ekskulList = collect([$ekskulSelected]);
            }
        }
        
        return view('pendaftaran-ekskul-siswa', compact('ekskulList', 'ekskulSelected'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        if ($user?->role !== 'siswa') {
            abort(403);
        }
        
        $request->validate([
            'ekskul_id' => 'required|exists:ekstrakurikuler,id',
            'alasan' => 'required|string',
            'setuju' => 'accepted'
        ]);

        // Clean up old rejected registrations (allow user to register again after rejection)
        Pendaftaran::where('user_id', $user->id)
            ->where('ekskul_id', $request->ekskul_id)
            ->where('status', 'ditolak')
            ->delete();

        // Check if currently registered (pending or approved)
        $activeRegistration = Pendaftaran::where('user_id', $user->id)
            ->where('ekskul_id', $request->ekskul_id)
            ->whereIn('status', ['menunggu', 'disetujui'])
            ->first();
            
        if ($activeRegistration) {
            return back()->with('error', 'Anda sudah mendaftar ekskul ini.');
        }

        Pendaftaran::create([
            'user_id' => $user->id,
            'ekskul_id' => $request->ekskul_id,
            'tanggal_daftar' => now(),
            'alasan' => $request->alasan,
            'status' => 'menunggu'
        ]);

        return back()->with('success', 'Pendaftaran berhasil dikirim. Menunggu persetujuan pembina.');
    }

    public function updateStatus(Request $request, $id)
    {
        $user = auth()->user();
        if (!$user || !in_array($user->role, ['admin', 'pembina'])) {
            abort(403);
        }

        $pendaftaran = Pendaftaran::findOrFail($id);

        // Jika user adalah pembina, pastikan pendaftaran adalah untuk ekskul yang mereka bina
        if ($user->role === 'pembina') {
            $ekskul = Ekstrakurikuler::where('id', $pendaftaran->ekskul_id)
                                    ->where('pembina_id', $user->id)
                                    ->first();
            if (!$ekskul) {
                return back()->with('error', 'Anda tidak memiliki akses ke pendaftaran ini');
            }
        }

        $request->validate([
            'status' => 'required|in:disetujui,ditolak',
            'alasan_penolakan' => 'required_if:status,ditolak|nullable|string'
        ]);

        $updateData = ['status' => $request->status];
        
        // Jika ditolak, simpan alasan penolakan
        if ($request->status === 'ditolak') {
            $updateData['catatan_admin'] = $request->alasan_penolakan;
        }
        
        $pendaftaran->update($updateData);

        if ($request->status === 'disetujui') {
            AnggotaEkskul::firstOrCreate([
                'user_id' => $pendaftaran->user_id,
                'ekskul_id' => $pendaftaran->ekskul_id,
            ], [
                'status' => 'aktif',
            ]);
        } else {
            AnggotaEkskul::where('user_id', $pendaftaran->user_id)
                ->where('ekskul_id', $pendaftaran->ekskul_id)
                ->delete();
        }

        return back()->with('success', 'Status pendaftaran diperbarui.');
    }
}
