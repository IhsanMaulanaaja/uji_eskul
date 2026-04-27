@extends('layouts.app')

@section('title', 'Kontak')

@section('extra-styles')
<style>
    /* KONTAK SECTION */
    .kontak-container {
        min-height: calc(100vh - 80px);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #e0f2ff 0%, #f0f4ff 100%);
        padding: 80px 60px;
        position: relative;
        overflow: hidden;
    }

    .kontak-container h1 {
        font-size: 48px;
        font-weight: 700;
        color: #1e3a8a;
        margin-bottom: 60px;
        letter-spacing: -0.5px;
    }

    .kontak-content {
        display: grid;
        grid-template-columns: 1fr;
        gap: 80px;
        width: 100%;
        max-width: 600px;
        align-items: start;
    }

    /* INFORMASI KONTAK */
    .kontak-info {
        background: #ffffff;
        border-radius: 25px;
        padding: 50px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    }

    .kontak-info h2 {
        font-size: 28px;
        font-weight: 700;
        color: #1e3a8a;
        margin-bottom: 35px;
    }

    .kontak-item {
        display: flex;
        align-items: flex-start;
        gap: 18px;
        margin-bottom: 32px;
        transition: all 0.3s ease;
    }

    .kontak-item:last-child {
        margin-bottom: 0;
    }

    .kontak-item:hover {
        transform: translateX(8px);
    }

    .kontak-item i {
        font-size: 28px;
        color: #3b82f6;
        min-width: 35px;
        text-align: center;
        margin-top: 5px;
    }

    .kontak-item-content {
        flex: 1;
    }

    .kontak-item-label {
        font-size: 14px;
        font-weight: 600;
        color: #6b7280;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 5px;
    }

    .kontak-item-value {
        font-size: 17px;
        font-weight: 500;
        color: #1e3a8a;
    }

    .kontak-item a {
        color: #3b82f6;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .kontak-item a:hover {
        color: #1e40af;
        text-decoration: underline;
    }



    @media (max-width: 1024px) {
        .kontak-container {
            padding: 60px 40px;
        }

        .kontak-content {
            gap: 60px;
        }

        .kontak-container h1 {
            font-size: 40px;
        }

        .kontak-info {
            padding: 40px;
        }
    }

    @media (max-width: 768px) {
        .kontak-container {
            padding: 60px 20px;
        }

        .kontak-content {
            gap: 40px;
        }

        .kontak-container h1 {
            font-size: 36px;
            margin-bottom: 40px;
        }

        .kontak-info {
            padding: 30px;
        }

        .kontak-info h2 {
            font-size: 24px;
        }

        .kontak-item {
            margin-bottom: 24px;
        }
    }

    @media (max-width: 480px) {
        .kontak-container {
            padding: 40px 15px;
        }

        .kontak-container h1 {
            font-size: 28px;
            margin-bottom: 30px;
        }

        .kontak-info {
            padding: 20px;
        }

        .kontak-info h2 {
            font-size: 20px;
            margin-bottom: 20px;
        }

        .kontak-item {
            margin-bottom: 18px;
        }

        .kontak-item i {
            font-size: 24px;
        }
    }
</style>
@endsection

@section('content')
<section class="kontak-container">
    <h1>Hubungi Kami</h1>
    
    <div class="kontak-content">
        <!-- Informasi Kontak -->
        <div class="kontak-info">
            <h2>Informasi Kontak</h2>
            
            <div class="kontak-item">
                <i class="fa-solid fa-phone"></i>
                <div class="kontak-item-content">
                    <div class="kontak-item-label">Telepon</div>
                    <div class="kontak-item-value"><a href="tel:0896-1829-7321">0896-1829-7321</a></div>
                </div>
            </div>

            <div class="kontak-item">
                <i class="fa-brands fa-instagram"></i>
                <div class="kontak-item-content">
                    <div class="kontak-item-label">Instagram</div>
                    <div class="kontak-item-value"><a href="https://instagram.com/smkn1ciomas" target="_blank">@smkn1ciomas</a></div>
                </div>
            </div>

            <div class="kontak-item">
                <i class="fa-brands fa-facebook"></i>
                <div class="kontak-item-content">
                    <div class="kontak-item-label">Facebook</div>
                    <div class="kontak-item-value"><a href="https://facebook.com/smkn1ciomas" target="_blank">SMK Negeri 1 Ciomas</a></div>
                </div>
            </div>

            <div class="kontak-item">
                <i class="fa-solid fa-envelope"></i>
                <div class="kontak-item-content">
                    <div class="kontak-item-label">Email</div>
                    <div class="kontak-item-value"><a href="mailto:smkn1ciomas@gmail.com">smkn1ciomas@gmail.com</a></div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
