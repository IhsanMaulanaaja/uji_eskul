<?php

namespace App\Http\Controllers;

use App\Models\AnggotaEkskul;
use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function indexAdmin()
    {
        $user = auth()->user();
        
        if ($user->role === 'pembina') {
            // Pembina hanya bisa melihat anggota dari ekskul yang mereka bina
            $ekskulIds = Ekstrakurikuler::where('pembina_id', $user->id)->pluck('id');
            // Get unique users only
            $userIds = AnggotaEkskul::whereIn('ekskul_id', $ekskulIds)->distinct('user_id')->pluck('user_id');
            $anggota = AnggotaEkskul::with('user', 'ekskul')
                ->whereIn('user_id', $userIds)
                ->groupBy('user_id')
                ->latest('id')
                ->paginate(10);
            $ekskuls = Ekstrakurikuler::where('pembina_id', $user->id)->get();
            $ekskulName = $ekskuls->first()?->nama;
        } else {
            // Admin bisa melihat semua anggota (unique users saja)
            $userIds = AnggotaEkskul::distinct('user_id')->pluck('user_id');
            $anggota = AnggotaEkskul::with('user', 'ekskul')
                ->whereIn('user_id', $userIds)
                ->groupBy('user_id')
                ->latest('id')
                ->paginate(10);
            $ekskuls = Ekstrakurikuler::all();
            $ekskulName = null;
        }
        
        return view('anggota-admin', compact('anggota', 'ekskuls', 'user', 'ekskulName'));
    }

    public function updateStatus(Request $request, $id)
    {
        $anggota = AnggotaEkskul::findOrFail($id);
        $user = auth()->user();

        // Jika pembina, pastikan anggota adalah dari ekskul yang mereka bina
        if ($user->role === 'pembina') {
            $ekskul = Ekstrakurikuler::where('id', $anggota->ekskul_id)
                                    ->where('pembina_id', $user->id)
                                    ->first();
            if (!$ekskul) {
                return back()->with('error', 'Anda tidak memiliki akses ke anggota ini');
            }
        }

        $request->validate([
            'status' => 'required|in:aktif,tidak aktif',
        ]);

        $anggota->status = $request->status;
        $anggota->save();

        return back()->with('success', 'Status anggota berhasil diperbarui');
    }

    public function destroy($id)
    {
        $anggota = AnggotaEkskul::findOrFail($id);
        $user = auth()->user();

        // Jika pembina, pastikan anggota adalah dari ekskul yang mereka bina
        if ($user->role === 'pembina') {
            $ekskul = Ekstrakurikuler::where('id', $anggota->ekskul_id)
                                    ->where('pembina_id', $user->id)
                                    ->first();
            if (!$ekskul) {
                return back()->with('error', 'Anda tidak memiliki akses ke anggota ini');
            }
        }

        $anggota->delete();

        return back()->with('success', 'Anggota berhasil dihapus');
    }
}
