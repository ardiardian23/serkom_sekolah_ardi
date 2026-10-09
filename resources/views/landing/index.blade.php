@extends('layouts.landing')

@section('title', 'SMA Negeri 9 Sijunjung')

@section('content')
<!-- HERO -->
<section class="hero" id="home">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 hero-content">
                <span class="badge bg-light text-primary hero-badge mb-3">
                    <i class="bi bi-mortarboard-fill"></i>
                    Website Resmi Sekolah
                </span>
                <h1 class="hero-title">
                    {{ $profil->nama_sekolah ?? 'Selamat Datang di Website Sekolah' }}
                </h1>
                <p class="hero-text mt-3">
                    {{ $profil->deskripsi ?? 'Mewujudkan pendidikan yang berkualitas, berkarakter, dan berprestasi.' }}
                </p>
            </div>
        </div>
    </div>
</section>

<!-- STATISTIK -->

<section class="statistik-section">
    <div class="container">
        <div class="statistik-grid">

            <div class="statistik-card">
                <div class="statistik-icon">
                    <i class="bi bi-newspaper"></i>
                </div>
                <div class="statistik-info">
                    <h3>{{ $beritas->count() }}</h3>
                    <p>Berita</p>
                </div>
            </div>

            <div class="statistik-card">
                <div class="statistik-icon">
                    <i class="bi bi-megaphone-fill"></i>
                </div>
                <div class="statistik-info">
                    <h3>{{ $pengumuman->count() }}</h3>
                    <p>Pengumuman</p>
                </div>
            </div>

            <div class="statistik-card">
                <div class="statistik-icon">
                    <i class="bi bi-people-fill"></i>
                </div>
                <div class="statistik-info">
                    <h3>{{ $guru->count() }}</h3>
                    <p>Guru &amp; Staff</p>
                </div>
            </div>

            <div class="statistik-card">
                <div class="statistik-icon">
                    <i class="bi bi-mortarboard-fill"></i>
                </div>
                <div class="statistik-info">
                    <h3>{{ $siswa->count() }}</h3>
                    <p>Siswa</p>
                </div>
            </div>

            <div class="statistik-card">
                <div class="statistik-icon">
                    <i class="bi bi-book-half"></i>
                </div>
                <div class="statistik-info">
                    <h3>{{ $ekstrakurikuler->count() }}</h3>
                    <p>Ekstrakurikuler</p>
                </div>
            </div>

            <div class="statistik-card">
                <div class="statistik-icon">
                    <i class="bi bi-trophy-fill"></i>
                </div>
                <div class="statistik-info">
                    <h3>{{ $prestasi->count() }}</h3>
                    <p>Prestasi</p>
                </div>
            </div>

        </div>
    </div>
</section>



<!-- PROFIL SEKOLAH -->
<section class="profile-modern" id="profil">
    <div class="container">
        <div class="profile-header-modern">
            <div class="profile-label">
                <i class="bi bi-building"></i>
                Profil Sekolah
            </div>
            <h2>Mengenal Lebih Dekat Sekolah Kami</h2>
            <p>Informasi mengenai identitas dan profil sekolah</p>
            <div class="title-line"></div>
        </div>

        <div class="profile-modern-card">
            <div class="row g-4 align-items-stretch">
                <!-- KIRI -->
                <div class="col-lg-4">
                    <div class="school-profile-box">
                        @if($profil && $profil->logo)
                            <img
                                src="{{ asset('storage/' . $profil->logo) }}"
                                class="school-logo-modern"
                                alt="Logo {{ $profil->nama_sekolah }}"
                            >
                        @else
                            <img
                                src="{{ asset('assets/images/logo/logosekolah.png') }}"
                                class="school-logo-modern"
                                alt="Logo Sekolah"
                            >
                        @endif

                        <h3>{{ $profil->nama_sekolah ?? 'SMA Negeri 9 Sijunjung' }}</h3>
                        <div class="npsn">NPSN: {{ $profil->npsn ?? '-' }}</div>
                        <div class="profile-divider"></div>
                        <div class="profile-quote">
                            “Bersama Mewujudkan Pendidikan Berkualitas”
                        </div>
                    </div>
                </div>

                <!-- KANAN -->
                <div class="col-lg-8">
                    <div class="about-school-modern">
                        <div class="about-title-modern">
                            <div class="about-icon-modern">
                                <i class="bi bi-building"></i>
                            </div>
                            <h3>Tentang Sekolah</h3>
                        </div>

                        <p class="about-description-modern">
                            {{ $profil->deskripsi ?? 'Belum ada deskripsi sekolah.' }}
                        </p>

                        <div class="profile-info-grid">
                            <!-- KEPALA SEKOLAH -->
                            <div class="profile-info-item">
                                <div class="profile-info-icon">
                                    <i class="bi bi-person-fill"></i>
                                </div>
                                <div>
                                    <small>Kepala Sekolah</small>
                                    <strong>{{ $profil->kepala_sekolah ?? '-' }}</strong>
                                </div>
                            </div>

                            <!-- TAHUN BERDIRI -->
                            <div class="profile-info-item">
                                <div class="profile-info-icon">
                                    <i class="bi bi-calendar-event-fill"></i>
                                </div>
                                <div>
                                    <small>Tahun Berdiri</small>
                                    <strong>{{ $profil->tahun_berdiri ?? '-' }}</strong>
                                </div>
                            </div>
                        </div>

                        <!-- ALAMAT -->
                        <div class="profile-address">
                            <div class="profile-info-icon">
                                <i class="bi bi-geo-alt-fill"></i>
                            </div>
                            <div>
                                <small>Alamat Sekolah</small>
                                <strong>{{ $profil->alamat ?? '-' }}</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- VISI & MISI -->
<section class="visi-misi-modern">
    <div class="container">
        <div class="visi-header">
            <h2>Visi & Misi</h2>
            <p>Landasan dan tujuan pendidikan sekolah</p>
            <div class="visi-line"></div>
        </div>

        <div class="row g-4">
            <!-- VISI -->
            <div class="col-lg-6">
                <div class="visi-card-modern">
                    <div class="visi-card-icon">
                        <i class="bi bi-eye-fill"></i>
                    </div>
                    <h4>Visi</h4>
                    <div class="visi-content">
                        @if($profil && $profil->visi_misi)
                            @php
                                $visiMisi = $profil->visi_misi;
                                $bagianMisi = preg_split('/\bMisi\b/i', $visiMisi, 2);
                            @endphp
                            {!! nl2br(e(trim($bagianMisi[0]))) !!}
                        @else
                            Visi sekolah belum tersedia.
                        @endif
                    </div>
                </div>
            </div>

            <!-- MISI -->
            <div class="col-lg-6">
                <div class="visi-card-modern">
                    <div class="visi-card-icon">
                        <i class="bi bi-bullseye"></i>
                    </div>
                    <h4>Misi</h4>
                    <div class="visi-content">
                        @if($profil && $profil->visi_misi)
                            @php
                                $visiMisi = $profil->visi_misi;
                                $bagianMisi = preg_split('/\bMisi\b/i', $visiMisi, 2);
                            @endphp
                            {!! nl2br(e(trim($bagianMisi[1] ?? 'Misi sekolah belum tersedia.'))) !!}
                        @else
                            Misi sekolah belum tersedia.
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- BERITA -->
<section class="section-padding bg-white" id="berita">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <div>
                <h2 class="section-title mb-1">Berita Terbaru</h2>
                <p class="text-muted mb-0">Informasi terbaru dari sekolah</p>
            </div>
            <a href="{{ route('berita.public') }}" class="btn btn-outline-primary">
                Lihat Semua
                <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </div>

        <div class="row g-4">
            @forelse ($beritas as $berita)
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                        {{-- GAMBAR --}}
                        @if($berita->gambar)
                            <img
                                src="{{ asset('storage/' . $berita->gambar) }}"
                                class="card-img-top"
                                alt="{{ $berita->judul }}"
                                style="height: 195px; object-fit: cover;"
                            >
                        @else
                            <div
                                class="card-img-top bg-light d-flex align-items-center justify-content-center"
                                style="height: 195px;"
                            >
                                <i class="bi bi-newspaper fs-1 text-secondary"></i>
                            </div>
                        @endif

                        <div class="card-body d-flex flex-column p-4">
                            {{-- TANGGAL --}}
                            <div class="text-primary small mb-2">
                                <i class="bi bi-calendar3 me-1"></i>
                                {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d M Y') }}
                            </div>

                            {{-- JUDUL --}}
                            <h5 class="fw-bold mb-2">{{ $berita->judul }}</h5>

                            {{-- DESKRIPSI --}}
                            <p class="text-muted mb-3">
                                {{ Str::limit(strip_tags($berita->isi), 100) }}
                            </p>

                            {{-- LIHAT DETAIL --}}
                            <div class="mt-auto">
                                <a
                                    href="{{ route('berita.show', ['id' => $berita->id_berita]) }}"
                                    class="text-primary text-decoration-none fw-semibold"
                                >
                                    Lihat Detail
                                    <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted">Belum ada berita.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- PENGUMUMAN -->
<section class="section-padding bg-light" id="pengumuman">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <div>
                <h2 class="section-title mb-1">Pengumuman</h2>
                <p class="text-muted mb-0">Informasi penting untuk siswa dan orang tua</p>
            </div>
            <a href="{{ route('pengumuman.public') }}" class="btn btn-outline-primary">
                Lihat Semua
                <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </div>

        <div class="row g-4">
            @forelse($pengumuman as $item)
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 shadow-sm border-0 news-card">
                        <div class="card-body p-4">
                            {{-- ICON --}}
                            <div class="mb-3">
                                <i class="bi bi-megaphone fs-2 text-primary"></i>
                            </div>

                            {{-- TANGGAL --}}
                            <small class="text-muted">
                                <i class="bi bi-calendar3 me-1"></i>
                                {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d M Y') }}
                            </small>

                            {{-- JUDUL --}}
                            <h5 class="fw-bold mt-2">{{ $item->judul }}</h5>

                            {{-- ISI --}}
                            <p class="text-muted">
                                {{ \Illuminate\Support\Str::limit(strip_tags($item->isi), 120) }}
                            </p>

                            {{-- LIHAT DETAIL --}}
                            <div class="mt-3">
                                <a
                                    href="{{ route('pengumuman.show', ['id' => $item->id_pengumuman]) }}"
                                    class="text-primary text-decoration-none fw-semibold"
                                >
                                    Lihat Detail
                                    <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted">Belum ada pengumuman.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- GURU -->
<section class="section-padding bg-white" id="guru">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <div>
                <h2 class="section-title mb-1">Guru dan Staff</h2>
                <p class="text-muted mb-0">Tenaga pendidik profesional sekolah</p>
            </div>
            <a href="{{ route('guru.public') }}" class="btn btn-outline-primary">
                Lihat Semua
                <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </div>

        <div class="row g-4">
            @forelse($guru as $item)
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 shadow-sm news-card">
                        {{-- FOTO GURU --}}
                        <div class="teacher-image-wrapper">
                            <img
                                src="{{ $item->foto ? asset('storage/' . $item->foto) : asset('assets/images/faces/kepsek.png') }}"
                                alt="{{ $item->nama_guru }}"
                                class="teacher-image"
                            >
                        </div>

                        <div class="card-body text-center p-4">
                            <h5 class="fw-bold mb-1">{{ $item->nama_guru }}</h5>
                            <p class="text-primary fw-semibold mb-2">{{ $item->mapel }}</p>
                            <small class="text-muted d-block mb-3">NIP: {{ $item->nip ?: '-' }}</small>
                            <a
                                href="{{ route('guru.show', ['id' => $item->id_guru]) }}"
                                class="text-primary text-decoration-none fw-semibold"
                            >
                                Lihat Detail
                                <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted">Belum ada data guru.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- EKSTRAKURIKULER -->
<section class="section-padding bg-light" id="ekstrakurikuler">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <div>
                <h2 class="section-title mb-1">Ekstrakurikuler</h2>
                <p class="text-muted mb-0">Kegiatan pengembangan minat dan bakat siswa</p>
            </div>
            <a href="{{ route('ekstrakurikuler.public') }}" class="btn btn-outline-primary">
                Lihat Semua
                <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </div>

        <div class="row g-4">
            @forelse($ekskuls as $item)
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 shadow-sm news-card">
                        {{-- GAMBAR --}}
                        <div class="overflow-hidden">
                            <img
                                src="{{ $item->gambar ? asset('storage/' . $item->gambar) : asset('assets/images/logo/logosekolah.png') }}"
                                alt="{{ $item->nama_ekskul }}"
                                class="w-100"
                                style="height: 220px; object-fit: cover;"
                            >
                        </div>

                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-2">{{ $item->nama_ekskul }}</h5>
                            <p class="mb-2">
                                <i class="bi bi-person-badge text-primary me-1"></i>
                                <strong>Pembina:</strong> {{ $item->pembina ?: '-' }}
                            </p>
                            <p class="text-muted mb-3">
                                <i class="bi bi-calendar3 me-1"></i>
                                {{ $item->jadwal_latihan ?: '-' }}
                            </p>
                            <p class="text-muted">
                                {{ \Illuminate\Support\Str::limit(strip_tags($item->deskripsi), 100) }}
                            </p>
                            <div class="mt-3">
                                <a
                                    href="{{ route('ekstrakurikuler.show', ['id' => $item->id_ekskul]) }}"
                                    class="text-primary text-decoration-none fw-semibold"
                                >
                                    Lihat Detail
                                    <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted">Belum ada data ekstrakurikuler.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- PRESTASI -->
<section class="section-padding bg-white" id="prestasi">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <div>
                <h2 class="section-title mb-1">Prestasi Sekolah</h2>
                <p class="text-muted mb-0">Prestasi dan pencapaian siswa</p>
            </div>
            <a href="{{ route('prestasi.public') }}" class="btn btn-outline-primary">
                Lihat Semua
                <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </div>

        <div class="row g-4">
            @forelse($prestasi as $item)
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 shadow-sm news-card">
                        {{-- FOTO --}}
                        <div class="overflow-hidden">
                            <img
                                src="{{ $item->foto ? asset('storage/' . $item->foto) : asset('assets/images/logo/logosekolah.png') }}"
                                alt="{{ $item->nama_prestasi }}"
                                class="w-100"
                                style="height: 220px; object-fit: cover;"
                            >
                        </div>

                        <div class="card-body p-4">
                            {{-- NAMA PRESTASI --}}
                            <h5 class="fw-bold mb-2">{{ $item->nama_prestasi }}</h5>

                            {{-- TAHUN --}}
                            <p class="text-primary fw-semibold mb-2">
                                <i class="bi bi-calendar3 me-1"></i>
                                {{ $item->tahun_ajaran ?: '-' }}
                            </p>

                            {{-- DESKRIPSI --}}
                            <p class="text-muted mb-3">
                                {{ \Illuminate\Support\Str::limit(strip_tags($item->deskripsi), 100) }}
                            </p>

                            {{-- LIHAT DETAIL --}}
                            <a
                                href="{{ route('prestasi.show', ['id' => $item->id]) }}"
                                class="text-primary text-decoration-none fw-semibold"
                            >
                                Lihat Detail
                                <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted">Belum ada data prestasi.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- GALERI -->
<section class="section-padding bg-light" id="galeri">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <div>
                <h2 class="section-title mb-1">Galeri Sekolah</h2>
                <p class="text-muted mb-0">Dokumentasi kegiatan sekolah</p>
            </div>
            <a href="{{ route('galeri.public') }}" class="btn btn-outline-primary">
                Lihat Semua
                <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </div>

        <div class="row g-4">
            @forelse($galeris as $item)
                <div class="col-lg-3 col-md-4 col-6">
                    @if($item->file)
                        <img
                            src="{{ asset('storage/' . $item->file) }}"
                            class="gallery-image"
                            alt="{{ $item->judul }}"
                        >
                    @else
                        <div class="gallery-image bg-white d-flex align-items-center justify-content-center">
                            <i class="bi bi-images fs-1 text-secondary"></i>
                        </div>
                    @endif

                    <div class="mt-2">
                        <h6 class="fw-bold mb-0">{{ $item->judul }}</h6>
                        <small class="text-muted">{{ $item->kategori ?? '-' }}</small>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted">Belum ada foto galeri.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- KONTAK -->
<section class="section-padding bg-white" id="kontak">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Hubungi Kami</h2>
            <p class="section-subtitle">Informasi kontak sekolah</p>
        </div>

        <div class="row justify-content-center g-4">
            <!-- ALAMAT -->
            <div class="col-lg-4 col-md-6">
                <div class="card info-card shadow-sm h-100">
                    <div class="card-body p-4 text-center">
                        <div class="info-icon bg-primary bg-opacity-10 text-primary mx-auto">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <h5 class="fw-bold">Alamat</h5>
                        <p class="text-muted mb-0">{{ $profil->alamat ?? '-' }}</p>
                    </div>
                </div>
            </div>

            <!-- KONTAK -->
            <div class="col-lg-4 col-md-6">
                <div class="card info-card shadow-sm h-100">
                    <div class="card-body p-4 text-center">
                        <div class="info-icon bg-primary bg-opacity-10 text-primary mx-auto">
                            <i class="bi bi-telephone"></i>
                        </div>
                        <h5 class="fw-bold">Kontak</h5>
                        <p class="text-muted mb-0">{{ $profil->kontak ?? '-' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

