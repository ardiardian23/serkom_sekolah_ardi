@extends('layouts.landing')

@section('title', ($galeri->judul ?? 'Detail Galeri') . ' - Galeri Sekolah')

@section('content')
<section class="detail-section py-5">
    <div class="container">
        <div class="detail-card">

            {{-- HEADER --}}
            <div class="detail-header mb-4">
                <span class="detail-label">
                    <i class="bi bi-images"></i>
                    Galeri Sekolah
                </span>

                <h1 class="detail-title mt-3">
                    {{ $galeri->judul }}
                </h1>
            </div>


            {{-- CONTENT --}}
            <div class="gallery-detail-layout">

                {{-- FOTO GALERI --}}
                <div class="gallery-detail-photo">
                    @if($galeri->file)
                        <img
                            src="{{ asset('storage/' . $galeri->file) }}"
                            alt="{{ $galeri->judul }}"
                        >
                    @else
                        <div class="gallery-photo-empty">
                            <i class="bi bi-image"></i>
                            <span>Foto belum tersedia</span>
                        </div>
                    @endif
                </div>

                {{-- INFORMASI GALERI --}}
                <div class="gallery-detail-info">

                    <div class="gallery-info-item">
                        <i class="bi bi-card-heading"></i>
                        <div>
                            <small>Judul Galeri</small>
                            <strong>{{ $galeri->judul }}</strong>
                        </div>
                    </div>

                    <div class="gallery-info-item">
                        <i class="bi bi-calendar-event"></i>
                        <div>
                            <small>Tanggal</small>
                            <strong>
                                {{ $galeri->tanggal
                                    ? \Carbon\Carbon::parse($galeri->tanggal)->format('d-m-Y')
                                    : '-' }}
                            </strong>
                        </div>
                    </div>

                    <div class="gallery-info-item">
                        <i class="bi bi-tags"></i>
                        <div>
                            <small>Kategori</small>
                            <strong>{{ $galeri->kategori ?: '-' }}</strong>
                        </div>
                    </div>

                    <div class="gallery-info-item">
                        <i class="bi bi-text-paragraph"></i>
                        <div>
                            <small>Deskripsi</small>
                            <p>{{ $galeri->keterangan ?: '-' }}</p>
                        </div>
                    </div>

                </div>
            </div>



            {{-- FOOTER --}}
            <div class="detail-footer mt-4">
                <a href="{{ route('galeri.public') }}"
                   class="btn-detail-back">
                    <i class="bi bi-images"></i>
                    Lihat Semua Galeri
                </a>

                <a href="{{ url('/') }}"
                   class="btn-detail-back">
                    <i class="bi bi-arrow-left"></i>
                    Kembali ke Beranda
                </a>
            </div>

        </div>
    </div>
</section>

{{-- STYLE FOTO --}}
```html
<style>
    /* KARTU UTAMA */
    .detail-card {
        width: 100%;
        max-width: 1100px;
        margin: 30px auto;
        padding: 40px;
        background: #fff;
        border-radius: 22px;
        box-shadow: 0 12px 40px rgba(15, 23, 42, 0.08);
    }

    /* HEADER */
    .detail-header {
        margin-bottom: 30px;
    }

    .detail-label {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 9px 15px;
        border-radius: 30px;
        background: #eaf2ff;
        color: #1764d8;
        font-size: 13px;
        font-weight: 600;
    }

    .detail-title {
        margin-top: 18px;
        margin-bottom: 0;
        color: #172033;
        font-size: clamp(28px, 3vw, 36px);
        font-weight: 750;
        line-height: 1.25;
    }

    /* LAYOUT FOTO + INFORMASI */
    .gallery-detail-layout {
        display: grid;
        grid-template-columns: minmax(0, 1.25fr) minmax(280px, 0.85fr);
        align-items: stretch;
        gap: 38px;
    }

    /* FOTO */
    .gallery-detail-photo {
        min-width: 0;
        min-height: 400px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 12px;
        overflow: hidden;
        background: #f4f6fa;
        border: 1px solid #edf0f5;
        border-radius: 18px;
    }

    .gallery-detail-photo img {
        display: block;
        width: 100%;
        height: 440px;
        object-fit: contain;
        object-position: center;
        border-radius: 12px;
    }

    .gallery-photo-empty {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 12px;
        color: #8993a4;
    }

    .gallery-photo-empty i {
        font-size: 60px;
    }

    /* PANEL INFORMASI */
    .gallery-detail-info {
        display: flex;
        flex-direction: column;
        justify-content: center;
        gap: 0;
        min-width: 0;
        padding: 10px 0;
    }

    .gallery-info-item {
        display: flex;
        align-items: flex-start;
        gap: 15px;
        padding: 21px 0;
        border-bottom: 1px solid #edf0f5;
    }

    .gallery-info-item:first-child {
        padding-top: 10px;
    }

    .gallery-info-item:last-child {
        border-bottom: none;
    }

    .gallery-info-item > i {
        display: flex;
        flex: 0 0 44px;
        width: 44px;
        height: 44px;
        align-items: center;
        justify-content: center;
        color: #2165dc;
        background: #edf4ff;
        border-radius: 13px;
        font-size: 19px;
    }

    .gallery-info-item small {
        display: block;
        margin-bottom: 7px;
        color: #7b8495;
        font-size: 13px;
        font-weight: 500;
    }

    .gallery-info-item strong {
        display: block;
        color: #202b3c;
        font-size: 16px;
        font-weight: 650;
        line-height: 1.6;
        overflow-wrap: anywhere;
    }

    .gallery-info-item p {
        margin: 0;
        color: #586477;
        font-size: 15px;
        line-height: 1.8;
        overflow-wrap: anywhere;
    }

    /* TOMBOL BAGIAN BAWAH */
    .detail-footer {
        display: flex;
        justify-content: flex-end;
        flex-wrap: wrap;
        gap: 12px;
        margin-top: 34px;
        padding-top: 25px;
        border-top: 1px solid #edf0f5;
    }

    .btn-detail-back {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 9px;
        padding: 12px 18px;
        border: 1px solid #2563eb;
        border-radius: 10px;
        background: #fff;
        color: #2563eb;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        transition: background .2s ease, color .2s ease;
    }

    .btn-detail-back:hover {
        background: #2563eb;
        color: #fff;
    }

    /* TABLET */
    @media (max-width: 900px) {
        .detail-card {
            padding: 28px;
        }

        .gallery-detail-layout {
            grid-template-columns: minmax(0, 1fr) minmax(0, 0.9fr);
            gap: 24px;
        }

        .gallery-detail-photo {
            min-height: 320px;
        }

        .gallery-detail-photo img {
            height: 350px;
        }
    }

    /* HP */
    @media (max-width: 680px) {
        .detail-card {
            margin: 15px auto;
            padding: 20px;
            border-radius: 16px;
        }

        .gallery-detail-layout {
            grid-template-columns: minmax(0, 1fr);
            gap: 20px;
        }

        .gallery-detail-photo {
            min-height: 240px;
        }

        .gallery-detail-photo img {
            height: auto;
            max-height: 420px;
        }

        .detail-title {
            font-size: 27px;
        }

        .detail-footer {
            flex-direction: column;
        }

        .btn-detail-back {
            width: 100%;
        }
    }
</style>


@endsection

