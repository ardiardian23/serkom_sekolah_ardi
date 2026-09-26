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
                                object-fit: contain;
                             ">

                    @else

                        <div class="d-flex align-items-center justify-content-center
                                    bg-light rounded mx-auto"
                             style="
                                width:130px;
                                height:130px;
                             ">

                            <i class="bi bi-building text-primary"
                               style="font-size:60px;">
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


        {{-- GURU --}}
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



        {{-- SISWA --}}
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



        {{-- =================================================
             PRESTASI
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
         INFORMASI
    ====================================================== --}}
    <div class="row">


        {{-- BERITA --}}
        <div class="col-12 col-md-4 mb-4">

            <div class="card h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <h6 class="text-muted font-semibold">
                                Informasi
                            </h6>

                            <h5 class="font-extrabold">
                                Berita
                            </h5>

                            <h2 class="fw-bold text-primary">
                                {{ $totalBerita }}
                            </h2>

                        </div>


                        <div class="stats-icon blue">

                            <i class="bi bi-newspaper"></i>

                        </div>

                    </div>


                    <a href="{{ route('admin.berita.index') }}"
                       class="btn btn-primary btn-sm mt-3 w-100">

                        <i class="bi bi-list"></i>

                        Kelola Berita

                    </a>

                </div>

            </div>

        </div>



        {{-- PENGUMUMAN --}}
        <div class="col-12 col-md-4 mb-4">

            <div class="card h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <h6 class="text-muted font-semibold">
                                Informasi
                            </h6>

                            <h5 class="font-extrabold">
                                Pengumuman
                            </h5>

                            <h2 class="fw-bold text-primary">
                                {{ $totalPengumuman }}
                            </h2>

                        </div>


                        <div class="stats-icon green">

                            <i class="bi bi-megaphone"></i>

                        </div>

                    </div>


                    <a href="{{ route('admin.pengumuman.index') }}"
                       class="btn btn-primary btn-sm mt-3 w-100">

                        <i class="bi bi-list"></i>

                        Kelola Pengumuman

                    </a>

                </div>

            </div>

        </div>



        {{-- GALERI --}}
        <div class="col-12 col-md-4 mb-4">

            <div class="card h-100">

                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h6 class="text-muted font-semibold">
                                Informasi
                            </h6>
                            <h5 class="font-extrabold">
                                Galeri
                            </h5>
                            <h2 class="fw-bold text-primary">
                                {{ $totalGaleri }}
                            </h2>
                        </div>
                        <div class="stats-icon purple">
                            <i class="bi bi-images"></i>
                        </div>
                    </div>
                    <a href="{{ route('admin.galeri.index') }}"
                       class="btn btn-primary btn-sm mt-3 w-100">
                        <i class="bi bi-images"></i>
                        Kelola Galeri
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection