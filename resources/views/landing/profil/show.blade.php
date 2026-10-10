
@extends('layouts.landing')

@section('title', 'Profil Sekolah - ' . ($profil->nama_sekolah ?? 'Website Sekolah'))

@section('content')

<br>
<section class="detail-section">
    <div class="container">
        <div class="detail-card">

            <br>
            <br>
            <br>
            {{-- HEADER --}}
            <div class="detail-header">
                <span class="detail-label">
                    <i class="bi bi-building-fill"></i>
                    Profil Sekolah
                </span>

                <h1 class="detail-title">
                    {{ $profil->nama_sekolah ?? 'Profil Sekolah' }}
                </h1>

                <p class="text-muted mb-0">
                    Informasi lengkap mengenai identitas sekolah
                </p>
            </div>

            {{-- FOTO SEKOLAH DAN KEPALA SEKOLAH --}}
            <div class="profil-show-images">

                <div class="profil-show-image-box">
                    <small>
                        <i class="bi bi-building"></i>
                        Foto Sekolah
                    </small>

                    <img
                        src="{{ !empty($profil->foto)
                            ? asset('storage/' . $profil->foto)
                            : asset('assets/images/logo/logosekolah.png') }}"
                        alt="Foto {{ $profil->nama_sekolah ?? 'Sekolah' }}"
                        class="profil-show-school-image"
                    >
                </div>

                <div class="profil-show-image-box">
                    <small>
                        <i class="bi bi-person-badge"></i>
                        Kepala Sekolah
                    </small>

                    <img
                        src="{{ !empty($profil->foto_kepala_sekolah)
                            ? asset('storage/' . $profil->foto_kepala_sekolah)
                            : asset('assets/images/faces/kepsek.png') }}"
                        alt="Foto Kepala Sekolah"
                        class="profil-show-headmaster-image"
                    >

                    <h5 class="mt-3 mb-1">
                        {{ $profil->kepala_sekolah ?? '-' }}
                    </h5>
                </div>

            </div>

            <hr class="my-4">

            {{-- INFORMASI PROFIL --}}
            <div class="profil-show-section">
                <h4 class="profil-show-heading">
                    <i class="bi bi-info-circle-fill"></i>
                    Informasi Sekolah
                </h4>

                <div class="profil-show-grid">

                    <div class="profil-show-item">
                        <div class="profil-show-icon">
                            <i class="bi bi-building"></i>
                        </div>

                        <div>
                            <small>Nama Sekolah</small>
                            <strong>
                                {{ $profil->nama_sekolah ?? '-' }}
                            </strong>
                        </div>
                    </div>

                    <div class="profil-show-item">
                        <div class="profil-show-icon">
                            <i class="bi bi-upc-scan"></i>
                        </div>

                        <div>
                            <small>NPSN</small>
                            <strong>
                                {{ $profil->npsn ?? '-' }}
                            </strong>
                        </div>
                    </div>

                    <div class="profil-show-item">
                        <div class="profil-show-icon">
                            <i class="bi bi-person-fill"></i>
                        </div>

                        <div>
                            <small>Kepala Sekolah</small>
                            <strong>
                                {{ $profil->kepala_sekolah ?? '-' }}
                            </strong>
                        </div>
                    </div>

                    <div class="profil-show-item">
                        <div class="profil-show-icon">
                            <i class="bi bi-calendar-event-fill"></i>
                        </div>

                        <div>
                            <small>Tahun Berdiri</small>
                            <strong>
                                {{ $profil->tahun_berdiri ?? '-' }}
                            </strong>
                        </div>
                    </div>

                    <div class="profil-show-item profil-show-item-full">
                        <div class="profil-show-icon">
                            <i class="bi bi-geo-alt-fill"></i>
                        </div>

                        <div>
                            <small>Alamat Sekolah</small>
                            <strong>
                                {{ $profil->alamat ?? '-' }}
                            </strong>
                        </div>
                    </div>

                    <div class="profil-show-item profil-show-item-full">
                        <div class="profil-show-icon">
                            <i class="bi bi-telephone-fill"></i>
                        </div>

                        <div>
                            <small>Kontak Sekolah</small>
                            <strong>
                                {{ $profil->kontak ?? '-' }}
                            </strong>
                        </div>
                    </div>

                </div>
            </div>

            {{-- DESKRIPSI --}}
            <div class="profil-show-section mt-4">
                <h4 class="profil-show-heading">
                    <i class="bi bi-journal-text"></i>
                    Tentang Sekolah
                </h4>

                <div class="profil-show-text">
                    {!! nl2br(e($profil->deskripsi ?? 'Belum ada deskripsi sekolah.')) !!}
                </div>
            </div>

            {{-- VISI DAN MISI --}}
            <div class="profil-show-section mt-4">

                <h4 class="profil-show-heading">
                    <i class="bi bi-bullseye"></i>
                    Visi dan Misi
                </h4>

                <div class="profil-show-vision-grid">

                    <div class="profil-show-vision-card">
                        <div class="profil-show-vision-icon">
                            <i class="bi bi-eye-fill"></i>
                        </div>

                        <h5>Visi Sekolah</h5>

                        <div class="profil-show-text">
                            {!! nl2br(e($profil->visi ?? 'Belum ada visi sekolah.')) !!}
                        </div>
                    </div>

                    <div class="profil-show-vision-card">
                        <div class="profil-show-vision-icon">
                            <i class="bi bi-list-check"></i>
                        </div>

                        <h5>Misi Sekolah</h5>

                        <div class="profil-show-text">
                            {!! nl2br(e($profil->misi ?? 'Belum ada misi sekolah.')) !!}
                        </div>
                    </div>

                </div>
            </div>

            {{-- FOOTER --}}
            <div class="detail-footer">

                <div class="detail-footer-left">
                    <a href="{{ url('/') }}" class="btn-detail-back">
                        <i class="bi bi-arrow-left"></i>
                        Kembali ke Beranda
                    </a>
                </div>

            </div>

        </div>
    </div>
</section>

<br>
<br>

@endsection

@push('styles')
<style>
/* =========================================================
   SHOW PROFIL SEKOLAH
========================================================= */

.profil-show-images {
    display: grid;
    grid-template-columns: minmax(0, 1.5fr) minmax(0, 1fr);
    gap: 24px;
    margin-top: 25px;
}

.profil-show-image-box {
    min-width: 0;
    padding: 20px;
    text-align: center;
    background: #f8faff;
    border: 1px solid #e5edf8;
    border-radius: 16px;
}

.profil-show-image-box > small {
    display: block;
    margin-bottom: 15px;
    color: #64748b;
    font-weight: 600;
}

.profil-show-school-image {
    display: block;
    width: 100%;
    height: 260px;
    object-fit: contain;
    object-position: center;
    background: #fff;
    border-radius: 12px;
}

.profil-show-headmaster-image {
    display: block;
    width: 160px;
    height: 200px;
    max-width: 100%;
    margin: 0 auto;
    object-fit: contain;
    object-position: center top;
    background: #fff;
    border: 1px solid #e5edf8;
    border-radius: 12px;
}

.profil-show-image-box h5 {
    color: #10204e;
    font-size: 16px;
    font-weight: 700;
    overflow-wrap: anywhere;
}

/* JUDUL BAGIAN */

.profil-show-section {
    min-width: 0;
}

.profil-show-heading {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 20px;
    color: #10204e;
    font-size: 21px;
    font-weight: 800;
}

.profil-show-heading > i {
    color: #1769e0;
}

/* INFORMASI SEKOLAH */

.profil-show-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 14px;
}

.profil-show-item {
    display: flex;
    align-items: flex-start;
    gap: 13px;
    min-width: 0;
    padding: 18px;
    background: #f8faff;
    border: 1px solid #e5edf8;
    border-radius: 13px;
}

.profil-show-item-full {
    grid-column: 1 / -1;
}

.profil-show-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    flex: 0 0 42px;
    width: 42px;
    height: 42px;
    color: #1769e0;
    background: #eaf2ff;
    border-radius: 11px;
    font-size: 18px;
}

.profil-show-item > div:last-child {
    flex: 1;
    min-width: 0;
}

.profil-show-item small {
    display: block;
    margin-bottom: 5px;
    color: #718096;
    font-size: 13px;
}

.profil-show-item strong {
    display: block;
    color: #172554;
    font-size: 14px;
    line-height: 1.7;
    overflow-wrap: anywhere;
}

/* DESKRIPSI */

.profil-show-text {
    color: #5b6780;
    font-size: 15px;
    line-height: 1.9;
    text-align: justify;
    overflow-wrap: anywhere;
}

/* VISI MISI */

.profil-show-vision-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 20px;
}

.profil-show-vision-card {
    min-width: 0;
    padding: 24px;
    background: #f8faff;
    border: 1px solid #e5edf8;
    border-radius: 15px;
}

.profil-show-vision-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 45px;
    height: 45px;
    margin-bottom: 14px;
    color: #1769e0;
    background: #eaf2ff;
    border-radius: 12px;
    font-size: 20px;
}

.profil-show-vision-card h5 {
    margin-bottom: 12px;
    color: #10204e;
    font-size: 18px;
    font-weight: 800;
}

/* RESPONSIVE */

@media (max-width: 767.98px) {
    .profil-show-images {
        grid-template-columns: minmax(0, 1fr);
        gap: 15px;
    }

    .profil-show-school-image {
        height: 210px;
    }

    .profil-show-headmaster-image {
        width: 135px;
        height: 170px;
    }

    .profil-show-grid,
    .profil-show-vision-grid {
        grid-template-columns: minmax(0, 1fr);
    }

    .profil-show-item-full {
        grid-column: auto;
    }

    .profil-show-heading {
        font-size: 19px;
    }

    .profil-show-vision-card {
        padding: 18px;
    }
}
</style>
@endpush

