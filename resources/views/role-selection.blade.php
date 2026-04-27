<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Pilih Peran - {{ config('app.name', 'SMK Ciomas') }}</title>

<link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Instrument Sans', sans-serif;
}

body {
  height: 100vh;
  overflow: hidden;
  display: flex;
  justify-content: center;
  align-items: center;
  color: white;

  /* ANIMATED GRADIENT */
  background: linear-gradient(-45deg, #2b1f6f, #3b2fa6, #4f46e5, #2e3fa3, #1e3a8a);
  background-size: 400% 400%;
  animation: gradientShift 15s ease infinite;
}

/* ANIMATED GRADIENT */
@keyframes gradientShift {
  0% { background-position: 0% 50%; }
  50% { background-position: 100% 50%; }
  100% { background-position: 0% 50%; }
}

/* ENHANCED SHAPE BACKGROUND */
body::before,
body::after,
body .shape1,
body .shape2 {
  content: "";
  position: absolute;
  border-radius: 50%;
  z-index: 0;
}

/* BULAT KIRI BESAR */
body::before {
  width: 600px;
  height: 600px;
  background: rgba(255,255,255,0.08);
  top: -200px;
  left: -200px;
  filter: blur(80px);
  animation: float 20s ease-in-out infinite;
}

/* BULAT KANAN BESAR */
body::after {
  width: 500px;
  height: 500px;
  background: rgba(79, 70, 229, 0.1);
  bottom: -150px;
  right: -150px;
  filter: blur(70px);
  animation: float 25s ease-in-out infinite reverse;
}

/* SHAPE 1 */
.shape1 {
  width: 300px;
  height: 300px;
  background: rgba(255,255,255,0.05);
  top: 20%;
  right: 10%;
  filter: blur(50px);
  animation: float 18s ease-in-out infinite;
}

/* SHAPE 2 */
.shape2 {
  width: 200px;
  height: 200px;
  background: rgba(255,255,255,0.03);
  bottom: 20%;
  left: 10%;
  filter: blur(40px);
  animation: float 22s ease-in-out infinite reverse;
}

@keyframes float {
  0%, 100% { transform: translateY(0px) rotate(0deg); }
  33% { transform: translateY(-20px) rotate(120deg); }
  66% { transform: translateY(10px) rotate(240deg); }
}

/* ENHANCED LAYER TENGAH */
.bg-overlay {
  position: absolute;
  width: 700px;
  height: 700px;
  background: radial-gradient(circle, rgba(255,255,255,0.08), transparent 70%);
  top: 15%;
  left: 50%;
  transform: translateX(-50%);
  filter: blur(100px);
  z-index: 0;
  animation: pulse 8s ease-in-out infinite;
}

@keyframes pulse {
  0%, 100% { opacity: 0.6; transform: translateX(-50%) scale(1); }
  50% { opacity: 1; transform: translateX(-50%) scale(1.05); }
}

/* CONTENT */
.container {
  position: relative;
  z-index: 10;
  text-align: center;
  width: 95%;
  max-width: 1100px;
  animation: fadeInUp 1s ease-out;
}

@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.logo img {
  width: 140px;
  margin-bottom: 15px;
  filter: drop-shadow(0 15px 40px rgba(0,0,0,0.5));
  transition: all 0.3s ease;
}

.logo img:hover {
  transform: scale(1.05) rotate(5deg);
}

h1 {
  font-size: 42px;
  font-weight: 700;
  margin-bottom: 10px;
  background: linear-gradient(135deg, #fff, #e0e7ff);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  text-shadow: 0 4px 20px rgba(0,0,0,0.3);
}

.subtitle {
  opacity: 0.85;
  font-size: 18px;
  margin-bottom: 50px;
  font-weight: 500;
}

/* ENHANCED CARDS GRID */
.cards {
  display: flex;
  gap: 25px;
  justify-content: center;
  flex-wrap: wrap;
  margin-bottom: 40px;
}

.card {
  width: 280px;
  padding: 35px 25px;
  border-radius: 30px;
  background: rgba(255,255,255,0.12);
  backdrop-filter: blur(20px);
  -webkit-backdrop-filter: blur(20px);
  border: 1px solid rgba(255,255,255,0.2);
  cursor: pointer;
  transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
  text-decoration: none;
  color: white;
  position: relative;
  overflow: hidden;
}

.card::before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
  transition: left 0.6s;
}

.card:hover::before {
  left: 100%;
}

.card:hover {
  transform: translateY(-15px) scale(1.05) rotateX(5deg);
  box-shadow: 
    0 25px 50px rgba(0,0,0,0.4),
    0 0 30px rgba(99, 102, 241, 0.3),
    inset 0 1px 0 rgba(255,255,255,0.5);
  border: 1px solid rgba(255,255,255,0.4);
}

.card.active {
  background: rgba(255,255,255,0.2);
  border: 2px solid rgba(255,255,255,0.6);
  box-shadow: 
    0 20px 40px rgba(0,0,0,0.3),
    0 0 40px rgba(99, 102, 241, 0.4);
  transform: translateY(-10px) scale(1.08);
}

.card i {
  font-size: 60px;
  width: 80px;
  height: 80px;
  margin: 0 auto 20px;
  display: block;
  background: rgba(255,255,255,0.1);
  border-radius: 20px;
  display: flex;
  align-items: center;
  justify-content: center;
  backdrop-filter: blur(10px);
  transition: all 0.3s ease;
}

.card:hover i {
  transform: scale(1.1) rotate(360deg);
  background: rgba(255,255,255,0.2);
}

.card h2 {
  font-size: 24px;
  font-weight: 600;
  margin-bottom: 15px;
}

.card p {
  font-size: 15px;
  opacity: 0.9;
  line-height: 1.6;
}

/* ENHANCED BUTTON */
.btn {
  padding: 16px 40px;
  border-radius: 50px;
  background: linear-gradient(135deg, #6366f1 0%, #3b82f6 50%, #1d4ed8 100%);
  color: white;
  font-size: 17px;
  font-weight: 600;
  cursor: pointer;
  border: none;
  opacity: 0.6;
  transition: all 0.4s ease;
  position: relative;
  overflow: hidden;
  text-transform: uppercase;
  letter-spacing: 1px;
}

.btn::before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
  transition: left 0.6s;
}

.btn:hover::before {
  left: 100%;
}

.btn.active {
  opacity: 1;
  box-shadow: 0 15px 35px rgba(99, 102, 241, 0.4);
}

.btn:hover {
  transform: translateY(-3px) scale(1.05);
  box-shadow: 0 20px 40px rgba(99, 102, 241, 0.5);
}

.btn:active {
  transform: translateY(-1px) scale(1.02);
}

.footer {
  margin-top: 25px;
  opacity: 0.7;
  font-size: 15px;
  font-weight: 500;
}

/* RESPONSIVE */
@media (max-width: 768px) {
  h1 { font-size: 36px; }
  .cards { 
    flex-direction: column;
    align-items: center;
    gap: 20px;
  }
  .card { width: 90%; max-width: 350px; }
}

@media (max-width: 480px) {
  h1 { font-size: 32px; }
  .subtitle { font-size: 16px; }
  .card { padding: 25px 20px; }
}
</style>
</head>
<body>
<!-- SHAPES -->
<div class="shape1"></div>
<div class="shape2"></div>

<!-- BACKGROUND LAYER -->
<div class="bg-overlay"></div>

<div class="container">
  <!-- LOGO -->
  <div class="logo">
    <img src="{{ asset('assets/logo.png') }}" alt="SMK Ciomas">
  </div>

  <h1><i class="fas fa-graduation-cap"></i> SMKN 1 CIOMAS</h1>
  <p class="subtitle">Sistem Informasi Ekstrakurikuler</p>

  <!-- CARDS -->
  <div class="cards">
    <div class="card" onclick="selectRole(this, '{{ route('login-admin') }}')">
      <i class="fas fa-user-shield"></i>
      <h2>Admin</h2>
      <p>Kelola data ekstrakurikuler, anggota, dan sistem dengan mudah</p>
    </div>

    <div class="card" onclick="selectRole(this, '{{ route('login-pembina') }}')">
      <i class="fas fa-chalkboard-teacher"></i>
      <h2>Pembina</h2>
      <p>Monitoring kegiatan, absensi siswa, dan bimbingan secara real-time</p>
    </div>

    <div class="card" onclick="selectRole(this, '{{ route('login-siswa') }}')">
      <i class="fas fa-user-graduate"></i>
      <h2>Siswa</h2>
      <p>Pilih ekstrakurikuler, lihat jadwal, dan lakukan absensi kehadiran</p>
    </div>
  </div>

  <!-- BUTTON -->
  <button id="loginBtn" class="btn" onclick="goLogin()">
    <i class="fas fa-arrow-right"></i> Masuk Sekarang
  </button>
  <p class="footer">Pilih peran Anda untuk melanjutkan ke dashboard</p>
</div>

<script>
let selectedRoute = "";

function selectRole(el, route) {
  // Remove active from all cards
  document.querySelectorAll('.card').forEach(c => c.classList.remove('active'));
  // Add active to clicked card
  el.classList.add('active');
  selectedRoute = route;
  
  // Activate button
  document.getElementById('loginBtn').classList.add('active');
  
  // Add shine effect
  el.style.animation = 'none';
  setTimeout(() => {
    el.style.animation = 'fadeInUp 0.5s ease-out';
  }, 10);
}

function goLogin() {
  if (!selectedRoute) {
    // Shake animation for error
    document.getElementById('loginBtn').style.animation = 'shake 0.5s ease-in-out';
    setTimeout(() => {
      document.getElementById('loginBtn').style.animation = '';
    }, 500);
    alert("Silakan pilih peran terlebih dahulu!");
    return;
  }
  window.location.href = selectedRoute;
}

// Add shake animation
const shakeKeyframes = `
@keyframes shake {
  0%, 100% { transform: translateX(0); }
  25% { transform: translateX(-5px); }
  75% { transform: translateX(5px); }
}
`;
const style = document.createElement('style');
style.textContent = shakeKeyframes;
document.head.appendChild(style);
</script>
</body>
</html>
