@extends('layouts.landing')

@section('title', $pengumuman->judul . ' - ' . ($profil->nama_sekolah ?? 'Website Sekolah'))

@section('content')
<br>
<br>

<section class="detail-section">
    <div class="container">
        <div class="detail-card">
            {{-- HEADER --}}
            <div class="detail-header">
                <span class="detail-label">
                    <i class="bi bi-megaphone-fill"></i>
                    Pengumuman
                </span>
                <h1 class="detail-title">{{ $pengumuman->judul }}</h1>
                <div class="detail-date">
                    <i class="bi bi-calendar3"></i>
                    {{ \Carbon\Carbon::parse($pengumuman->tanggal)->translatedFormat('d F Y') }}
                </div>
            </div>

            {{-- CONTENT --}}
            <div class="detail-content">
                <div class="detail-description">
                    {!! nl2br(e($pengumuman->isi)) !!}
                </div>
            </div>

            {{-- FOOTER --}}
            <div class="detail-footer">
                <a href="{{ route('pengumuman.public') }}" class="btn-detail-back">
                    <i class="bi bi-megaphone-fill"></i>
                    Lihat Semua Pengumuman
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
@endsection

