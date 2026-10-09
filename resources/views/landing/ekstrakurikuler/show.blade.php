@extends('layouts.landing')

@section('title', $ekskul->nama_ekskul . ' - ' . ($profil->nama_sekolah ?? 'Website Sekolah'))

@section('content')
<br>
<br>
<br>

<section class="detail-section">
    <div class="container">
        <div class="detail-card">
            {{-- HEADER --}}
            <div class="detail-header">
                <span class="detail-label">
                    <i class="bi bi-trophy"></i>
                    Ekstrakurikuler
                </span>
                <h1 class="detail-title">{{ $ekskul->nama_ekskul }}</h1>
            </div>

            {{-- CONTENT --}}
            <div class="detail-content">
                {{-- GAMBAR --}}
                <div class="detail-image-wrapper">
                    <img
                        src="{{ $ekskul->gambar
                            ? asset('storage/' . $ekskul->gambar)
                            : asset('assets/images/logo/logosekolah.png') }}"
                        alt="{{ $ekskul->nama_ekskul }}"
                        class="detail-image"
                    >
                </div>

                {{-- INFORMASI --}}
                <div class="detail-description">
                    <div class="guru-info">
                        {{-- PEMBINA --}}
                        <div class="guru-info-item">
                            <div class="guru-info-icon">
                                <i class="bi bi-person-badge"></i>
                            </div>
                            <div>
                                <small>Pembina</small>
                                <strong>{{ $ekskul->pembina ?: '-' }}</strong>
                            </div>
                        </div>

                        {{-- JADWAL --}}
                        <div class="guru-info-item">
                            <div class="guru-info-icon">
                                <i class="bi bi-calendar3"></i>
                            </div>
                            <div>
                                <small>Jadwal Latihan</small>
                                <strong>{{ $ekskul->jadwal_latihan ?: '-' }}</strong>
                            </div>
                        </div>

                        {{-- DESKRIPSI --}}
                        <div class="guru-info-item align-items-start">
                            <div class="guru-info-icon">
                                <i class="bi bi-info-circle"></i>
                            </div>
                            <div>
                                <small>Deskripsi</small>
                                <div class="mt-1 text-muted" style="line-height: 1.7; text-align: justify;">
                                    {!! nl2br(e($ekskul->deskripsi ?: 'Belum ada deskripsi.')) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- FOOTER --}}
            <div class="detail-footer">
                <a href="{{ route('ekstrakurikuler.public') }}" class="btn-detail-back">
                    <i class="bi bi-mortarboard-fill"></i>
                    Lihat Semua Ekstrakurikuler
                </a>
                <a href="{{ url('/') }}" class="btn-detail-back">
                    <i class="bi bi-arrow-left"></i>
                    Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
</section>

<br>
<br>
<br>
@endsection

