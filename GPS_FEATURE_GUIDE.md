# GPS Absensi Feature - Panduan Penggunaan

## 📍 Fitur Baru

Sistem absensi ekskul sekarang dilengkapi dengan **GPS Tracking** yang memungkinkan:
- ✅ Siswa melakukan absensi dengan otomatis capture lokasi GPS
- ✅ Pembina/Admin melihat lokasi di mana siswa melakukan absensi melalui peta interaktif
- ✅ Informasi akurasi GPS dan waktu capture disimpan

---

## 🎯 Untuk Siswa - Cara Absensi dengan GPS

### 1. Akses Halaman Absensi
- Buka menu **"Absensi Ekskul"** dari sidebar
- URL: `http://localhost/absensi-ekskul-siswa`

### 2. Otomatis Capture GPS
- Halaman akan **otomatis mendeteksi lokasi GPS Anda** saat dimuat
- Browser akan meminta izin untuk mengakses lokasi - **klik "Izinkan"**
- Status akan berubah menjadi **"Lokasi berhasil didapat ✓"** dengan warna hijau

### 3. Informasi GPS Ditampilkan
Di bagian "Lokasi Absensi (GPS)" Anda akan melihat:
- **Latitude & Longitude**: Koordinat lokasi Anda
- **Akurasi**: Tingkat ketepatan GPS dalam meter (semakin kecil semakin akurat)
- **Peta Preview**: Peta interaktif menampilkan lokasi Anda (titik biru)

### 4. Untuk Manual Re-capture
- Jika GPS tidak tertangkap otomatis, klik tombol **"Capture Lokasi Sekarang"**
- Tombol akan berubah menjadi **"Perbarui Lokasi"** untuk update GPS data

### 5. Submit Absensi
- Pilih Status Kehadiran (Hadir/Izin/Sakit/Alfa)
- Isi Keterangan (optional)
- Pilih Ekstrakurikuler
- Klik **"Simpan"**
- **PENTING**: GPS harus sudah dicapture, jika belum akan muncul peringatan

### 📱 Syarat GPS Berfungsi
- **Mobile**: GPS harus aktif di ponsel
- **Desktop/Laptop**: Akses melalui HTTPS atau localhost (browser memerlukan koneksi secure untuk geolocation)
- **Browser**: Chrome, Firefox, Edge (semua browser modern)

---

## 👨‍🏫 Untuk Pembina/Admin - Cara Melihat Lokasi Absensi

### 1. Akses Halaman Absensi
- **Pembina**: Menu **"Absensi"** → akan melihat hanya siswa ekskul mereka
- **Admin**: Menu **"Absensi"** → akan melihat semua siswa
- URL: `http://localhost/absensi-ekskul` (dalam admin panel)

### 2. Lihat Tabel Absensi
Tabel akan menampilkan kolom baru **"Lokasi"** dengan:
- **Tombol "Lihat"** (hijau) - untuk siswa yang sudah capture GPS
- **Teks "Tidak ada data"** (abu-abu) - untuk siswa yang belum capture GPS

### 3. Klik Tombol "Lihat" untuk Buka Modal Peta
Modal akan menampilkan:

#### 📋 Informasi GPS:
- **Latitude**: Garis lintang siswa
- **Longitude**: Garis bujur siswa
- **Akurasi**: Tingkat akurasi GPS dalam meter
- **Waktu**: Kapan GPS di-capture

#### 🗺️ Peta Interaktif:
- **Titik Merah**: Lokasi eksak siswa saat absensi
- **Lingkaran Biru (Dotted)**: Jarak accuracy radius dari lokasi (jika ada)
- **Zoom**: Anda bisa zoom in/out untuk melihat detail
- **Pan**: Drag peta untuk melihat area lain

### 4. Filter & Cari
- Gunakan filter tanggal, status, nama siswa seperti biasa
- Tombol "Lokasi" hanya akan aktif untuk absensi yang memiliki GPS data

---

## 🔧 Database Schema

Tabel `absensi` sudah ditambah kolom:

```
- latitude (DECIMAL 10,8) - Koordinat lintang
- longitude (DECIMAL 11,8) - Koordinat bujur
- accuracy (FLOAT) - Akurasi GPS dalam meter
- gps_timestamp (TIMESTAMP) - Waktu capture GPS
```

---

## 🔐 Privacy & Security

- **Data GPS hanya tersimpan** dan tidak dikirim ke server eksternal
- **OpenStreetMap** digunakan sebagai source peta (open source, no API key needed)
- **Pembina/Admin** dapat melihat lokasi siswa untuk monitoring kehadiran
- **Siswa data** dijaga kerahasiaan dengan hanya ditampilkan ke pendidik

---

## 📱 Testing di Mobile

### Android:
1. Buka halaman absensi di browser Chrome
2. Tap menu > Settings > Site settings > Location
3. Pastikan Location permission **"Allow"**
4. GPS harus aktif di device settings
5. Page akan otomatis capture lokasi

### iOS:
1. Buka halaman di Safari browser
2. Ketika muncul popup "Allow Location" - tap **"Allow"**
3. Pastikan GPS aktif di device settings
4. Lokasi akan ter-capture otomatis

---

## ❓ Troubleshooting

| Masalah | Solusi |
|---------|---------|
| GPS tidak tertangkap | Pastikan browser mendapat izin lokasi. Cek di browser settings > Permissions > Location |
| Peta tidak muncul | Refresh halaman atau clear browser cache |
| Akurasi GPS buruk (>50m) | Pindahkan ke area terbuka, jauh dari bangunan tinggi |
| "Terjadi kesalahan GPS" | Network buruk atau browser tidak support geolocation API |
| Mobile GPS tidak aktif | Aktifkan Location Services di device settings |

---

## 📊 API Endpoints

Data GPS disimpan melalui:
- `POST /absensi-siswa-store` - Simpan absensi dengan GPS data
- Request body termasuk: `latitude`, `longitude`, `accuracy`

---

## 🎨 UI Components

### Siswa - GPS Section
- Status indicator (Acquiring/Ready/Error)
- Leaflet map (250px height for preview)
- Info box dengan lat/long/accuracy
- Capture button dengan loading state

### Pembina - Location Modal
- Modal overlay dengan location info
- Leaflet map (400px height untuk detail view)
- Accuracy circle visualization
- Popup dengan nama siswa

---

## 🚀 Future Enhancements

Kemungkinan pengembangan di masa depan:
- [ ] Geofencing - alert jika siswa di luar area
- [ ] Heatmap lokasi absensi
- [ ] Export laporan dengan peta
- [ ] Multiple location tracking
- [ ] Integration dengan Google Maps (opsional)

---

**v1.0 - Released: April 20, 2026**
