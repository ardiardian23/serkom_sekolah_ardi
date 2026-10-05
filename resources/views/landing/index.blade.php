@extends('layouts.landing')

@section('title')
{{ $profil->nama_sekolah ?? 'Website Sekolah' }}
@endsection

@section('content')

<!-- ========================================================= -->

<!-- HERO -->

<!-- ========================================================= -->

<section class="hero" id="home">

```
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
```

</section>

<!-- ========================================================= -->

<!-- STATISTIK -->

<!-- ========================================================= -->

<section class="stat-section py-5">

```
<div class="container">

    <div class="row text-center g-4">

        <div class="col-md-3">

            <div class="stat-number">
                {{ $totalSiswa }}
            </div>

            <div class="stat-label">
                Siswa
            </div>

        </div>

        <div class="col-md-3">

            <div class="stat-number">
                {{ $totalGuru }}
            </div>

            <div class="stat-label">
                Guru
            </div>

        </div>

        <div class="col-md-3">

            <div class="stat-number">
                {{ $ekskuls->count() }}
            </div>

            <div class="stat-label">
                Ekstrakurikuler
            </div>

        </div>

        <div class="col-md-3">

            <div class="stat-number">
                {{ $prestasi->count() }}
            </div>

            <div class="stat-label">
                Prestasi
            </div>

        </div>

    </div>

</div>
```

</section>

<!-- ========================================================= -->

<!-- PROFIL SEKOLAH -->

<!-- ========================================================= -->

<section class="section-padding bg-white" id="profil">

```
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

                <img src="{{ asset('assets/images/logo/logoschool.jpg') }}"
                     class="school-logo"
                     alt="Logo Sekolah">

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
```

</section>

<!-- ========================================================= -->

<!-- VISI MISI -->

<!-- ========================================================= -->

<section class="section-padding bg-light">

```
<div class="container">

    <div class="text-center">

        <h2 class="section-title">
            Visi & Misi
        </h2>

        <p class="section-subtitle">
            Landasan dan tujuan pendidikan sekolah
        </p>

    </div>

    <div class="row justify-content-center">

        <div class="col-lg-9">

            <div class="card info-card shadow-sm">

                <div class="card-body p-5 text-center">

                    <div class="info-icon bg-primary bg-opacity-10 text-primary mx-auto">

                        <i class="bi bi-bullseye"></i>

                    </div>

                    <h4 class="fw-bold mb-3">
                        Visi & Misi Sekolah
                    </h4>

                    <p class="text-muted"
                       style="white-space: pre-line; line-height: 1.9;">
                        {{ $profil->visi_misi ?? 'Visi dan misi sekolah belum tersedia.' }}
                    </p>

                </div>

            </div>

        </div>

    </div>

</div>
```

</section>

<!-- ========================================================= -->

<!-- BERITA -->

<!-- ========================================================= -->

<section class="section-padding bg-white" id="berita">

```
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

        <a href="{{ route('admin.berita.index') }}"
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
```

</section>

<!-- ========================================================= -->

<!-- PENGUMUMAN -->

<!-- ========================================================= -->

<section class="section-padding bg-light">

```
<div class="container">

    <div class="text-center">

        <h2 class="section-title">
            Pengumuman
        </h2>

        <p class="section-subtitle">
            Informasi penting untuk siswa dan orang tua
        </p>

    </div>

    <div class="row g-4">

        @forelse($pengumuman as $item)

            <div class="col-lg-4">

                <div class="card info-card shadow-sm">

                    <div class="card-body p-4">

                        <div class="d-flex align-items-center mb-3">

                            <div class="info-icon bg-primary bg-opacity-10 text-primary mb-0 me-3">

                                <i class="bi bi-megaphone"></i>

                            </div>

                            <div>

                                <small class="text-muted">

                                    {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}

                                </small>

                                <h5 class="fw-bold mb-0">
                                    {{ $item->judul }}
                                </h5>

                            </div>

                        </div>

                        <p class="text-muted mb-0">

                            {{ \Illuminate\Support\Str::limit(strip_tags($item->isi), 150) }}

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
```

</section>

<!-- ========================================================= -->

<!-- GURU -->

<!-- ========================================================= -->

<section class="section-padding bg-white" id="guru">

```
<div class="container">

    <div class="text-center">

        <h2 class="section-title">
            Guru Kami
        </h2>

        <p class="section-subtitle">
            Tenaga pendidik profesional sekolah
        </p>

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
```

</section>

<!-- ========================================================= -->

<!-- SISWA -->

<!-- ========================================================= -->

<section class="section-padding bg-light" id="siswa">

```
<div class="container">

    <div class="text-center">

        <h2 class="section-title">
            Siswa Kami
        </h2>

        <p class="section-subtitle">
            Peserta didik sekolah kami
        </p>

    </div>

    <div class="row g-4">

        @forelse($siswas as $item)

            <div class="col-lg-4 col-md-6">

                <div class="card info-card shadow-sm">

                    <div class="card-body p-4">

                        <div class="d-flex align-items-center">

                            <div class="info-icon bg-primary bg-opacity-10 text-primary mb-0 me-3">

                                <i class="bi bi-person-fill"></i>

                            </div>

                            <div>

                                <h5 class="fw-bold mb-1">
                                    {{ $item->nama_siswa }}
                                </h5>

                                <small class="text-muted">
                                    NISN: {{ $item->nisn }}
                                </small>

                            </div>

                        </div>

                        <hr>

                        <div class="row">

                            <div class="col-6">

                                <small class="text-muted">
                                    Jenis Kelamin
                                </small>

                                <div class="fw-bold">
                                    {{ $item->jenis_kelamin }}
                                </div>

                            </div>

                            <div class="col-6">

                                <small class="text-muted">
                                    Tahun Masuk
                                </small>

                                <div class="fw-bold">
                                    {{ $item->tahun_masuk }}
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12 text-center">

                <div class="card shadow-sm">

                    <div class="card-body p-5">

                        <i class="bi bi-people fs-1 text-secondary"></i>

                        <p class="text-muted mt-3 mb-0">
                            Belum ada data siswa.
                        </p>

                    </div>

                </div>

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

    <div class="text-center">

        <h2 class="section-title">
            Ekstrakurikuler
        </h2>

        <p class="section-subtitle">
            Kegiatan pengembangan minat dan bakat siswa
        </p>

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
```

</section>

<!-- ========================================================= -->

<!-- PRESTASI -->

<!-- ========================================================= -->

<section class="section-padding bg-white" id="prestasi">

```
<div class="container">

    <div class="text-center">

        <h2 class="section-title">
            Prestasi Sekolah
        </h2>

        <p class="section-subtitle">
            Prestasi dan pencapaian siswa
        </p>

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
```

</section>

<!-- ========================================================= -->

<!-- GALERI -->

<!-- ========================================================= -->

<section class="section-padding bg-light" id="galeri">

```
<div class="container">

    <div class="text-center">

        <h2 class="section-title">
            Galeri Sekolah
        </h2>

        <p class="section-subtitle">
            Dokumentasi kegiatan sekolah
        </p>

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
```

</section>

<!-- ========================================================= -->

<!-- KONTAK -->

<!-- ========================================================= -->

<section class="section-padding bg-white">

```
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
