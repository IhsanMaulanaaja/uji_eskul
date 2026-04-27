@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('extra-styles')
<style>
    /* TENTANG SECTION */
    :root {
        --gradient-primary: linear-gradient(135deg, #e0f2ff 0%, #f0f4ff 100%);
        --gradient-accent: linear-gradient(135deg, #a78bfa, #60a5fa);
        --color-text-dark: #475569;
        --color-text-light: #1e3a8a;
        --color-border: rgba(59, 130, 246, 0.4);
        --color-bg-dark: rgba(30, 41, 59, 0.6);
    }

    .tentang {
        padding: 120px 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 100px;
        background: var(--gradient-primary);
        position: relative;
        overflow: hidden;
        min-height: calc(100vh - 80px);
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
        color: var(--color-text-light);
        margin-bottom: 25px;
        letter-spacing: -0.5px;
    }

    .tentang-content p {
        font-size: 17px;
        color: var(--color-text-dark);
        line-height: 1.9;
        margin-bottom: 45px;
        font-weight: 300;
    }

    .tentang-features {
        background: #ffffff;
        border: 2px solid #e5e7eb;
        border-radius: 25px;
        padding: 40px;
        backdrop-filter: blur(10px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
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
        border-color: #d1d5db;
        background: #ffffff;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
        transform: translateY(-5px);
    }

    .tentang-features ul {
        list-style: none;
    }

    .tentang-features li {
        font-size: 17px;
        color: #6b7280;
        margin-bottom: 22px;
        display: flex;
        align-items: center;
        gap: 18px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .tentang-features li:hover {
        color: #374151;
        transform: translateX(8px);
    }

    .tentang-features li:last-child {
        margin-bottom: 0;
    }

    .tentang-features li i {
        font-size: 24px;
        color: #3b82f6;
        min-width: 30px;
        width: 30px;
        height: 30px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        transition: all 0.3s ease;
        flex-shrink: 0;
    }

    .tentang-features li:hover i {
        color: #1e40af;
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
</style>
@endsection

@section('content')
<section class="tentang">
    <div class="tentang-content">
        <h2>Tentang Ekstrakurikuler</h2>
        <p>Ekstrakurikuler merupakan kegiatan tambahan di luar jam pelajaran yang bertujuan untuk mengembangkan minat, bakat, serta keterampilan siswa. Melalui kegiatan ini, siswa dapat menyalurkan potensi diri dan meraih berbagai prestasi.</p>
        
        <div class="tentang-features">
            <ul>
                <li>
                    <i class="fa-solid fa-lightbulb"></i>
                    <span>Mengembangkan minat & bakat</span>
                </li>
                <li>
                    <i class="fa-solid fa-trophy"></i>
                    <span>Meningkatkan prestasi siswa</span>
                </li>
                <li>
                    <i class="fa-solid fa-handshake"></i>
                    <span>Melatih kerja sama & disiplin</span>
                </li>
            </ul>
        </div>
    </div>

    <div class="tentang-image">
        <div class="tentang-illustration">
            <i class="fa-solid fa-person-running"></i>
        </div>
    </div>
</section>
@endsection
