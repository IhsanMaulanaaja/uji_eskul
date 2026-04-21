<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengumuman Ekskul</title>
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
            width: 165px;
            background: #a8c4d8;
            padding: 20px 12px;
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
            width: 90px;
            height: 90px;
            margin-bottom: 8px;
        }

        .sidebar-title {
            font-size: 13px;
            font-weight: 800;
            color: #1a1a1a;
            margin-bottom: 14px;
            text-align: center;
            line-height: 1.35;
        }

        .sidebar-divider {
            width: 100%;
            height: 1px;
            background: #608eb1;
            margin-bottom: 8px;
        }

        .sidebar-nav {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 2px;
            padding: 0;
            flex: 1;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 600;
            color: #1a1a2e;
            text-decoration: none;
            transition: background 0.2s;
            width: 100%;
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

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 12px;
        }

        .header h1 {
            font-size: 24px;
            font-weight: 800;
            color: #111;
        }

        .btn-create {
            background: #5b8deb;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-size: 14px;
            font-weight: 700;
            font-family: 'Nunito', sans-serif;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-create:hover {
            background: #3a6fd8;
        }

        .card {
            background: #fff;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .pengumuman-item {
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 16px;
            margin-bottom: 16px;
            background: #f9fafb;
        }

        .pengumuman-header {
            display: flex;
            justify-content: space-between;
            align-items: start;
            margin-bottom: 12px;
        }

        .pengumuman-title {
            font-size: 16px;
            font-weight: 800;
            color: #111;
        }

        .pengumuman-ekskul {
            display: inline-block;
            background: #dbeafe;
            color: #3b82f6;
            font-size: 12px;
            padding: 4px 10px;
            border-radius: 12px;
            font-weight: 700;
        }

        .pengumuman-isi {
            font-size: 14px;
            color: #333;
            margin-bottom: 12px;
            line-height: 1.5;
        }

        .pengumuman-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-top: 1px solid #e5e7eb;
            padding-top: 12px;
            font-size: 12px;
            color: #666;
        }

        .pengumuman-date {
            font-weight: 600;
        }

        .pengumuman-actions {
            display: flex;
            gap: 8px;
        }

        .btn-edit {
            background: #3b82f6;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 6px 12px;
            font-size: 12px;
            font-weight: 700;
            font-family: 'Nunito', sans-serif;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .btn-edit:hover {
            background: #2563eb;
        }

        .btn-delete {
            background: #ef4444;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 6px 12px;
            font-size: 12px;
            font-weight: 700;
            font-family: 'Nunito', sans-serif;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .btn-delete:hover {
            background: #dc2626;
        }

        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: #999;
        }

        .empty-state i {
            font-size: 48px;
            color: #cbd5e1;
            margin-bottom: 16px;
            display: block;
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

        .pagination-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 24px;
            padding-top: 16px;
            border-top: 1px solid #eee;
        }

        .pagination-links {
            display: flex;
            gap: 8px;
        }

        .pagination-links a,
        .pagination-links span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 32px;
            height: 32px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            color: #333;
            transition: all 0.15s;
        }

        .pagination-links a:hover {
            background: #f1f5f9;
            border-color: #5b8deb;
            color: #5b8deb;
        }

        .pagination-links span.active {
            background: #5b8deb;
            color: #fff;
            border-color: #5b8deb;
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
                <a class="nav-item" href="{{ route('nilai.index') }}">
                    <span><i class="fas fa-star"></i></span>
                    Nilai Siswa
                </a>
            </nav>

            <div style="width: 100%; padding: 0 12px; margin-top: auto;">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="nav-item" style="width: 100%; background: #e63946; color: white; justify-content: center; font-size: 12px;">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </aside>

        <main class="main">
            <div class="header">
                <h1>Pengumuman Ekskul</h1>
                <a href="{{ route('pengumuman.create') }}" class="btn-create">
                    <i class="fas fa-plus"></i> Buat Pengumuman
                </a>
            </div>

            @if (session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    {{ session('success') }}
                </div>
            @endif

            <div class="card">
                @forelse($pengumuman as $p)
                    <div class="pengumuman-item">
                        <div class="pengumuman-header">
                            <div>
                                <div class="pengumuman-title">{{ $p->judul }}</div>
                                <span class="pengumuman-ekskul">{{ $p->ekskul->nama ?? 'N/A' }}</span>
                            </div>
                            <div class="pengumuman-actions">
                                <a href="{{ route('pengumuman.edit', $p->id) }}" class="btn-edit">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('pengumuman.destroy', $p->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete" onclick="return confirm('Yakin hapus pengumuman ini?')">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="pengumuman-isi">{{ $p->isi }}</div>
                        <div class="pengumuman-footer">
                            <span class="pengumuman-date">{{ $p->created_at->translatedFormat('d F Y H:i') }}</span>
                        </div>
                    </div>
                @empty
                    <div class="empty-state">
                        <i class="fas fa-inbox"></i>
                        <p style="font-size: 16px; font-weight: 600;">Belum ada pengumuman</p>
                        <p style="font-size: 14px; color: #aaa; margin-top: 8px;">Klik tombol "Buat Pengumuman" untuk membuat pengumuman baru</p>
                    </div>
                @endforelse

                @if($pengumuman->hasPages())
                <div class="pagination-wrapper">
                    <div style="font-size: 13px; color: #666;">
                        Showing {{ $pengumuman->firstItem() ?? 0 }} to {{ $pengumuman->lastItem() ?? 0 }} of {{ $pengumuman->total() }} results
                    </div>
                    <div class="pagination-links">
                        {{-- Previous Page Link --}}
                        @if ($pengumuman->onFirstPage())
                            <span style="color: #ccc; border-color: #eee; cursor: not-allowed;">‹</span>
                        @else
                            <a href="{{ $pengumuman->previousPageUrl() }}">‹</a>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($pengumuman->getUrlRange(1, $pengumuman->lastPage()) as $page => $url)
                            @if ($page == $pengumuman->currentPage())
                                <span class="active">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}">{{ $page }}</a>
                            @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($pengumuman->hasMorePages())
                            <a href="{{ $pengumuman->nextPageUrl() }}">›</a>
                        @else
                            <span style="color: #ccc; border-color: #eee; cursor: not-allowed;">›</span>
                        @endif
                    </div>
                </div>
                @endif
            </div>
        </main>
    </div>
</body>

</html>
