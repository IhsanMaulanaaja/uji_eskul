@extends('layouts.app')

@section('title', 'Prestasi')

@section('extra-styles')
<style>
    .prestasi-page {
        min-height: calc(100vh - 80px);
        background: linear-gradient(135deg, #e0f2ff 0%, #f0f4ff 100%);
        padding: 40px 30px;
    }

    .prestasi-header {
        max-width: 1200px;
        margin: 0 auto 50px;
        text-align: center;
    }

    .prestasi-header h1 {
        font-size: 42px;
        font-weight: 700;
        color: #1e3a8a;
        margin-bottom: 15px;
    }

    .prestasi-header p {
        font-size: 15px;
        color: #666;
    }

    .prestasi-content {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 35px;
    }

    .prestasi-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 35px;
        max-width: 1400px;
        margin: 0 auto;
    }

    .prestasi-card {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        border: 3px solid #e0f2ff;
    }

    .prestasi-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
    }

    .prestasi-card-image {
        width: 100%;
        aspect-ratio: 16 / 10;
        background: #f5f5f5;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }

    .prestasi-card-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .prestasi-card:hover .prestasi-card-image img {
        transform: scale(1.05);
    }

    .prestasi-card-image-placeholder {
        font-size: 60px;
        opacity: 0.2;
    }

    .prestasi-card-content {
        padding: 20px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .prestasi-card-content h3 {
        font-size: 16px;
        font-weight: 700;
        color: #1e3a8a;
        margin-bottom: 8px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        line-height: 1.3;
    }

    .prestasi-card-content p {
        font-size: 13px;
        color: #666;
        line-height: 1.5;
        margin-bottom: 12px;
        flex-grow: 1;
    }

    .prestasi-card-date {
        font-size: 12px;
        color: #999;
        display: flex;
        align-items: center;
        gap: 6px;
        margin-top: auto;
    }

    .no-prestasi {
        text-align: center;
        padding: 80px 20px;
        color: #666;
        grid-column: 1 / -1;
    }

    .no-prestasi i {
        font-size: 80px;
        color: #ccc;
        margin-bottom: 20px;
        display: block;
    }

    .no-prestasi p {
        font-size: 16px;
        margin-bottom: 10px;
    }

    @media (max-width: 768px) {
        .prestasi-page {
            padding: 30px 15px;
        }

        .prestasi-header h1 {
            font-size: 30px;
        }

        .prestasi-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
        }

        .prestasi-content {
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
        }
    }

    @media (max-width: 480px) {
        .prestasi-page {
            padding: 20px 10px;
        }

        .prestasi-header h1 {
            font-size: 24px;
        }

        .prestasi-header p {
            font-size: 12px;
        }

        .prestasi-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .prestasi-content {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .prestasi-card-content {
            padding: 15px;
        }

        .prestasi-card-content h3 {
            font-size: 14px;
        }

        .prestasi-card-content p {
            font-size: 12px;
        }
    }
</style>
@endsection

@section('content')
<div class="prestasi-page">
<div class="prestasi-page">
    <div class="prestasi-header">
        <h1>Prestasi Siswa-Siswi SMKN 1 Ciomas</h1>
        <p>Lihat pencapaian dan prestasi siswa dalam berbagai ekstrakurikuler</p>
    </div>

    <div class="prestasi-content">
        @forelse ($prestasi as $item)
            <div class="prestasi-card">
                <div class="prestasi-card-image">
                    @if ($item->foto)
                        <img src="{{ $item->fotoUrl }}" alt="{{ $item->lomba?->nama_lomba ?? $item->nama_lomba ?? 'Prestasi' }}" />
                    @else
                        <div class="prestasi-card-image-placeholder">
                            <i class="fas fa-image"></i>
                        </div>
                    @endif
                </div>
                <div class="prestasi-card-content">
                    <div>
                        <h3>{{ $item->lomba?->nama_lomba ?? $item->nama_lomba ?? 'Prestasi' }}</h3>
                        <p>{{ $item->keterangan ?? '-' }}</p>
                    </div>
                    <div class="prestasi-card-date">
                        <i class="fas fa-calendar-alt"></i>
                        <span>
                            @if ($item->tanggal_juara)
                                {{ \Carbon\Carbon::parse($item->tanggal_juara)->format('d M Y') }}
                            @elseif ($item->tanggal)
                                {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                            @else
                                {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                            @endif
                        </span>
                    </div>
                </div>
            </div>
        @empty
            <div class="no-prestasi">
                <i class="fas fa-award"></i>
                <p>Belum ada prestasi yang ditampilkan</p>
                <p style="font-size: 14px; margin-top: 5px;">Prestasi akan muncul setelah admin atau pembina menambahkannya</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
