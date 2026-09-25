@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<div class="page-heading">

    <div class="page-title mb-4">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Dashboard</h3>
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


    {{-- SELAMAT DATANG --}}
    <div class="card mb-4">
        <div class="card-body py-4 px-4">

            <div class="row align-items-center">

                <div class="col-md-8">

                    <h4 class="text-primary">
                        Selamat Datang di Website Sekolah 👋
                    </h4>

                    <p class="text-muted mb-0">
                        Kelola data dan informasi sekolah melalui
                        dashboard administrasi.
                    </p>

                </div>

                <div class="col-md-4 text-center">

                    <i class="bi bi-building text-primary"
                       style="font-size: 80px;">
                    </i>

                </div>

            </div>

        </div>
    </div>


    {{-- FITUR --}}
    <div class="row">

        {{-- PROFIL SEKOLAH --}}
        <div class="col-12 col-md-6 col-lg-3 mb-4">

            <div class="card h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>
                            <h6 class="text-muted font-semibold">
                                Profil Sekolah
                            </h6>

                            <h5 class="font-extrabold mb-0">
                                Profil
                            </h5>
                        </div>

                        <div class="stats-icon purple">
                            <i class="bi bi-building"></i>
                        </div>

                    </div>

                    <a href="{{ route('profil.profil-sekolah.index') }}"
                       class="btn btn-primary btn-sm mt-3 w-100">
                        <i class="bi bi-eye"></i>
                        Kelola Profil
                    </a>

                </div>

            </div>

        </div>


        {{-- DATA GURU --}}
        <div class="col-12 col-md-6 col-lg-3 mb-4">

            <div class="card h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>
                            <h6 class="text-muted font-semibold">
                                Data Sekolah
                            </h6>

                            <h5 class="font-extrabold mb-0">
                                Guru
                            </h5>
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


        {{-- DATA SISWA --}}
        <div class="col-12 col-md-6 col-lg-3 mb-4">

            <div class="card h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>
                            <h6 class="text-muted font-semibold">
                                Data Sekolah
                            </h6>

                            <h5 class="font-extrabold mb-0">
                                Siswa
                            </h5>
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


        {{-- EKSTRAKURIKULER --}}
        <div class="col-12 col-md-6 col-lg-3 mb-4">

            <div class="card h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>
                            <h6 class="text-muted font-semibold">
                                Data Sekolah
                            </h6>

                            <h5 class="font-extrabold mb-0">
                                Ekstrakurikuler
                            </h5>
                        </div>

                        <div class="stats-icon red">
                            <i class="bi bi-trophy"></i>
                        </div>

                    </div>

                    <a href="{{ route('admin.ekstrakurikuler.index') }}"
                       class="btn btn-primary btn-sm mt-3 w-100">
                        <i class="bi bi-list"></i>
                        Kelola Eskul
                    </a>

                </div>

            </div>

        </div>


        {{-- PRESTASI --}}
        <div class="col-12 col-md-6 col-lg-3 mb-4">

            <div class="card h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>
                            <h6 class="text-muted font-semibold">
                                Data Sekolah
                            </h6>

                            <h5 class="font-extrabold mb-0">
                                Prestasi
                            </h5>
                        </div>

                        <div class="stats-icon orange">
                            <i class="bi bi-award"></i>
                        </div>

                    </div>

                    <a href="{{ route('admin.prestasi.index') }}"
                       class="btn btn-primary btn-sm mt-3 w-100">
                        <i class="bi bi-list"></i>
                        Kelola Prestasi
                    </a>

                </div>

            </div>

        </div>


        {{-- BERITA --}}
        <div class="col-12 col-md-6 col-lg-3 mb-4">

            <div class="card h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>
                            <h6 class="text-muted font-semibold">
                                Informasi
                            </h6>

                            <h5 class="font-extrabold mb-0">
                                Berita
                            </h5>
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
        <div class="col-12 col-md-6 col-lg-3 mb-4">

            <div class="card h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>
                            <h6 class="text-muted font-semibold">
                                Informasi
                            </h6>

                            <h5 class="font-extrabold mb-0">
                                Pengumuman
                            </h5>
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
        <div class="col-12 col-md-6 col-lg-3 mb-4">

            <div class="card h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>
                            <h6 class="text-muted font-semibold">
                                Informasi
                            </h6>

                            <h5 class="font-extrabold mb-0">
                                Galeri
                            </h5>
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


    {{-- INFORMASI CEPAT --}}
    <div class="row">

        <div class="col-12">

            <div class="card">

                <div class="card-header">
                    <h4>Menu Cepat</h4>
                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-3 mb-2">

                            <a href="{{ route('admin.guru.create') }}"
                               class="btn btn-outline-primary w-100">

                                <i class="bi bi-person-plus"></i>
                                Tambah Guru

                            </a>

                        </div>

                        <div class="col-md-3 mb-2">

                            <a href="{{ route('admin.siswa.create') }}"
                               class="btn btn-outline-primary w-100">

                                <i class="bi bi-person-plus"></i>
                                Tambah Siswa

                            </a>

                        </div>

                        <div class="col-md-3 mb-2">

                            <a href="{{ route('admin.berita.create') }}"
                               class="btn btn-outline-primary w-100">

                                <i class="bi bi-plus-circle"></i>
                                Tambah Berita

                            </a>

                        </div>

                        <div class="col-md-3 mb-2">

                            <a href="{{ route('admin.galeri.create') }}"
                               class="btn btn-outline-primary w-100">

                                <i class="bi bi-cloud-upload"></i>
                                Tambah Galeri

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection