
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ config('app.name', 'SMK Ciomas') }} - Ekstrakurikuler</title>

<link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Instrument Sans', sans-serif;
}

html, body {
  width: 100%;
  overflow-x: hidden;
  scroll-behavior: smooth;
}

body {
  background: #f8fafc;
  color: #333;
  scroll-snap-type: y mandatory;
  overflow-y: scroll;
}

nav {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 1000;
  padding: 20px 60px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  background: rgba(255, 255, 255, 0.99);
  box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
  backdrop-filter: blur(10px);
}

.nav-brand {
  font-size: 24px;
  font-weight: 700;
  color: #1e3a8a;
  display: flex;
  align-items: center;
  gap: 10px;
}

.nav-menu {
  display: flex;
  gap: 50px;
  align-items: center;
  list-style: none;
}

.nav-menu a {
  color: #666;
  text-decoration: none;
  font-weight: 500;
  font-size: 15px;
  transition: all 0.3s ease;
  position: relative;
}

.nav-menu a::after {
  content: '';
  position: absolute;
  bottom: -8px;
  left: 0;
  width: 0;
  height: 3px;
  background: linear-gradient(135deg, #6366f1, #3b82f6);
  transition: width 0.3s ease;
}

.nav-menu a:hover {
  color: #1e3a8a;
}

.nav-menu a:hover::after {
  width: 100%;
}

.nav-menu a.active {
  color: #3b82f6;
}

.nav-menu a.active::after {
  width: 100%;
}

.btn-masuk-nav {
  padding: 12px 32px;
  background: linear-gradient(135deg, #1e3a8a, #3b82f6);
  color: white;
  border: none;
  border-radius: 50px;
  font-weight: 600;
  font-size: 15px;
  cursor: pointer;
  transition: all 0.3s ease;
  text-decoration: none;
  display: inline-block;
}

.btn-masuk-nav:hover {
  transform: translateY(-3px);
  box-shadow: 0 12px 30px rgba(30, 58, 138, 0.25);
}

/* HERO SECTION */
.hero {
  margin-top: 0;
  padding: 80px 60px;
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100vh;
  gap: 60px;
  position: relative;
  background-position: center;
  background-size: cover;
  background-repeat: no-repeat;
  scroll-snap-align: start;
  scroll-snap-stop: always;
}

.hero-content {
  flex: 1;
  max-width: 600px;
  position: relative;
  z-index: 2;
}

.hero-content h1 {
  font-size: 52px;
  font-weight: 700;
  color: #1e3a8a;
  margin-bottom: 25px;
  line-height: 1.2;
  letter-spacing: -0.5px;
  text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.hero-content p {
  font-size: 18px;
  color: #555;
  line-height: 1.8;
  margin-bottom: 40px;
}

.hero-buttons {
  display: flex;
  gap: 20px;
  flex-wrap: wrap;
}

.btn-hero {
  padding: 14px 32px;
  background: linear-gradient(135deg, #1e3a8a, #3b82f6);
  color: white;
  border: none;
  border-radius: 50px;
  font-weight: 600;
  font-size: 16px;
  cursor: pointer;
  transition: all 0.3s ease;
  text-decoration: none;
  display: inline-block;
}

.btn-hero:hover {
  transform: translateY(-3px);
  box-shadow: 0 15px 35px rgba(30, 58, 138, 0.3);
}

.btn-hero-secondary {
  background: transparent;
  border: 2px solid #3b82f6;
  color: #3b82f6;
}

.btn-hero-secondary:hover {
  background: #3b82f6;
  color: white;
}

.hero-image {
  flex: 1;
  display: flex;
  justify-content: center;
  align-items: center;
  position: relative;
  z-index: 2;
}

.hero-image-placeholder {
  width: 400px;
  height: 400px;
  background: linear-gradient(135deg, rgba(99, 102, 241, 0.1), rgba(59, 130, 246, 0.1));
  border-radius: 20px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 100px;
  color: #3b82f6;
  opacity: 0.3;
}

.hero-image img {
  max-width: 100%;
  height: auto;
  filter: drop-shadow(0 10px 30px rgba(0, 0, 0, 0.1));
}

/* RESPONSIVE */
@media (max-width: 1024px) {
  nav {
    padding: 20px 40px;
  }

  .nav-menu {
    gap: 30px;
  }

  .hero {
    padding: 60px 40px;
    gap: 40px;
  }

  .hero-content h1 {
    font-size: 42px;
  }

  .hero-image-placeholder {
    width: 300px;
    height: 300px;
  }
}

@media (max-width: 768px) {
  nav {
    padding: 15px 20px;
    flex-direction: column;
    gap: 15px;
  }

  .nav-menu {
    gap: 20px;
    flex-wrap: wrap;
    justify-content: center;
  }

  .hero {
    flex-direction: column;
    padding: 40px 20px;
    text-align: center;
  }

  .hero-content h1 {
    font-size: 36px;
  }

  .hero-content p {
    font-size: 16px;
  }

  .hero-buttons {
    justify-content: center;
  }

  .hero-image {
    margin-top: 30px;
  }

  .hero-image-placeholder {
    width: 250px;
    height: 250px;
  }
}

@media (max-width: 480px) {
  nav {
    padding: 15px 15px;
  }

  .nav-menu {
    gap: 15px;
  }

  .hero {
    padding: 30px 15px;
    margin-top: 200px;
  }

  .hero-content h1 {
    font-size: 28px;
  }

  .hero-content p {
    font-size: 14px;
  }

  .btn-masuk-nav {
    padding: 10px 24px;
    font-size: 13px;
  }

  .hero-image-placeholder {
    width: 200px;
    height: 200px;
    font-size: 60px;
  }
}

/* TENTANG SECTION */
.tentang {
  padding: 120px 60px;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 100px;
  background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #0f4c75 100%);
  position: relative;
  overflow: hidden;
  height: 100vh;
  scroll-snap-align: start;
  scroll-snap-stop: always;
}

.tentang::before {
  content: '';
  position: absolute;
  top: -50%;
  right: -10%;
  width: 600px;
  height: 600px;
  background: radial-gradient(circle, rgba(59, 130, 246, 0.15) 0%, transparent 70%);
  border-radius: 50%;
  pointer-events: none;
}

.tentang::after {
  content: '';
  position: absolute;
  bottom: -20%;
  left: -5%;
  width: 400px;
  height: 400px;
  background: radial-gradient(circle, rgba(99, 102, 241, 0.1) 0%, transparent 70%);
  border-radius: 50%;
  pointer-events: none;
}

.tentang-content {
  flex: 1;
  max-width: 600px;
  position: relative;
  z-index: 2;
  animation: slideInLeft 0.8s ease-out;
}

@keyframes slideInLeft {
  from {
    opacity: 0;
    transform: translateX(-50px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
}

.tentang-content h2 {
  font-size: 48px;
  font-weight: 700;
  color: #e0e7ff;
  margin-bottom: 25px;
  letter-spacing: -0.5px;
  background: linear-gradient(135deg, #a78bfa, #60a5fa);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}

.tentang-content p {
  font-size: 17px;
  color: #cbd5e1;
  line-height: 1.9;
  margin-bottom: 45px;
  font-weight: 300;
}

.tentang-features {
  background: rgba(30, 41, 59, 0.6);
  border: 2px solid rgba(59, 130, 246, 0.4);
  border-radius: 25px;
  padding: 40px;
  backdrop-filter: blur(20px);
  box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
  transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
  animation: slideUp 0.8s ease-out 0.2s both;
}

@keyframes slideUp {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.tentang-features:hover {
  border-color: rgba(59, 130, 246, 0.7);
  background: rgba(30, 41, 59, 0.8);
  box-shadow: 0 35px 70px rgba(59, 130, 246, 0.2);
  transform: translateY(-5px);
}

.tentang-features ul {
  list-style: none;
}

.tentang-features li {
  font-size: 17px;
  color: #cbd5e1;
  margin-bottom: 22px;
  display: flex;
  align-items: center;
  gap: 18px;
  font-weight: 500;
  transition: all 0.3s ease;
}

.tentang-features li:hover {
  color: #e0e7ff;
  transform: translateX(8px);
}

.tentang-features li:last-child {
  margin-bottom: 0;
}

.tentang-features li i {
  font-size: 24px;
  background: linear-gradient(135deg, #60a5fa, #a78bfa);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  min-width: 30px;
  text-align: center;
  filter: drop-shadow(0 0 8px rgba(96, 165, 250, 0.3));
  transition: all 0.3s ease;
}

.tentang-features li:hover i {
  filter: drop-shadow(0 0 15px rgba(96, 165, 250, 0.6));
  transform: scale(1.2);
}

.tentang-image {
  flex: 1;
  display: flex;
  justify-content: center;
  align-items: center;
  position: relative;
  z-index: 2;
  animation: slideInRight 0.8s ease-out;
}

@keyframes slideInRight {
  from {
    opacity: 0;
    transform: translateX(50px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
}

.tentang-illustration {
  width: 350px;
  height: 350px;
  background: linear-gradient(135deg, rgba(96, 165, 250, 0.2), rgba(167, 139, 250, 0.2));
  border: 2px solid rgba(96, 165, 250, 0.3);
  border-radius: 25px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 160px;
  color: #60a5fa;
  position: relative;
  overflow: hidden;
  box-shadow: 
    0 0 60px rgba(96, 165, 250, 0.2),
    inset 0 0 40px rgba(96, 165, 250, 0.1);
  animation: float 3s ease-in-out infinite;
}

@keyframes float {
  0%, 100% {
    transform: translateY(0px);
  }
  50% {
    transform: translateY(-20px);
  }
}

.tentang-illustration::before {
  content: '';
  position: absolute;
  top: -50%;
  left: -50%;
  width: 200%;
  height: 200%;
  background: conic-gradient(
    from 0deg,
    transparent 0deg,
    rgba(96, 165, 250, 0.1) 90deg,
    transparent 180deg
  );
  animation: spin 8s linear infinite;
}

@keyframes spin {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(360deg);
  }
}

.tentang-illustration i {
  position: relative;
  z-index: 2;
  filter: drop-shadow(0 0 20px rgba(96, 165, 250, 0.4));
  animation: bounce 2s ease-in-out infinite;
}

@keyframes bounce {
  0%, 100% {
    transform: translateY(0);
  }
  50% {
    transform: translateY(-15px);
  }
}

@media (max-width: 1024px) {
  .tentang {
    padding: 100px 40px;
    gap: 60px;
  }

  .tentang-content h2 {
    font-size: 40px;
  }

  .tentang-content p {
    font-size: 16px;
  }

  .tentang-illustration {
    width: 300px;
    height: 300px;
    font-size: 120px;
  }

  .tentang-features {
    padding: 35px;
  }
}

@media (max-width: 768px) {
  .tentang {
    flex-direction: column;
    padding: 80px 20px;
    gap: 50px;
  }

  .tentang::before {
    width: 400px;
    height: 400px;
  }

  .tentang-content h2 {
    font-size: 36px;
  }

  .tentang-content p {
    font-size: 15px;
  }

  .tentang-features {
    padding: 30px;
  }

  .tentang-features li {
    font-size: 16px;
    margin-bottom: 18px;
  }

  .tentang-illustration {
    width: 250px;
    height: 250px;
    font-size: 100px;
  }
}

@media (max-width: 480px) {
  .tentang {
    padding: 60px 15px;
    gap: 30px;
  }

  .tentang::before {
    width: 250px;
    height: 250px;
  }

  .tentang-content h2 {
    font-size: 28px;
    margin-bottom: 20px;
  }

  .tentang-content p {
    font-size: 14px;
    margin-bottom: 30px;
  }

  .tentang-features {
    padding: 20px;
  }

  .tentang-features li {
    font-size: 14px;
    margin-bottom: 15px;
    gap: 12px;
  }

  .tentang-features li i {
    font-size: 20px;
  }

  .tentang-illustration {
    width: 180px;
    height: 180px;
    font-size: 70px;
  }
}

/* PRESTASI SECTION */
.prestasi {
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  position: relative;
  scroll-snap-align: start;
  scroll-snap-stop: always;
  flex-direction: column;
  gap: 20px;
  text-align: center;
}

.prestasi h2 {
  font-size: 48px;
  font-weight: 700;
  color: white;
  letter-spacing: -0.5px;
}

.prestasi p {
  font-size: 18px;
  color: rgba(255, 255, 255, 0.8);
  max-width: 600px;
}

.prestasi-icon {
  font-size: 100px;
  color: rgba(255, 255, 255, 0.3);
  margin-bottom: 20px;
}

/* KONTAK SECTION */
.kontak {
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
  position: relative;
  scroll-snap-align: start;
  scroll-snap-stop: always;
  flex-direction: column;
  gap: 20px;
  text-align: center;
}

.kontak h2 {
  font-size: 48px;
  font-weight: 700;
  color: white;
  letter-spacing: -0.5px;
}

.kontak p {
  font-size: 18px;
  color: rgba(255, 255, 255, 0.8);
  max-width: 600px;
}

.kontak-icon {
  font-size: 100px;
  color: rgba(255, 255, 255, 0.3);
  margin-bottom: 20px;
}

@media (max-width: 768px) {
  .prestasi h2,
  .kontak h2 {
    font-size: 36px;
  }

  .prestasi p,
  .kontak p {
    font-size: 16px;
  }

  .prestasi-icon,
  .kontak-icon {
    font-size: 70px;
  }
}

@media (max-width: 480px) {
  .prestasi h2,
  .kontak h2 {
    font-size: 28px;
  }

  .prestasi p,
  .kontak p {
    font-size: 14px;
  }

  .prestasi-icon,
  .kontak-icon {
    font-size: 50px;
  }
}
</style>
</head>
<body>
<!-- NAVBAR -->
<nav>
  <div class="nav-brand">
    <i class="fas fa-graduation-cap"></i> Ekstrakurikuler
  </div>
  <ul class="nav-menu">
    <li><a href="#beranda" class="active">Beranda</a></li>
    <li><a href="#tentang">Tentang</a></li>
    <li><a href="#prestasi">Prestasi</a></li>
    <li><a href="#kontak">Kontak</a></li>
  </ul>
  <a href="{{ route('role-selection') }}" class="btn-masuk-nav">Masuk</a>
</nav>

<!-- HERO SECTION -->
<section class="hero" id="beranda" style="background-image: linear-gradient(135deg, rgba(240, 244, 248, 0.7), rgba(232, 241, 249, 0.7)), url('{{ asset('assets/skanic.png') }}');">
  <div class="hero-content">
    <h1>SELAMAT DATANG DI WEBSITE EKSTRAKURIKULER</h1>
    <p>Platform untuk mendokumentasikan pengalaman dan prestasi siswa selama berpartisipasi dalam ekstrakurikuler di sekolah.</p>
  </div>
  <div class="hero-image">
    @if (file_exists(public_path('assets/ekskul/hero.svg')))
      <img src="{{ asset('assets/ekskul/hero.svg') }}" alt="Ekstrakurikuler">
    @else
      <div class="hero-image-placeholder">
        <i class="fas fa-graduation-cap"></i>
      </div>
    @endif
  </div>
</section>

<!-- TENTANG SECTION -->
<section class="tentang" id="tentang">
  <div class="tentang-content">
    <h2>Tentang Ekstrakurikuler</h2>
    <p>Ekstrakurikuler merupakan kegiatan tambahan di luar jam pelajaran yang bertujuan untuk mengembangkan minat, bakat, serta keterampilan siswa. Melalui kegiatan ini, siswa dapat menyalurkan potensi diri dan meraih berbagai prestasi.</p>
    
    <div class="tentang-features">
      <ul>
        <li>
          <i class="fas fa-target"></i>
          <span>Mengembangkan minat & bakat</span>
        </li>
        <li>
          <i class="fas fa-trophy"></i>
          <span>Meningkatkan prestasi siswa</span>
        </li>
        <li>
          <i class="fas fa-handshake"></i>
          <span>Melatih kerja sama & disiplin</span>
        </li>
      </ul>
    </div>
  </div>

  <div class="tentang-image">
    <div class="tentang-illustration">
      <i class="fas fa-running"></i>
    </div>
  </div>
</section>

<!-- PRESTASI SECTION -->
<section class="prestasi" id="prestasi">
  <div class="prestasi-icon">
    <i class="fas fa-award"></i>
  </div>
  <h2>Prestasi</h2>
  <p>Lihat pencapaian dan prestasi siswa dalam berbagai ekstrakurikuler. Bagian ini akan menampilkan daftar penghargaan dan kompetisi yang telah diikuti.</p>
</section>

<!-- KONTAK SECTION -->
<section class="kontak" id="kontak">
  <div class="kontak-icon">
    <i class="fas fa-envelope"></i>
  </div>
  <h2>Kontak</h2>
  <p>Hubungi kami untuk informasi lebih lanjut tentang ekstrakurikuler di sekolah. Tim kami siap membantu Anda.</p>
</section>

<script>
// Highlight active menu based on scroll
document.querySelectorAll('.nav-menu a').forEach(link => {
  link.addEventListener('click', function(e) {
    e.preventDefault();
    document.querySelectorAll('.nav-menu a').forEach(l => l.classList.remove('active'));
    this.classList.add('active');
    
    const target = this.getAttribute('href');
    if (target.startsWith('#')) {
      const element = document.querySelector(target);
      if (element) {
        element.scrollIntoView({ behavior: 'smooth' });
      }
    }
  });
});
</script>
</body>
</html>
