<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Ekstrakurikuler - SmartSchool Ekskul</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Nunito', sans-serif;
            background: #dce3ea;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

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

        .app-body {
            display: flex;
            flex: 1;
        }

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

        .card {
            background: #fff;
            border-radius: 12px;
            padding: 16px 18px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.07);
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 700;
            color: #1c1c1c;
            font-size: 13px;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-family: 'Nunito', sans-serif;
            font-size: 13px;
            transition: border-color 0.3s;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: #3a7bd5;
            box-shadow: 0 0 0 3px rgba(58, 123, 213, 0.1);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 100px;
        }

        .form-group small {
            display: block;
            margin-top: 5px;
            color: #666;
            font-size: 12px;
        }

        .error {
            color: #dc3545;
            font-size: 12px;
            margin-top: 5px;
            display: block;
        }

        .btn-group {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .btn {
            flex: 1;
            padding: 11px;
            border: none;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-submit {
            background: #3a7bd5;
            color: #fff;
        }

        .btn-submit:hover {
            background: #2d5fa3;
        }

        .btn-cancel {
            background: #6c757d;
            color: #fff;
        }

        .btn-cancel:hover {
            background: #5a6268;
        }

        .file-input-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
            width: 100%;
        }

        .file-input-wrapper input[type=file] {
            position: absolute;
            left: -9999px;
        }

        .file-input-label {
            display: block;
            padding: 10px 12px;
            background: #f8f9fa;
            border: 2px dashed #ddd;
            border-radius: 6px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 13px;
        }

        .file-input-label:hover {
            border-color: #3a7bd5;
            background: #f0f7ff;
        }

        .preview-img {
            margin-top: 10px;
            max-width: 200px;
            border-radius: 6px;
        }

        .current-foto {
            margin-top: 10px;
        }

        .current-foto img {
            max-width: 200px;
            border-radius: 6px;
        }

        .current-foto p {
            color: #666;
            font-size: 12px;
            margin-bottom: 8px;
        }
    </style>
</head>
<body>
    <nav class="topnav">
        <div class="topnav-brand">
            <img src="{{ asset('assets/image9.png') }}" width="38" height="38" alt="Logo" style="border-radius: 4px;">
            <div class="brand-text"><b>SmartSchool</b> Ekskul</div>
        </div>
        <div class="topnav-right"></div>
    </nav>

    <div class="app-body">
        <aside class="sidebar">
            <img src="{{ asset('assets/image3.png') }}" width="100" height="100" alt="Logo" style="margin-bottom: 8px; border-radius: 6px;">
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
                <a class="nav-item active" href="{{ route('ekstrakurikuler.index') }}">
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
                <h1>✏️ Edit Ekstrakurikuler</h1>
            </div>

            <div class="card">
                <form method="POST" action="{{ route('ekstrakurikuler.update', $ekstrakurikuler->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="nama">Nama Ekstrakurikuler</label>
                        <input type="text" id="nama" name="nama" value="{{ old('nama', $ekstrakurikuler->nama) }}" required placeholder="Masukkan nama ekskul">
                        @error('nama')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea id="deskripsi" name="deskripsi" placeholder="Masukkan deskripsi ekskul (opsional)">{{ old('deskripsi', $ekstrakurikuler->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="pembina_id">Pembina</label>
                        <select id="pembina_id" name="pembina_id" required>
                            <option value="">-- Pilih Pembina --</option>
                            @foreach ($pembinas as $pembina)
                                <option value="{{ $pembina->id }}" {{ old('pembina_id', $ekstrakurikuler->pembina_id) == $pembina->id ? 'selected' : '' }}>
                                    {{ $pembina->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('pembina_id')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="foto">Foto (Opsional)</label>
                        @if ($ekstrakurikuler->foto)
                            <div class="current-foto">
                                <p>📷 Foto Saat Ini:</p>
                                <img src="{{ asset('assets/ekskul/' . $ekstrakurikuler->foto) }}" alt="{{ $ekstrakurikuler->nama }}">
                            </div>
                        @endif
                        <div class="file-input-wrapper" style="margin-top: 15px;">
                            <input type="file" id="foto" name="foto" accept="image/*" onchange="previewImage(event)">
                            <label for="foto" class="file-input-label">
                                <i class="fas fa-cloud-upload-alt"></i> Klik untuk mengubah foto atau drag & drop
                            </label>
                        </div>
                        <div id="preview-container"></div>
                        @error('foto')
                            <span class="error">{{ $message }}</span>
                        @enderror
                        <small>Format: JPG, PNG, GIF. Max: 2MB</small>
                    </div>

                    <div class="btn-group">
                        <button type="submit" class="btn btn-submit">
                            <i class="fas fa-save"></i> Update
                        </button>
                        <a href="{{ route('ekstrakurikuler.index') }}" class="btn btn-cancel">
                            <i class="fas fa-times"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            const previewContainer = document.getElementById('preview-container');
            
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    previewContainer.innerHTML = `<p style="color: #666; font-size: 12px; margin-top: 15px; margin-bottom: 8px;">🆕 Preview Foto Baru:</p><img src="${e.target.result}" alt="preview" class="preview-img">`;
                };
                reader.readAsDataURL(file);
            } else {
                previewContainer.innerHTML = '';
            }
        }
    </script>
</body>
</html>
