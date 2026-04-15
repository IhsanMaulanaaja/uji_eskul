<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartSchool Ekskul - Pendaftaran</title>
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

        /* ===== TOP NAVBAR ===== */
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

        .bell-icon {
            font-size: 22px;
            color: #222;
            cursor: pointer;
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
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* ===== LAYOUT ===== */
        .app-container {
            display: flex;
            flex: 1;
            min-height: calc(100vh - 62px);
        }

        /* ===== SIDEBAR ===== */
        .sidebar {
            width: 260px;
            background: #a8c4d8;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 40px 0 30px;
            flex-shrink: 0;
            height: calc(100vh - 62px);
            overflow: hidden;
            border-right: 1px solid rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 62px;
        }

        .sidebar-logo {
            text-align: center;
            margin-bottom: 24px;
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

        .nav-item .nav-icon {
            width: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
            flex-shrink: 0;
        }

        .logout-container {
            width: 100%;
            padding: 0 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            margin-top: auto;
        }

        .logout-icon-btn {
            background: #e63946;
            color: white;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            cursor: pointer;
            border: none;
        }

        .logout-btn {
            background: #e63946;
            color: #fff;
            border: none;
            border-radius: 25px;
            padding: 12px 30px;
            font-size: 18px;
            font-weight: 800;
            font-family: inherit;
            cursor: pointer;
            flex: 1;
        }

        /* ===== MAIN CONTENT ===== */
        .main {
            flex: 1;
            padding: 24px 32px;
            display: flex;
            flex-direction: column;
            gap: 20px;
            overflow-y: auto;
        }

        /* Top Header Card */
        .header-card {
            background: #fff;
            border-radius: 12px;
            padding: 14px 24px;
            display: flex;
            align-items: center;
            gap: 16px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.06);
        }

        .header-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            color: #555;
            border: 2px solid #ddd;
        }

        .header-info h2 {
            font-size: 18px;
            font-weight: 800;
            color: #111;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .role-badge {
            background: #dbeafe;
            color: #3b82f6;
            font-size: 12px;
            padding: 3px 12px;
            border-radius: 20px;
            font-weight: 800;
        }

        .header-date {
            font-size: 13px;
            color: #64748b;
            margin-top: 4px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        /* Stats Row */
        .stats-row {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .stat-card {
            background: #fff;
            border-radius: 12px;
            padding: 18px 24px;
            display: flex;
            align-items: center;
            gap: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .stat-icon {
            font-size: 40px;
            width: 50px;
            text-align: center;
        }

        .stat-details .stat-label {
            font-size: 14px;
            font-weight: 700;
            color: #111;
        }

        .stat-details .stat-value {
            font-size: 28px;
            font-weight: 900;
            color: #111;
            line-height: 1.2;
        }

        /* 2-Column Main Area */
        .content-grid {
            display: grid;
            grid-template-columns: 2.5fr 1fr;
            gap: 24px;
        }

        /* Pendaftar Terbaru Table */
        .pendaftar-card {
            background: #fff;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .pendaftar-card h3 {
            font-size: 22px;
            font-weight: 900;
            margin-bottom: 20px;
            color: #111;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #f8fafc;
            padding: 12px;
            text-align: left;
            font-size: 14px;
            font-weight: 800;
            color: #111;
            border-bottom: 2px solid #f1f5f9;
        }

        td {
            padding: 14px 12px;
            border-bottom: 1px solid #f1f5f9;
            vertical-align: middle;
            font-size: 15px;
            font-weight: 600;
            color: #333;
        }

        .user-cell {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #ffd54f;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            border: 2px solid #fff;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .user-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .action-btns {
            display: flex;
            gap: 10px;
        }

        .action-btn {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            cursor: pointer;
            font-size: 12px;
        }

        .btn-check {
            background: #22c55e;
        }

        .btn-cross {
            background: #ef4444;
        }

        /* ===== EKSKUL SECTION ===== */
        .ekskul-section {
            margin-bottom: 24px;
            background: #f9fafb;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 16px;
        }

        .ekskul-title {
            font-size: 16px;
            font-weight: 800;
            color: #1a1a1a;
            margin-bottom: 14px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .ekskul-badge {
            display: inline-block;
            background: #5b8deb;
            color: #fff;
            padding: 2px 10px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 700;
        }

        /* ===== PAGINATION ===== */
        .pagination-wrapper {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 24px;
            padding-top: 16px;
            border-top: 1px solid #eee;
        }

        .pagination-info {
            font-size: 13px;
            color: #666;
            font-weight: 600;
        }

        .pagination-links {
            display: flex;
            align-items: center;
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

        .pagination-links span.disabled {
            color: #ccc;
            border-color: #eee;
            cursor: not-allowed;
        }

        /* Right Column (Jadwal & Pembina) */
        .right-col {
            display: flex;
            flex-direction: column;
            gap: 24px;
            position: sticky;
            top: 24px;
            height: fit-content;
        }

        .jadwal-card {
            background: #fff;
            border-radius: 12px;
            padding: 20px 24px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .jadwal-card h3 {
            font-size: 18px;
            font-weight: 800;
            margin-bottom: 16px;
            padding-bottom: 12px;
            border-bottom: 1px solid #e2e8f0;
        }

        .jadwal-info {
            font-size: 16px;
            font-weight: 800;
            color: #111;
            line-height: 1.5;
            margin-bottom: 20px;
        }

        .jadwal-info span {
            display: block;
            font-weight: 600;
            font-size: 15px;
            color: #333;
        }

        .attend-stats {
            display: flex;
            justify-content: space-between;
            padding-top: 14px;
            border-top: 1px solid #e2e8f0;
            font-weight: 800;
            font-size: 14px;
        }

        .pembina-card {
            background: #fff;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            text-align: center;
        }

        .pembina-card h3 {
            font-size: 18px;
            font-weight: 900;
            color: #111;
            text-transform: uppercase;
            margin-bottom: 16px;
            line-height: 1.3;
        }

        .pembina-photo {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 8px;
        }

        /* ===== FILTER BAR ===== */
        .filter-bar {
            background: #fff;
            border-radius: 12px;
            padding: 16px 24px;
            margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .filter-label {
            font-size: 14px;
            font-weight: 800;
            color: #1a1a1a;
            white-space: nowrap;
        }

        .filter-buttons {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
            scrollbar-width: none;
        }

        .filter-buttons::-webkit-scrollbar {
            display: none;
        }

        .filter-btn {
            padding: 8px 16px;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            background: #fff;
            font-size: 13px;
            font-weight: 700;
            color: #333;
            cursor: pointer;
            transition: all 0.2s;
            white-space: nowrap;
        }

        .filter-btn:hover {
            border-color: #5b8deb;
            color: #5b8deb;
        }

        .filter-btn.active {
            background: #5b8deb;
            color: #fff;
            border-color: #5b8deb;
        }
    </style>
</head>

<body>

    <!-- TOP NAVBAR -->
    <nav class="topnav">
        <div class="topnav-brand">
            <img src="{{ asset('assets/image9.png') }}" width="38" height="38" alt="Logo" style="border-radius: 4px;">
            <div class="brand-text"><b>SmartSchool</b> Ekskul</div>
        </div>
        <div class="topnav-right">
            <div class="bell-icon"><i class="fas fa-bell"></i></div>
            <button class="user-btn">{{ Auth::user()->name ?? 'User' }} <i class="fas fa-chevron-down" style="font-size:13px;"></i></button>
        </div>
    </nav>

    <div class="app-container">

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div class="sidebar-logo">
            <!-- Asumsi image logo.png placeholder -->
            <img src="{{ asset('assets/image3.png') }}" alt="Logo">
        </div>
        <div class="sidebar-title">SmartSchool Ekskul</div>
        <div class="sidebar-divider"></div>

        <nav class="sidebar-nav">
            <!-- BERANDA -->
            <a class="nav-item" href="{{ $user?->role === 'pembina' ? route('dashboard-pembina') : route('dashboard-admin') }}">
                <span class="nav-icon"><i class="fas fa-home"></i></span>
                Beranda
            </a>

            <!-- UNTUK PEMBINA: PENDAFTAR DI ATAS -->
            @if($user?->role === 'pembina')
                <a class="nav-item active" href="{{ route('pendaftaran-ekskul') }}">
                    <span class="nav-icon"><i class="fas fa-clipboard-list"></i></span>
                    Pendaftar
                </a>
                <a class="nav-item" href="{{ route('anggota-admin') }}">
                    <span class="nav-icon"><i class="fas fa-users"></i></span>
                    Kelola Siswa
                </a>
            @else
                <!-- UNTUK ADMIN: MENU ADMIN DULU -->
                <a class="nav-item" href="{{ route('users.index') }}">
                    <span class="nav-icon"><i class="fas fa-users"></i></span>
                    Kelola Pengguna
                </a>
                <a class="nav-item" href="{{ route('anggota-admin') }}">
                    <span class="nav-icon"><i class="fas fa-users"></i></span>
                    Kelola Siswa
                </a>
                <a class="nav-item" href="{{ route('ekstrakurikuler.index') }}">
                    <span class="nav-icon"><i class="fas fa-book"></i></span>
                    Daftar Ekskul
                </a>
                <a class="nav-item active" href="{{ route('pendaftaran-ekskul') }}">
                    <span class="nav-icon"><i class="fas fa-clipboard-list"></i></span>
                    Pendaftar
                </a>
            @endif

            <!-- MENU SHARED BOTH -->
            <a class="nav-item" href="{{ route('jadwal-admin') }}">
                <span class="nav-icon"><i class="fas fa-calendar"></i></span>
                Jadwal Latihan
            </a>
            <a class="nav-item" href="{{ route('absensi-admin') }}">
                <span class="nav-icon"><i class="fas fa-calendar-check"></i></span>
                Absensi
            </a>
            <a class="nav-item" href="{{ route('prestasi-admin') }}">
                <span class="nav-icon"><i class="fas fa-medal"></i></span>
                Kegiatan & Prestasi
            </a>
        </nav>

         <div class="logout-area">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
    </aside>

    <!-- MAIN -->
    <main class="main">

        <!-- Header -->
        <div class="header-card">
            <div class="header-avatar">
                <i class="fas fa-user"></i>
            </div>
            <div class="header-info">
                <h2>Halo {{ $user->name }}! <span class="role-badge">{{ ucfirst($user->role) }}</span></h2>
                <div class="header-date">
                    <i class="far fa-clock"></i>
                    {{ \Carbon\Carbon::now()->format('l, d F Y') }}
                </div>
            </div>
        </div>

        <!-- Stats Row -->
        <div class="stats-row">
            <div class="stat-card">
                <div class="stat-icon">📈</div>
                <div class="stat-details">
                    <div class="stat-label">Total Pendaftar</div>
                    <div class="stat-value">{{ $totalPendaftar }}</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">👥</div>
                <div class="stat-details">
                    <div class="stat-label">Total Anggota</div>
                    <div class="stat-value">{{ $totalAnggota }}</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">🤝</div>
                <div class="stat-details">
                    <div class="stat-label">Pertemuan Ke-</div>
                    <div class="stat-value">{{ $pertemuanKe }}</div>
                </div>
            </div>
        </div>

        <!-- Bottom Grid -->
        <div class="content-grid">

            <!-- Pendaftar Table -->
            <div class="pendaftar-card">
                @if ($isPembina && count($ekskulNames) === 1)
                    <h3>Pendaftar {{ $ekskulNames[0] }} Terbaru</h3>
                @else
                    <h3>Pendaftar Terbaru - Per Ekstrakurikuler</h3>
                @endif

                @php
                    // Group pendaftar by ekstrakurikuler
                    $groupedByEkskul = $pendaftarTerbaru->groupBy('ekskul_id');
                @endphp

                <!-- Filter Bar - hanya tampil jika admin atau pembina dengan lebih dari 1 ekskul -->
                @if (!$isPembina || count($ekskulNames) > 1)
                <div class="filter-bar">
                    <span class="filter-label">Pilih Ekstrakurikuler:</span>
                    <div class="filter-buttons" id="filterButtonsContainer">
                        <button class="filter-btn active" data-filter-id="semua" onclick="filterEkskul(this, 'semua')">
                            Semua
                        </button>
                        @php
                            $allEkskul = $groupedByEkskul->map(function($items) {
                                return $items->first()->ekskul;
                            })->unique('id');
                        @endphp
                        @foreach($allEkskul as $ekskul)
                            <button class="filter-btn" data-filter-id="{{ $ekskul->id }}" onclick="filterEkskul(this, '{{ $ekskul->id }}')">
                                {{ $ekskul->nama }}
                            </button>
                        @endforeach
                    </div>
                </div>
                @endif

                @forelse($groupedByEkskul as $ekskulId => $pendaftarByEkskul)
                    <div class="ekskul-section" data-ekskul-id="{{ $ekskulId }}">
                        <div class="ekskul-title">
                            <span class="ekskul-badge">{{ $pendaftarByEkskul->first()->ekskul->nama ?? 'N/A' }}</span>
                            <span style="color: #888; font-size: 14px;">({{ $pendaftarByEkskul->count() }} pendaftar)</span>
                        </div>
                        
                        <table style="margin-bottom: 0;">
                            <thead>
                                <tr>
                                    <th style="width: 40px;">No.</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>Alasan</th>
                                    <th>Tanggal Daftar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pendaftarByEkskul as $index => $pd)
                                    <tr>
                                        <td style="font-weight: 700; color: #666;">{{ $index + 1 }}</td>
                                        <td>
                                            <div class="user-cell">
                                                <div class="user-avatar">
                                                    @if ($pd->user->foto)
                                                        <img src="{{ Storage::url($pd->user->foto) }}" alt="Foto">
                                                    @else
                                                        <i class="fas fa-user" style="color:#fff; font-size: 18px;"></i>
                                                    @endif
                                                </div>
                                                {{ $pd->user->name }}
                                            </div>
                                        </td>
                                        <td>{{ $pd->user->kelas ?? '-' }}</td>
                                        <td>{{ $pd->alasan ?? '-' }}</td>
                                        <td>{{ \Carbon\Carbon::parse($pd->tanggal_daftar)->translatedFormat('d F Y') }}</td>
                                        <td>
                                            @if ($pd->status == 'menunggu')
                                                <div class="action-btns">
                                                    <form action="{{ route('pendaftaran.status', $pd->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="status" value="disetujui">
                                                        <button type="submit" class="action-btn btn-check" title="Terima"><i
                                                                class="fas fa-check"></i></button>
                                                    </form>
                                                    <form action="{{ route('pendaftaran.status', $pd->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="status" value="ditolak">
                                                        <button type="submit" class="action-btn btn-cross" title="Tolak"><i
                                                                class="fas fa-times"></i></button>
                                                    </form>
                                                </div>
                                            @else
                                                <span
                                                    style="font-size: 12px; font-weight:800; color: {{ $pd->status == 'disetujui' ? '#22c55e' : '#ef4444' }}">{{ ucfirst($pd->status) }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @empty
                    <div style="text-align: center; padding: 40px; color: #999;">
                        <p style="font-size: 16px; font-weight: 600;">Belum ada pendaftar</p>
                    </div>
                @endforelse

                <!-- Pagination -->
                <div class="pagination-wrapper">
                    <div class="pagination-info">
                        Showing {{ $pendaftarTerbaru->firstItem() ?? 0 }} to {{ $pendaftarTerbaru->lastItem() ?? 0 }} of {{ $pendaftarTerbaru->total() }} results
                    </div>
                    <div class="pagination-links">
                        {{-- Previous Page Link --}}
                        @if ($pendaftarTerbaru->onFirstPage())
                            <span class="disabled">‹</span>
                        @else
                            <a href="{{ $pendaftarTerbaru->previousPageUrl() }}">‹</a>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($pendaftarTerbaru->getUrlRange(1, $pendaftarTerbaru->lastPage()) as $page => $url)
                            @if ($page == $pendaftarTerbaru->currentPage())
                                <span class="active">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}">{{ $page }}</a>
                            @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($pendaftarTerbaru->hasMorePages())
                            <a href="{{ $pendaftarTerbaru->nextPageUrl() }}">›</a>
                        @else
                            <span class="disabled">›</span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="right-col">
                <div class="jadwal-card">
    <h3>Jadwal Ekskul</h3>

    @if (isset($jadwals) && $jadwals->count() > 0)

        @foreach ($jadwals->groupBy('ekskul_id') as $ekskulId => $items)
            
            <!-- CARD PER EKSKUL -->
            <div style="margin-bottom: 18px; padding-bottom: 10px; border-bottom: 1px solid #eee;">
                
                <!-- NAMA EKSKUL -->
                <div style="font-weight: 800; color: #5b8deb; margin-bottom: 8px;">
                    {{ $items->first()->ekskul->nama ?? 'Ekskul' }}
                </div>

                <!-- LIST JADWAL -->
                @foreach ($items as $jadwal)
                    <div style="margin-bottom: 10px; font-size: 14px; color:#333;">
                        
                        <i class="fas fa-calendar-alt" style="color:#3b82f6;"></i>
                        {{ ucfirst($jadwal->hari) }}, 
                        {{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} -
                        {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}

                        <!-- LOKASI -->
                        @if ($jadwal->lokasi)
                            <div style="margin-left: 20px; font-size: 13px; color:#666;">
                                <i class="fas fa-map-marker-alt" style="color:#ef4444;"></i>
                                {{ $jadwal->lokasi }}
                            </div>
                        @endif

                    </div>
                @endforeach

            </div>

        @endforeach

    @else
        <div style="color: #888;">
            Belum ada jadwal
        </div>
    @endif
</div>

            </div>

        </div>
    </main>

    <script>
        function filterEkskul(buttonElement, ekskulId) {
            // Remove active class dari semua tombol
            document.querySelectorAll('.filter-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            
            // Tambah active class ke tombol yang diklik
            buttonElement.classList.add('active');

            // Hide/show sections
            document.querySelectorAll('.ekskul-section').forEach(section => {
                if (ekskulId === 'semua') {
                    section.style.display = 'block';
                } else {
                    const sectionId = section.getAttribute('data-ekskul-id');
                    section.style.display = (sectionId == ekskulId) ? 'block' : 'none';
                }
            });
        }
    </script>

    </div><!-- Close app-container -->

</body>

</html> 