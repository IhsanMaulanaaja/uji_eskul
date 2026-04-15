<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Admin - {{ config('app.name', 'Eskul') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <style>
        /* replicate the same styling as student registration */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0
        }

        html,
        body {
            height: 100%;
            font-family: 'Instrument Sans', system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(180deg, #2b1f6f 0%, #3b2fa6 60%);
            padding: 24px;
            min-height: 100vh
        }

        .container {
            width: 100%;
            max-width: 700px;
            text-align: center;
            color: #fff
        }

        .box {
            background: rgba(0, 0, 0, 0.06);
            padding: 40px;
            border-radius: 18px
        }

        .logo {
            width: 100px;
            height: 100px;
            margin: 0 auto 18px;
            display: flex;
            align-items: center;
            justify-content: center
        }

        .logo img {
            width: 90px;
            height: auto
        }

        h1 {
            font-size: 24px;
            color: #ffeccf;
            margin-bottom: 24px;
            font-weight: 700;
            letter-spacing: 1.5px
        }

        .form-group {
            text-align: left;
            margin-bottom: 16px
        }

        .row-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            margin-bottom: 16px;
        }

        .row-grid .form-group {
            margin-bottom: 0;
        }

        label {
            display: block;
            color: #ffeccf;
            font-size: 13px;
            margin-bottom: 6px;
            font-weight: 500
        }

        input[type=text],
        input[type=email],
        input[type=password] {
            width: 100%;
            padding: 11px 12px;
            border-radius: 6px;
            border: 0;
            background: #fff;
            color: #222;
            font-size: 14px;
            font-family: inherit;
            transition: all 0.3s ease
        }

        input[type=text]:focus,
        input[type=email]:focus,
        input[type=password]:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(255, 236, 207, 0.3)
        }

        input::placeholder {
            color: #999
        }

        .register-btn {
            display: inline-block;
            padding: 12px 44px;
            border-radius: 24px;
            background: #fff;
            color: #222;
            font-weight: 700;
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.35);
            border: none;
            cursor: pointer;
            margin-top: 8px;
            width: 100%;
            transition: all 0.3s ease
        }

        .register-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 16px 50px rgba(0, 0, 0, 0.4)
        }

        .login-link {
            margin-top: 18px;
            color: #d6d6ff;
            font-size: 13px
        }

        .login-link a {
            color: #a4c7ff;
            text-decoration: none;
            font-weight: 600
        }

        .login-link a:hover {
            text-decoration: underline
        }

        .error-msg {
            background: #fee;
            color: #c00;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 12px;
            text-align: left;
            font-size: 12px
        }

        .error-msg ul {
            margin: 0;
            padding-left: 20px
        }

        .error-msg li {
            list-style: none;
            margin-bottom: 5px
        }

        .password-rules {
            background: rgba(255, 255, 255, 0.1);
            border-left: 3px solid #a4c7ff;
            padding: 10px 12px;
            border-radius: 6px;
            margin-top: 8px;
            font-size: 12px;
            color: #e0d8ff;
            text-align: left
        }

        @media(max-width:600px) {
            .box {
                padding: 26px
            }

            h1 {
                font-size: 20px
            }

            .row-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="box">

            <!-- LOGO -->
            <div class="logo">
                <img src="{{ asset('assets/logo.png') }}" alt="SMK CIOMAS">
            </div>

            <h1>DAFTAR ADMIN</h1>

            @if ($errors->any())
                <div class="error-msg">
                    <strong>Terjadi kesalahan:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register-admin') }}">
                @csrf

                <div class="row-grid">
                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required
                            placeholder="Masukkan nama" autofocus>
                        @error('name')
                            <span style="color:#c00;font-size:11px;margin-top:4px;display:block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required
                            placeholder="Masukkan email">
                        @error('email')
                            <span style="color:#c00;font-size:11px;margin-top:4px;display:block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row-grid">
                    <div class="form-group">
                        <label for="nomor_telepon">Nomor Telepon</label>
                        <input type="text" id="nomor_telepon" name="nomor_telepon" value="{{ old('nomor_telepon') }}"
                            required placeholder="Nomor telepon">
                        @error('nomor_telepon')
                            <span style="color:#c00;font-size:11px;margin-top:4px;display:block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" id="alamat" name="alamat" value="{{ old('alamat') }}" required
                            placeholder="Alamat">
                        @error('alamat')
                            <span style="color:#c00;font-size:11px;margin-top:4px;display:block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row-grid">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required placeholder="Minimal 8 karakter">
                        @error('password')
                            <span style="color:#c00;font-size:11px;margin-top:4px;display:block">{{ $message }}</span>
                        @enderror
                        <div class="password-rules">
                            • Minimal 8 karakter<br>
                            • Gunakan kombinasi huruf dan angka
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Konfirmasi Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required
                            placeholder="Ketik ulang password">
                        @error('password_confirmation')
                            <span style="color:#c00;font-size:11px;margin-top:4px;display:block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <button class="register-btn" type="submit">DAFTAR</button>
            </form>

        </div>
    </div>
</body>

</html>
