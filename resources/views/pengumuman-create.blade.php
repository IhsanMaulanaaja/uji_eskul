<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Pengumuman</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Nunito', -apple-system, BlinkMacSystemFont, sans-serif;
            background: #dce3ea;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .topnav {
            background: #f8fafc;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 28px;
            height: 62px;
            position: sticky;
            top: 0;
            z-index: 200;
            border-bottom: 1px solid #e2e8f0;
        }

        .topnav-brand {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .brand-text {
            font-size: 19px;
            font-weight: 800;
            color: #1c1c1c;
        }

        .topnav-right {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .user-btn {
            background: #5b8deb;
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 9px 22px;
            font-size: 17px;
            font-weight: 800;
            font-family: 'Nunito', sans-serif;
            cursor: pointer;
        }

        .app-container {
            display: flex;
            flex: 1;
            min-height: calc(100vh - 62px);
        }

        .sidebar {
            width: 260px;
            background: #a8c4d8;
            padding: 40px 0 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
            border-right: 1px solid rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 62px;
            height: calc(100vh - 62px);
            overflow-y: auto;
        }

        .sidebar-logo img {
            width: 130px;
            height: 130px;
            margin-bottom: 12px;
        }

        .sidebar-title {
            font-size: 20px;
            font-weight: 900;
            color: #1a1a1a;
            margin-bottom: 24px;
        }

        .sidebar-divider {
            width: 100%;
            height: 1px;
            background: #608eb1;
            margin-bottom: 20px;
        }

        .sidebar-nav {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 6px;
            padding: 0 16px;
            flex: 1;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            color: #1a1a2e;
            text-decoration: none;
            transition: background 0.2s;
        }

        .nav-item:hover {
            background: rgba(255, 255, 255, 0.4);
        }

        .nav-item.active {
            background: #ffffff;
            color: #1a1a1a;
            font-weight: 800;
        }

        .main {
            flex: 1;
            padding: 24px 32px;
            display: flex;
            flex-direction: column;
            gap: 20px;
            overflow-y: auto;
        }

        .card {
            background: #fff;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .card h2 {
            font-size: 22px;
            font-weight: 800;
            margin-bottom: 20px;
            color: #111;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            font-weight: 700;
            color: #333;
            margin-bottom: 8px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-family: 'Nunito', sans-serif;
            font-size: 14px;
            outline: none;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: #5b8deb;
            box-shadow: 0 0 0 3px rgba(91, 141, 235, 0.1);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 150px;
        }

        .button-group {
            display: flex;
            gap: 12px;
            margin-top: 24px;
        }

        .btn {
            border: none;
            border-radius: 8px;
            padding: 10px 24px;
            font-size: 14px;
            font-weight: 700;
            font-family: 'Nunito', sans-serif;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary {
            background: #5b8deb;
            color: #fff;
        }

        .btn-primary:hover {
            background: #3a6fd8;
        }

        .btn-secondary {
            background: #e2e8f0;
            color: #333;
        }

        .btn-secondary:hover {
            background: #cbd5e1;
        }

        .alert {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #86efac;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fca5a5;
        }
    </style>
</head>

<body>
    <nav class="topnav">
        <div class="topnav-brand">
            <img src="{{ asset('assets/image9.png') }}" width="38" height="38" alt="Logo" style="border-radius: 4px;">
            <div class="brand-text"><b>SmartSchool</b> Ekskul</div>
        </div>
        <div class="topnav-right">
            <div style="font-size: 22px; color: #222; cursor: pointer;"><i class="fas fa-bell"></i></div>
            <button class="user-btn">{{ Auth::user()->name }} <i class="fas fa-chevron-down" style="font-size:13px;"></i></button>
        </div>
    </nav>

    <div class="app-container">
        <aside class="sidebar">
            <div class="sidebar-logo">
                <img src="{{ asset('assets/image3.png') }}" alt="Logo">
            </div>
            <div class="sidebar-title">SmartSchool Ekskul</div>
            <div class="sidebar-divider"></div>

            <nav class="sidebar-nav">
                <a class="nav-item" href="{{ route('dashboard-pembina') }}">
                    <span><i class="fas fa-home"></i></span>
                    Beranda
                </a>
                <a class="nav-item" href="{{ route('pendaftaran-ekskul') }}">
                    <span><i class="fas fa-clipboard-list"></i></span>
                    Pendaftar
                </a>
                <a class="nav-item" href="{{ route('anggota-admin') }}">
                    <span><i class="fas fa-users"></i></span>
                    Kelola Siswa
                </a>
                <a class="nav-item" href="{{ route('jadwal-admin') }}">
                    <span><i class="fas fa-calendar"></i></span>
                    Jadwal Latihan
                </a>
                <a class="nav-item" href="{{ route('absensi-admin') }}">
                    <span><i class="fas fa-calendar-check"></i></span>
                    Absensi
                </a>
                <a class="nav-item" href="{{ route('prestasi-admin') }}">
                    <span><i class="fas fa-medal"></i></span>
                    Kegiatan & Prestasi
                </a>
                <a class="nav-item active" href="{{ route('pengumuman.index') }}">
                    <span><i class="fas fa-bullhorn"></i></span>
                    Pengumuman
                </a>
            </nav>

            <div style="width: 100%; padding: 0 20px; margin-top: auto;">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="nav-item" style="width: 100%; background: #e63946; color: white; justify-content: center;">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </aside>

        <main class="main">
            <div class="card">
                <h2>Buat Pengumuman</h2>

                @if (session('error'))
                    <div class="alert alert-error">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('pengumuman.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="ekskul_id">Ekstrakurikuler</label>
                        <select name="ekskul_id" id="ekskul_id" required>
                            <option value="">-- Pilih Ekskul --</option>
                            @foreach($ekskuls as $ekskul)
                                <option value="{{ $ekskul->id }}" {{ old('ekskul_id') == $ekskul->id ? 'selected' : '' }}>
                                    {{ $ekskul->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('ekskul_id')<span style="color: #ef4444; font-size: 12px;">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group">
                        <label for="judul">Judul Pengumuman</label>
                        <input type="text" name="judul" id="judul" placeholder="Contoh: Ekskul Libur Minggu Depan" 
                            value="{{ old('judul') }}" required>
                        @error('judul')<span style="color: #ef4444; font-size: 12px;">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group">
                        <label for="isi">Isi Pengumuman</label>
                        <textarea name="isi" id="isi" placeholder="Jelaskan detail pengumuman..." required>{{ old('isi') }}</textarea>
                        @error('isi')<span style="color: #ef4444; font-size: 12px;">{{ $message }}</span>@enderror
                    </div>

                    <div class="button-group">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Buat Pengumuman
                        </button>
                        <a href="{{ route('pengumuman.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>

</html>
