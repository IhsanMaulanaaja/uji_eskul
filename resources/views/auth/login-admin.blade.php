<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Admin - {{ config('app.name', 'SMK Ciomas') }}</title>

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
      padding: 20px;

      /* ANIMATED GRADIENT */
      background: linear-gradient(-45deg, #2b1f6f, #3b2fa6, #4f46e5, #2e3fa3, #1e3a8a);
      background-size: 400% 400%;
      animation: gradientShift 15s ease infinite;
    }

    @keyframes gradientShift {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    body::before,
    body::after,
    body .shape1,
    body .shape2 {
      content: "";
      position: absolute;
      border-radius: 50%;
      z-index: 0;
    }

    body::before {
      width: 600px;
      height: 600px;
      background: rgba(255,255,255,0.08);
      top: -200px;
      left: -200px;
      filter: blur(80px);
      animation: float 20s ease-in-out infinite;
    }

    body::after {
      width: 500px;
      height: 500px;
      background: rgba(79, 70, 229, 0.1);
      bottom: -150px;
      right: -150px;
      filter: blur(70px);
      animation: float 25s ease-in-out infinite reverse;
    }

    .shape1 {
      width: 300px;
      height: 300px;
      background: rgba(255,255,255,0.05);
      top: 20%;
      right: 10%;
      filter: blur(50px);
      animation: float 18s ease-in-out infinite;
    }

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

    .container {
      position: relative;
      z-index: 10;
      width: 100%;
      max-width: 480px;
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

    .login-box {
      background: rgba(255,255,255,0.12);
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
      border: 1px solid rgba(255,255,255,0.2);
      border-radius: 25px;
      padding: 45px 35px;
      box-shadow: 0 25px 50px rgba(0,0,0,0.3);
    }

    .logo {
      text-align: center;
      margin-bottom: 30px;
    }

    .logo img {
      width: 100px;
      filter: drop-shadow(0 10px 25px rgba(0,0,0,0.4));
      transition: all 0.3s ease;
    }

    .logo:hover img {
      transform: scale(1.05) rotate(5deg);
    }

    h1 {
      font-size: 28px;
      font-weight: 700;
      margin-bottom: 10px;
      background: linear-gradient(135deg, #fff, #e0e7ff);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .role-info {
      font-size: 14px;
      opacity: 0.85;
      margin-bottom: 35px;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
    }

    .role-info i {
      font-size: 18px;
      color: #a4c7ff;
    }

    .form-group {
      margin-bottom: 20px;
      position: relative;
    }

    .form-group label {
      display: block;
      font-size: 13px;
      font-weight: 600;
      margin-bottom: 8px;
      color: #e0e7ff;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .input-wrapper {
      position: relative;
    }

    .input-wrapper i {
      position: absolute;
      left: 15px;
      top: 50%;
      transform: translateY(-50%);
      color: #6366f1;
      font-size: 16px;
    }

    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 13px 15px 13px 45px;
      background: rgba(255,255,255,0.15);
      border: 1.5px solid rgba(255,255,255,0.2);
      border-radius: 12px;
      color: #fff;
      font-size: 14px;
      font-weight: 500;
      transition: all 0.3s ease;
    }

    input[type="email"]::placeholder,
    input[type="password"]::placeholder {
      color: rgba(255,255,255,0.5);
    }

    input[type="email"]:focus,
    input[type="password"]:focus {
      outline: none;
      background: rgba(255,255,255,0.2);
      border-color: rgba(99, 102, 241, 0.5);
      box-shadow: 0 0 15px rgba(99, 102, 241, 0.2);
    }

    .remember-section {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin: 20px 0 30px;
      font-size: 13px;
    }

    .remember-box {
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .remember-box input[type="checkbox"] {
      width: 16px;
      height: 16px;
      cursor: pointer;
    }

    .remember-box label {
      cursor: pointer;
      margin: 0;
      color: #dcd2ff;
    }

    .forget-link {
      color: #a4c7ff;
      text-decoration: none;
      transition: all 0.3s ease;
    }

    .forget-link:hover {
      color: #fff;
      text-decoration: underline;
    }

    .error-msg {
      background: rgba(220, 38, 38, 0.2);
      border: 1px solid rgba(220, 38, 38, 0.5);
      color: #fecaca;
      padding: 12px 15px;
      border-radius: 10px;
      margin-bottom: 20px;
      font-size: 13px;
      animation: shake 0.5s ease-in-out;
    }

    @keyframes shake {
      0%, 100% { transform: translateX(0); }
      25% { transform: translateX(-5px); }
      75% { transform: translateX(5px); }
    }

    .login-btn {
      width: 100%;
      padding: 14px;
      background: linear-gradient(135deg, #6366f1 0%, #3b82f6 50%, #1d4ed8 100%);
      color: white;
      font-size: 16px;
      font-weight: 700;
      border: none;
      border-radius: 12px;
      cursor: pointer;
      text-transform: uppercase;
      letter-spacing: 1px;
      transition: all 0.4s ease;
      position: relative;
      overflow: hidden;
      margin-bottom: 15px;
    }

    .login-btn::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
      transition: left 0.6s;
    }

    .login-btn:hover::before {
      left: 100%;
    }

    .login-btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 15px 35px rgba(99, 102, 241, 0.5);
    }

    .login-btn:active {
      transform: translateY(-1px);
    }

    .footer-links {
      text-align: center;
      margin-bottom: 20px;
    }

    .footer-links p {
      color: #d6d6ff;
      font-size: 13px;
      margin-bottom: 10px;
    }

    .footer-links a {
      color: #a4c7ff;
      text-decoration: none;
      transition: all 0.3s ease;
    }

    .footer-links a:hover {
      color: #fff;
      text-decoration: underline;
    }

    .back-home {
      text-align: center;
      margin-top: 20px;
    }

    .back-home a {
      color: #a4c7ff;
      text-decoration: none;
      font-size: 13px;
      transition: all 0.3s ease;
      display: inline-flex;
      align-items: center;
      gap: 6px;
    }

    .back-home a:hover {
      color: #fff;
    }

    @media (max-width: 480px) {
      .login-box {
        padding: 35px 25px;
        border-radius: 20px;
      }
      h1 {
        font-size: 24px;
      }
      .role-info {
        font-size: 13px;
      }
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
    <div class="login-box">
      <!-- LOGO -->
      <div class="logo">
        <img src="{{ asset('assets/logo.png') }}" alt="SMK Ciomas">
      </div>

      <h1><i class="fas fa-user-shield"></i> LOGIN ADMIN</h1>
      <div class="role-info">
        <i class="fas fa-lock"></i>
        <span>Kelola sistem sekolah dengan aman</span>
      </div>

      @if ($errors->any())
        <div class="error-msg">
          <i class="fas fa-exclamation-circle" style="margin-right: 8px;"></i>
          @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
          @endforeach
        </div>
      @endif

      <form method="POST" action="{{ route('login-admin') }}">
        @csrf

        <div class="form-group">
          <label><i class="fas fa-envelope" style="margin-right: 6px;"></i>Email</label>
          <div class="input-wrapper">
            <i class="fas fa-envelope"></i>
            <input type="email" name="email" value="{{ old('email') }}" required placeholder="admin@school.com">
          </div>
        </div>

        <div class="form-group">
          <label><i class="fas fa-lock" style="margin-right: 6px;"></i>Password</label>
          <div class="input-wrapper">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" required placeholder="Masukkan password">
          </div>
        </div>

        <div class="remember-section">
          <div class="remember-box">
            <input type="checkbox" id="remember" name="remember">
            <label for="remember">Ingat saya</label>
          </div>
          @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="forget-link">Lupa password?</a>
          @endif
        </div>

        <button class="login-btn" type="submit">
          <i class="fas fa-sign-in-alt" style="margin-right: 8px;"></i>LOGIN SEKARANG
        </button>
      </form>

      <div class="back-home">
        <a href="{{ route('landing') ?? '/' }}">
          <i class="fas fa-arrow-left"></i> Kembali ke Home
        </a>
      </div>
    </div>
  </div>
</body>
</html>
