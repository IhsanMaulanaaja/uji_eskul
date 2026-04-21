<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Absensi</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: Arial, sans-serif; background: #f0f0f0; padding: 20px; }
        .container { background: white; padding: 20px; border-radius: 8px; max-width: 600px; margin: 0 auto; }
        h1 { color: #333; }
        .info { background: #e3f2fd; padding: 10px; border-radius: 4px; margin: 10px 0; }
        .success { background: #c8e6c9; padding: 10px; border-radius: 4px; margin: 10px 0; color: green; }
        .error { background: #ffcdd2; padding: 10px; border-radius: 4px; margin: 10px 0; color: red; }
        button { padding: 10px 20px; background: #2196F3; color: white; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background: #1976D2; }
    </style>
</head>
<body>
    <div class="container">
        <h1>🧪 Test Absensi GPS - Debug Page</h1>
        
        <div class="info">
            <strong>User Info:</strong><br>
            Name: <strong>{{ Auth::user()->name ?? 'NOT AUTHENTICATED' }}</strong><br>
            Email: <strong>{{ Auth::user()->email ?? '-' }}</strong><br>
            Role: <strong>{{ Auth::user()->role ?? '-' }}</strong><br>
        </div>

        @if(!Auth::check())
            <div class="error">
                ❌ ERROR: User bukan authenticated! Silakan login terlebih dahulu.
                <br><a href="{{ route('login-admin') }}">Login sebagai Admin</a>
                <br><a href="{{ route('login-pembina') }}">Login sebagai Pembina</a>
            </div>
        @else
            <div class="success">
                ✅ User berhasil authenticated!
            </div>

            <div class="info">
                <strong>Data Ekskul yang Diikuti:</strong><br>
                @php
                    $ekskulDikuti = \Illuminate\Support\Facades\DB::table('anggota_ekskul')
                        ->join('ekstrakurikuler', 'anggota_ekskul.ekskul_id', '=', 'ekstrakurikuler.id')
                        ->where('anggota_ekskul.user_id', Auth::user()->id)
                        ->where('anggota_ekskul.status', 'aktif')
                        ->select('ekstrakurikuler.*')
                        ->get();
                @endphp

                @if($ekskulDikuti->isEmpty())
                    <span style="color: red;">Tidak ada ekstrakurikuler yang diikuti</span>
                @else
                    <ul>
                    @foreach($ekskulDikuti as $ekskul)
                        <li>{{ $ekskul->nama }}</li>
                    @endforeach
                    </ul>
                @endif
            </div>

            <br>
            <a href="{{ route('absensi-siswa') }}">
                <button><i class="fas fa-arrow-right"></i> Lanjut ke Halaman Absensi Sebenarnya</button>
            </a>
        @endif
    </div>
</body>
</html>
