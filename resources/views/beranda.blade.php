@extends('layouts.app')

@section('title', 'Beranda')

@section('extra-styles')
<style>
    /* HERO SECTION */
    .hero {
        padding: 80px 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: calc(100vh - 80px);
        gap: 60px;
        position: relative;
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
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

    .hero-image-placeholder i {
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

    .hero-image img {
        max-width: 100%;
        height: auto;
        filter: drop-shadow(0 10px 30px rgba(0, 0, 0, 0.1));
    }

    /* RESPONSIVE */
    @media (max-width: 1024px) {
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
            font-size: 120px;
        }
    }

    @media (max-width: 768px) {
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
        .hero {
            padding: 30px 15px;
        }

        .hero-content h1 {
            font-size: 28px;
        }

        .hero-content p {
            font-size: 14px;
        }

        .hero-image-placeholder {
            width: 200px;
            height: 200px;
            font-size: 70px;
        }
    }
</style>
@endsection

@section('content')
<section class="hero" style="background-image: linear-gradient(135deg, rgba(240, 244, 248, 0.7), rgba(232, 241, 249, 0.7)), url('{{ asset('assets/skanic.png') }}');">
    <div class="hero-content">
        <h1>SELAMAT DATANG DI WEBSITE EKSTRAKURIKULER</h1>
        <p>Platform untuk mendokumentasikan pengalaman dan prestasi siswa selama berpartisipasi dalam ekstrakurikuler di sekolah.</p>
    </div>
    <div class="hero-image">
        @if (file_exists(public_path('assets/ekskul/hero.svg')))
            <img src="{{ asset('assets/ekskul/hero.svg') }}" alt="Ekstrakurikuler">
        @else
            <div class="hero-image-placeholder">
                <i class="fa-solid fa-graduation-cap"></i>
            </div>
        @endif
    </div>
</section>
@endsection
