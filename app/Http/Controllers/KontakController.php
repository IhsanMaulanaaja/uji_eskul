<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class KontakController extends Controller
{
    public function index()
    {
        return view('kontak');
    }

    public function send(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'pesan' => 'required|string|min:10|max:5000',
        ], [
            'nama.required' => 'Nama harus diisi',
            'nama.max' => 'Nama tidak boleh lebih dari 255 karakter',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'email.max' => 'Email tidak boleh lebih dari 255 karakter',
            'pesan.required' => 'Pesan harus diisi',
            'pesan.min' => 'Pesan minimal 10 karakter',
            'pesan.max' => 'Pesan tidak boleh lebih dari 5000 karakter',
        ]);

        try {
            // Send email to admin
            Mail::send('emails.kontak', [
                'nama' => $validated['nama'],
                'email' => $validated['email'],
                'pesan' => $validated['pesan'],
            ], function ($message) use ($validated) {
                $message->to(config('mail.from.address'))
                        ->subject('Pesan Baru dari ' . $validated['nama']);
            });

            // Send confirmation email to user
            Mail::send('emails.kontak-confirmation', [
                'nama' => $validated['nama'],
                'pesan' => $validated['pesan'],
            ], function ($message) use ($validated) {
                $message->to($validated['email'])
                        ->subject('Kami telah menerima pesan Anda - Ekstrakurikuler');
            });

            return redirect()
                ->route('kontak.index')
                ->with('success', 'Pesan Anda berhasil dikirim. Terima kasih telah menghubungi kami!');
        } catch (\Exception $e) {
            return redirect()
                ->route('kontak.index')
                ->with('error', 'Gagal mengirim pesan. Silakan coba lagi.');
        }
    }
}
