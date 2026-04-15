<?php

namespace App\Http\Controllers;

use App\Models\JadwalEkskul;
use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->role === 'pembina') {
            // Pembina hanya bisa melihat jadwal ekskul yang mereka bina
            $ekskulIds = Ekstrakurikuler::where('pembina_id', $user->id)->pluck('id');
            $jadwal = JadwalEkskul::with('ekskul')
                ->whereIn('ekskul_id', $ekskulIds)
                ->latest()
                ->paginate(10);
            $ekskuls = Ekstrakurikuler::where('pembina_id', $user->id)->get();
        } else {
            // Admin bisa melihat semua jadwal
            $jadwal = JadwalEkskul::with('ekskul')->latest()->paginate(10);
            $ekskuls = Ekstrakurikuler::all();
        }

        return view('jadwal-admin', compact('jadwal', 'ekskuls', 'user'));
    }

    public function create()
    {
        $user = auth()->user();

        if ($user->role === 'pembina') {
            // Pembina hanya bisa membuat jadwal untuk ekskul mereka
            $ekskuls = Ekstrakurikuler::where('pembina_id', $user->id)->get();
        } else {
            // Admin bisa membuat jadwal untuk semua ekskul
            $ekskuls = Ekstrakurikuler::all();
        }

        return view('jadwal-create', compact('ekskuls', 'user'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'ekskul_id' => 'required|exists:ekstrakurikuler,id',
            'hari' => 'required|in:senin,selasa,rabu,kamis,jumat,sabtu',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
            'lokasi' => 'required|string|max:255',
        ]);

        // Validasi pembina hanya bisa membuat jadwal untuk ekskul mereka
        if ($user->role === 'pembina') {
            $ekskul = Ekstrakurikuler::where('id', $request->ekskul_id)
                                    ->where('pembina_id', $user->id)
                                    ->first();
            if (!$ekskul) {
                return back()->with('error', 'Anda tidak memiliki akses untuk membuat jadwal ekskul ini');
            }
        }

        JadwalEkskul::create($request->only(['ekskul_id', 'hari', 'jam_mulai', 'jam_selesai', 'lokasi']));

        return redirect()->route('jadwal-admin')->with('success', 'Jadwal berhasil ditambahkan');
    }

    public function edit($id)
    {
        $jadwal = JadwalEkskul::findOrFail($id);
        $user = auth()->user();

        // Validasi pembina hanya bisa edit jadwal ekskul mereka
        if ($user->role === 'pembina') {
            $ekskul = Ekstrakurikuler::where('id', $jadwal->ekskul_id)
                                    ->where('pembina_id', $user->id)
                                    ->first();
            if (!$ekskul) {
                return back()->with('error', 'Anda tidak memiliki akses untuk mengubah jadwal ini');
            }
            $ekskuls = Ekstrakurikuler::where('pembina_id', $user->id)->get();
        } else {
            $ekskuls = Ekstrakurikuler::all();
        }

        return view('jadwal-edit', compact('jadwal', 'ekskuls', 'user'));
    }

    public function update(Request $request, $id)
    {
        $jadwal = JadwalEkskul::findOrFail($id);
        $user = auth()->user();

        // Validasi pembina hanya bisa edit jadwal ekskul mereka
        if ($user->role === 'pembina') {
            $ekskul = Ekstrakurikuler::where('id', $jadwal->ekskul_id)
                                    ->where('pembina_id', $user->id)
                                    ->first();
            if (!$ekskul) {
                return back()->with('error', 'Anda tidak memiliki akses untuk mengubah jadwal ini');
            }
        }

        $request->validate([
            'ekskul_id' => 'required|exists:ekstrakurikuler,id',
            'hari' => 'required|in:senin,selasa,rabu,kamis,jumat,sabtu',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
            'lokasi' => 'required|string|max:255',
        ]);

        $jadwal->update($request->only(['ekskul_id', 'hari', 'jam_mulai', 'jam_selesai', 'lokasi']));

        return redirect()->route('jadwal-admin')->with('success', 'Jadwal berhasil diperbarui');
    }

    public function destroy($id)
    {
        $jadwal = JadwalEkskul::findOrFail($id);
        $user = auth()->user();

        // Validasi pembina hanya bisa hapus jadwal ekskul mereka
        if ($user->role === 'pembina') {
            $ekskul = Ekstrakurikuler::where('id', $jadwal->ekskul_id)
                                    ->where('pembina_id', $user->id)
                                    ->first();
            if (!$ekskul) {
                return back()->with('error', 'Anda tidak memiliki akses untuk menghapus jadwal ini');
            }
        }

        $jadwal->delete();

        return back()->with('success', 'Jadwal berhasil dihapus');
    }
}
