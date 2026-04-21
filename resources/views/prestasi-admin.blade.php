<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartSchool Ekskul - Kegiatan & Prestasi Admin</title>
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
            min-width: 0;
        }

        /* Header Section */
        .header-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 6px;
        }

        .header-actions h1 {
            font-size: 22px;
            font-weight: 800;
            color: #111;
        }

        .btn-group {
            display: flex;
            gap: 10px;
        }

        .btn-action {
            background: #272c72;
            /* dark blue */
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 10px 16px;
            font-size: 14px;
            font-weight: 700;
            font-family: 'Nunito', sans-serif;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.15);
        }

        .btn-action i {
            color: #8bb4e9;
            /* Light blue accent for icon */
        }

        /* ===== GALLERY CARD ===== */
        .card-container {
            background: #fff;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
        }

        .card-container h2 {
            font-size: 20px;
            font-weight: 800;
            color: #111;
            margin-bottom: 20px;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .photo-card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            position: relative;
            border: 1px solid #e2e8f0;
        }

        .photo-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            display: block;
            background: #eee;
        }

        .photo-info {
            padding: 12px 14px;
            background: #f8fafc;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 4px;
        }

        .info-row:last-child {
            margin-bottom: 0;
        }

        .filename {
            font-size: 16px;
            font-weight: 800;
            color: #111;
        }

        .date {
            font-size: 12px;
            font-weight: 600;
            color: #475569;
        }

        .btn-tiny {
            border: none;
            border-radius: 12px;
            padding: 2px 10px;
            font-size: 10px;
            font-weight: 800;
            font-family: inherit;
            cursor: pointer;
        }

        .btn-lihat {
            background: #e2e8f0;
            color: #475569;
        }

        .btn-edit {
            background: #bbf7d0;
            color: #166534;
        }

        .btn-hapus {
            background: #fecaca;
            color: #991b1b;
        }

        .btn-tiny-group {
            display: flex;
            gap: 4px;
        }

        .lihat-semua-container {
            display: flex;
            justify-content: center;
            margin-top: 24px;
        }

        .btn-lihat-semua {
            background: #eef2ff;
            color: #111;
            border: none;
            border-radius: 8px;
            padding: 10px 24px;
            font-size: 15px;
            font-weight: 800;
            font-family: 'Nunito', sans-serif;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-lihat-semua i {
            color: #3b82f6;
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
            max-width: 480px;
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
                    <a class="nav-item" href="{{ route('absensi-admin') }}">
                        <span class="nav-icon"><i class="fas fa-calendar-check"></i></span>
                        Absensi
                    </a>
                    <a class="nav-item active" href="{{ route('prestasi-admin') }}">
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
                    <a class="nav-item" href="{{ route('absensi-admin') }}">
                        <span class="nav-icon"><i class="fas fa-calendar-check"></i></span>
                        Absensi
                    </a>
                    <a class="nav-item active" href="{{ route('prestasi-admin') }}">
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

            <div class="header-actions">
                <h1>{{ $ekskulName ? "Prestasi & Kegiatan $ekskulName" : 'Data Tersimpan & Tampil' }}</h1>
                <div class="btn-group">
                    <button class="btn-action" onclick="openModal('addModal')">
                        <i class="fas fa-cloud-upload-alt"></i> Upload Foto
                    </button>
                    <button class="btn-action">
                        <i class="fas fa-download"></i> Export
                    </button>
                </div>
            </div>

            <div class="card-container">
                <h2>Foto Dokumentasi</h2>

                <div class="gallery-grid">
                    @forelse($dokumentasis as $doc)
                        <div class="photo-card">
                            <img src="{{ $doc->foto ? Storage::url($doc->foto) : asset('images/no-image.png') }}" alt="Foto">
                            <div class="photo-info">
                                <div class="info-row">
                                    <span
                                        class="filename">{{ Str::limit($doc->nama_lomba ?? $doc->keterangan, 20) ?? 'Foto ' . $doc->id }}</span>
                                    <a href="javascript:void(0)" class="btn-tiny btn-lihat"
                                        style="text-decoration:none; display:inline-block; text-align:center;"
                                        onclick="openDetailModal(this)"
                                        data-nama="{{ e($doc->nama_lomba) }}"
                                        data-tanggal="{{ $doc->tanggal }}"
                                        data-juara="{{ e($doc->keterangan ?? ($doc->lomba->juara ?? '-')) }}">Lihat</a>
                                </div>
                                    <div class="info-row">
                                    <span
                                        class="date">{{ \Carbon\Carbon::parse($doc->created_at)->format('d M Y') }}</span>
                                    <div class="btn-tiny-group">
                                        <button class="btn-tiny btn-edit"
                                            onclick="openEditModal({{ $doc->id }}, '{{ addslashes($doc->nama_lomba) }}', '{{ $doc->tanggal }}', '{{ addslashes($doc->keterangan) }}')">Edit</button>
                                        <button class="btn-tiny btn-hapus"
                                            onclick="openDeleteModal({{ $doc->id }})">Hapus</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p style="grid-column: 1 / -1; text-align: center; color: #888; margin-top: 20px;">
                            @if($user?->role === 'pembina')
                                Belum ada foto dokumentasi. Klik "Upload Foto" untuk menambahkan dokumentasi kegiatan dan prestasi.
                            @else
                                Belum ada foto dokumentasi.
                            @endif
                        </p>
                    @endforelse
                </div>

                {{-- <div class="lihat-semua-container">
                    <button class="btn-lihat-semua">
                        <i class="fas fa-play"></i> Lihat Semua
                    </button>
                </div> --}}

            </div>

        </main>
    </div>

    <!-- ADD MODAL -->
    <div class="modal-overlay" id="addModal">
        <form class="modal-content" method="POST" action="{{ route('dokumentasi.store') }}"
            enctype="multipart/form-data">
            @csrf
            <div class="modal-header">
                <h3>Upload Foto Prestasi</h3>
                <button type="button" class="close-btn" onclick="closeModal('addModal')"><i
                        class="fas fa-times"></i></button>
            </div>
            <div class="form-group">
                <label>Ekstrakurikuler</label>
                <select name="ekstrakurikuler_id" class="form-control" required>
                    @if($user?->role === 'pembina')
                        <option value="{{ $ekskuls->first()->id }}" selected>{{ $ekskuls->first()->nama }}</option>
                    @else
                        <option value="">-- Pilih Ekstrakurikuler --</option>
                        @foreach($ekskuls as $ekskul)
                            <option value="{{ $ekskul->id }}">{{ $ekskul->nama }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label>Nama Lomba</label>
                <input type="text" name="nama_lomba" class="form-control" placeholder="Contoh: Juara 1 Futsal"
                    required>
            </div>
            <div class="form-group">
                <label>Pilih Foto</label>
                <input type="file" name="foto" class="form-control" accept="image/*" required>
            </div>
            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" name="tanggal" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Keterangan (Opsional)</label>
                <input type="text" name="keterangan" class="form-control" placeholder="Contoh: riz-009.jpg">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-cancel" onclick="closeModal('addModal')">Batal</button>
                <button type="submit" class="btn-save">Simpan</button>
            </div>
        </form>
    </div>

    <!-- EDIT MODAL -->
    <div class="modal-overlay" id="editModal">
        <form class="modal-content" id="formEditModal" method="POST" action="" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-header">
                <h3>Edit Data Foto</h3>
                <button type="button" class="close-btn" onclick="closeModal('editModal')"><i
                        class="fas fa-times"></i></button>
            </div>
            <div class="form-group">
                <label>Nama Lomba</label>
                <input type="text" name="nama_lomba" id="edit_nama_lomba" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Keterangan (Opsional)</label>
                <input type="text" name="keterangan" id="edit_keterangan" class="form-control">
            </div>
            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" name="tanggal" id="edit_tanggal" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Ganti Foto (Opsional)</label>
                <input type="file" name="foto" class="form-control" accept="image/*">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-cancel" onclick="closeModal('editModal')">Batal</button>
                <button type="submit" class="btn-save">Update</button>
            </div>
        </form>
    </div>

    <!-- DETAIL MODAL -->
    <div class="modal-overlay" id="detailModal">
        <div class="modal-content" style="max-width: 420px;">
            <div class="modal-header">
                <h3>Detail Foto Dokumentasi</h3>
                <button type="button" class="close-btn" onclick="closeModal('detailModal')"><i class="fas fa-times"></i></button>
            </div>
            <div class="form-group">
                <label>Nama Lomba</label>
                <p id="detail_nama" style="margin: 6px 0 12px; color:#333; font-weight:700;"></p>
            </div>
            <div class="form-group">
                <label>Tanggal Juara</label>
                <p id="detail_tanggal" style="margin: 6px 0 12px; color:#333;"></p>
            </div>
            <div class="form-group">
                <label>Juara</label>
                <p id="detail_juara" style="margin: 6px 0 12px; color:#333;"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-cancel" onclick="closeModal('detailModal')">Tutup</button>
            </div>
        </div>
    </div>

    <!-- DELETE MODAL -->
    <div class="modal-overlay" id="deleteModal">
        <form class="modal-content" id="formDeleteModal" method="POST" action="">
            @csrf
            @method('DELETE')
            <div class="modal-header">
                <h3>Hapus Foto</h3>
                <button type="button" class="close-btn" onclick="closeModal('deleteModal')"><i
                        class="fas fa-times"></i></button>
            </div>
            <p style="font-size:15px; color:#444; margin-bottom: 20px;">
                Apakah Anda yakin ingin menghapus foto ini? Data yang dihapus tidak dapat dikembalikan.
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

        function openEditModal(id, namaLomba, tanggal, keterangan) {
            const form = document.getElementById('formEditModal');
            form.action = `/prestasi-ekskul/dokumentasi/${id}`;
            document.getElementById('edit_nama_lomba').value = namaLomba;
            document.getElementById('edit_tanggal').value = tanggal;
            document.getElementById('edit_keterangan').value = keterangan;
            openModal('editModal');
        }

        function openDeleteModal(id) {
            const form = document.getElementById('formDeleteModal');
            form.action = `/prestasi-ekskul/dokumentasi/${id}`;
            openModal('deleteModal');
        }

        function openDetailModal(el) {
            const nama = el.getAttribute('data-nama') || '-';
            const tanggal = el.getAttribute('data-tanggal') || '-';
            const juara = el.getAttribute('data-juara') || '-';

            document.getElementById('detail_nama').textContent = nama;
            document.getElementById('detail_tanggal').textContent = tanggal;
            document.getElementById('detail_juara').textContent = juara;

            openModal('detailModal');
        }
    </script>
</body>

</html>
