<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartSchool Ekskul - Kelola Pengguna</title>
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

        /* ===== CARD ===== */
        .card {
            background: #fff;
            border-radius: 12px;
            padding: 16px 18px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.07);
        }

        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 16px;
        }

        .card-title {
            font-size: 14px;
            font-weight: 800;
            color: #1a1a1a;
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .btn-tambah {
            background: #3a7bd5;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 8px 16px;
            font-size: 13px;
            font-weight: 700;
            font-family: 'Nunito', sans-serif;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 6px;
            text-decoration: none;
            transition: background 0.15s;
        }

        .btn-tambah:hover {
            background: #2d5fa3;
        }

        /* ===== TABLE ===== */
        .users-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }

        .users-table thead tr {
            border-bottom: 1px solid #eee;
        }

        .users-table th {
            font-size: 12px;
            font-weight: 700;
            color: #555;
            padding: 8px 10px;
            text-align: left;
        }

        .users-table td {
            padding: 10px;
            color: #333;
            border-bottom: 1px solid #f5f5f5;
            vertical-align: middle;
        }

        .users-table tr:last-child td {
            border-bottom: none;
        }

        /* ===== BADGES ===== */
        .badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 4px;
            font-size: 11px;
            font-weight: 700;
            color: #fff;
            text-transform: uppercase;
        }

        .badge.admin {
            background: #e63946;
        }

        .badge.pembina {
            background: #f0a500;
        }

        .badge.siswa {
            background: #3a7bd5;
        }

        /* ===== BUTTONS ===== */
        .action-btns {
            display: flex;
            gap: 6px;
        }

        .btn-edit,
        .btn-delete {
            border: none;
            border-radius: 6px;
            padding: 6px 12px;
            font-size: 12px;
            font-weight: 700;
            font-family: 'Nunito', sans-serif;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            transition: all 0.15s;
        }

        .btn-edit {
            background: #3a7bd5;
            color: #fff;
        }

        .btn-edit:hover {
            background: #2d5fa3;
        }

        .btn-delete {
            background: #e63946;
            color: #fff;
            border: none;
        }

        .btn-delete:hover {
            background: #c1121f;
        }

        /* ===== ALERT ===== */
        .alert {
            padding: 12px 16px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .alert-error ul {
            margin-top: 8px;
            margin-left: 20px;
        }

        .alert-error li {
            margin-top: 4px;
        }

        /* ===== EMPTY STATE ===== */
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

        /* ===== PAGINATION ===== */
        .pagination {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            margin-top: 20px;
            flex-wrap: wrap;
        }

        .pagination span,
        .pagination a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 36px;
            height: 36px;
            padding: 0 8px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            font-family: 'Nunito', sans-serif;
            text-decoration: none;
            color: #555;
            background: #fff;
            cursor: pointer;
            transition: all 0.15s;
        }

        .pagination a:hover {
            background: #f0f0f0;
            border-color: #999;
        }

        .pagination .active span {
            background: #3a7bd5;
            color: #fff;
            border-color: #3a7bd5;
        }

        .pagination .disabled span {
            color: #ccc;
            cursor: not-allowed;
            border-color: #eee;
            background: #fafafa;
        }

        .pagination .page-item span.relative {
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        /* Override Tailwind default pagination */
        .pagination svg {
            display: none;
        }

        .pagination .relative.inline-flex {
            gap: 0;
        }

        /* Pagination item styling */
        .pagination .page-item {
            display: inline-flex;
        }

        .pagination .page-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            padding: 0;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            color: #555;
            background: #fff;
            cursor: pointer;
            transition: all 0.15s;
            text-decoration: none;
        }

        .pagination .page-link:hover:not(.disabled) {
            background: #f0f0f0;
            border-color: #999;
        }

        .pagination .page-item.active .page-link {
            background: #3a7bd5;
            color: #fff;
            border-color: #3a7bd5;
        }

        .pagination .page-item.disabled .page-link {
            color: #ccc;
            cursor: not-allowed;
            border-color: #eee;
            background: #fafafa;
        }

        /* Pagination info text */
        .pagination-info {
            text-align: center;
            font-size: 12px;
            color: #666;
            margin-bottom: 12px;
            padding: 0 10px;
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
                <a class="nav-item" href="{{ route('dashboard-admin') }}">
                    <span class="nav-icon"><i class="fas fa-home"></i></span>
                    Beranda
                </a>
                <a class="nav-item active" href="{{ route('users.index') }}">
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
                <h1>Kelola Pengguna</h1>
                <p>Mengelola data pengguna (Siswa, Admin, Pembina)</p>
            </div>

            @if (session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-circle"></i> Terjadi kesalahan:
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <div class="card-title">👥 Daftar Pengguna</div>
                    <a href="{{ route('users.create') }}" class="btn-tambah">
                        <i class="fas fa-plus"></i> Tambah Pengguna
                    </a>
                </div>
                <table class="users-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Telepon</th>
                            <th>Kelas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $index => $user)
                            <tr>
                                <td>{{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}</td>
                                <td>
                                    <a href="{{ route('users.show', $user->id) }}" style="color: #3a7bd5; text-decoration: none; font-weight: 600;">
                                        {{ $user->name }}
                                    </a>
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <span class="badge {{ $user->role }}">{{ $user->role }}</span>
                                </td>
                                <td>{{ $user->nomor_telepon ?? '-' }}</td>
                                <td>{{ $user->kelas ?? '-' }}</td>
                                <td>
                                    <div class="action-btns">
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn-edit">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-delete">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">
                                    <div class="empty-state">
                                        <i class="fas fa-inbox"></i>
                                        <p>Belum ada data pengguna</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($users->hasPages())
                <div style="margin-top: 20px; display: flex; flex-direction: column; align-items: center;">
                    <div class="pagination-info">
                        Showing {{ ($users->currentPage() - 1) * $users->perPage() + 1 }} to {{ min($users->currentPage() * $users->perPage(), $users->total()) }} of {{ $users->total() }} results
                    </div>
                    <div class="pagination" style="margin-top: 10px;">
                        {{ $users->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            @endif
        </main>
    </div>
</body>

</html>
