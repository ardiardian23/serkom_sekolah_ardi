<div class="sidebar-wrapper active">

    <div class="sidebar-header">
        <div class="d-flex justify-content-between">

            <div class="logo">
                <a href="{{ route('admin.index') }}">
                    <img src="{{ asset('assets/images/logo/logo.png') }}"
                         alt="Logo">
                </a>
            </div>

            <div class="toggler">
                <a href="#"
                   class="sidebar-hide d-xl-none d-block">
                    <i class="bi bi-x bi-middle"></i>
                </a>
            </div>

        </div>
    </div>


    <div class="sidebar-menu">

        <ul class="menu">

            {{-- ================= MENU UTAMA ================= --}}
            <li class="sidebar-title">
                MENU UTAMA
            </li>


            {{-- Dashboard --}}
            <li class="sidebar-item {{ request()->routeIs('admin.index') ? 'active' : '' }}">

                <a href="{{ route('admin.index') }}"
                   class="sidebar-link">

                    <i class="bi bi-grid-fill"></i>

                    <span>Dashboard</span>

                </a>

            </li>


            {{-- ================= PROFIL SEKOLAH ================= --}}
            <li class="sidebar-title">
                PROFIL SEKOLAH
            </li>


            {{-- Profil Sekolah --}}
            <li class="sidebar-item">

                <a href="#"
                   class="sidebar-link">

                    <i class="bi bi-building"></i>

                    <span>Profil Sekolah</span>

                </a>

            </li>


            {{-- Visi & Misi --}}
            <li class="sidebar-item">

                <a href="#"
                   class="sidebar-link">

                    <i class="bi bi-book"></i>

                    <span>Visi & Misi</span>

                </a>

            </li>


            {{-- ================= DATA SEKOLAH ================= --}}
            <li class="sidebar-title">
                DATA SEKOLAH
            </li>


            {{-- Guru --}}
            <li class="sidebar-item">

                <a href="#"
                   class="sidebar-link">

                    <i class="bi bi-person-badge-fill"></i>

                    <span>Guru & Staff</span>

                </a>

            </li>


            {{-- Siswa --}}
            <li class="sidebar-item">

                <a href="#"
                   class="sidebar-link">

                    <i class="bi bi-people-fill"></i>

                    <span>Siswa</span>

                </a>

            </li>


            {{-- Ekstrakurikuler --}}
            <li class="sidebar-item">

                <a href="#"
                   class="sidebar-link">

                    <i class="bi bi-trophy-fill"></i>

                    <span>Ekstrakurikuler</span>

                </a>

            </li>


            {{-- ================= INFORMASI ================= --}}
            <li class="sidebar-title">
                INFORMASI
            </li>


            {{-- Berita --}}
            <li class="sidebar-item">

                <a href="#"
                   class="sidebar-link">

                    <i class="bi bi-newspaper"></i>

                    <span>Berita</span>

                </a>

            </li>


            {{-- Pengumuman --}}
            <li class="sidebar-item">

                <a href="#"
                   class="sidebar-link">

                    <i class="bi bi-megaphone-fill"></i>

                    <span>Pengumuman</span>

                </a>

            </li>


            {{-- ================= GALERI ================= --}}
            <li class="sidebar-title">
                GALERI
            </li>


            <li class="sidebar-item">

                <a href="#"
                   class="sidebar-link">

                    <i class="bi bi-images"></i>

                    <span>Galeri</span>

                </a>

            </li>


            {{-- ================= PENGGUNA ================= --}}
            <li class="sidebar-title">
                PENGATURAN
            </li>


            {{-- User --}}
            <li class="sidebar-item {{ request()->routeIs('admin.user.*') ? 'active' : '' }}">

                <a href="{{ route('admin.user.index') }}"
                   class="sidebar-link">

                    <i class="bi bi-person-fill-gear"></i>

                    <span>User</span>

                </a>

            </li>


        </ul>

    </div>


    <button class="sidebar-toggler btn x">
        <i data-feather="x"></i>
    </button>

</div>