<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">
    <div class="container">
        {{-- LOGO --}}
        <a class="navbar-brand d-flex align-items-center" href="{{ route('landing') }}">
            <img src="{{ asset('assets/images/logo/logosekolah.png') }}" alt="Logo Sekolah">
            <div class="ms-2">
                <strong class="d-block">
                    {{ $profil->nama_sekolah ?? 'Website Sekolah' }}
                </strong>
                <small class="text-muted">Website Resmi Sekolah</small>
            </div>
        </a>

        {{-- TOGGLE MOBILE --}}
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarMenu"
            aria-controls="navbarMenu"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                {{-- BERANDA --}}
                <li class="nav-item">
                    <a
                        class="nav-link {{ request()->routeIs('landing') ? 'active' : '' }}"
                        href="{{ route('landing') }}"
                    >
                        Beranda
                    </a>
                </li>

                {{-- PROFIL --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('landing') }}#profil">
                        Profil
                    </a>
                </li>

                {{-- INFORMASI --}}
                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle {{ request()->routeIs('berita.public', 'pengumuman.public') ? 'active' : '' }}"
                        href="#"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    >
                        Informasi
                    </a>

                    <ul class="dropdown-menu">
                        {{-- BERITA --}}
                        <li>
                            <a class="dropdown-item" href="{{ route('berita.public') }}">
                                <i class="bi bi-newspaper me-2"></i>
                                Berita
                            </a>
                        </li>

                        {{-- PENGUMUMAN --}}
                        <li>
                            <a class="dropdown-item" href="{{ route('pengumuman.public') }}">
                                <i class="bi bi-megaphone me-2"></i>
                                Pengumuman
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- GURU DAN STAFF --}}
                <li class="nav-item">
                    <a
                        class="nav-link {{ request()->routeIs('guru.public') ? 'active' : '' }}"
                        href="{{ route('guru.public') }}"
                    >
                        Guru dan Staff
                    </a>
                </li>

                {{-- EKSTRAKURIKULER --}}
                <li class="nav-item">
                    <a
                        class="nav-link {{ request()->routeIs('ekstrakurikuler.public') ? 'active' : '' }}"
                        href="{{ route('ekstrakurikuler.public') }}"
                    >
                        Ekstrakurikuler
                    </a>
                </li>

                {{-- PRESTASI --}}
                <li class="nav-item">
                    <a
                        class="nav-link {{ request()->routeIs('prestasi.public') ? 'active' : '' }}"
                        href="{{ route('prestasi.public') }}"
                    >
                        Prestasi
                    </a>
                </li>

                {{-- GALERI --}}
                <li class="nav-item">
                    <a
                        class="nav-link {{ request()->routeIs('galeri.public') ? 'active' : '' }}"
                        href="{{ route('galeri.public') }}"
                    >
                        Galeri
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

