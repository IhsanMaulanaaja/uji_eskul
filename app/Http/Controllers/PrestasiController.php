<?php

namespace App\Http\Controllers;

use App\Models\Dokumentasi;
use App\Models\Lomba;
use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PrestasiController extends Controller
{
    // === GALERI FOTO (DOKUMENTASI) ===

    public function indexAdmin()
    {
        $user = auth()->user();
        $ekskulName = null;
        $ekskulNames = null;
        $isPembina = $user->role === 'pembina';
        
        if ($isPembina) {
            // Pembina hanya bisa melihat dokumentasi dari ekskul yang mereka bina
            $ekskulIds = Ekstrakurikuler::where('pembina_id', $user->id)->pluck('id');
            $dokumentasis = Dokumentasi::whereIn('ekstrakurikuler_id', $ekskulIds)->latest()->get();
            $ekskuls = Ekstrakurikuler::where('pembina_id', $user->id)->get();
            $ekskulName = $ekskuls->first()?->nama; // Get pembina's ekstrakurikuler name
            $ekskulNames = $ekskuls->pluck('nama')->toArray();
        } else {
            // Admin bisa melihat semua
            $dokumentasis = Dokumentasi::latest()->get();
            $ekskuls = Ekstrakurikuler::all();
        }
        
        return view('prestasi-admin', compact('dokumentasis', 'ekskuls', 'user', 'ekskulName', 'isPembina', 'ekskulNames'));
    }

    public function indexSiswa()
    {
        $dokumentasis = Dokumentasi::latest()->get();
        return view('prestasi-siswa', compact('dokumentasis'));
    }

    public function storeDokumentasi(Request $request)
    {
        $user = auth()->user();
        
        $request->validate([
            'foto' => 'required|image|max:2048',
            'ekstrakurikuler_id' => 'required|exists:ekstrakurikuler,id',
            'nama_lomba' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable|string|max:255',
        ]);

        // Jika user adalah pembina, pastikan ekskul_id adalah ekskul yang mereka bina
        if ($user->role === 'pembina') {
            $ekskul = Ekstrakurikuler::where('id', $request->ekstrakurikuler_id)
                                    ->where('pembina_id', $user->id)
                                    ->first();
            if (!$ekskul) {
                return back()->with('error', 'Anda tidak memiliki akses ke ekskul ini');
            }
        }

        $path = $request->file('foto')->store('dokumentasi', 'public');

        Dokumentasi::create([
            'foto' => $path,
            'ekstrakurikuler_id' => $request->ekstrakurikuler_id,
            'nama_lomba' => $request->nama_lomba,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan
        ]);

        return back()->with('success', 'Foto berhasil diupload');
    }

    public function updateDokumentasi(Request $request, $id)
    {
        $doc = Dokumentasi::findOrFail($id);
        $user = auth()->user();

        // Jika pembina, pastikan dokumentasi adalah dari ekskul yang mereka bina
        if ($user->role === 'pembina') {
            $ekskul = Ekstrakurikuler::where('id', $doc->ekstrakurikuler_id)
                                    ->where('pembina_id', $user->id)
                                    ->first();
            if (!$ekskul) {
                return back()->with('error', 'Anda tidak memiliki akses ke dokumentasi ini');
            }
        }

        $request->validate([
            'foto' => 'nullable|image|max:2048',
            'nama_lomba' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('foto')) {
            if ($doc->foto) Storage::disk('public')->delete($doc->foto);
            $doc->foto = $request->file('foto')->store('dokumentasi', 'public');
        }

        $doc->nama_lomba = $request->nama_lomba;
        $doc->tanggal = $request->tanggal;
        $doc->keterangan = $request->keterangan;
        $doc->save();

        return back()->with('success', 'Foto berhasil diupdate');
    }

    public function destroyDokumentasi($id)
    {
        $doc = Dokumentasi::findOrFail($id);
        $user = auth()->user();

        // Jika pembina, pastikan dokumentasi adalah dari ekskul yang mereka bina
        if ($user->role === 'pembina') {
            $ekskul = Ekstrakurikuler::where('id', $doc->ekstrakurikuler_id)
                                    ->where('pembina_id', $user->id)
                                    ->first();
            if (!$ekskul) {
                return back()->with('error', 'Anda tidak memiliki akses ke dokumentasi ini');
            }
        }

        if ($doc->foto) Storage::disk('public')->delete($doc->foto);
        $doc->delete();

        return back()->with('success', 'Foto berhasil dihapus');
    }


    // === LOMBA (DETAIL PRESTASI) ===

    public function detailAdmin()
    {
        $user = auth()->user();
        
        if ($user->role === 'pembina') {
            // Pembina hanya bisa melihat lomba dari ekskul yang mereka bina
            $ekskulIds = Ekstrakurikuler::where('pembina_id', $user->id)->pluck('id');
            $lombas = Lomba::with('ekskul')->whereIn('ekskul_id', $ekskulIds)->latest()->get();
            $ekskuls = Ekstrakurikuler::where('pembina_id', $user->id)->get();
        } else {
            // Admin bisa melihat semua
            $lombas = Lomba::with('ekskul')->latest()->get();
            $ekskuls = Ekstrakurikuler::all();
        }

        return view('prestasi-detail-admin', compact('lombas', 'ekskuls'));
    }

    public function detailSiswa()
    {
        $lombas = Lomba::with('ekskul')->latest()->get();
        return view('prestasi-detail-siswa', compact('lombas'));
    }

    public function storeLomba(Request $request)
    {
        $user = auth()->user();
        
        $request->validate([
            'ekskul_id' => 'required|exists:ekstrakurikuler,id',
            'nama_lomba' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'juara' => 'nullable|string|max:255',
            'foto' => 'nullable|image|max:2048',
        ]);

        // Jika user adalah pembina, pastikan ekskul_id adalah ekskul yang mereka bina
        if ($user->role === 'pembina') {
            $ekskul = Ekstrakurikuler::where('id', $request->ekskul_id)
                                    ->where('pembina_id', $user->id)
                                    ->first();
            if (!$ekskul) {
                return back()->with('error', 'Anda tidak memiliki akses ke ekskul ini');
            }
        }

        $data = $request->except('foto');

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('dokumentasi', 'public');
        }

        Lomba::create($data);

        return back()->with('success', 'Data lomba berhasil ditambah');
    }

    public function updateLomba(Request $request, $id)
    {
        $lomba = Lomba::findOrFail($id);
        $user = auth()->user();

        $request->validate([
            'ekskul_id' => 'required|exists:ekstrakurikuler,id',
            'nama_lomba' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'juara' => 'nullable|string|max:255',
            'foto' => 'nullable|image|max:2048',
        ]);

        // Jika user adalah pembina, pastikan ekskul_id adalah ekskul yang mereka bina
        if ($user->role === 'pembina') {
            $ekskul = Ekstrakurikuler::where('id', $request->ekskul_id)
                                    ->where('pembina_id', $user->id)
                                    ->first();
            if (!$ekskul) {
                return back()->with('error', 'Anda tidak memiliki akses ke ekskul ini');
            }
            // Juga pastikan lomba yang diupdate adalah dari ekskul yang mereka bina
            if ($lomba->ekskul->pembina_id !== $user->id) {
                return back()->with('error', 'Anda tidak memiliki akses ke lomba ini');
            }
        }

        $data = $request->except('foto');

        if ($request->hasFile('foto')) {
            if ($lomba->foto) Storage::disk('public')->delete($lomba->foto);
            $data['foto'] = $request->file('foto')->store('dokumentasi', 'public');
        }

        $lomba->update($data);

        return back()->with('success', 'Data lomba berhasil diupdate');
    }

    public function destroyLomba($id)
    {
        $lomba = Lomba::findOrFail($id);
        $user = auth()->user();

        // Jika user adalah pembina, pastikan lomba adalah dari ekskul yang mereka bina
        if ($user->role === 'pembina') {
            if ($lomba->ekskul->pembina_id !== $user->id) {
                return back()->with('error', 'Anda tidak memiliki akses ke lomba ini');
            }
        }

        if ($lomba->foto) Storage::disk('public')->delete($lomba->foto);
        $lomba->delete();

        return back()->with('success', 'Data lomba berhasil dihapus');
    }
}
