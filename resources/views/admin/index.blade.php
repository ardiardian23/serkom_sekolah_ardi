@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<div class="page-heading">
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


            <div class="row g-4">

            <div class="card mb-4">
                <div class="card-body py-4 px-4">

                    <div class="row align-items-center">

                        {{-- ================================================= --}}
                        {{-- LOGO SEKOLAH --}}
                        {{-- ================================================= --}}
                        <div class="col-md-3 text-center">

                            @if($profil && $profil->logo)

                                <img
                                    src="{{ asset('storage/' . $profil->logo) }}"
                                    alt="Logo Sekolah"
                                    style="
                                        width: 130px;
                                        height: 130px;
                                        object-fit: contain;
                                    "
                                >

                            @else

                                <div
                                    class="d-flex align-items-center justify-content-center bg-light rounded mx-auto"
                                    style="
                                        width: 130px;
                                        height: 130px;
                                    "
                                >
                                    <i
                                        class="bi bi-building text-primary"
                                        style="font-size: 60px;"
                                    ></i>
                                </div>

                            @endif

                        </div>
                        <div class="col-md-6">

                            <h6 class="text-muted mb-1">
                                PROFIL SEKOLAH
                            </h6>

                            <h2 class="fw-bold text-primary mb-2">
                                {{ $profil->nama_sekolah ?? 'Nama Sekolah' }}
                            </h2>


                            <p class="mb-3">

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

                                <div class="col-12 mt-3">

                                    <small class="text-muted">
                                        Alamat
                                    </small>

                                    <div class="fw-bold">
                                        {{ $profil->alamat ?? '-' }}
                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="col-md-3 text-center">

                            @if($profil && $profil->foto)

                                <img
                                    src="{{ asset('storage/' . $profil->foto) }}"
                                    alt="Foto Sekolah"
                                    class="rounded"
                                    style="
                                        width: 100%;
                                        max-width: 220px;
                                        height: 130px;
                                        object-fit: cover;
                                    "
                                >

                            @else

                                <div
                                    class="bg-light rounded d-flex align-items-center justify-content-center mx-auto"
                                    style="
                                        width: 100%;
                                        max-width: 220px;
                                        height: 130px;
                                    "
                                >

                                    <i
                                        class="bi bi-image text-primary"
                                        style="font-size: 50px;"
                                    ></i>

                                </div>

                            @endif

                            <a
                                href="{{ route('profil.profil-sekolah.index') }}"
                                class="btn btn-primary btn-sm mt-3"
                            >

                                <i class="bi bi-eye me-1"></i>
                                Kelola Profil

                            </a>

                        </div>

                    </div>
                    <hr class="my-3">

                    <div class="text-muted">

                        <i class="bi bi-telephone-fill text-primary me-1"></i>

                        {{ $profil->kontak ?? '-' }}

                    </div>

                </div>
            </div>

        </div>

    <div class="row g-4">

    <div class="col-lg-4 col-md-6">
        <div class="card h-100 shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <span class="text-muted">
                            Data Sekolah
                        </span>
                        <h5 class="fw-bold mt-2">
                            Guru
                        </h5>
                        <h2 class="text-primary fw-bold">
                            {{ $totalGuru ?? 0 }}
                        </h2>
                    </div>
                </div>
                <a href="{{ route('admin.guru.index') }}"
                   class="btn btn-primary w-100 mt-3">
                    <i class="bi bi-people me-1"></i>
                    Kelola Guru
                </a>
            </div>
        </div>
    </div>


    <div class="col-lg-4 col-md-6">
        <div class="card h-100 shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <span class="text-muted">
                            Data Sekolah
                        </span>
                        <h5 class="fw-bold mt-2">
                            Siswa
                        </h5>
                        <h2 class="text-primary fw-bold">
                            {{ $totalSiswa ?? 0 }}
                        </h2>
                    </div>
                </div>
                <a href="{{ route('admin.siswa.index') }}"
                   class="btn btn-primary w-100 mt-3">
                    <i class="bi bi-person-lines-fill me-1"></i>
                    Kelola Siswa
                </a>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="card h-100 shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">

                    <div>
                        <span class="text-muted">
                            Data Sekolah
                        </span>

                        <h5 class="fw-bold mt-2">
                            Ekstrakurikuler
                        </h5>

                        <h2 class="text-primary fw-bold">
                            {{ $totalEkstrakurikuler ?? 0 }}
                        </h2>
                    </div>
                </div>

                <a href="{{ route('admin.ekstrakurikuler.index') }}"
                   class="btn btn-primary w-100 mt-3">

                    <i class="bi bi-list me-1"></i>
                    Kelola Ekskul
                </a>
            </div>
        </div>
    </div>
</div>

    <div class="row g-4 mt-1">
        <div class="col-12 col-md-6 col-xl-3">
            <div class="poster-card poster-berita">
                <div class="poster-circle circle-1"></div>
                <div class="poster-circle circle-2"></div>
                <div class="poster-content">
                    <div class="poster-icon">
                        <i class="bi bi-newspaper"></i>
                    </div>
                    <h3>
                        Berita
                        <br>
                        Sekolah
                    </h3>
                    <div class="poster-line"></div>
                    <p>
                        Informasi terbaru seputar kegiatan
                        dan perkembangan SMAN 1 Singaparna.
                    </p>

                    <div class="poster-number">
                        {{ $totalBerita }}
                        <span>
                            Berita
                        </span>
                    </div>
                </div>

                <a href="{{ route('admin.berita.index') }}"
                   class="poster-button">
                    <i class="bi bi-newspaper"></i>
                    Kelola Berita
                </a>
            </div>
        </div>

        <div class="col-12 col-md-6 col-xl-3">

            <div class="poster-card poster-pengumuman">


                <div class="poster-circle circle-1"></div>
                <div class="poster-circle circle-2"></div>


                <div class="poster-content">


                    <div class="poster-icon">

                        <i class="bi bi-megaphone"></i>

                    </div>



                    <h3>
                        Pengumuman
                        <br>
                        Sekolah
                    </h3>


                    <div class="poster-line"></div>



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

                <a href="{{ route('admin.pengumuman.index') }}"
                   class="poster-button">

                    <i class="bi bi-megaphone"></i>

                    Kelola Pengumuman

                </a>

            </div>

        </div>

        <div class="col-12 col-md-6 col-xl-3">

            <div class="poster-card poster-galeri">

                <div class="poster-circle circle-1"></div>
                <div class="poster-circle circle-2"></div>


                <div class="poster-content">
                    <div class="poster-icon">

                        <i class="bi bi-images"></i>

                    </div>

                    <h3>
                        Galeri
                        <br>
                        Sekolah
                    </h3>

                    <div class="poster-line"></div>

                    <p>

                        Kumpulan foto kegiatan, acara,
                        dan momen berharga di sekolah.

                    </p>

                    <div class="poster-number">
                        {{ $totalGaleri }}
                        <span>
                            Foto
                        </span>
                    </div>
                </div>

                <a href="{{ route('admin.galeri.index') }}"
                   class="poster-button">
                    <i class="bi bi-images"></i>
                    Kelola Galeri
                </a>
            </div>
        </div>

        <div class="col-12 col-md-6 col-xl-3">

            <div class="poster-card poster-prestasi">

                <div class="poster-circle circle-1"></div>
                <div class="poster-circle circle-2"></div>
                <div class="poster-content">

                    <div class="poster-icon">

                        <i class="bi bi-trophy"></i>

                    </div>


                    <h3>
                        Prestasi
                        <br>
                        Sekolah
                    </h3>


                    <div class="poster-line"></div>



                    <p>

                        Daftar prestasi dan pencapaian
                        siswa SMAN 1 Singaparna.

                    </p>



                    <div class="poster-number">

                        {{ $totalPrestasi }}

                        <span>
                            Prestasi
                        </span>

                    </div>

                </div>


                <a href="{{ route('admin.prestasi.index') }}"
                   class="poster-button">

                    <i class="bi bi-trophy"></i>

                    Kelola Prestasi

                </a>

            </div>

        </div>

    </div>

</div>



@endsection
