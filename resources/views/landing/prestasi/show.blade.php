@extends('layouts.landing')

@section('title', $prestasi->nama_prestasi . ' - ' . ($profil->nama_sekolah ?? 'Website Sekolah'))

@section('content')
<br><br><br>
<section class="detail-section">
    <div class="container">
        <div class="detail-card">
            {{-- HEADER --}}
            <div class="detail-header">
                <span class="detail-label">
                    <i class="bi bi-trophy-fill"></i>
                    Prestasi
                </span>
                <h1 class="detail-title">{{ $prestasi->nama_prestasi }}</h1>
            </div>

            {{-- CONTENT --}}
            <div class="detail-content">
                {{-- GAMBAR --}}
                <div class="detail-image-wrapper">
                    <img
                        src="{{ $prestasi->foto ? asset('storage/' . $prestasi->foto) : asset('assets/images/logo/logosekolah.png') }}"
                        alt="{{ $prestasi->nama_prestasi }}"
                        class="detail-image"
                    >
                </div>

                {{-- INFORMASI --}}
                <div class="detail-description">
                    <div class="guru-info">
                        {{-- NAMA PRESTASI --}}
                        <div class="guru-info-item">
                            <div class="guru-info-icon">
                                <i class="bi bi-award-fill"></i>
                            </div>
                            <div>
                                <small>Nama Prestasi</small>
                                <strong>{{ $prestasi->nama_prestasi }}</strong>
                            </div>
                        </div>

                        {{-- TAHUN AJARAN --}}
                        <div class="guru-info-item">
                            <div class="guru-info-icon">
                                <i class="bi bi-calendar3"></i>
                            </div>
                            <div>
                                <small>Tahun Ajaran</small>
                                <strong>{{ $prestasi->tahun_ajaran ?: '-' }}</strong>
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
                                    {!! nl2br(e($prestasi->deskripsi ?: 'Belum ada deskripsi.')) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- FOOTER --}}
            <div class="detail-footer">
                {{-- LIHAT SEMUA PRESTASI --}}
                <a href="{{ route('prestasi.public') }}" class="btn-detail-back">
                    <i class="bi bi-trophy-fill"></i>
                    Lihat Semua Prestasi
                </a>

                {{-- KEMBALI KE BERANDA --}}
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

