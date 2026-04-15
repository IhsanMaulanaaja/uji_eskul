<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartSchool Ekskul - Dashboard Pembina</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
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

        /* TOP NAVBAR */
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
        }

        .topnav-right {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .bell-icon { font-size: 22px; color: #222; cursor: pointer; }

        .user-btn {
            background: #3a7bd5;
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

        /* LAYOUT */
        .app-body {
            display: flex;
            flex: 1;
        }

        /* SIDEBAR */
        .sidebar {
            width: 200px;
            background: #a8c4d8;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 22px 12px 20px;
            min-height: calc(100vh - 62px);
            flex-shrink: 0;
            position: sticky;
            top: 62px;
            height: calc(100vh - 62px);
            overflow-y: auto;
        }

        .sidebar-logo {
            width: 100px;
            height: 100px;
            margin-bottom: 8px;
            border-radius: 6px;
        }

        .sidebar-title {
            font-size: 13.5px;
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
            font-weight: 800;
        }

        .nav-icon {
            width: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
            flex-shrink: 0;
        }

        .logout-area {
            width: 100%;
            padding: 0 10px;
            display: flex;
            align-items: center;
            gap: 12px;
            margin-top: auto;
        }

        .logout-btn {
            background: #e63946;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 10px 16px;
            font-size: 13px;
            font-weight: 800;
            font-family: inherit;
            cursor: pointer;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        /* MAIN */
        .main {
            flex: 1;
            padding: 24px 32px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        /* WELCOME CARD */
        .welcome-card {
            background: #fff;
            border-radius: 12px;
            padding: 20px 24px;
            display: flex;
            gap: 16px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.06);
        }

        .avatar-circle {
            width: 46px;
            height: 46px;
            border-radius: 50%;
            background: #c8c8c8;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            color: #555;
            flex-shrink: 0;
        }

        .welcome-content h2 {
            font-size: 18px;
            font-weight: 800;
            color: #111;
            margin-bottom: 4px;
        }

        .welcome-content p {
            font-size: 13px;
            color: #666;
            margin-bottom: 8px;
        }

        .badge-pembina {
            display: inline-block;
            background: #fcd34d;
            color: #91633e;
            padding: 2px 10px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 700;
        }

        /* STATS */
        .stats-row {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
        }

        .stat-card {
            background: #fff;
            border-radius: 12px;
            padding: 18px 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .stat-card h3 {
            font-size: 13px;
            font-weight: 600;
            color: #666;
            margin-bottom: 8px;
        }

        .stat-card .number {
            font-size: 32px;
            font-weight: 900;
            color: #111;
        }

        .stat-card.pending .number { color: #f59e0b; }
        .stat-card.approved .number { color: #10b981; }
        .stat-card.rejected .number { color: #ef4444; }
        .stat-card.members .number { color: #3b82f6; }

        /* CONTENT GRID */
        .content-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 20px;
        }

        /* CARD */
        .card {
            background: #fff;
            border-radius: 12px;
            padding: 20px 24px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .card h3 {
            font-size: 18px;
            font-weight: 800;
            color: #111;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* TABLE */
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        th {
            background: #f8fafc;
            padding: 12px;
            text-align: left;
            font-weight: 800;
            color: #111;
            border-bottom: 2px solid #f1f5f9;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #f1f5f9;
            color: #333;
        }

        tr:hover { background: #f8fafc; }

        .badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 700;
        }

        .badge-pending { background: #fef3c7; color: #92400e; }
        .badge-approved { background: #d1fae5; color: #065f46; }
        .badge-rejected { background: #fee2e2; color: #7f1d1d; }

        .btn-sm {
            padding: 6px 12px;
            border: none;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            background: #3b82f6;
            color: #fff;
            text-decoration: none;
            display: inline-block;
        }

        .btn-sm:hover { background: #2563eb; }

        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: #999;
        }

        .empty-state i {
            font-size: 48px;
            margin-bottom: 12px;
            opacity: 0.5;
        }

        .empty-state p {
            font-size: 14px;
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
            <button class="user-btn">{{ Auth::user()->name ?? 'Pembina' }} <i class="fas fa-chevron-down" style="font-size:13px;"></i></button>
        </div>
    </nav>

    <div class="app-body">

        <!-- SIDEBAR -->
        <aside class="sidebar">
            <img src="{{ asset('assets/image3.png') }}" class="sidebar-logo" alt="Logo">
            <div class="sidebar-title">SmartSchool Ekskul</div>
            <div class="sidebar-divider"></div>

            <nav class="sidebar-nav">
                <a class="nav-item {{ request()->routeIs('dashboard-pembina') ? 'active' : '' }}" href="{{ route('dashboard-pembina') }}">
                    <span class="nav-icon"><i class="fas fa-home"></i></span>
                    Beranda
                </a>
                <a class="nav-item {{ request()->routeIs('pendaftaran-ekskul') ? 'active' : '' }}" href="{{ route('pendaftaran-ekskul') }}">
                    <span class="nav-icon"><i class="fas fa-clipboard-list"></i></span>
                    Pendaftar
                </a>
                <a class="nav-item {{ request()->routeIs('anggota-admin') ? 'active' : '' }}" href="{{ route('anggota-admin') }}">
                    <span class="nav-icon"><i class="fas fa-users"></i></span>
                    Kelola Siswa
                </a>
                <a class="nav-item {{ request()->routeIs('jadwal-admin') ? 'active' : '' }}" href="{{ route('jadwal-admin') }}">
                    <span class="nav-icon"><i class="fas fa-calendar"></i></span>
                    Jadwal Latihan
                </a>
                <a class="nav-item {{ request()->routeIs('absensi-admin') ? 'active' : '' }}" href="{{ route('absensi-admin') }}">
                    <span class="nav-icon"><i class="fas fa-calendar-check"></i></span>
                    Absensi
                </a>
                <a class="nav-item {{ request()->routeIs('prestasi-admin') ? 'active' : '' }}" href="{{ route('prestasi-admin') }}">
                    <span class="nav-icon"><i class="fas fa-trophy"></i></span>
                    Kegiatan & Prestasi
                </a>
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

        <!-- MAIN CONTENT -->
        <main class="main">

            @if(!$ekskul)
                <div class="empty-state" style="margin: 60px auto;">
                    <i class="fas fa-info-circle"></i>
                    <p>Belum ada ekstrakurikuler yang ditugaskan ke akun pembina ini.</p>
                    <p style="font-size: 12px; margin-top: 8px; opacity: 0.7;">Hubungi admin untuk menambahkan ekstrakurikuler.</p>
                </div>
            @else

                <!-- WELCOME -->
                <div class="welcome-card">
                    <div class="avatar-circle"><i class="fas fa-user"></i></div>
                    <div class="welcome-content">
                        <h2>Halo {{ Auth::user()->name }}! <span class="badge-pembina">Pembina</span></h2>
                        <p><strong>{{ $ekskul->nama }}</strong></p>
                        <p style="font-size: 12px; margin-bottom: 0;"><i class="far fa-clock" style="margin-right: 6px;"></i>{{ \Carbon\Carbon::now()->locale('en')->isoFormat('dddd, DD MMMM YYYY') }}</p>
                    </div>
                </div>

                <!-- STATS ROW -->
                <div class="stats-row">
                    <div class="stat-card pending">
                        <h3>📋 Menunggu Verifikasi</h3>
                        <div class="number">{{ $totalMenunggu }}</div>
                    </div>
                    <div class="stat-card approved">
                        <h3>✅ Diterima</h3>
                        <div class="number">{{ $totalDiterima }}</div>
                    </div>
                    <div class="stat-card rejected">
                        <h3>❌ Ditolak</h3>
                        <div class="number">{{ $totalDitolak }}</div>
                    </div>
                    <div class="stat-card members">
                        <h3>👥 Anggota Aktif</h3>
                        <div class="number">{{ $totalAnggota }}</div>
                    </div>
                </div>

                <!-- CONTENT GRID -->
                <div class="content-grid">

                    <!-- PENDAFTARAN TERBARU -->
                    <div class="card">
                        <h3>
                            <i class="fas fa-inbox"></i>
                            Pendaftaran Terbaru
                        </h3>

                        @if($pendaftaranTerbaru->count() > 0)
                            <table>
                                <thead>
                                    <tr>
                                        <th>Nama Siswa</th>
                                        <th>Kelas</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pendaftaranTerbaru as $pendaftar)
                                        <tr>
                                            <td>{{ $pendaftar->user->name }}</td>
                                            <td>{{ $pendaftar->user->kelas ?? '-' }}</td>
                                            <td>
                                                @if($pendaftar->status === 'menunggu')
                                                    <span class="badge badge-pending">Menunggu</span>
                                                @elseif($pendaftar->status === 'disetujui')
                                                    <span class="badge badge-approved">Disetujui</span>
                                                @else
                                                    <span class="badge badge-rejected">Ditolak</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('pendaftaran-ekskul') }}" class="btn-sm">Lihat Detail</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="empty-state">
                                <p>Belum ada pendaftaran</p>
                            </div>
                        @endif
                    </div>

                    <!-- RIGHT COLUMN -->
                    <div style="display: flex; flex-direction: column; gap: 20px;">

                        <!-- JADWAL LATIHAN -->
                        <div class="card">
                            <h3><i class="fas fa-calendar-alt"></i> Jadwal Latihan</h3>
                            @if($jadwalLatihan->count() > 0)
                                <div style="display: flex; flex-direction: column; gap: 12px;">
                                    @foreach($jadwalLatihan as $jadwal)
                                        <div style="padding: 12px 14px; background: #f0f7ff; border-left: 4px solid #3b82f6; border-radius: 6px;">
                                            <p style="font-size: 13px; font-weight: 700; color: #111;">
                                                <i class="fas fa-circle-check" style="color: #3b82f6; margin-right: 6px;"></i>
                                                {{ ucfirst($jadwal->hari) }}
                                            </p>
                                            <p style="font-size: 12px; color: #666; margin-top: 2px;">
                                                <i class="fas fa-clock" style="color: #f59e0b; margin-right: 6px;"></i>
                                                {{ date('H:i', strtotime($jadwal->jam_mulai)) }} - {{ date('H:i', strtotime($jadwal->jam_selesai)) }}
                                            </p>
                                            @if($jadwal->lokasi)
                                                <p style="font-size: 12px; color: #666; margin-top: 2px;">
                                                    <i class="fas fa-map-marker-alt" style="color: #ef4444; margin-right: 6px;"></i>
                                                    {{ $jadwal->lokasi }}
                                                </p>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="empty-state" style="padding: 20px;">
                                    <p>Belum ada jadwal latihan</p>
                                </div>
                            @endif
                        </div>

                        <!-- ABSENSI HARI INI -->
                        <div class="card">
                            <h3><i class="fas fa-check-circle"></i> Absensi Hari Ini</h3>
                            <div style="font-size: 32px; font-weight: 900; color: #10b981; margin-bottom: 8px;">
                                {{ $hadirHariIni }}<span style="font-size: 16px; color: #666;">/{{ $absensiHariIni }}</span>
                            </div>
                            <p style="font-size: 13px; color: #666;">Siswa yang hadir hari ini</p>
                            <a href="{{ route('absensi-admin') }}" class="btn-sm" style="margin-top: 12px;">Kelola Absensi</a>
                        </div>

                        <!-- PRESTASI TERBARU -->
                        <div class="card">
                            <h3><i class="fas fa-trophy"></i> Prestasi Terbaru</h3>
                            @if($prestasiTerbaru->count() > 0)
                                @foreach($prestasiTerbaru as $prestasi)
                                    <div style="padding: 10px 0; border-bottom: 1px solid #eee;">
                                        <p style="font-size: 13px; font-weight: 700; color: #111;">{{ $prestasi->judul ?? 'Prestasi' }}</p>
                                        <p style="font-size: 12px; color: #666;">{{ \Carbon\Carbon::parse($prestasi->created_at)->format('d M Y') }}</p>
                                    </div>
                                @endforeach
                                <a href="{{ route('prestasi-admin') }}" class="btn-sm" style="margin-top: 12px;">Lihat Semua</a>
                            @else
                                <div class="empty-state" style="padding: 20px;">
                                    <p>Belum ada prestasi</p>
                                </div>
                            @endif
                        </div>

                    </div>

                </div>

            @endif

        </main>

    </div>

</body>

</html>
