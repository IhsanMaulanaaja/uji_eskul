<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartSchool Ekskul - Prestasi Ekskul Admin</title>
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
            background: #e2e8f0;
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
            border-bottom: 1px solid #cbd5e1;
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
            width: 190px;
            background: #90b4d4;
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
            border-right: 1px solid #7a9cb9;
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
            border-radius: 6px;
            cursor: pointer;
            font-size: 15px;
            font-weight: 600;
            color: #1a1a2e;
            text-decoration: none;
            transition: background 0.15s;
        }

        .nav-item:hover {
            background: rgba(255, 255, 255, 0.35);
        }

        .nav-item.active {
            background: #5b8deb;
            color: #fff;
            font-weight: 700;
        }

        .nav-item .nav-icon {
            width: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            flex-shrink: 0;
        }

        .logout-area {
            width: 100%;
            margin-top: 14px;
        }

        .logout-btn {
            width: 100%;
            background: #d9534f;
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
            background: #c9302c;
        }

        /* ===== MAIN CONTENT ===== */
        .main {
            flex: 1;
            padding: 24px 28px;
            display: flex;
            flex-direction: column;
            min-width: 0;
        }

        .main h1 {
            font-size: 26px;
            font-weight: 800;
            color: #111;
            margin-bottom: 24px;
        }

        /* ===== TABLE ===== */
        .prestasi-table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            font-size: 15px;
            text-align: center;
        }

        .prestasi-table thead {
            background: #cbd5e1;
            /* Grayish background for the header matching mockup */
        }

        .prestasi-table th {
            font-weight: 800;
            color: #333;
            padding: 16px 12px;
            border: 1px solid #94a3b8;
            /* cell border */
        }

        .prestasi-table td {
            padding: 12px;
            color: #333;
            border: 1px solid #94a3b8;
            vertical-align: middle;
            font-weight: 600;
        }

        .photo-cell img {
            height: 120px;
            width: 190px;
            object-fit: cover;
            border-radius: 4px;
            display: block;
            margin: 0 auto;
            border: 1px solid #eee;
        }

        .btn-edit-orange {
            background: #d97706;
            /* orange */
            color: #fff;
            border: none;
            border-radius: 20px;
            /* rounded pill */
            padding: 4px 18px;
            font-size: 12px;
            font-weight: 800;
            font-family: inherit;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-delete-red {
            background: #ef4444;
            color: #fff;
            border: none;
            border-radius: 20px;
            padding: 4px 18px;
            font-size: 12px;
            font-weight: 800;
            font-family: inherit;
            cursor: pointer;
            margin-left: 6px;
        }

        .header-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .header-actions h1 {
            font-size: 26px;
            font-weight: 800;
            color: #111;
            margin-bottom: 0;
        }

        .btn-add {
            background: #272c72;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 10px 18px;
            font-size: 14px;
            font-weight: 700;
            font-family: 'Nunito', sans-serif;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* ===== MODAL & FORM ===== */
        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background: #fff;
            border-radius: 12px;
            width: 100%;
            max-width: 500px;
            padding: 24px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .modal-header h3 {
            font-size: 18px;
            font-weight: 800;
            color: #111;
        }

        .close-btn {
            background: none;
            border: none;
            font-size: 20px;
            color: #888;
            cursor: pointer;
        }

        .form-group {
            margin-bottom: 16px;
            text-align: left;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            font-weight: 700;
            color: #444;
            margin-bottom: 8px;
        }

        .form-control {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-family: 'Nunito', sans-serif;
            font-size: 14px;
            outline: none;
        }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 24px;
        }

        .btn-save {
            background: #5b8deb;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 700;
            cursor: pointer;
        }

        .btn-cancel {
            background: #e2e8f0;
            color: #333;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 700;
            cursor: pointer;
        }

        .btn-delete-confirm {
            background: #ef4444;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 700;
            cursor: pointer;
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
                <a class="nav-item" href="{{ route('absensi-admin') }}">
                    <span class="nav-icon"><i class="fas fa-calendar-check"></i></span>
                    Absensi
                </a>
                <a class="nav-item active" href="{{ route('prestasi-admin') }}">
                    <span class="nav-icon"><i class="fas fa-camera"></i></span>
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

            <div class="header-actions">
                <h1>Prestasi Ekskul</h1>
                <button class="btn-add" onclick="openModal('addModal')">
                    <i class="fas fa-plus"></i> Tambah Lomba
                </button>
            </div>

            <table class="prestasi-table">
                <thead>
                    <tr>
                        <th>Foto Dokumentasi</th>
                        <th>Nama Lomba</th>
                        <th>Tanggal Juara</th>
                        <th>Juara</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($lombas as $lomba)
                        <tr>
                            <td class="photo-cell">
                                @if ($lomba->dokumentasi->count() > 0)
                                    <img src="{{ $lomba->dokumentasi->first()->foto ? asset('storage/' . $lomba->dokumentasi->first()->foto) : asset('images/no-image.png') }}" alt="Foto Lomba" style="width:120px; height:80px; object-fit:cover;">
                                @else
                                    <span style="color:#888; font-size:13px; font-style:italic;">Belum ada foto</span>
                                @endif
                            </td>
                            <td>{{ $lomba->nama_lomba }} <br><span
                                    style="font-size:12px;color:#666;">({{ $lomba->ekskul->nama ?? '-' }})</span></td>
                            <td>{{ \Carbon\Carbon::parse($lomba->tanggal)->format('d M Y') }}</td>
                            <td>{{ $lomba->juara ?? '-' }}</td>
                            <td>
                                <button class="btn-edit-orange"
                                    onclick="openEditLombaModal({{ $lomba->id }}, '{{ $lomba->ekskul_id }}', '{{ $lomba->nama_lomba }}', '{{ $lomba->tanggal }}', '{{ $lomba->juara }}')">Edit</button>
                                <button class="btn-delete-red" onclick="openDeleteLombaModal({{ $lomba->id }})"><i
                                        class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="padding: 24px; color: #888;">Belum ada data lomba tersimpan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </main>
    </div>

    <!-- ADD MODAL -->
    <div class="modal-overlay" id="addModal">
        <form class="modal-content" method="POST" action="{{ route('lomba.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="modal-header">
                <h3>Tambah Data Lomba</h3>
                <button type="button" class="close-btn" onclick="closeModal('addModal')"><i
                        class="fas fa-times"></i></button>
            </div>
            <div class="form-group">
                <label>Ekskul</label>
                <select name="ekskul_id" class="form-control" required>
                    <option value="">-- Pilih Ekskul --</option>
                    @foreach ($ekskuls as $eks)
                        <option value="{{ $eks->id }}">{{ $eks->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Foto Dokumentasi Utama (Opsional)</label>
                <input type="file" name="foto" class="form-control" accept="image/*">
            </div>
            <div class="form-group">
                <label>Nama Lomba</label>
                <input type="text" name="nama_lomba" class="form-control" placeholder="Masukkan nama lomba" required>
            </div>
            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" name="tanggal" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Peringkat Juara</label>
                <input type="text" name="juara" class="form-control" placeholder="Contoh: Juara 1">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-cancel" onclick="closeModal('addModal')">Batal</button>
                <button type="submit" class="btn-save">Simpan</button>
            </div>
        </form>
    </div>

    <!-- EDIT MODAL -->
    <div class="modal-overlay" id="editModal">
        <form class="modal-content" id="formEditLomba" method="POST" action="" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-header">
                <h3>Edit Data Lomba</h3>
                <button type="button" class="close-btn" onclick="closeModal('editModal')"><i
                        class="fas fa-times"></i></button>
            </div>
            <div class="form-group">
                <label>Ekskul</label>
                <select name="ekskul_id" id="edit_ekskul_id" class="form-control" required>
                    <option value="">-- Pilih Ekskul --</option>
                    @foreach ($ekskuls as $eks)
                        <option value="{{ $eks->id }}">{{ $eks->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Ganti Foto Utama (Opsional)</label>
                <input type="file" name="foto" class="form-control" accept="image/*">
            </div>
            <div class="form-group">
                <label>Nama Lomba</label>
                <input type="text" name="nama_lomba" id="edit_nama_lomba" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" name="tanggal" id="edit_tanggal" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Peringkat Juara</label>
                <input type="text" name="juara" id="edit_juara" class="form-control">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-cancel" onclick="closeModal('editModal')">Batal</button>
                <button type="submit" class="btn-save">Update</button>
            </div>
        </form>
    </div>

    <!-- DELETE MODAL -->
    <div class="modal-overlay" id="deleteModal">
        <form class="modal-content" id="formDeleteLomba" method="POST" action="">
            @csrf
            @method('DELETE')
            <div class="modal-header">
                <h3>Hapus Data Lomba</h3>
                <button type="button" class="close-btn" onclick="closeModal('deleteModal')"><i
                        class="fas fa-times"></i></button>
            </div>
            <p style="font-size:15px; color:#444; margin-bottom: 20px;">
                Apakah Anda yakin ingin menghapus data lomba ini? Semua foto dokumentasi terkait juga akan terhapus.
            </p>
            <div class="modal-footer">
                <button type="button" class="btn-cancel" onclick="closeModal('deleteModal')">Batal</button>
                <button type="submit" class="btn-delete-confirm">Ya, Hapus</button>
            </div>
        </form>
    </div>

    <script>
        function openModal(id) {
            document.getElementById(id).style.display = 'flex';
        }

        function closeModal(id) {
            document.getElementById(id).style.display = 'none';
        }

        function openEditLombaModal(id, ekskulId, namaLomba, tanggal, juara) {
            const form = document.getElementById('formEditLomba');
            form.action = `/prestasi-ekskul/lomba/${id}`;
            document.getElementById('edit_ekskul_id').value = ekskulId;
            document.getElementById('edit_nama_lomba').value = namaLomba;
            document.getElementById('edit_tanggal').value = tanggal;
            document.getElementById('edit_juara').value = juara;
            openModal('editModal');
        }

        function openDeleteLombaModal(id) {
            const form = document.getElementById('formDeleteLomba');
            form.action = `/prestasi-ekskul/lomba/${id}`;
            openModal('deleteModal');
        }
    </script>
</body>

</html>
