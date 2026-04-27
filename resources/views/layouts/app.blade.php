<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - {{ config('app.name', 'SMK Ciomas') }}</title>

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
        }

        body {
            background: #f8fafc;
            color: #333;
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
            text-decoration: none;
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

        main {
            margin-top: 80px;
            min-height: calc(100vh - 80px);
        }

        @media (max-width: 1024px) {
            nav {
                padding: 20px 40px;
            }

            .nav-menu {
                gap: 30px;
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
        }

        @media (max-width: 480px) {
            nav {
                padding: 15px 15px;
            }

            .nav-menu {
                gap: 15px;
            }

            .btn-masuk-nav {
                padding: 10px 24px;
                font-size: 13px;
            }
        }
    </style>

    @yield('extra-styles')
</head>
<body>
    <!-- NAVBAR -->
    <nav>
        <a href="{{ route('landing') }}" class="nav-brand">
            <i class="fas fa-graduation-cap"></i> Ekstrakurikuler
        </a>
        <ul class="nav-menu">
            <li><a href="{{ route('landing') }}" class="{{ Request::routeIs('landing') ? 'active' : '' }}">Beranda</a></li>
            <li><a href="{{ route('tentang') }}" class="{{ Request::routeIs('tentang') ? 'active' : '' }}">Tentang</a></li>
            <li><a href="{{ route('prestasi') }}" class="{{ Request::routeIs('prestasi') ? 'active' : '' }}">Prestasi</a></li>
            <li><a href="{{ route('kontak.index') }}" class="{{ Request::routeIs('kontak.index') ? 'active' : '' }}">Kontak</a></li>
        </ul>
        <a href="{{ route('role-selection') }}" class="btn-masuk-nav">Masuk</a>
    </nav>

    <main>
        @yield('content')
    </main>

    @yield('scripts')
</body>
</html>
