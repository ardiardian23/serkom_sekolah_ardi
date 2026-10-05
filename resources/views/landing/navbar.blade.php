<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">
    <div class="container">

        <a class="navbar-brand d-flex align-items-center"
           href="{{ route('home') }}">

            @if($profil && $profil->logo)
                <img src="{{ asset('storage/' . $profil->logo) }}"
                     alt="Logo Sekolah">
            @else
                <img src="{{ asset('assets/images/logo/logoschool.jpg') }}"
                     alt="Logo Sekolah">
            @endif

            <div class="ms-2">
                <strong class="d-block">
                    {{ $profil->nama_sekolah ?? 'Website Sekolah' }}
                </strong>

                <small class="text-muted">
                    Website Resmi Sekolah
                </small>
            </div>

        </a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarMenu">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">

            <ul class="navbar-nav ms-auto align-items-lg-center">

                <li class="nav-item">
                    <a class="nav-link" href="#home">
                        Beranda
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#profil">
                        Profil
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#berita">
                        Berita
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#guru">
                        Guru
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#prestasi">
                        Prestasi
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#galeri">
                        Galeri
                    </a>
                </li>

                <li class="nav-item ms-lg-3">
                    <a href="{{ route('login') }}"
                       class="btn btn-primary px-4">
                        <i class="bi bi-box-arrow-in-right me-1"></i>
                        Login
                    </a>
                </li>

            </ul>

        </div>

    </div>
</nav>
