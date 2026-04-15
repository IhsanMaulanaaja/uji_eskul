<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartSchool Ekskul - Tambah Pengguna</title>
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

        .card-title {
            font-size: 14px;
            font-weight: 800;
            color: #1a1a1a;
            margin-bottom: 16px;
        }

        /* ===== FORM ===== */
        .form-group {
            margin-bottom: 14px;
        }

        .form-label {
            font-size: 12px;
            font-weight: 700;
            color: #555;
            margin-bottom: 5px;
            display: block;
        }

        .form-input,
        .form-select,
        .form-textarea {
            width: 100%;
            padding: 9px 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 13px;
            font-family: 'Nunito', sans-serif;
            color: #333;
            background: #fff;
        }

        .form-input:focus,
        .form-select:focus,
        .form-textarea:focus {
            outline: none;
            border-color: #3a7bd5;
            box-shadow: 0 0 0 2px rgba(58, 123, 213, 0.1);
        }

        .form-input.error,
        .form-select.error,
        .form-textarea.error {
            border-color: #e63946;
        }

        .form-textarea {
            resize: vertical;
            min-height: 80px;
        }

        .form-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23555' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 10px center;
            padding-right: 30px;
            cursor: pointer;
        }

        .form-error {
            color: #e63946;
            font-size: 12px;
            margin-top: 4px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        .form-row-3 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        .form-buttons {
            display: flex;
            gap: 12px;
            margin-top: 20px;
        }

        .btn {
            flex: 1;
            padding: 11px 16px;
            border: none;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 700;
            font-family: 'Nunito', sans-serif;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            display: inline-block;
            transition: all 0.15s;
        }

        .btn-primary {
            background: #3a7bd5;
            color: #fff;
        }

        .btn-primary:hover {
            background: #2d5fa3;
        }

        .btn-secondary {
            background: #e8e8e8;
            color: #333;
            border: 1px solid #ccc;
        }

        .btn-secondary:hover {
            background: #d5d5d5;
        }

        .form-section {
            background: #f5f5f5;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 14px;
        }

        .form-section-title {
            font-size: 12px;
            font-weight: 700;
            color: #555;
            margin-bottom: 10px;
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
                </a>                <a class="nav-item" href="{{ route('anggota-admin') }}">
                    <span class="nav-icon"><i class="fas fa-users"></i></span>
                    Kelola Siswa
                </a>                <a class="nav-item" href="{{ route('ekstrakurikuler.index') }}">
                    <span class="nav-icon"><i class="fas fa-book"></i></span>
                    Daftar Ekskul
                </a>
                <a class="nav-item" href="{{ route('pendaftaran-ekskul') }}">
                    <span class="nav-icon"><i class="fas fa-clipboard-list"></i></span>
                    Pendaftar
                </a>                <a class="nav-item" href="{{ route('jadwal-admin') }}">
                    <span class="nav-icon"><i class="fas fa-calendar"></i></span>
                    Jadwal Latihan
                </a>                <a class="nav-item" href="{{ route('absensi-admin') }}">
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
                <h1>Tambah Pengguna</h1>
                <p>Membuat akun pengguna baru</p>
            </div>

            <div class="card">
                <div class="card-title">📋 Form Pengguna Baru</div>
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf

                    <!-- Name & Email -->
                    <div class="form-row-3">
                        <div class="form-group">
                            <label class="form-label">Nama Lengkap *</label>
                            <input type="text" name="name" value="{{ old('name') }}" 
                                class="form-input @error('name') error @enderror" 
                                placeholder="Masukkan nama lengkap">
                            @error('name')
                                <div class="form-error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email *</label>
                            <input type="email" name="email" value="{{ old('email') }}" 
                                class="form-input @error('email') error @enderror" 
                                placeholder="Masukkan email">
                            @error('email')
                                <div class="form-error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Password Section -->
                    <div class="form-section">
                        <div class="form-section-title">🔐 Password</div>
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Password *</label>
                                <input type="password" name="password" 
                                    class="form-input @error('password') error @enderror" 
                                    placeholder="Minimal 8 karakter">
                                @error('password')
                                    <div class="form-error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">Konfirmasi Password *</label>
                                <input type="password" name="password_confirmation" 
                                    class="form-input @error('password_confirmation') error @enderror" 
                                    placeholder="Konfirmasi password">
                                @error('password_confirmation')
                                    <div class="form-error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Role -->
                    <div class="form-group">
                        <label class="form-label">Role *</label>
                        <select id="role" name="role" class="form-select @error('role') error @enderror">
                            <option value="">-- Pilih Role --</option>
                            @foreach($roles as $role)
                                <option value="{{ $role }}" @selected(old('role') == $role)>
                                    {{ ucfirst($role) }}
                                </option>
                            @endforeach
                        </select>
                        @error('role')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Contact Info -->
                    <div class="form-group">
                        <label class="form-label">Nomor Telepon</label>
                        <input type="text" name="nomor_telepon" value="{{ old('nomor_telepon') }}" 
                            class="form-input" placeholder="Contoh: 081234567890">
                        @error('nomor_telepon')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-textarea" placeholder="Masukkan alamat">{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Education Info -->
                    <div class="form-row-3 role-dependent" data-role-dependent style="{{ old('role') === 'siswa' ? '' : 'display:none;' }}">
                        <div class="form-group">
                            <label class="form-label">Jurusan</label>
                            <input type="text" name="jurusan" value="{{ old('jurusan') }}" 
                                class="form-input" placeholder="Contoh: RPL, TKJ" {{ old('role') === 'siswa' ? '' : 'disabled' }}>
                            @error('jurusan')
                                <div class="form-error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Kelas</label>
                            <input type="text" name="kelas" value="{{ old('kelas') }}" 
                                class="form-input" placeholder="Contoh: XII RPL 1" {{ old('role') === 'siswa' ? '' : 'disabled' }}>
                            @error('kelas')
                                <div class="form-error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="form-buttons">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                        <a href="{{ route('users.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </main>
    </div>
    <script>
        const roleSelect = document.getElementById('role');
        const roleDependent = document.querySelector('[data-role-dependent]');

        function toggleEducationFields() {
            const show = roleSelect.value === 'siswa';
            roleDependent.style.display = show ? 'grid' : 'none';
            roleDependent.querySelectorAll('input').forEach(input => {
                input.disabled = !show;
            });
        }

        if (roleSelect && roleDependent) {
            roleSelect.addEventListener('change', toggleEducationFields);
            toggleEducationFields();
        }
    </script>
</body>

</html>
