@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<div class="page-heading">

    {{-- =====================================================
         HEADER
    ====================================================== --}}
    <div class="page-title mb-4">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>
                    Dashboard
                </h3>
                <p class="text-subtitle text-muted">
                    Selamat datang di Website Sekolah
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb"
                     class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">
                            Dashboard
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    {{-- =====================================================
         PROFIL SEKOLAH
    ====================================================== --}}
    <div class="card mb-4">
        <div class="card-body py-4 px-4">
            <div class="row align-items-center">
                {{-- LOGO --}}
                <div class="col-md-3 text-center">
                    @if($profil && $profil->logo)
                        <img src="{{ asset('storage/' . $profil->logo) }}"
                             alt="Logo Sekolah"
                             style="
                                width: 130px;
                                height: 130px;
                                object-fit: contain;">
                    @else
                        <div class="d-flex align-items-center justify-content-center
                                    bg-light rounded mx-auto"style="
                                width:130px;
                                height:130px;">
                            <i class="bi bi-building text-primary"style="font-size:60px;">
                            </i>
                        </div>
                    @endif
                </div>
                {{-- DATA SEKOLAH --}}
                <div class="col-md-6">

                    <h6 class="text-muted">
                        PROFIL SEKOLAH
                    </h6>

                    <h2 class="fw-bold text-primary">

                        {{ $profil->nama_sekolah ?? 'Nama Sekolah' }}

                    </h2>


                    <p class="mb-2">

                        <i class="bi bi-person-fill text-primary"></i>

                        Kepala Sekolah:

                        <strong>
                            {{ $profil->kepala_sekolah ?? '-' }}
                        </strong>

                    </p>


                    <div class="row">

                        <div class="col-md-6">

                            <small class="text-muted">
                                NPSN
                            </small>

                            <div class="fw-bold">
                                {{ $profil->npsn ?? '-' }}
                            </div>

                        </div>


                        <div class="col-md-6">

                            <small class="text-muted">
                                Tahun Berdiri
                            </small>

                            <div class="fw-bold">
                                {{ $profil->tahun_berdiri ?? '-' }}
                            </div>

                        </div>


                        <div class="col-12 mt-2">

                            <small class="text-muted">
                                Alamat
                            </small>

                            <div class="fw-bold">

                                {{ $profil->alamat ?? '-' }}

                            </div>

                        </div>

                    </div>

                </div>


                {{-- FOTO SEKOLAH --}}
                <div class="col-md-3 text-center">

                    @if($profil && $profil->foto)

                        <img src="{{ asset('storage/' . $profil->foto) }}"
                             alt="Foto Sekolah"
                             class="rounded"
                             style="
                                width: 100%;
                                max-width: 220px;
                                height: 130px;
                                object-fit: cover;
                             ">

                    @else

                        <div class="bg-light rounded d-flex
                                    align-items-center justify-content-center mx-auto"
                             style="
                                width:100%;
                                max-width:220px;
                                height:130px;
                             ">

                            <i class="bi bi-image text-primary"
                               style="font-size:50px;">
                            </i>

                        </div>

                    @endif


                    <a href="{{ route('profil.profil-sekolah.index') }}"
                       class="btn btn-primary btn-sm mt-3">

                        <i class="bi bi-eye"></i>

                        Kelola Profil

                    </a>

                </div>

            </div>


            {{-- KONTAK --}}
            <hr>

            <div class="text-muted">

                <i class="bi bi-telephone-fill text-primary"></i>

                {{ $profil->kontak ?? '-' }}

            </div>

        </div>

    </div>



    {{-- =====================================================
         STATISTIK SEKOLAH
    ====================================================== --}}
    <div class="row">


        {{-- =================================================
             GURU
        ================================================== --}}
        <div class="col-12 col-md-6 col-xl-3 mb-4">

            <div class="card h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <h6 class="text-muted font-semibold">
                                Data Sekolah
                            </h6>

                            <h5 class="font-extrabold">
                                Guru
                            </h5>

                            <h2 class="fw-bold text-primary">
                                {{ $totalGuru }}
                            </h2>

                        </div>


                        <div class="stats-icon blue">

                            <i class="bi bi-person-badge"></i>

                        </div>

                    </div>


                    <a href="{{ route('admin.guru.index') }}"
                       class="btn btn-primary btn-sm mt-3 w-100">

                        <i class="bi bi-people"></i>

                        Kelola Guru

                    </a>

                </div>

            </div>

        </div>



        {{-- =================================================
             SISWA
        ================================================== --}}
        <div class="col-12 col-md-6 col-xl-3 mb-4">

            <div class="card h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <h6 class="text-muted font-semibold">
                                Data Sekolah
                            </h6>

                            <h5 class="font-extrabold">
                                Siswa
                            </h5>

                            <h2 class="fw-bold text-primary">
                                {{ $totalSiswa }}
                            </h2>

                        </div>


                        <div class="stats-icon green">

                            <i class="bi bi-people"></i>

                        </div>

                    </div>


                    <a href="{{ route('admin.siswa.index') }}"
                       class="btn btn-primary btn-sm mt-3 w-100">

                        <i class="bi bi-person-lines-fill"></i>

                        Kelola Siswa

                    </a>

                </div>

            </div>

        </div>



        {{-- =================================================
             EKSTRAKURIKULER
        ================================================== --}}
        <div class="col-12 col-md-6 col-xl-3 mb-4">

            <div class="card h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-start">


                        {{-- TEKS --}}
                        <div>

                            <h6 class="text-muted font-semibold">
                                Data Sekolah
                            </h6>

                            <h5 class="font-extrabold">
                                Ekstrakurikuler
                            </h5>

                            <h2 class="fw-bold text-primary">
                                {{ $totalEkstrakurikuler }}
                            </h2>

                        </div>


                        {{-- FOTO --}}
                        @if($eskulTerbaru && $eskulTerbaru->gambar)

                            <img src="{{ asset('storage/' . $eskulTerbaru->gambar) }}"
                                 alt="Foto Ekstrakurikuler"
                                 style="
                                    width:85px;
                                    height:65px;
                                    object-fit:cover;
                                    border-radius:8px;
                                 ">

                        @else

                            <div class="stats-icon red">

                                <i class="bi bi-trophy"></i>

                            </div>

                        @endif

                    </div>


                    <a href="{{ route('admin.ekstrakurikuler.index') }}"
                       class="btn btn-primary btn-sm mt-3 w-100">

                        <i class="bi bi-list"></i>

                        Kelola Eskul

                    </a>

                </div>

            </div>

        </div>



        {{-- =================================================          PRESTASI
        ================================================== --}}
        <div class="col-12 col-md-6 col-xl-3 mb-4">

            <div class="card h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-start">


                        {{-- TEKS --}}
                        <div>

                            <h6 class="text-muted font-semibold">
                                Data Sekolah
                            </h6>

                            <h5 class="font-extrabold">
                                Prestasi
                            </h5>

                            <h2 class="fw-bold text-primary">
                                {{ $totalPrestasi }}
                            </h2>

                        </div>


                        {{-- FOTO --}}
                        @if($prestasiTerbaru && $prestasiTerbaru->foto)

                            <img src="{{ asset('storage/' . $prestasiTerbaru->foto) }}"
                                 alt="Foto Prestasi"
                                 style="
                                    width:85px;
                                    height:65px;
                                    object-fit:cover;
                                    border-radius:8px;
                                 ">

                        @else

                            <div class="stats-icon orange">

                                <i class="bi bi-award"></i>

                            </div>

                        @endif

                    </div>


                    <a href="{{ route('admin.prestasi.index') }}"
                       class="btn btn-primary btn-sm mt-3 w-100">

                        <i class="bi bi-list"></i>

                        Kelola Prestasi

                    </a>

                </div>

            </div>

        </div>

    </div>



    {{-- =====================================================
         INFORMASI SEKOLAH - POSTER
    ====================================================== --}}
    <div class="row g-4 mt-1">


        {{-- =================================================
             BERITA
        ================================================== --}}
        <div class="col-12 col-md-6 col-xl-3">

            <div class="poster-card poster-berita">

                {{-- DEKORASI --}}
                <div class="poster-circle circle-1"></div>
                <div class="poster-circle circle-2"></div>


                <div class="poster-content">

                    {{-- ICON --}}
                    <div class="poster-icon">

                        <i class="bi bi-newspaper"></i>

                    </div>


                    {{-- JUDUL --}}
                    <h3>
                        Berita
                        <br>
                        Sekolah
                    </h3>


                    <div class="poster-line"></div>


                    {{-- DESKRIPSI --}}
                    <p>

                        Informasi terbaru seputar kegiatan
                        dan perkembangan SMAN 1 Singaparna.

                    </p>


                    {{-- JUMLAH --}}
                    <div class="poster-number">

                        {{ $totalBerita }}

                        <span>
                            Berita
                        </span>

                    </div>

                </div>


                {{-- BUTTON --}}
                <a href="{{ route('admin.berita.index') }}"
                   class="poster-button">

                    <i class="bi bi-newspaper"></i>

                    Kelola Berita

                </a>

            </div>

        </div>



        {{-- =================================================
             PENGUMUMAN
        ================================================== --}}
        <div class="col-12 col-md-6 col-xl-3">

            <div class="poster-card poster-pengumuman">

                {{-- DEKORASI --}}
                <div class="poster-circle circle-1"></div>
                <div class="poster-circle circle-2"></div>


                <div class="poster-content">

                    {{-- ICON --}}
                    <div class="poster-icon">

                        <i class="bi bi-megaphone"></i>

                    </div>


                    {{-- JUDUL --}}
                    <h3>
                        Pengumuman
                        <br>
                        Sekolah
                    </h3>


                    <div class="poster-line"></div>


                    {{-- DESKRIPSI --}}
                    <p>

                        Informasi penting dari pihak sekolah
                        untuk seluruh warga sekolah.

                    </p>


                    {{-- JUMLAH --}}
                    <div class="poster-number">

                        {{ $totalPengumuman }}

                        <span>
                            Pengumuman
                        </span>

                    </div>

                </div>


                {{-- BUTTON --}}
                <a href="{{ route('admin.pengumuman.index') }}"
                   class="poster-button">

                    <i class="bi bi-megaphone"></i>

                    Kelola Pengumuman

                </a>

            </div>

        </div>



        {{-- =================================================
             GALERI
        ================================================== --}}
        <div class="col-12 col-md-6 col-xl-3">

            <div class="poster-card poster-galeri">

                {{-- DEKORASI --}}
                <div class="poster-circle circle-1"></div>
                <div class="poster-circle circle-2"></div>


                <div class="poster-content">

                    {{-- ICON --}}
                    <div class="poster-icon">

                        <i class="bi bi-images"></i>

                    </div>


                    {{-- JUDUL --}}
                    <h3>
                        Galeri
                        <br>
                        Sekolah
                    </h3>


                    <div class="poster-line"></div>


                    {{-- DESKRIPSI --}}
                    <p>

                        Kumpulan foto kegiatan, acara,
                        dan momen berharga di sekolah.

                    </p>


                    {{-- JUMLAH --}}
                    <div class="poster-number">

                        {{ $totalGaleri }}

                        <span>
                            Foto
                        </span>

                    </div>

                </div>


                {{-- BUTTON --}}
                <a href="{{ route('admin.galeri.index') }}"
                   class="poster-button">

                    <i class="bi bi-images"></i>

                    Kelola Galeri

                </a>

            </div>

        </div>



        {{-- =================================================
             PRESTASI
        ================================================== --}}
        <div class="col-12 col-md-6 col-xl-3">

            <div class="poster-card poster-prestasi">

                {{-- DEKORASI --}}
                <div class="poster-circle circle-1"></div>
                <div class="poster-circle circle-2"></div>


                <div class="poster-content">

                    {{-- ICON --}}
                    <div class="poster-icon">

                        <i class="bi bi-trophy"></i>

                    </div>


                    {{-- JUDUL --}}
                    <h3>
                        Prestasi
                        <br>
                        Sekolah
                    </h3>


                    <div class="poster-line"></div>


                    {{-- DESKRIPSI --}}
                    <p>

                        Daftar prestasi dan pencapaian
                        siswa SMAN 1 Singaparna.

                    </p>


                    {{-- JUMLAH --}}
                    <div class="poster-number">

                        {{ $totalPrestasi }}

                        <span>
                            Prestasi
                        </span>

                    </div>

                </div>


                {{-- BUTTON --}}
                <a href="{{ route('admin.prestasi.index') }}"
                   class="poster-button">

                    <i class="bi bi-trophy"></i>

                    Kelola Prestasi

                </a>

            </div>

        </div>

    </div>

</div>



{{-- =====================================================
     CSS POSTER DASHBOARD
====================================================== --}}
<style>

    /* =========================================
       POSTER CARD
    ========================================= */

    .poster-card {

        position: relative;

        min-height: 430px;

        padding: 28px;

        border-radius: 18px;

        overflow: hidden;

        display: flex;

        flex-direction: column;

        justify-content: space-between;

        box-shadow:
            0 8px 25px rgba(0, 0, 0, 0.10);

        transition:
            transform 0.3s ease,
            box-shadow 0.3s ease;

        color: white;

    }


    /* =========================================
       HOVER
    ========================================= */

    .poster-card:hover {

        transform: translateY(-7px);

        box-shadow:
            0 15px 35px rgba(0, 0, 0, 0.18);

    }


    /* =========================================
       BACKGROUND BERITA
    ========================================= */

    .poster-berita {

        background:
            linear-gradient(
                145deg,
                #1877d2,
                #064b9b
            );

    }


    /* =========================================
       BACKGROUND PENGUMUMAN
    ========================================= */

    .poster-pengumuman {

        background:
            linear-gradient(
                145deg,
                #ffc928,
                #ef9800
            );

    }


    /* =========================================
       BACKGROUND GALERI
    ========================================= */

    .poster-galeri {

        background:
            linear-gradient(
                145deg,
                #8054d8,
                #4d27a2
            );

    }


    /* =========================================
       BACKGROUND PRESTASI
    ========================================= */

    .poster-prestasi {

        background:
            linear-gradient(
                145deg,
                #ef4141,
                #b81919
            );

    }


    /* =========================================
       DEKORASI LINGKARAN
    ========================================= */

    .poster-circle {

        position: absolute;

        border-radius: 50%;

        background:
            rgba(255,255,255,0.10);

        pointer-events: none;

    }


    .circle-1 {

        width: 240px;

        height: 240px;

        right: -100px;

        bottom: 45px;

    }


    .circle-2 {

        width: 140px;

        height: 140px;

        right: 70px;

        top: -70px;

        background:
            rgba(255,255,255,0.08);

    }


    /* =========================================
       CONTENT
    ========================================= */

    .poster-content {

        position: relative;

        z-index: 2;

    }


    /* =========================================
       ICON
    ========================================= */

    .poster-icon {

        width: 62px;

        height: 62px;

        border-radius: 50%;

        display: flex;

        align-items: center;

        justify-content: center;

        background: white;

        color: #3159bd;

        font-size: 27px;

        margin-bottom: 25px;

        box-shadow:
            0 5px 15px rgba(0,0,0,0.12);

    }


    /* =========================================
       JUDUL POSTER
    ========================================= */

    .poster-card h3 {

        color: white;

        font-size: 29px;

        line-height: 1.08;

        font-weight: 700;

        margin-bottom: 12px;

    }


    /* =========================================
       GARIS KUNING
    ========================================= */

    .poster-line {

        width: 55px;

        height: 4px;

        border-radius: 10px;

        background: #ffdc35;

        margin-bottom: 18px;

    }


    /* =========================================
       DESKRIPSI
    ========================================= */

    .poster-card p {

        color: rgba(255,255,255,0.95);

        font-size: 14px;

        line-height: 1.6;

        max-width: 230px;

        margin-bottom: 18px;

    }


    /* =========================================
       JUMLAH DATA
    ========================================= */

    .poster-number {

        position: relative;

        z-index: 2;

        color: white;

        font-size: 32px;

        font-weight: 700;

    }


    .poster-number span {

        font-size: 14px;

        font-weight: 400;

        opacity: 0.9;

    }


    /* =========================================
       BUTTON
    ========================================= */

    .poster-button {

        position: relative;

        z-index: 5;

        width: 100%;

        padding: 13px 15px;

        border-radius: 7px;

        background: white;

        color: #3159bd;

        text-align: center;

        text-decoration: none;

        font-size: 14px;

        font-weight: 600;

        transition: all 0.25s ease;

    }


    .poster-button:hover {

        background: #3159bd;

        color: white;

        transform: translateY(-2px);

    }


    /* =========================================
       RESPONSIVE
    ========================================= */

    @media (max-width: 1200px) {

        .poster-card {

            min-height: 410px;

        }


        .poster-card h3 {

            font-size: 26px;

        }

    }


    @media (max-width: 768px) {

        .poster-card {

            min-height: 400px;

        }

    }

</style>

@endsection