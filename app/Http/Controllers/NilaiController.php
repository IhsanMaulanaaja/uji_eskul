<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nilai;
use App\Models\Ekstrakurikuler;
use App\Models\AnggotaEkskul;

class NilaiController extends Controller
{
    // Tampilkan daftar nilai untuk pembina
    public function index(Request $request)
    {
        $user = auth()->user();
        
        // Hanya pembina yang bisa akses
        if ($user?->role !== 'pembina') {
            abort(403);
        }

        // Ambil ekskul yang dibina
        $ekskulIds = Ekstrakurikuler::where('pembina_id', $user->id)->pluck('id');
        $ekskuls = Ekstrakurikuler::where('pembina_id', $user->id)->get();
        
        // Filter berdasarkan ekskul
        $ekskulFilter = $request->query('ekskul_id');
        
        if ($ekskulFilter && in_array($ekskulFilter, $ekskulIds->toArray())) {
            // Ambil nilai + anggota untuk ekskul tertentu
            $nilaiList = Nilai::where('ekskul_id', $ekskulFilter)
                ->with(['user', 'ekskul'])
                ->paginate(10);
            
            $anggotaList = AnggotaEkskul::where('ekskul_id', $ekskulFilter)
                ->with('user')
                ->get();
        } else {
            // Ambil semua nilai untuk ekskul yang dibina
            $nilaiList = Nilai::whereIn('ekskul_id', $ekskulIds)
                ->with(['user', 'ekskul'])
                ->paginate(10);
                
            $anggotaList = AnggotaEkskul::whereIn('ekskul_id', $ekskulIds)
                ->with('user')
                ->get();
        }

        return view('nilai-index', compact('nilaiList', 'anggotaList', 'ekskuls', 'ekskulFilter', 'user'));
    }

    // Input/update nilai untuk siswa
    public function inputNilai(Request $request)
    {
        $user = auth()->user();
        
        if ($user?->role !== 'pembina') {
            return response()->json(['success' => false, 'message' => 'Akses ditolak'], 403);
        }

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'ekskul_id' => 'required|exists:ekstrakurikuler,id',
            'nilai' => 'required|in:A,B,C',
            'keterangan' => 'nullable|string'
        ]);

        // Cek apakah ekskul tersebut milik pembina
        $ekskul = Ekstrakurikuler::where('id', $request->ekskul_id)
                                 ->where('pembina_id', $user->id)
                                 ->first();
        
        if (!$ekskul) {
            return response()->json(['success' => false, 'message' => 'Anda tidak memiliki akses ke ekskul ini'], 403);
        }

        // Cek apakah siswa adalah anggota ekskul
        $anggota = AnggotaEkskul::where('user_id', $request->user_id)
                                ->where('ekskul_id', $request->ekskul_id)
                                ->first();
        
        if (!$anggota) {
            return response()->json(['success' => false, 'message' => 'Siswa tidak terdaftar di ekskul ini'], 422);
        }

        // Update atau create nilai
        Nilai::updateOrCreate(
            ['user_id' => $request->user_id, 'ekskul_id' => $request->ekskul_id],
            [
                'nilai' => $request->nilai,
                'keterangan' => $request->keterangan
            ]
        );

        return response()->json(['success' => true, 'message' => 'Nilai berhasil disimpan']);
    }

    // Delete nilai
    public function destroy($id)
    {
        $user = auth()->user();
        
        if ($user?->role !== 'pembina') {
            abort(403);
        }

        $nilai = Nilai::findOrFail($id);

        // Cek apakah ekskul milik pembina
        $ekskul = Ekstrakurikuler::where('id', $nilai->ekskul_id)
                                 ->where('pembina_id', $user->id)
                                 ->first();
        
        if (!$ekskul) {
            abort(403);
        }

        $nilai->delete();

        return back()->with('success', 'Nilai berhasil dihapus');
    }
}
