<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartSchool Ekskul - Dashboard Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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

        .logo-wrapper {
            position: relative;
            width: 110px;
            height: 110px;
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
            width: 110px;
            height: 110px;
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
            gap: 10px;
            align-items: center;
        }

        .logo-icons .icon-grad {
            font-size: 40px;
            line-height: 1;
            margin: -3px 0 -2px;
        }

        .sidebar-title {
            font-size: 13px;
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
            border-radius: 12px;
            padding: 11px 14px;
            font-size: 14px;
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

        .dash-header h1 {
            font-size: 22px;
            font-weight: 900;
            color: #1a1a1a;
            margin-bottom: 2px;
        }

        .dash-header p {
            font-size: 12.5px;
            color: #666;
        }

        /* ===== STAT CARDS ===== */
        .stats-row {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 14px;
        }

        .stat-card {
            border-radius: 10px;
            padding: 16px 20px;
            color: #fff;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
        }

        .stat-card.blue {
            background: #3a7bd5;
        }

        .stat-card.green {
            background: #2e8b57;
        }

        .stat-card.brown {
            background: #b5763a;
        }

        .stat-card .stat-label {
            font-size: 13px;
            font-weight: 700;
            opacity: 0.95;
            margin-bottom: 4px;
        }

        .stat-card .stat-number {
            font-size: 30px;
            font-weight: 900;
            line-height: 1;
        }

        /* ===== TWO COLUMN LAYOUT ===== */
        .two-col {
            display: grid;
            grid-template-columns: 1.3fr 1fr;
            gap: 14px;
        }

        /* ===== CARD ===== */
        .card {
            background: #fff;
            border-radius: 12px;
            padding: 16px 18px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.07);
        }

        .card-title {
            font-size: 14px;
            font-weight: 800;
            color: #1a1a1a;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 7px;
        }

        /* ===== TABLE ===== */
        .reg-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }

        .reg-table thead tr {
            border-bottom: 1px solid #eee;
        }

        .reg-table th {
            font-size: 12px;
            font-weight: 700;
            color: #555;
            padding: 4px 8px 6px;
            text-align: left;
        }

        .reg-table td {
            padding: 6px 8px;
            color: #333;
            border-bottom: 1px solid #f5f5f5;
            vertical-align: middle;
        }

        .reg-table tr:last-child td {
            border-bottom: none;
        }

        /* ===== BADGES ===== */
        .badge {
            display: inline-block;
            padding: 3px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            color: #fff;
        }

        .badge.menunggu {
            background: #f0a500;
        }

        .badge.diterima {
            background: #2e8b57;
        }

        /* ===== FORM ELEMENTS ===== */
        .form-label {
            font-size: 12px;
            font-weight: 700;
            color: #555;
            margin-bottom: 5px;
            margin-top: 10px;
            display: block;
        }

        .form-label:first-of-type {
            margin-top: 0;
        }

        .form-select {
            width: 100%;
            padding: 9px 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 13px;
            font-family: 'Nunito', sans-serif;
            color: #333;
            background: #fff;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23555' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 10px center;
            cursor: pointer;
        }

        .simpan-btn {
            width: 100%;
            margin-top: 12px;
            background: #e8e8e8;
            color: #333;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 9px 16px;
            font-size: 13px;
            font-weight: 700;
            font-family: 'Nunito', sans-serif;
            cursor: pointer;
            transition: background 0.15s;
        }

        .simpan-btn:hover {
            background: #d5d5d5;
        }

        /* ===== CHART ===== */
        .chart-card {
            background: #fff;
            border-radius: 12px;
            padding: 18px 20px 16px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.07);
        }

        .chart-card .card-title {
            margin-bottom: 20px;
        }

        .chart-area {
            display: flex;
            align-items: flex-end;
            gap: 12px;
            height: 160px;
            padding: 10px 4px 0;
            background: linear-gradient(180deg, transparent 0%, rgba(0, 0, 0, 0.022) 100%);
            border-radius: 8px;
        }




        .bar-group {
            display: flex;
            flex-direction: column;
            align-items: center;
            flex: 1;
            gap: 8px;
        }

        .bar {
            width: 100%;
            max-width: 32px;
            border-radius: 6px 6px 0 0;
            transition: all 0.3s ease;
            cursor: pointer;
            min-height: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .bar:hover {
            transform: scaleY(1.05) translateY(-3px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
            opacity: 1;
        }

        .bar-label {
            font-size: 11px;
            color: #555;
            font-weight: 600;
            text-align: center;
            line-height: 1.2;
        }

        .bar-pct {
            font-size: 10px;
            color: #999;
            font-weight: 700;
            text-align: center;
            background: #f5f5f5;
            padding: 2px 6px;
            border-radius: 4px;
        }

        /* ===== ANIMATIONS ===== */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
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
            <button class="user-btn">{{ Auth::user()->name ?? 'Admin' }} <i class="fas fa-chevron-down"
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
                <a class="nav-item active" href="{{ route('dashboard-admin') }}">
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
                <a class="nav-item" href="{{ route('absensi-admin') }}">
                    <span class="nav-icon"><i class="fas fa-calendar-check"></i></span>
                    Absensi
                </a>
                <a class="nav-item" href="{{ route('prestasi-admin') }}">
                    <span class="nav-icon"><i class="fas fa-medal"></i></span>
                    Kegiatan &amp; Prestasi
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

        <main class="main">
            <div class="dash-header">
                <h1>Dashboard Admin</h1>
                <p>Pantau dan kelola seluruh data ekstrakurikuler secara real-time.</p>
            </div>
            <div class="stats-row">
                <div class="stat-card green">
                    <div class="stat-label">Total Pendaftar</div>
                    <div class="stat-number">{{ $totalPendaftar }}</div>
                </div>
                <div class="stat-card brown">
                    <div class="stat-label">Total Pendaftar Ditolak</div>
                    <div class="stat-number">{{ $totalDitolak }}</div>
                </div>
                <div class="stat-card blue">
                    <div class="stat-label">Total Pendaftar Disetujui</div>
                    <div class="stat-number">{{ $totalDiterima }}</div>
                </div>
            </div>
            <div class="card">
                <div class="card-title">📋 Pendaftaran Terbaru</div>
                <table class="reg-table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Ekskul</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pendaftaranTerbaru as $p)
                        <tr>
                            <td>{{ $p->nama_siswa }}</td>
                            <td>{{ $p->nama_ekskul }}</td>
                            <td>{{ \Carbon\Carbon::parse($p->tanggal_daftar)->format('d/m') }}</td>
                            <td><span class="badge {{ $p->status }}">{{ ucfirst($p->status) }}</span></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" style="text-align: center; color: #777;">Belum ada pendaftaran.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="chart-card">
                <div class="card-title">📊 Jumlah Siswa Aktif per Ekskul</div>
                <div class="chart-area" id="chartArea"></div>
            </div>
        </main>
    </div>

    <script>
        const bars = [
            @foreach($siswaPerEkskul as $idx => $item)
            {
                label: '{{ $item->nama }}',
                pct: {{ min(100, $item->total * 10) }},
                color: ['#06b6d4', '#10b981', '#3b82f6', '#8b5cf6', '#f59e0b', '#ec4899', '#ef4444', '#14b8a6', '#f97316'][{{ $idx }} % 9]
            },
            @endforeach
        ];
        const maxH = 135;
        const container = document.getElementById('chartArea');
        bars.forEach((b, idx) => {
            const h = Math.round((b.pct / 100) * maxH);
            const group = document.createElement('div');
            group.className = 'bar-group';
            group.style.animation = `fadeIn 0.5s ease ${idx * 0.05}s both`;
            group.innerHTML = `
    <div class="bar" style="height:${h}px;background:linear-gradient(180deg, ${b.color} 0%, ${b.color}dd 100%);"></div>
    <div class="bar-label">${b.label}</div>
    <div class="bar-pct">${b.pct}%</div>
  `;
            container.appendChild(group);
        });
    </script>
</body>

</html>
