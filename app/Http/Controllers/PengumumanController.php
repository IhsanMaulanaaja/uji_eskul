<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumuman;
use App\Models\Ekstrakurikuler;

class PengumumanController extends Controller
{
    // Tampilkan daftar pengumuman untuk pembina
    public function index(Request $request)
    {
        $user = auth()->user();
        
        // Hanya pembina yang bisa akses
        if ($user?->role !== 'pembina') {
            abort(403);
        }

        // Ambil ekskul yang dibina
        $ekskulIds = Ekstrakurikuler::where('pembina_id', $user->id)->pluck('id');
        
        // Ambil pengumuman untuk ekskul yang dibina
        $pengumuman = Pengumuman::whereIn('ekskul_id', $ekskulIds)
            ->with('ekskul')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $ekskuls = Ekstrakurikuler::where('pembina_id', $user->id)->get();

        return view('pengumuman-index', compact('pengumuman', 'ekskuls', 'user'));
    }

    // Form create pengumuman
    public function create()
    {
        $user = auth()->user();
        
        if ($user?->role !== 'pembina') {
            abort(403);
        }

        // Ambil ekskul yang dibina
        $ekskuls = Ekstrakurikuler::where('pembina_id', $user->id)->get();

        return view('pengumuman-create', compact('ekskuls', 'user'));
    }

    // Store pengumuman baru
    public function store(Request $request)
    {
        $user = auth()->user();
        
        if ($user?->role !== 'pembina') {
            abort(403);
        }

        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'ekskul_id' => 'required|exists:ekstrakurikuler,id'
        ]);

        // Cek apakah ekskul tersebut milik pembina
        $ekskul = Ekstrakurikuler::where('id', $request->ekskul_id)
                                 ->where('pembina_id', $user->id)
                                 ->first();
        
        if (!$ekskul) {
            return back()->with('error', 'Anda tidak memiliki akses ke ekskul ini');
        }

        Pengumuman::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'ekskul_id' => $request->ekskul_id,
            'user_id' => $user->id
        ]);

        return redirect()->route('pengumuman.index')->with('success', 'Pengumuman berhasil dibuat');
    }

    // Form edit pengumuman
    public function edit($id)
    {
        $user = auth()->user();
        
        if ($user?->role !== 'pembina') {
            abort(403);
        }

        $pengumuman = Pengumuman::findOrFail($id);

        // Cek ownership
        if ($pengumuman->user_id !== $user->id) {
            abort(403);
        }

        $ekskuls = Ekstrakurikuler::where('pembina_id', $user->id)->get();

        return view('pengumuman-edit', compact('pengumuman', 'ekskuls', 'user'));
    }

    // Update pengumuman
    public function update(Request $request, $id)
    {
        $user = auth()->user();
        
        if ($user?->role !== 'pembina') {
            abort(403);
        }

        $pengumuman = Pengumuman::findOrFail($id);

        // Cek ownership
        if ($pengumuman->user_id !== $user->id) {
            abort(403);
        }

        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'ekskul_id' => 'required|exists:ekstrakurikuler,id'
        ]);

        // Cek ekskul
        $ekskul = Ekstrakurikuler::where('id', $request->ekskul_id)
                                 ->where('pembina_id', $user->id)
                                 ->first();
        
        if (!$ekskul) {
            return back()->with('error', 'Anda tidak memiliki akses ke ekskul ini');
        }

        $pengumuman->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'ekskul_id' => $request->ekskul_id
        ]);

        return redirect()->route('pengumuman.index')->with('success', 'Pengumuman berhasil diperbarui');
    }

    // Delete pengumuman
    public function destroy($id)
    {
        $user = auth()->user();
        
        if ($user?->role !== 'pembina') {
            abort(403);
        }

        $pengumuman = Pengumuman::findOrFail($id);

        // Cek ownership
        if ($pengumuman->user_id !== $user->id) {
            abort(403);
        }

        $pengumuman->delete();

        return back()->with('success', 'Pengumuman berhasil dihapus');
    }
}
