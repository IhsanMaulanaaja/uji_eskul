<!DOCTYPE html>
<html lang="id">

<head>
    @php
        use Carbon\Carbon;
        use Illuminate\Support\Str;
    @endphp
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartSchool Ekskul - Dashboard</title>
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

        /* ===== LAYOUT ===== */
        .app-body {
            display: flex;
            flex: 1;
        }

        /* ===== SIDEBAR ===== */
        .sidebar {
            width: 235px;
            background: #a8c4d8;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 24px 14px 20px;
            min-height: calc(100vh - 62px);
            flex-shrink: 0;
            position: sticky;
            top: 62px;
            height: calc(100vh - 62px);
            overflow-y: auto;
        }

        .logo-wrapper {
            position: relative;
            width: 126px;
            height: 126px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 8px;
            flex-shrink: 0;
        }

        .logo-wrapper svg.dashed-circle {
            position: absolute;
            top: 0;
            left: 0;
            width: 126px;
            height: 126px;
        }

        .logo-icons {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0px;
            z-index: 1;
        }

        .logo-icons .top-row {
            display: flex;
            gap: 12px;
            align-items: center;
            margin-bottom: 0px;
        }

        .logo-icons .icon-grad {
            font-size: 46px;
            line-height: 1;
            margin: -4px 0 -2px;
        }

        .sidebar-title {
            font-size: 14.5px;
            font-weight: 800;
            color: #1a1a1a;
            text-align: center;
            margin-bottom: 16px;
            line-height: 1.35;
        }

        .sidebar-divider {
            width: 100%;
            height: 1px;
            background: rgba(0, 0, 0, 0.13);
            margin-bottom: 10px;
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
            gap: 12px;
            padding: 11px 16px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 15.5px;
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
            width: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
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
            border-radius: 12px;
            padding: 12px 16px;
            font-size: 15px;
            font-weight: 800;
            font-family: 'Nunito', sans-serif;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: background 0.15s;
        }

        .logout-btn:hover {
            background: #c1121f;
        }

        /* ===== MAIN ===== */
        .main {
            flex: 1;
            padding: 18px 22px 28px;
            display: flex;
            flex-direction: column;
            gap: 14px;
            background: #dce3ea;
            min-width: 0;
        }

        /* ===== WELCOME CARD ===== */
        .welcome-card {
            background: #fff;
            border-radius: 12px;
            padding: 15px 20px;
            display: flex;
            align-items: center;
            gap: 14px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.07);
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
            border: 2px solid #aaa;
        }

        .welcome-top {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 3px;
        }

        .welcome-top h2 {
            font-size: 16px;
            font-weight: 800;
            color: #1a1a1a;
        }

        .badge-murid {
            background: #e8e8e8;
            color: #555;
            font-size: 11px;
            font-weight: 600;
            padding: 2px 10px;
            border-radius: 20px;
            border: 1px solid #ddd;
        }

        .welcome-date {
            font-size: 11.5px;
            color: #888;
            margin-bottom: 4px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .welcome-desc {
            font-size: 12.5px;
            color: #777;
        }

        /* ===== STATS ===== */
        .stats-row {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 14px;
        }

        .stat-card {
            border-radius: 12px;
            padding: 16px 20px;
            display: flex;
            align-items: center;
            gap: 14px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.08);
            min-height: 82px;
        }

        .stat-card.red {
            background: #d96060;
        }

        .stat-card.yellow {
            background: #c9b84e;
        }

        .stat-card.green {
            background: #7aba7a;
        }

        .cal-box {
            background: #fff;
            border-radius: 7px;
            width: 44px;
            height: 44px;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            flex-shrink: 0;
        }

        .cal-box .cal-header {
            background: #c9b84e;
            color: #fff;
            font-size: 8.5px;
            font-weight: 800;
            text-align: center;
            padding: 2px 0;
            letter-spacing: 0.5px;
        }

        .cal-box .cal-num {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 19px;
            font-weight: 900;
            color: #c9b84e;
            line-height: 1;
        }

        .stat-icon-wrap {
            font-size: 30px;
            flex-shrink: 0;
        }

        .stat-info {
            color: #fff;
        }

        .stat-info .stat-label {
            font-size: 11.5px;
            font-weight: 600;
            opacity: 0.95;
            margin-bottom: 1px;
            line-height: 1.3;
        }

        .stat-info .stat-number {
            font-size: 32px;
            font-weight: 900;
            line-height: 1;
        }

        /* ===== CARD ===== */
        .card {
            background: #fff;
            border-radius: 12px;
            padding: 18px 20px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.07);
        }

        .card-title {
            font-size: 14.5px;
            font-weight: 800;
            color: #1a1a1a;
            margin-bottom: 13px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* ===== EKSKUL SAYA ===== */
        .ekskul-table {
            width: 100%;
            border-collapse: collapse;
        }

        .ekskul-table td {
            font-size: 13.5px;
            color: #222;
            padding: 4px 0;
            vertical-align: middle;
        }

        .ek-name {
            font-weight: 600;
            min-width: 75px;
        }

        .ek-dash {
            color: #888;
            padding: 0 6px;
        }

        .ek-schedule {
            color: #333;
        }

        .ek-dash2 {
            color: #888;
            padding: 0 6px;
        }

        .ek-status {
            font-weight: 800;
            color: #1a1a1a;
        }

        /* ===== PENDAFTARAN STATUS ===== */
        .pendaftaran-table {
            width: 100%;
            border-collapse: collapse;
        }

        .pendaftaran-table td {
            font-size: 13.5px;
            color: #222;
            padding: 4px 0;
            vertical-align: middle;
        }

        .pend-ekskul {
            font-weight: 600;
            min-width: 100px;
        }

        .pend-dash {
            color: #888;
            padding: 0 6px;
        }

        .pend-status {
            font-weight: 700;
        }

        .pend-reason {
            color: #ef4444;
            font-size: 12px;
            font-weight: 600;
        }

        .status-badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 700;
        }

        .badge-pending {
            background: #fef3c7;
            color: #b45309;
        }

        .badge-accepted {
            background: #dcfce7;
            color: #166534;
        }

        .badge-rejected {
            background: #fee2e2;
            color: #991b1b;
        }

        /* ===== NILAI SISWA ===== */
        .nilai-table {
            width: 100%;
            border-collapse: collapse;
        }

        .nilai-table td {
            font-size: 13.5px;
            color: #222;
            padding: 4px 0;
            vertical-align: middle;
        }

        .nilai-ekskul {
            font-weight: 600;
            min-width: 100px;
        }

        .nilai-dash {
            color: #888;
            padding: 0 6px;
        }

        .nilai-grade {
            font-weight: 700;
        }

        .grade-a {
            background: #dcfce7;
            color: #166534;
            display: inline-block;
            padding: 4px 10px;
            border-radius: 6px;
            font-weight: 800;
        }

        .grade-b {
            background: #dbeafe;
            color: #1e40af;
            display: inline-block;
            padding: 4px 10px;
            border-radius: 6px;
            font-weight: 800;
        }

        .grade-c {
            background: #fef3c7;
            color: #b45309;
            display: inline-block;
            padding: 4px 10px;
            border-radius: 6px;
            font-weight: 800;
        }

        /* ===== TWO COL ===== */
        .two-col {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
        }

        .jadwal-item {
            font-size: 13.5px;
            color: #333;
            padding: 5px 0;
            line-height: 1.5;
        }

        .pengumuman-item {
            font-size: 13.5px;
            color: #333;
            padding: 3px 0;
            display: flex;
            align-items: flex-start;
            gap: 6px;
            line-height: 1.5;
        }

        .pengumuman-item::before {
            content: '•';
            font-size: 16px;
            font-weight: 900;
            flex-shrink: 0;
        }

        .notif-item {
            font-size: 13.5px;
            color: #333;
            padding: 4px 0;
            display: flex;
            align-items: center;
            gap: 6px;
            line-height: 1.5;
        }

        .notif-item::before {
            content: '•';
            font-size: 16px;
            font-weight: 900;
            flex-shrink: 0;
        }
    </style>
</head>

<body>

    <!-- TOP NAVBAR -->
    <nav class="topnav">
        <div class="topnav-brand">
            <img src="{{ asset('assets/image9.png') }}" width="38" height="38" alt="Logo"
                style="border-radius: 4px;">
            <div class="brand-text"><b>SmartSchool</b> Ekskul</div>
        </div>
        <div class="topnav-right">
            <div class="bell-icon"><i class="fas fa-bell"></i></div>
            <button class="user-btn">{{ Auth::user()->name ?? 'Siswa' }} <i class="fas fa-chevron-down"
                    style="font-size:13px;"></i></button>
        </div>
    </nav>

    <div class="app-body">

        <!-- SIDEBAR -->
        <aside class="sidebar">
            <img src="{{ asset('assets/image3.png') }}" width="100" height="100" alt="Leaf logo"
                style="margin-bottom:8px;" />
            <div class="sidebar-title">SmartSchool Ekskul</div>
            <div class="sidebar-divider"></div>

            <nav class="sidebar-nav">
                <a class="nav-item {{ request()->routeIs('dashboard-siswa') ? 'active' : '' }}"
                    href="{{ route('dashboard-siswa') }}">
                    <span class="nav-icon"><i class="fas fa-home"></i></span>
                    Beranda
                </a>
                <a class="nav-item {{ request()->routeIs('pilihan-ekskul') ? 'active' : '' }}"
                    href="{{ route('pilihan-ekskul') }}">
                    <span class="nav-icon"><i class="fas fa-hand-pointer"></i></span>
                    Pilihan ekskul
                </a>

                <a class="nav-item {{ request()->routeIs('absensi-siswa') ? 'active' : '' }}"
                    href="{{ route('absensi-siswa') }}">
                    <span class="nav-icon"><i class="fas fa-calendar-check"></i></span>
                    Absensi Ekskul
                </a>
                <a class="nav-item {{ request()->routeIs('prestasi-siswa') ? 'active' : '' }}"
                    href="{{ route('prestasi-siswa') }}">
                    <span class="nav-icon"><i class="fas fa-medal"></i></span>
                    Prestasi
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

            <!-- Welcome -->
            <div class="welcome-card">
                <div class="avatar-circle">
                    <i class="fas fa-user"></i>
                </div>
                <div>
                    <div class="welcome-top">
                        <h2>Halo {{ Auth::user()->name }}!</h2>
                        <span class="badge-murid">{{ ucfirst(Auth::user()->role) }}</span>
                    </div>
                    <div class="welcome-date">
                        <i class="far fa-clock" style="font-size:11px;"></i>
                        {{ \Carbon\Carbon::now()->locale('id')->isoFormat('dddd, DD MMMM YYYY') }}
                    </div>
                    <div class="welcome-desc">Selamat datang di beranda untuk memantau aktivitas dan perkembangan
                        ekstrakurikuler secara real-time.</div>
                </div>
            </div>

            <!-- Stats -->
            <div class="stats-row">

                <div class="stat-card red">
                    <div class="stat-icon-wrap">🏅</div>
                    <div class="stat-info">
                        <div class="stat-label">Eskul Diikuti</div>
                        <div class="stat-number">{{ $ekskulSiswa->count() }}</div>
                    </div>
                </div>

                <div class="stat-card yellow">
                    <div class="cal-box">
                        <div class="cal-header">{{ $namaBulanShort }}</div>
                        <div class="cal-num">{{ $tanggalHariIni }}</div>
                    </div>
                    <div class="stat-info">
                        <div class="stat-label">Kegiatan Bulan ini</div>
                        <div class="stat-number">{{ $jumlahKegiatan }}</div>
                    </div>
                </div>

                <div class="stat-card green">
                    <div class="stat-icon-wrap">🏆</div>
                    <div class="stat-info">
                        <div class="stat-label">Prestasi</div>
                        <div class="stat-number">{{ $jumlahPrestasi }}</div>
                    </div>
                </div>

            </div>

            <!-- Ekskul Saya -->
            <div class="card">
                <div class="card-title">Ekskul Saya</div>
                <table class="ekskul-table">
                    @forelse ($ekskulSiswa as $ekskul)
                    <tr>
                        <td class="ek-name">{{ $ekskul->nama }}</td>
                        <td class="ek-dash">—</td>
                        <td class="ek-schedule">{{ $ekskul->jadwal_lengkap ?? 'Jadwal belum diatur' }}</td>
                        <td class="ek-dash2">—</td>
                        <td class="ek-status"><b>Aktif</b></td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" style="text-align: center; color: #777; padding: 10px;">Anda belum mengikuti ekskul mana pun.</td>
                    </tr>
                    @endforelse
                </table>
            </div>

            <!-- Status Pendaftaran -->
            @if($statusPendaftaran->count() > 0)
            <div class="card">
                <div class="card-title">Status Pendaftaran</div>
                <table class="pendaftaran-table">
                    @forelse ($statusPendaftaran as $pend)
                    <tr>
                        <td class="pend-ekskul">{{ $pend->ekskul->nama ?? 'N/A' }}</td>
                        <td class="pend-dash">—</td>
                        <td class="pend-status">
                            @if($pend->status === 'menunggu')
                                <span class="status-badge badge-pending">Menunggu</span>
                            @elseif($pend->status === 'disetujui')
                                <span class="status-badge badge-accepted">Disetujui</span>
                            @elseif($pend->status === 'ditolak')
                                <span class="status-badge badge-rejected">Ditolak</span>
                            @endif
                        </td>
                        @if($pend->status === 'ditolak' && $pend->catatan_admin)
                        <td class="pend-dash">—</td>
                        <td class="pend-reason" title="{{ $pend->catatan_admin }}">
                            {{ Str::limit($pend->catatan_admin, 30) }}
                        </td>
                        @endif
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" style="text-align: center; color: #777; padding: 10px;">Belum ada status pendaftaran.</td>
                    </tr>
                    @endforelse
                </table>
            </div>
            @endif

            <!-- Nilai Siswa -->
            @if($nilaiSiswa->count() > 0)
            <div class="card">
                <div class="card-title"><span style="font-size:17px;">⭐</span> Nilai Saya</div>
                <table class="nilai-table">
                    @forelse ($nilaiSiswa as $nilai)
                    <tr>
                        <td class="nilai-ekskul">{{ $nilai->ekskul->nama ?? 'N/A' }}</td>
                        <td class="nilai-dash">—</td>
                        <td class="nilai-grade">
                            @if($nilai->nilai === 'A')
                                <span class="grade-a">A (Sangat Baik)</span>
                            @elseif($nilai->nilai === 'B')
                                <span class="grade-b">B (Baik)</span>
                            @elseif($nilai->nilai === 'C')
                                <span class="grade-c">C (Cukup)</span>
                            @endif
                        </td>
                    </tr>
                    @if($nilai->keterangan)
                    <tr>
                        <td colspan="2"></td>
                        <td style="font-size: 12px; color: #666; font-style: italic; padding-top: 2px;">{{ $nilai->keterangan }}</td>
                    </tr>
                    @endif
                    @empty
                    @endforelse
                </table>
            </div>
            @endif

            <!-- Jadwal + Pengumuman -->
            <div class="two-col">

                <div class="card">
                    <div class="card-title"><span style="font-size:17px;">📅</span> Jadwal Terdekat</div>
                    @forelse ($jadwalTerdekat as $j)
                        <div class="jadwal-item">
                            {{ $j->nama_ekskul }} - {{ ucfirst($j->hari) }}, {{ Carbon::parse($j->jam_mulai)->format('H:i') }} - {{ $j->lokasi }}
                        </div>
                    @empty
                        <div class="jadwal-item" style="color: #777;">Tidak ada jadwal terdekat.</div>
                    @endforelse
                </div>

                <div class="card">
                    <div class="card-title"><span style="font-size:17px;">📢</span> Pengumuman</div>
                    @forelse ($pengumuman as $p)
                        <div class="pengumuman-item">
                            <strong>{{ $p->judul }}:</strong> {{ $p->isi }}
                        </div>
                    @empty
                        <div class="pengumuman-item" style="color: #777;">Tidak ada pengumuman terbaru.</div>
                    @endforelse
                </div>

            </div>


        </main>
    </div>

</body>

</html>
