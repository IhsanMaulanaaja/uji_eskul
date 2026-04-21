<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartSchool Ekskul - Absensi Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.css">
    <style>
        /* ===== RESET ===== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* ===== BODY ===== */
        body {
            font-family: 'Nunito', -apple-system, BlinkMacSystemFont, sans-serif;
            background: #dce3ea;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* ===== TOP NAVBAR ===== */
        .topnav {
            background: #f5f0e8;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 28px;
            height: 62px;
            position: sticky;
            top: 0;
            z-index: 200;
            border-bottom: 1px solid #e0dbd0;
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
            letter-spacing: -0.2px;
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
        .app-body {
            display: flex;
            flex: 1;
        }

        /* ===== SIDEBAR ===== */
        .sidebar {
            width: 165px;
            background: #a8c4d8;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px 12px 20px;
            min-height: calc(100vh - 62px);
            flex-shrink: 0;
            position: sticky;
            top: 62px;
            height: calc(100vh - 62px);
            overflow-y: auto;
        }

        .sidebar-title {
            font-size: 14px;
            font-weight: 800;
            color: #1a1a1a;
            text-align: center;
            margin-bottom: 14px;
            line-height: 1.35;
        }

        .sidebar-divider {
            width: 100%;
            height: 1px;
            background: rgba(0, 0, 0, 0.13);
            margin-bottom: 8px;
        }

        .sidebar-nav {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 2px;
            flex: 1;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            color: #1a1a2e;
            text-decoration: none;
            transition: background 0.15s;
        }

        .nav-item:hover {
            background: rgba(255, 255, 255, 0.35);
        }

        .nav-item.active {
            background: #ffffff;
            color: #1a1a1a;
            font-weight: 700;
        }

        .nav-item .nav-icon {
            width: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
            flex-shrink: 0;
        }

        .logout-area {
            width: 100%;
            margin-top: 14px;
        }

        .logout-btn {
            width: 100%;
            background: #e63946;
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 10px 14px;
            font-size: 15px;
            font-weight: 800;
            font-family: 'Nunito', sans-serif;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: background 0.15s;
        }

        .logout-btn:hover {
            background: #c1121f;
        }

        /* ===== MAIN CONTENT ===== */
        .main {
            flex: 1;
            padding: 18px 22px 28px;
            display: flex;
            flex-direction: column;
            gap: 14px;
            background: #dce3ea;
            min-width: 0;
        }

        /* ===== CARD CONTAINER ===== */
        .card-container {
            background: #fff;
            border-radius: 12px;
            padding: 24px 28px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
        }

        .dash-header {
            margin-bottom: 16px;
        }

        .dash-header h1 {
            font-size: 26px;
            font-weight: 900;
            color: #1a1a1a;
            margin-bottom: 12px;
        }

        .recap-info {
            font-size: 16px;
            font-weight: 800;
            color: #333;
            display: flex;
            align-items: center;
            gap: 30px;
        }

        /* ===== FILTER ROW ===== */
        .filter-row {
            display: flex;
            align-items: center;
            gap: 15px;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 12px 18px;
            margin-bottom: 16px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .filter-input,
        .filter-select,
        .filter-date {
            border: 1px solid #ccc;
            border-radius: 6px;
            padding: 6px 12px;
            font-size: 13px;
            font-family: 'Nunito', sans-serif;
            outline: none;
            background: #fff;
        }

        .filter-input {
            width: 200px;
        }

        .filter-date {
            width: 140px;
        }

        .filter-select {
            width: 150px;
        }

        /* ===== TABLE ===== */
        .absensi-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
            text-align: center;
        }

        .absensi-table thead tr {
            border-bottom: 2px solid #ddd;
        }

        .absensi-table th {
            font-size: 15px;
            font-weight: 800;
            color: #333;
            padding: 10px 8px;
        }

        .absensi-table td {
            padding: 10px 8px;
            color: #444;
            border-bottom: 1px solid #eee;
            vertical-align: middle;
            font-weight: 600;
        }

        .absensi-table tbody tr:nth-child(even) {
            background-color: #fafafa;
        }

        .absensi-table tr:hover td {
            background-color: #f1f5f9;
        }

        /* ===== BADGES ===== */
        .badge {
            display: inline-block;
            padding: 3px 14px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 800;
            color: #fff;
            width: 80px;
        }

        .badge.hadir {
            background: #22c55e;
        }

        .badge.izin {
            background: #eab308;
        }

        .badge.sakit {
            background: #3b82f6;
        }

        .badge.alpha {
            background: #ef4444;
        }

        /* ===== BUTTONS ===== */
        .btn-edit {
            background: #3b82f6;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 4px 12px;
            font-size: 13px;
            font-weight: 700;
            font-family: 'Nunito', sans-serif;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-edit:hover {
            background: #2563eb;
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

        .ekskul-section {
            margin-bottom: 32px;
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

        /* ===== MODAL ===== */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }

        .modal-content {
            background: #fff;
            padding: 24px;
            border-radius: 10px;
            width: 90%;
            max-width: 400px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .modal-header {
            font-size: 18px;
            font-weight: 800;
            margin-bottom: 16px;
            color: #222;
        }

        .form-group-modal {
            margin-bottom: 16px;
        }

        .form-group-modal label {
            display: block;
            margin-bottom: 6px;
            font-size: 14px;
            font-weight: 700;
            color: #444;
        }

        .form-control {
            width: 100%;
            padding: 8px 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-family: inherit;
            font-size: 14px;
        }

        .modal-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 20px;
        }

        .btn-cancel {
            background: #e2e8f0;
            color: #475569;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 700;
        }

        .btn-save {
            background: #3b82f6;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 700;
        }

        .btn-cancel:hover {
            background: #cbd5e1;
        }

        .btn-save:hover {
            background: #2563eb;
        }

        /* ===== FILTER BAR EKSTRAKURIKULER ===== */
        .filter-bar {
            background: #fff;
            border-radius: 12px;
            padding: 16px 24px;
            margin-bottom: 20px;
            margin-top: 20px;
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

        /* ===== GPS LOCATION BUTTON ===== */
        .btn-lokasi {
            background: #10b981;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 4px 12px;
            font-size: 13px;
            font-weight: 700;
            font-family: 'Nunito', sans-serif;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: background 0.15s;
        }

        .btn-lokasi:hover {
            background: #059669;
        }

        .btn-lokasi:disabled {
            background: #cbd5e1;
            cursor: not-allowed;
        }

        /* ===== LOCATION MODAL ===== */
        .location-modal-content {
            background: #fff;
            padding: 24px;
            border-radius: 10px;
            width: 90%;
            max-width: 700px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            max-height: 90vh;
            overflow-y: auto;
        }

        .location-modal-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 16px;
            padding-bottom: 12px;
            border-bottom: 1px solid #e5e7eb;
        }

        .location-modal-header h2 {
            font-size: 18px;
            font-weight: 800;
            color: #222;
            margin: 0;
        }

        .location-close-btn {
            background: none;
            border: none;
            font-size: 24px;
            color: #999;
            cursor: pointer;
            padding: 0;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .location-close-btn:hover {
            color: #333;
        }

        .location-info {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 12px;
            margin-bottom: 16px;
            font-size: 13px;
            color: #555;
        }

        .location-info-item {
            display: flex;
            justify-content: space-between;
            padding: 6px 0;
            border-bottom: 1px solid #e2e8f0;
        }

        .location-info-item:last-child {
            border-bottom: none;
        }

        .location-info-label {
            font-weight: 700;
            color: #333;
            min-width: 100px;
        }

        .location-map {
            width: 100%;
            height: 400px;
            border-radius: 8px;
            border: 1px solid #cbd5e1;
            margin-bottom: 16px;
            z-index: 1;
        }
    </style>
</head>

<body>
    <nav class="topnav">
        <div class="topnav-brand">
            <img src="{{ asset('assets/image9.png') }}" width="38" height="38" alt="Logo"
                style="border-radius: 4px;">
            <div class="brand-text"><b>SmartSchool</b> Ekskul</div>
        </div>
        <div class="topnav-right">
            <div class="bell-icon"><i class="fas fa-bell"></i></div>
            <button class="user-btn">{{ Auth::user()->name ?? 'Theo' }} <i class="fas fa-chevron-down"
                    style="font-size:13px;"></i></button>
        </div>
    </nav>

    <div class="app-body">
        <aside class="sidebar">
            <img src="{{ asset('assets/image3.png') }}" width="100" height="100" alt="Logo"
                style="margin-bottom: 8px; border-radius: 6px;">
            <div class="sidebar-title">SmartSchool Ekskul</div>
            <div class="sidebar-divider"></div>
            <nav class="sidebar-nav">
                @if($user?->role === 'pembina')
                    <!-- PEMBINA SIDEBAR -->
                    <a class="nav-item" href="{{ route('dashboard-pembina') }}">
                        <span class="nav-icon"><i class="fas fa-home"></i></span>
                        Beranda
                    </a>
                    <a class="nav-item" href="{{ route('pendaftaran-ekskul') }}">
                        <span class="nav-icon"><i class="fas fa-clipboard-list"></i></span>
                        Pendaftar
                    </a>
                    <a class="nav-item" href="{{ route('anggota-admin') }}">
                        <span class="nav-icon"><i class="fas fa-users"></i></span>
                        Kelola Siswa
                    </a>
                    <a class="nav-item" href="{{ route('jadwal-admin') }}">
                        <span class="nav-icon"><i class="fas fa-calendar"></i></span>
                        Jadwal Latihan
                    </a>
                    <a class="nav-item active" href="{{ route('absensi-admin') }}">
                        <span class="nav-icon"><i class="fas fa-calendar-check"></i></span>
                        Absensi
                    </a>
                    <a class="nav-item" href="{{ route('prestasi-admin') }}">
                        <span class="nav-icon"><i class="fas fa-medal"></i></span>
                        Kegiatan &amp; Prestasi
                    </a>
                    <a class="nav-item" href="{{ route('pengumuman.index') }}">
                        <span class="nav-icon"><i class="fas fa-bullhorn"></i></span>
                        Pengumuman
                    </a>
                    <a class="nav-item" href="{{ route('nilai.index') }}">
                        <span class="nav-icon"><i class="fas fa-star"></i></span>
                        Nilai Siswa
                    </a>
                @else
                    <!-- ADMIN SIDEBAR -->
                    <a class="nav-item" href="{{ route('dashboard-admin') }}">
                        <span class="nav-icon"><i class="fas fa-home"></i></span>
                        Beranda
                    </a>
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
                    <a class="nav-item" href="{{ route('pendaftaran-ekskul') }}">
                        <span class="nav-icon"><i class="fas fa-clipboard-list"></i></span>
                        Pendaftar
                    </a>
                    <a class="nav-item" href="{{ route('jadwal-admin') }}">
                        <span class="nav-icon"><i class="fas fa-calendar"></i></span>
                        Jadwal Latihan
                    </a>
                    <a class="nav-item" href="{{ route('jadwal-admin') }}">
                        <span class="nav-icon"><i class="fas fa-calendar"></i></span>
                        Jadwal Latihan
                    </a>
                    <a class="nav-item active" href="{{ route('absensi-admin') }}">
                        <span class="nav-icon"><i class="fas fa-calendar-check"></i></span>
                        Absensi
                    </a>
                    <a class="nav-item" href="{{ route('prestasi-admin') }}">
                        <span class="nav-icon"><i class="fas fa-medal"></i></span>
                        Kegiatan &amp; Prestasi
                    </a>
                @endif
            </nav>
            <div class="logout-area">
                <form method="POST" action="{{ route('logout') }}" style="width:100%;">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </aside>

        <main class="main">

            <div class="card-container">
                <div class="dash-header">
                    <h1>Absensi {{ $ekskulName ?? 'Murid - Per Ekstrakurikuler' }}</h1>
                    <div class="recap-info">
                        @php \Carbon\Carbon::setLocale('id'); @endphp
                        <span>{{ \Carbon\Carbon::parse($tanggal ?? now())->translatedFormat('l, d F Y') }}</span>
                        <span>Total Data: {{ $absensiList->total() }}</span>
                    </div>
                </div>

                <form class="filter-row" method="GET" action="{{ route('absensi-admin') }}">
                    <input type="text" name="nama" class="filter-input" placeholder="Cari Nama Siswa" value="{{ request('nama') }}">
                    <input type="date" name="tanggal" class="filter-date" value="{{ request('tanggal', \Carbon\Carbon::now()->format('Y-m-d')) }}">
                    <select name="status" class="filter-select">
                        <option value="semua" {{ request('status') === 'semua' ? 'selected' : '' }}>Semua Status</option>
                        <option value="hadir" {{ request('status') === 'hadir' ? 'selected' : '' }}>Hadir</option>
                        <option value="izin" {{ request('status') === 'izin' ? 'selected' : '' }}>Izin</option>
                        <option value="sakit" {{ request('status') === 'sakit' ? 'selected' : '' }}>Sakit</option>
                        <option value="alfa" {{ request('status') === 'alfa' ? 'selected' : '' }}>Alpha</option>
                    </select>
                    <button type="submit" class="btn-save" style="padding: 6px 16px;">Filter</button>
                    <a href="{{ route('absensi-admin') }}" class="btn-cancel" style="padding: 6px 16px; text-decoration: none; display: inline-block;">Reset</a>
                </form>

                @php
                    // Group absensi by ekstrakurikuler
                    $groupedByEkskul = $absensiList->groupBy('ekskul_id');
                @endphp

                <!-- Filter Bar Ekstrakurikuler - hanya tampil jika admin atau pembina dengan lebih dari 1 ekskul -->
                @if (!$isPembina || count($ekskulNames) > 1)
                <div class="filter-bar">
                    <span class="filter-label">Pilih Ekstrakurikuler:</span>
                    <div class="filter-buttons">
                        <button class="filter-btn active" data-filter-id="semua" onclick="filterEkskul(this, 'semua')">
                            Semua
                        </button>
                        @foreach($ekskuls as $ekskul)
                            <button class="filter-btn" data-filter-id="{{ $ekskul->id }}" onclick="filterEkskul(this, '{{ $ekskul->id }}')">
                                {{ $ekskul->nama }}
                            </button>
                        @endforeach
                    </div>
                </div>
                @endif

                @forelse($groupedByEkskul as $ekskulId => $absensiByEkskul)
                    <div class="ekskul-section" data-ekskul-id="{{ $ekskulId }}">
                        <div class="ekskul-title">
                            <span class="ekskul-badge">{{ $absensiByEkskul->first()->ekskul->nama ?? 'N/A' }}</span>
                            <span style="color: #888; font-size: 14px;">({{ $absensiByEkskul->count() }} siswa)</span>
                        </div>
                        
                        <table class="absensi-table" style="margin-bottom: 0;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Siswa</th>
                                    <th>Kelas</th>
                                    <th>Status</th>
                                    <th>Keterangan</th>
                                    <th>Lokasi</th>
                                    @if($user?->role === 'pembina')
                                    <th>Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($absensiByEkskul as $index => $absensi)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $absensi->user->name ?? '-' }}</td>
                                        <td>{{ $absensi->user->kelas ?? '-' }}</td>
                                        <td>
                                            @if ($absensi->status === 'hadir')
                                                <span class="badge hadir">Hadir</span>
                                            @elseif ($absensi->status === 'izin')
                                                <span class="badge izin">Izin</span>
                                            @elseif ($absensi->status === 'sakit')
                                                <span class="badge sakit">Sakit</span>
                                            @else
                                                <span class="badge alpha">Alpha</span>
                                            @endif
                                        </td>
                                        <td>{{ $absensi->keterangan ?? '-' }}</td>
                                        <td>
                                            @if ($absensi->latitude && $absensi->longitude)
                                                <button type="button" class="btn-lokasi" 
                                                    onclick="openLocationModal('{{ $absensi->id }}', '{{ $absensi->user->name }}', '{{ $absensi->latitude }}', '{{ $absensi->longitude }}', '{{ $absensi->accuracy ?? '' }}', '{{ $absensi->gps_timestamp ?? '' }}')">
                                                    <i class="fas fa-map-pin"></i> Lihat
                                                </button>
                                            @else
                                                <span style="color: #999; font-size: 12px;">Tidak ada data</span>
                                            @endif
                                        </td>
                                        @if($user?->role === 'pembina')
                                        <td><button type="button" class="btn-edit"
                                                onclick="openModal('{{ $absensi->id }}', '{{ $absensi->status }}', '{{ addslashes($absensi->keterangan) }}')">Edit</button>
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @empty
                    <div style="text-align: center; padding: 40px; color: #999;">
                        <p style="font-size: 16px; font-weight: 600;">Belum ada data absensi</p>
                    </div>
                @endforelse

                <!-- Pagination -->
                <div class="pagination-wrapper">
                    <div class="pagination-info">
                        Showing {{ $absensiList->firstItem() ?? 0 }} to {{ $absensiList->lastItem() ?? 0 }} of {{ $absensiList->total() }} results
                    </div>
                    <div class="pagination-links">
                        {{-- Previous Page Link --}}
                        @if ($absensiList->onFirstPage())
                            <span class="disabled">‹</span>
                        @else
                            <a href="{{ $absensiList->previousPageUrl() }}">‹</a>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($absensiList->getUrlRange(1, $absensiList->lastPage()) as $page => $url)
                            @if ($page == $absensiList->currentPage())
                                <span class="active">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}">{{ $page }}</a>
                            @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($absensiList->hasMorePages())
                            <a href="{{ $absensiList->nextPageUrl() }}">›</a>
                        @else
                            <span class="disabled">›</span>
                        @endif
                    </div>
                </div>
            </div>

        </main>
    </div>

    @if($user?->role === 'pembina')
    <!-- Edit Modal -->
    <div class="modal-overlay" id="editModal">
        <div class="modal-content">
            <div class="modal-header">Edit Absensi Siswa</div>
            <form id="editForm" method="POST" action="">
                @csrf
                @method('PUT')
                <div class="form-group-modal">
                    <label for="editStatus">Status</label>
                    <select name="status" id="editStatus" class="form-control" required>
                        <option value="hadir">Hadir</option>
                        <option value="izin">Izin</option>
                        <option value="sakit">Sakit</option>
                        <option value="alfa">Alpha</option>
                    </select>
                </div>
                <div class="form-group-modal">
                    <label for="editKeterangan">Keterangan</label>
                    <textarea name="keterangan" id="editKeterangan" class="form-control" rows="3"
                        placeholder="Masukkan keterangan (opsional)"></textarea>
                </div>
                <div class="modal-actions">
                    <button type="button" class="btn-cancel" onclick="closeModal()">Batal</button>
                    <button type="submit" class="btn-save">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    @endif

    <!-- Location Map Modal -->
    <div class="modal-overlay" id="locationModal">
        <div class="location-modal-content">
            <div class="location-modal-header">
                <h2><i class="fas fa-map-pin"></i> Lokasi Absensi - <span id="locationSiswaName"></span></h2>
                <button class="location-close-btn" onclick="closeLocationModal()">&times;</button>
            </div>

            <div class="location-info">
                <div class="location-info-item">
                    <span class="location-info-label">Latitude:</span>
                    <span id="locationLatitude">-</span>
                </div>
                <div class="location-info-item">
                    <span class="location-info-label">Longitude:</span>
                    <span id="locationLongitude">-</span>
                </div>
                <div class="location-info-item">
                    <span class="location-info-label">Akurasi:</span>
                    <span id="locationAccuracy">-</span>
                </div>
                <div class="location-info-item">
                    <span class="location-info-label">Waktu:</span>
                    <span id="locationTimestamp">-</span>
                </div>
            </div>

            <div id="locationMap" class="location-map"></div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.js"></script>
    <script>
        @if($user?->role === 'pembina')
        function openModal(id, status, keterangan) {
            document.getElementById('editModal').style.display = 'flex';
            document.getElementById('editForm').action = '/absensi-ekskul/' + id;
            document.getElementById('editStatus').value = status;
            document.getElementById('editKeterangan').value = keterangan ? keterangan : '';
        }

        function closeModal() {
            document.getElementById('editModal').style.display = 'none';
        }
        @endif

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

        // Location Modal Functions
        let locationMap = null;
        let locationMarker = null;

        function openLocationModal(absentiId, siswaName, latitude, longitude, accuracy, timestamp) {
            document.getElementById('locationModal').style.display = 'flex';
            document.getElementById('locationSiswaName').textContent = siswaName;
            document.getElementById('locationLatitude').textContent = parseFloat(latitude).toFixed(8);
            document.getElementById('locationLongitude').textContent = parseFloat(longitude).toFixed(8);
            document.getElementById('locationAccuracy').textContent = accuracy ? parseFloat(accuracy).toFixed(2) + ' meter' : 'N/A';
            document.getElementById('locationTimestamp').textContent = timestamp ? new Date(timestamp).toLocaleString('id-ID') : 'N/A';

            // Initialize map if not exists or update
            setTimeout(() => {
                if (locationMap) {
                    locationMap.remove();
                }

                locationMap = L.map('locationMap').setView([latitude, longitude], 17);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '© OpenStreetMap contributors',
                    maxZoom: 19
                }).addTo(locationMap);

                if (locationMarker) {
                    locationMap.removeLayer(locationMarker);
                }

                locationMarker = L.circleMarker([latitude, longitude], {
                    color: '#ef4444',
                    fillColor: '#ef4444',
                    fillOpacity: 0.7,
                    radius: 14,
                    weight: 3
                }).addTo(locationMap).bindPopup('<strong>' + siswaName + '</strong><br>Lokasi Absensi').openPopup();

                // Add a larger accuracy circle if accuracy data exists
                if (accuracy && accuracy > 0) {
                    L.circle([latitude, longitude], {
                        color: '#3b82f6',
                        fillColor: '#3b82f6',
                        fillOpacity: 0.2,
                        radius: parseFloat(accuracy),
                        weight: 2,
                        dashArray: '5, 5'
                    }).addTo(locationMap);
                }
            }, 100);
        }

        function closeLocationModal() {
            document.getElementById('locationModal').style.display = 'none';
            if (locationMap) {
                locationMap.remove();
                locationMap = null;
            }
        }

        // Close location modal when overlay is clicked
        document.getElementById('locationModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeLocationModal();
            }
        });
    </script>
</body>

</html>
