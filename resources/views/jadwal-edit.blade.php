<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartSchool Ekskul - Edit Jadwal</title>
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

        .page-header {
            margin-bottom: 6px;
        }

        .page-header h1 {
            font-size: 22px;
            font-weight: 800;
            color: #111;
        }

        /* ===== FORM CARD ===== */
        .card-container {
            background: #fff;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
            max-width: 600px;
        }

        .card-container h2 {
            font-size: 20px;
            font-weight: 800;
            color: #111;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 18px;
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
            transition: border 0.15s;
        }

        .form-control:focus {
            border-color: #5b8deb;
            box-shadow: 0 0 0 3px rgba(91, 141, 235, 0.1);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .error-message {
            color: #991b1b;
            font-size: 12px;
            margin-top: 4px;
        }

        .form-actions {
            display: flex;
            gap: 12px;
            margin-top: 24px;
        }

        .btn-primary {
            background: #5b8deb;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-size: 14px;
            font-weight: 700;
            font-family: 'Nunito', sans-serif;
            cursor: pointer;
            transition: background 0.15s;
        }

        .btn-primary:hover {
            background: #4a7dd4;
        }

        .btn-secondary {
            background: #e2e8f0;
            color: #333;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-size: 14px;
            font-weight: 700;
            font-family: 'Nunito', sans-serif;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            transition: background 0.15s;
        }

        .btn-secondary:hover {
            background: #cbd5e1;
        }

        .alert {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 14px;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fca5a5;
        }

        /* 24-Hour Time Picker Styles */
        .time-picker-wrapper {
            display: flex;
            gap: 12px;
            align-items: center;
            background: #f8fafc;
            padding: 12px 16px;
            border-radius: 8px;
            border: 2px solid #e2e8f0;
        }

        .time-picker-group {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 4px;
        }

        .time-spinner {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0;
            background: white;
            border: 2px solid #cbd5e1;
            border-radius: 6px;
            overflow: hidden;
        }

        .spinner-btn {
            width: 32px;
            height: 28px;
            border: none;
            background: #f1f5f9;
            color: #5b8deb;
            font-weight: 800;
            cursor: pointer;
            font-size: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
        }

        .spinner-btn:hover {
            background: #5b8deb;
            color: white;
        }

        .spinner-btn:active {
            background: #4a7dd4;
        }

        .spinner-input {
            width: 50px;
            height: 44px;
            border: none;
            border-left: 0;
            border-right: 0;
            text-align: center;
            font-size: 24px;
            font-weight: 800;
            color: #111;
            font-family: 'Nunito', sans-serif;
            padding: 0;
            margin: 0;
        }

        .spinner-input:focus {
            outline: none;
            background: #f0f7ff;
        }

        .time-separator-main {
            font-size: 32px;
            font-weight: 900;
            color: #5b8deb;
            padding-top: 4px;
        }

        .time-label {
            font-size: 11px;
            font-weight: 700;
            color: #888;
            text-transform: uppercase;
            letter-spacing: 0.5px;
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
                @if($user?->role === 'pembina')
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
                    <a class="nav-item active" href="{{ route('jadwal-admin') }}">
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
                @else
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
                    <a class="nav-item active" href="{{ route('jadwal-admin') }}">
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

            <div class="page-header">
                <h1>Edit Jadwal Latihan</h1>
            </div>

            <div class="card-container">

                @if ($errors->any())
                    <div class="alert alert-error">
                        <i class="fas fa-exclamation-circle"></i> Terdapat kesalahan dalam form
                    </div>
                @endif

                <form method="POST" action="{{ route('jadwal.update', $jadwal->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="ekskul_id">Ekstrakurikuler <span style="color: red;">*</span></label>
                        <select name="ekskul_id" id="ekskul_id" class="form-control" required>
                            <option value="">-- Pilih Ekstrakurikuler --</option>
                            @foreach($ekskuls as $ekskul)
                                <option value="{{ $ekskul->id }}" {{ $jadwal->ekskul_id == $ekskul->id ? 'selected' : '' }}>
                                    {{ $ekskul->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('ekskul_id')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="hari">Hari <span style="color: red;">*</span></label>
                        <select name="hari" id="hari" class="form-control" required>
                            <option value="">-- Pilih Hari --</option>
                            <option value="senin" {{ $jadwal->hari == 'senin' ? 'selected' : '' }}>Senin</option>
                            <option value="selasa" {{ $jadwal->hari == 'selasa' ? 'selected' : '' }}>Selasa</option>
                            <option value="rabu" {{ $jadwal->hari == 'rabu' ? 'selected' : '' }}>Rabu</option>
                            <option value="kamis" {{ $jadwal->hari == 'kamis' ? 'selected' : '' }}>Kamis</option>
                            <option value="jumat" {{ $jadwal->hari == 'jumat' ? 'selected' : '' }}>Jumat</option>
                            <option value="sabtu" {{ $jadwal->hari == 'sabtu' ? 'selected' : '' }}>Sabtu</option>
                        </select>
                        @error('hari')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="jam_mulai">Jam Mulai <span style="color: red;">*</span></label>
                            <div class="time-picker-wrapper">
                                <div class="time-picker-group">
                                    <div class="time-spinner">
                                        <button type="button" class="spinner-btn" onclick="decrementHour('jam_mulai_hour')">−</button>
                                        <input type="text" id="jam_mulai_hour" class="spinner-input" maxlength="2" value="{{ isset($jadwal) ? substr($jadwal->jam_mulai, 0, 2) : '00' }}">
                                        <button type="button" class="spinner-btn" onclick="incrementHour('jam_mulai_hour')">+</button>
                                    </div>
                                    <div class="time-label">Jam</div>
                                </div>
                                <div class="time-separator-main">:</div>
                                <div class="time-picker-group">
                                    <div class="time-spinner">
                                        <button type="button" class="spinner-btn" onclick="decrementMin('jam_mulai_min')">−</button>
                                        <input type="text" id="jam_mulai_min" class="spinner-input" maxlength="2" value="{{ isset($jadwal) ? substr($jadwal->jam_mulai, 3, 2) : '00' }}">
                                        <button type="button" class="spinner-btn" onclick="incrementMin('jam_mulai_min')">+</button>
                                    </div>
                                    <div class="time-label">Menit</div>
                                </div>
                            </div>
                            <input type="hidden" name="jam_mulai" id="jam_mulai">
                            @error('jam_mulai')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jam_selesai">Jam Selesai <span style="color: red;">*</span></label>
                            <div class="time-picker-wrapper">
                                <div class="time-picker-group">
                                    <div class="time-spinner">
                                        <button type="button" class="spinner-btn" onclick="decrementHour('jam_selesai_hour')">−</button>
                                        <input type="text" id="jam_selesai_hour" class="spinner-input" maxlength="2" value="{{ isset($jadwal) ? substr($jadwal->jam_selesai, 0, 2) : '00' }}">
                                        <button type="button" class="spinner-btn" onclick="incrementHour('jam_selesai_hour')">+</button>
                                    </div>
                                    <div class="time-label">Jam</div>
                                </div>
                                <div class="time-separator-main">:</div>
                                <div class="time-picker-group">
                                    <div class="time-spinner">
                                        <button type="button" class="spinner-btn" onclick="decrementMin('jam_selesai_min')">−</button>
                                        <input type="text" id="jam_selesai_min" class="spinner-input" maxlength="2" value="{{ isset($jadwal) ? substr($jadwal->jam_selesai, 3, 2) : '00' }}">
                                        <button type="button" class="spinner-btn" onclick="incrementMin('jam_selesai_min')">+</button>
                                    </div>
                                    <div class="time-label">Menit</div>
                                </div>
                            </div>
                            <input type="hidden" name="jam_selesai" id="jam_selesai">
                            @error('jam_selesai')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="lokasi">Lokasi <span style="color: red;">*</span></label>
                        <input type="text" name="lokasi" id="lokasi" class="form-control"
                            placeholder="Contoh: Lapangan, Ruang Musik, dll" value="{{ $jadwal->lokasi }}" required>
                        @error('lokasi')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn-primary">
                            <i class="fas fa-save"></i> Simpan Perubahan
                        </button>
                        <a href="{{ route('jadwal-admin') }}" class="btn-secondary">
                            <i class="fas fa-times"></i> Batal
                        </a>
                    </div>
                </form>

            </div>

        </main>
    </div>

    <script>
        function padZero(num) {
            return String(num).padStart(2, '0');
        }

        function incrementHour(id) {
            const input = document.getElementById(id);
            let val = parseInt(input.value || 0);
            val = (val + 1) % 24;
            input.value = padZero(val);
            updateHiddenInput();
        }

        function decrementHour(id) {
            const input = document.getElementById(id);
            let val = parseInt(input.value || 0);
            val = val === 0 ? 23 : val - 1;
            input.value = padZero(val);
            updateHiddenInput();
        }

        function incrementMin(id) {
            const input = document.getElementById(id);
            let val = parseInt(input.value || 0);
            val = (val + 1) % 60;
            input.value = padZero(val);
            updateHiddenInput();
        }

        function decrementMin(id) {
            const input = document.getElementById(id);
            let val = parseInt(input.value || 0);
            val = val === 0 ? 59 : val - 1;
            input.value = padZero(val);
            updateHiddenInput();
        }

        function updateHiddenInput() {
            const h1 = document.getElementById('jam_mulai_hour').value || '00';
            const m1 = document.getElementById('jam_mulai_min').value || '00';
            document.getElementById('jam_mulai').value = h1 + ':' + m1;

            const h2 = document.getElementById('jam_selesai_hour').value || '00';
            const m2 = document.getElementById('jam_selesai_min').value || '00';
            document.getElementById('jam_selesai').value = h2 + ':' + m2;
        }

        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('.spinner-input');
            
            inputs.forEach(input => {
                input.addEventListener('input', function() {
                    // Hanya angka
                    this.value = this.value.replace(/\D/g, '').slice(0, 2);
                });

                input.addEventListener('blur', function() {
                    // Validasi saat keluar
                    const isHour = this.id.includes('hour');
                    const maxVal = isHour ? 23 : 59;
                    let val = parseInt(this.value) || 0;
                    
                    if(val > maxVal) val = maxVal;
                    this.value = padZero(val);
                    updateHiddenInput();
                });

                input.addEventListener('change', updateHiddenInput);
            });

            // Initial update
            updateHiddenInput();
        });
    </script>
</body>

</html>
