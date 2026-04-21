
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai Siswa</title>
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
        }

        .topnav-right {
            display: flex;
            align-items: center;
            gap: 18px;
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
        }

        .app-container {
            display: flex;
            flex: 1;
            min-height: calc(100vh - 62px);
        }

        .sidebar {
            width: 180px;
            background: #a8c4d8;
            padding: 40px 0 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
            border-right: 1px solid rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 62px;
            height: calc(100vh - 62px);
            overflow-y: auto;
        }

        .sidebar-logo img {
            width: 100px;
            height: 100px;
            margin-bottom: 12px;
        }

        .sidebar-title {
            font-size: 16px;
            font-weight: 900;
            color: #1a1a1a;
            margin-bottom: 24px;
        }

        .sidebar-divider {
            width: 100%;
            height: 1px;
            background: #608eb1;
            margin-bottom: 20px;
        }

        .sidebar-nav {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 6px;
            padding: 0 16px;
            flex: 1;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            color: #1a1a2e;
            text-decoration: none;
            transition: background 0.2s;
        }

        .nav-item:hover {
            background: rgba(255, 255, 255, 0.4);
        }

        .nav-item.active {
            background: #ffffff;
            color: #1a1a1a;
            font-weight: 800;
        }

        .main {
            flex: 1;
            padding: 24px 32px;
            display: flex;
            flex-direction: column;
            gap: 20px;
            overflow-y: auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            font-size: 24px;
            font-weight: 800;
            color: #111;
        }

        .filter-row {
            background: #fff;
            border-radius: 8px;
            padding: 14px 18px;
            display: flex;
            align-items: center;
            gap: 12px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
        }

        .filter-select {
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            padding: 8px 12px;
            font-size: 13px;
            font-family: 'Nunito', sans-serif;
            outline: none;
        }

        .card {
            background: #fff;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #f8fafc;
            padding: 12px;
            text-align: left;
            font-size: 14px;
            font-weight: 800;
            color: #111;
            border-bottom: 2px solid #f1f5f9;
        }

        td {
            padding: 14px 12px;
            border-bottom: 1px solid #f1f5f9;
            font-size: 14px;
            color: #333;
        }

        .user-cell {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #ffd54f;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            border: 2px solid #fff;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .user-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .nilai-badge {
            display: inline-block;
            padding: 6px 14px;
            border-radius: 6px;
            font-weight: 800;
            font-size: 14px;
            color: #fff;
        }

        .nilai-a {
            background: #22c55e;
        }

        .nilai-b {
            background: #3b82f6;
        }

        .nilai-c {
            background: #f59e0b;
        }

        .action-btns {
            display: flex;
            gap: 8px;
        }

        .btn-small {
            border: none;
            border-radius: 4px;
            padding: 6px 12px;
            font-size: 12px;
            font-weight: 700;
            font-family: 'Nunito', sans-serif;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-edit {
            background: #3b82f6;
            color: #fff;
        }

        .btn-edit:hover {
            background: #2563eb;
        }

        .btn-delete {
            background: #ef4444;
            color: #fff;
        }

        .btn-delete:hover {
            background: #dc2626;
        }

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

        .form-group {
            margin-bottom: 16px;
        }

        .form-group label {
            display: block;
            margin-bottom: 6px;
            font-size: 14px;
            font-weight: 700;
            color: #444;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 8px 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-family: inherit;
            font-size: 14px;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 80px;
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

        .btn-save:hover {
            background: #2563eb;
        }

        .alert {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #86efac;
        }

        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: #999;
        }

        .empty-state i {
            font-size: 48px;
            color: #cbd5e1;
            margin-bottom: 16px;
            display: block;
        }
    </style>
</head>

<body>
    <nav class="topnav">
        <div class="topnav-brand">
            <img src="{{ asset('assets/image9.png') }}" width="38" height="38" alt="Logo" style="border-radius: 4px;">
            <div class="brand-text"><b>SmartSchool</b> Ekskul</div>
        </div>
        <div class="topnav-right">
            <div style="font-size: 22px; color: #222; cursor: pointer;"><i class="fas fa-bell"></i></div>
            <button class="user-btn">{{ Auth::user()->name }} <i class="fas fa-chevron-down" style="font-size:13px;"></i></button>
        </div>
    </nav>

    <div class="app-container">
        <aside class="sidebar">
            <div class="sidebar-logo">
                <img src="{{ asset('assets/image3.png') }}" alt="Logo">
            </div>
            <div class="sidebar-title">SmartSchool Ekskul</div>
            <div class="sidebar-divider"></div>

            <nav class="sidebar-nav">
                <a class="nav-item" href="{{ route('dashboard-pembina') }}">
                    <span><i class="fas fa-home"></i></span>
                    Beranda
                </a>
                <a class="nav-item" href="{{ route('pendaftaran-ekskul') }}">
                    <span><i class="fas fa-clipboard-list"></i></span>
                    Pendaftar
                </a>
                <a class="nav-item" href="{{ route('anggota-admin') }}">
                    <span><i class="fas fa-users"></i></span>
                    Kelola Siswa
                </a>
                <a class="nav-item" href="{{ route('jadwal-admin') }}">
                    <span><i class="fas fa-calendar"></i></span>
                    Jadwal Latihan
                </a>
                <a class="nav-item" href="{{ route('absensi-admin') }}">
                    <span><i class="fas fa-calendar-check"></i></span>
                    Absensi
                </a>
                <a class="nav-item" href="{{ route('prestasi-admin') }}">
                    <span><i class="fas fa-medal"></i></span>
                    Kegiatan & Prestasi
                </a>
                <a class="nav-item" href="{{ route('pengumuman.index') }}">
                    <span><i class="fas fa-bullhorn"></i></span>
                    Pengumuman
                </a>
                <a class="nav-item active" href="{{ route('nilai.index') }}">
                    <span><i class="fas fa-star"></i></span>
                    Nilai Siswa
                </a>
            </nav>

            <div style="width: 100%; padding: 0 20px; margin-top: auto;">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="nav-item" style="width: 100%; background: #e63946; color: white; justify-content: center;">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </aside>

        <main class="main">
            <div class="header">
                <h1>Nilai Siswa</h1>
            </div>

            @if (session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert" style="background: #fee2e2; border-color: #fca5a5; color: #991b1b;">
                    <i class="fas fa-exclamation-circle"></i>
                    {{ session('error') }}
                </div>
            @endif

            <div class="card">
                @if($anggotaList->count() > 0)
                    <table style="margin-bottom: 20px;">
                        <thead>
                            <tr>
                                <th style="width: 6%;">No</th>
                                <th style="width: 28%;">Nama Siswa</th>
                                <th style="width: 12%;">Kelas</th>
                                <th style="width: 12%;">Nilai</th>
                                <th style="width: 30%;">Keterangan</th>
                                <th style="width: 12%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($anggotaList as $index => $anggota)
                                @php
                                    $nilai = $nilaiList->where('user_id', $anggota->user_id)->first();
                                @endphp
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <div class="user-cell">
                                            <div class="user-avatar">
                                                @if ($anggota->user->foto)
                                                    <img src="{{ Storage::url($anggota->user->foto) }}" alt="Foto">
                                                @else
                                                    <i class="fas fa-user" style="color:#fff; font-size: 18px;"></i>
                                                @endif
                                            </div>
                                            {{ $anggota->user->name }}
                                        </div>
                                    </td>
                                    <td>{{ $anggota->user->kelas ?? '-' }}</td>
                                    <td>
                                        @if($nilai)
                                            <span class="nilai-badge nilai-{{ strtolower($nilai->nilai) }}">
                                                {{ $nilai->nilai }}
                                            </span>
                                        @else
                                            <span style="color: #999;">Belum ada nilai</span>
                                        @endif
                                    </td>
                                    <td title="{{ $nilai?->keterangan ?? '' }}">{{ $nilai?->keterangan ? Str::limit($nilai->keterangan, 50) : '-' }}</td>
                                    <td>
                                        <div class="action-btns">
                                            <button type="button" class="btn-small btn-edit" 
                                                onclick="openNilaiModal('{{ $anggota->user->id }}', '{{ $anggota->user->name }}', '{{ $nilai?->nilai ?? '' }}', '{{ $nilai?->keterangan ?? '' }}', '{{ $anggota->ekskul_id }}')">
                                                <i class="fas fa-edit"></i> Ubah
                                            </button>
                                            @if($nilai)
                                            <form action="{{ route('nilai.destroy', $nilai->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-small btn-delete" onclick="return confirm('Yakin hapus nilai ini?')">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </button>
                                            </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="empty-state">
                        <i class="fas fa-inbox"></i>
                        <p style="font-size: 16px; font-weight: 600;">Tidak ada siswa</p>
                    </div>
                @endif
            </div>
        </main>
    </div>

    <!-- Modal Input Nilai -->
    <div class="modal-overlay" id="nilaiModal">
        <div class="modal-content">
            <div class="modal-header">Ubah Nilai <span id="studentName"></span></div>
            <form id="nilaiForm" method="POST" action="{{ route('nilai.input') }}">
                @csrf
                <input type="hidden" name="user_id" id="userId">
                <input type="hidden" name="ekskul_id" id="ekskulId" value="{{ $ekskulFilter ?? '' }}">

                <div id="messageAlert" style="display:none; padding: 12px; border-radius: 6px; margin-bottom: 12px; font-weight: 600;"></div>

                <div class="form-group">
                    <label for="nilaiSelect">Nilai</label>
                    <select name="nilai" id="nilaiSelect" required>
                        <option value="">-- Pilih Nilai --</option>
                        <option value="A">A (Sangat Baik)</option>
                        <option value="B">B (Baik)</option>
                        <option value="C">C (Cukup)</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" placeholder="Contoh: Siswa sangat aktif dan disiplin"></textarea>
                </div>

                <div class="modal-actions">
                    <button type="button" class="btn-cancel" onclick="closeNilaiModal()">Batal</button>
                    <button type="submit" class="btn-save" id="submitBtn">Simpan Nilai</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openNilaiModal(userId, studentName, nilaiValue, keterangan, ekskulId) {
            document.getElementById('nilaiModal').style.display = 'flex';
            document.getElementById('userId').value = userId;
            document.getElementById('ekskulId').value = ekskulId;
            document.getElementById('studentName').textContent = studentName;
            document.getElementById('nilaiSelect').value = nilaiValue;
            document.getElementById('keterangan').value = keterangan;
            document.getElementById('messageAlert').style.display = 'none';
        }

        function closeNilaiModal() {
            document.getElementById('nilaiModal').style.display = 'none';
            document.getElementById('messageAlert').style.display = 'none';
        }

        // Handle form submit dengan AJAX
        document.getElementById('nilaiForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const submitBtn = document.getElementById('submitBtn');
            submitBtn.disabled = true;
            submitBtn.textContent = 'Menyimpan...';
            
            const formData = new FormData(this);
            
            fetch('{{ route("nilai.input") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                submitBtn.disabled = false;
                submitBtn.textContent = 'Simpan Nilai';
                
                const messageAlert = document.getElementById('messageAlert');
                if (data.success) {
                    messageAlert.style.background = '#dcfce7';
                    messageAlert.style.border = '1px solid #86efac';
                    messageAlert.style.color = '#166534';
                    messageAlert.textContent = '✓ ' + data.message;
                    messageAlert.style.display = 'block';
                    
                    setTimeout(() => {
                        closeNilaiModal();
                        location.reload();
                    }, 1500);
                } else {
                    messageAlert.style.background = '#fee2e2';
                    messageAlert.style.border = '1px solid #fecaca';
                    messageAlert.style.color = '#991b1b';
                    messageAlert.textContent = '✗ ' + data.message;
                    messageAlert.style.display = 'block';
                }
            })
            .catch(error => {
                submitBtn.disabled = false;
                submitBtn.textContent = 'Simpan Nilai';
                
                const messageAlert = document.getElementById('messageAlert');
                messageAlert.style.background = '#fee2e2';
                messageAlert.style.border = '1px solid #fecaca';
                messageAlert.style.color = '#991b1b';
                messageAlert.textContent = '✗ Terjadi kesalahan: ' + error.message;
                messageAlert.style.display = 'block';
            });
        });
    </script>
</body>

</html>
