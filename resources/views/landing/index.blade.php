@extends('layouts.landing')

 <title>SMA Negeri 9 Sijunjung</title>

    <link rel="icon" href="{{ asset('assets/images/logo/logosekolah.png')}}">

@section('content')

<!-- ========================================================= -->

<!-- HERO -->

<!-- ========================================================= -->

<section class="hero" id="home">


<div class="container">

    <div class="row align-items-center">

        <div class="col-lg-8 hero-content">

            <span class="badge bg-light text-primary px-3 py-2 mb-3">
                <i class="bi bi-mortarboard-fill me-1"></i>
                Website Resmi Sekolah
            </span>

            <h1 class="hero-title">
                {{ $profil->nama_sekolah ?? 'Selamat Datang di Website Sekolah' }}
            </h1>

            <p class="hero-text mt-4">
                {{ $profil->deskripsi ?? 'Mewujudkan pendidikan yang berkualitas, berkarakter, dan berprestasi.' }}
            </p>

            <div class="mt-4">

                <a href="#profil"
                   class="btn btn-light btn-lg px-4 me-2">
                    <i class="bi bi-building me-2"></i>
                    Profil Sekolah
                </a>

                <a href="#berita"
                   class="btn btn-outline-light btn-lg px-4">
                    Lihat Berita
                </a>

            </div>

        </div>

    </div>

</div>


</section>

<!-- ========================================================= -->

<!-- STATISTIK -->

<!-- ========================================================= -->

<section class="school-stats">
    <div class="container">

        <div class="stats-wrapper">

            <!-- Berita -->
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="bi bi-newspaper"></i>
                </div>

                <div class="stat-content">
                    <h2>{{ $totalBerita ?? 0 }}</h2>
                    <p>Berita</p>
                </div>
            </div>


            <!-- Pengumuman -->
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="bi bi-megaphone-fill"></i>
                </div>

                <div class="stat-content">
                    <h2>{{ $totalPengumuman ?? 0 }}</h2>
                    <p>Pengumuman</p>
                </div>
            </div>


            <!-- Guru & Staff -->
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="bi bi-people-fill"></i>
                </div>

                <div class="stat-content">
                    <h2>{{ $totalGuru ?? 0 }}</h2>
                    <p>Guru & Staff</p>
                </div>
            </div>


            <!-- Ekstrakurikuler -->
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="bi bi-mortarboard-fill"></i>
                </div>

                <div class="stat-content">
                    <h2>{{ $totalEkstrakurikuler ?? 0 }}</h2>
                    <p>Ekstrakurikuler</p>
                </div>
            </div>


            <!-- Prestasi -->
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="bi bi-trophy-fill"></i>
                </div>

                <div class="stat-content">
                    <h2>{{ $totalPrestasi ?? 0 }}</h2>
                    <p>Prestasi</p>
                </div>
            </div>


            <!-- Galeri -->
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="bi bi-images"></i>
                </div>

                <div class="stat-content">
                    <h2>{{ $totalGaleri ?? 0 }}</h2>
                    <p>Galeri</p>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- ========================================================= -->

<!-- PROFIL SEKOLAH -->

<!-- ========================================================= -->

<section class="section-padding bg-white" id="profil">


<div class="container">

    <div class="text-center">

        <h2 class="section-title">
            Profil Sekolah
        </h2>

        <p class="section-subtitle">
            Mengenal lebih dekat sekolah kami
        </p>

    </div>

    <div class="row align-items-center g-5">

        <div class="col-lg-5 text-center">

            @if($profil && $profil->logo)

                <img src="{{ asset('storage/' . $profil->logo) }}"
                     class="school-logo"
                     alt="Logo Sekolah">

            @else

                <img src="{{ asset('assets/images/faces/kepsek.png') }}"
                    class="school-logo"
                    alt="Logo Sekolah"
                    style="width: 300px; height: 300px; object-fit: contain;">

            @endif

            <h3 class="fw-bold mt-4">
                {{ $profil->nama_sekolah ?? 'Nama Sekolah' }}
            </h3>

            <p class="text-muted">
                NPSN:
                {{ $profil->npsn ?? '-' }}
            </p>

        </div>

        <div class="col-lg-7">

            <h3 class="fw-bold mb-3">
                Tentang Sekolah
            </h3>

            <p class="text-muted" style="line-height: 1.9;">
                {{ $profil->deskripsi ?? 'Belum ada deskripsi sekolah.' }}
            </p>

            <div class="row mt-4">

                <div class="col-md-6 mb-3">

                    <div class="d-flex">

                        <i class="bi bi-person-badge fs-3 text-primary me-3"></i>

                        <div>

                            <small class="text-muted">
                                Kepala Sekolah
                            </small>

                            <div class="fw-bold">
                                {{ $profil->kepala_sekolah ?? '-' }}
                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-md-6 mb-3">

                    <div class="d-flex">

                        <i class="bi bi-calendar-event fs-3 text-primary me-3"></i>

                        <div>

                            <small class="text-muted">
                                Tahun Berdiri
                            </small>

                            <div class="fw-bold">
                                {{ $profil->tahun_berdiri ?? '-' }}
                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-md-12">

                    <div class="d-flex">

                        <i class="bi bi-geo-alt fs-3 text-primary me-3"></i>

                        <div>

                            <small class="text-muted">
                                Alamat
                            </small>

                            <div class="fw-bold">
                                {{ $profil->alamat ?? '-' }}
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


</section>

<!-- ========================================================= -->

<!-- VISI MISI -->

<!-- ========================================================= -->



<!-- Visi & Misi -->
<section class="visi-misi-section py-5">

    <div class="container">

        <!-- Judul Section -->
        <div class="text-center mb-4">

            <h2 class="section-title">
                Visi & Misi
            </h2>

            <p class="section-subtitle">
                Landasan dan tujuan pendidikan sekolah
            </p>

        </div>

        <!-- Card -->
        <div class="row justify-content-center">

            <div class="col-lg-9">

                <div class="card info-card shadow-sm">

                    <div class="card-body p-5">

                        <!-- Icon -->
                        <div class="info-icon bg-primary bg-opacity-10 text-primary mx-auto mb-3">

                            <i class="bi bi-bullseye"></i>

                        </div>

                        <!-- Judul -->
                        <h4 class="fw-bold mb-4 text-center">
                            Visi & Misi Sekolah
                        </h4>

                        <!-- Isi Visi & Misi -->
                        <div class="text-muted visi-misi-content">

                            @if($profil && $profil->visi_misi)

                                {!! nl2br(e($profil->visi_misi)) !!}

                            @else

                                Visi dan misi sekolah belum tersedia.

                            @endif

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



<!-- ========================================================= -->

<!-- BERITA -->

<!-- ========================================================= -->

<section class="section-padding bg-white" id="berita">


<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-5">

        <div>

            <h2 class="section-title mb-1">
                Berita Terbaru
            </h2>

            <p class="text-muted mb-0">
                Informasi terbaru dari sekolah
            </p>

        </div>

        <a href="{{ route('berita.public') }}"
        class="btn btn-outline-primary">
            Lihat Semua
            <i class="bi bi-arrow-right ms-1"></i>
        </a>

    </div>

    <div class="row g-4">

        @forelse($berita as $item)

            <div class="col-lg-4 col-md-6">

                <div class="card news-card shadow-sm">

                    @if($item->gambar)

                        <img src="{{ asset('storage/' . $item->gambar) }}"
                             class="news-image"
                             alt="{{ $item->judul }}">

                    @else

                        <div class="news-image bg-light d-flex align-items-center justify-content-center">

                            <i class="bi bi-newspaper fs-1 text-secondary"></i>

                        </div>

                    @endif

                    <div class="card-body p-4">

                        <small class="text-primary">

                            <i class="bi bi-calendar3 me-1"></i>

                            {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}

                        </small>

                        <h5 class="fw-bold mt-2">
                            {{ $item->judul }}
                        </h5>

                        <p class="text-muted">
                            {{ \Illuminate\Support\Str::limit(strip_tags($item->isi), 120) }}
                        </p>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12 text-center">

                <p class="text-muted">
                    Belum ada berita.
                </p>

            </div>

        @endforelse

    </div>

</div>


</section>

<!-- ========================================================= -->

<!-- PENGUMUMAN -->

<!-- ========================================================= -->

<section class="section-padding bg-light" id="pengumuman">

    <div class="container">

        <div class="d-flex justify-content-between align-items-center mb-5">

            <div>
                <h2 class="section-title mb-1">
                    Pengumuman
                </h2>

                <p class="text-muted mb-0">
                    Informasi penting untuk siswa dan orang tua
                </p>
            </div>

            <a href="{{ route('pengumuman.public') }}"
               class="btn btn-outline-primary">

                Lihat Semua
                <i class="bi bi-arrow-right ms-1"></i>

            </a>

        </div>

        {{-- DATA PENGUMUMAN --}}
        <div class="row g-4">

            @forelse($pengumuman as $item)

                <div class="col-md-4">

                    <div class="card h-100 shadow-sm border-0">

                        <div class="card-body">

                            <div class="mb-3">
                                <i class="bi bi-megaphone fs-2 text-primary"></i>
                            </div>

                            <small class="text-muted">
                                {{ $item->tanggal }}
                            </small>

                            <h5 class="fw-bold mt-2">
                                {{ $item->judul }}
                            </h5>

                            <p class="text-muted">
                                {{ Str::limit($item->isi, 120) }}
                            </p>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12 text-center">
                    <p class="text-muted">
                        Belum ada pengumuman.
                    </p>
                </div>

            @endforelse

        </div>

    </div>

</section>




<!-- ========================================================= -->

<!-- GURU -->

<!-- ========================================================= -->

<section class="section-padding bg-white" id="guru">


<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h2 class="section-title mb-1">
                Guru dan Staff
            </h2>

            <p class="text-muted mb-0">
                Tenaga pendidik profesional sekolah
            </p>

        </div>
        <a href="{{ route('guru.public') }}"
        class="btn btn-outline-primary">

            Lihat Semua
            <i class="bi bi-arrow-right ms-1"></i>

        </a>
    </div>
    <div class="row g-4">

        @forelse($guru as $item)

            <div class="col-lg-4 col-md-6">

                <div class="card info-card shadow-sm text-center">

                    <div class="card-body p-4">

                        @if($item->foto)

                            <img src="{{ asset('storage/' . $item->foto) }}"
                                 class="teacher-image"
                                 alt="{{ $item->nama_guru }}">

                        @else

                            <div class="teacher-image mx-auto bg-light d-flex align-items-center justify-content-center">

                                <i class="bi bi-person fs-1 text-secondary"></i>

                            </div>

                        @endif

                        <h5 class="fw-bold mt-4 mb-1">
                            {{ $item->nama_guru }}
                        </h5>

                        <p class="text-primary mb-2">
                            {{ $item->mapel }}
                        </p>

                        <small class="text-muted">
                            NIP: {{ $item->nip }}
                        </small>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12 text-center">

                <p class="text-muted">
                    Belum ada data guru.
                </p>

            </div>

        @endforelse

    </div>

</div>
</section>

<!-- ========================================================= -->

<!-- EKSTRAKURIKULER -->

<!-- ========================================================= -->

<section class="section-padding bg-light">

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h2 class="section-title mb-1">
                Ekstrakurikuler
            </h2>
            <p class="text-muted mb-0">
                Kegiatan pengembangan minat dan bakat siswa
            </p>
        </div>
        <a href="{{ route('ekstrakurikuler.public') }}"
        class="btn btn-outline-primary">

            Lihat Semua
            <i class="bi bi-arrow-right ms-1"></i>

        </a>

    </div>

    <div class="row g-4">

        @forelse($ekskuls as $item)

            <div class="col-lg-4 col-md-6">

                <div class="card info-card shadow-sm overflow-hidden">

                    @if($item->gambar)

                        <img src="{{ asset('storage/' . $item->gambar) }}"
                             class="news-image"
                             alt="{{ $item->nama_ekskul }}">

                    @else

                        <div class="news-image bg-white d-flex align-items-center justify-content-center">

                            <i class="bi bi-people fs-1 text-primary"></i>

                        </div>

                    @endif

                    <div class="card-body p-4">

                        <h5 class="fw-bold">
                            {{ $item->nama_ekskul }}
                        </h5>

                        <p class="text-muted mb-2">

                            <i class="bi bi-person me-1"></i>

                            {{ $item->pembina }}

                        </p>

                        <p class="text-muted mb-0">
                            {{ $item->jadwal_latihan }}
                        </p>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12 text-center">

                <p class="text-muted">
                    Belum ada data ekstrakurikuler.
                </p>

            </div>

        @endforelse

    </div>

</div>

</section>

<!-- ========================================================= -->

<!-- PRESTASI -->

<!-- ========================================================= -->

<section class="section-padding bg-white" id="prestasi">

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h2 class="section-title mb-1">
                Prestasi Sekolah
            </h2>

            <p class="text-muted mb-0">
                Prestasi dan pencapaian siswa
            </p>
        </div>
        <a href="{{ route('prestasi.public') }}"
        class="btn btn-outline-primary">

            Lihat Semua
            <i class="bi bi-arrow-right ms-1"></i>

        </a>
    </div>

    <div class="row g-4">

        @forelse($prestasi as $item)

            <div class="col-lg-4 col-md-6">

                <div class="card news-card shadow-sm">

                    @if($item->foto)

                        <img src="{{ asset('storage/' . $item->foto) }}"
                             class="news-image"
                             alt="{{ $item->nama_prestasi }}">

                    @else

                        <div class="news-image bg-light d-flex align-items-center justify-content-center">

                            <i class="bi bi-trophy fs-1 text-warning"></i>

                        </div>

                    @endif

                    <div class="card-body p-4">

                        <span class="badge bg-primary mb-2">
                            {{ $item->tahun_ajaran }}
                        </span>

                        <h5 class="fw-bold">
                            {{ $item->nama_prestasi }}
                        </h5>

                        <p class="text-muted">
                            {{ \Illuminate\Support\Str::limit(strip_tags($item->deskripsi), 120) }}
                        </p>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12 text-center">

                <p class="text-muted">
                    Belum ada data prestasi.
                </p>

            </div>

        @endforelse

    </div>

</div>


</section>

<!-- ========================================================= -->

<!-- GALERI -->

<!-- ========================================================= -->

<section class="section-padding bg-light" id="galeri">


<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h2 class="section-title mb-1">
                Galeri Sekolah
            </h2>

            <p class="text-muted mb-0">
                Dokumentasi kegiatan sekolah
            </p>

        </div>
        <a href="{{ route('galeri.public') }}"
        class="btn btn-outline-primary">
            Lihat Semua
            <i class="bi bi-arrow-right ms-1"></i>
        </a>
    </div>

    <div class="row g-3">

        @forelse($galeris as $item)

            <div class="col-lg-3 col-md-4 col-6">

                @if($item->file)

                    <img src="{{ asset('storage/' . $item->file) }}"
                         class="gallery-image"
                         alt="{{ $item->judul }}">

                @endif

                <div class="mt-2">

                    <h6 class="fw-bold mb-0">
                        {{ $item->judul }}
                    </h6>

                    <small class="text-muted">
                        {{ $item->kategori }}
                    </small>

                </div>

            </div>

        @empty

            <div class="col-12 text-center">

                <p class="text-muted">
                    Belum ada foto galeri.
                </p>

            </div>

        @endforelse

    </div>

</div>


</section>

<!-- ========================================================= -->

<!-- KONTAK -->

<!-- ========================================================= -->

<section class="section-padding bg-white">


<div class="container">

    <div class="text-center">

        <h2 class="section-title">
            Hubungi Kami
        </h2>

        <p class="section-subtitle">
            Informasi kontak sekolah
        </p>

    </div>

    <div class="row justify-content-center g-4">

        <div class="col-lg-4">

            <div class="card info-card shadow-sm">

                <div class="card-body p-4 text-center">

                    <div class="info-icon bg-primary bg-opacity-10 text-primary mx-auto">

                        <i class="bi bi-geo-alt"></i>

                    </div>

                    <h5 class="fw-bold">
                        Alamat
                    </h5>

                    <p class="text-muted mb-0">
                        {{ $profil->alamat ?? '-' }}
                    </p>

                </div>

            </div>

        </div>

        <div class="col-lg-4">

            <div class="card info-card shadow-sm">

                <div class="card-body p-4 text-center">

                    <div class="info-icon bg-primary bg-opacity-10 text-primary mx-auto">

                        <i class="bi bi-telephone"></i>

                    </div>

                    <h5 class="fw-bold">
                        Kontak
                    </h5>

                    <p class="text-muted mb-0">
                        {{ $profil->kontak ?? '-' }}
                    </p>

                </div>

            </div>

        </div>

    </div>

</div>

</section>

@endsection
