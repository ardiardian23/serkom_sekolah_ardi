<div id="sidebar" class="active ">

    <div class="sidebar-wrapper active">

        <div class="sidebar-header ">

            <div class="d-flex justify-content-between">

                <div class="logo" style="text-align: center;">
                    <a href="{{ route('admin.index') }}">
                        <img
                            src="{{ asset('assets/images/logo/logoschool.jpg') }}"
                            alt="Logo"
                            style="width: 150px; height: 150px; object-fit: contain; display: block; margin: 0 auto;">

                        <h5 class="mt-2 text-center">SMAN 1 SINGAPARNA</h5>
                    </a>
                </div>

                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block">
                        <i class="bi bi-x bi-middle"></i>
                    </a>
                </div>

            </div>

        </div>


        <div class="sidebar-menu">

            <ul class="menu">

                {{-- MENU --}}
                <li class="sidebar-title">
                    Menu
                </li>


                {{-- DASHBOARD --}}
                <li class="sidebar-item {{ request()->routeIs('admin.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.index') }}"
                       class="sidebar-link">
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                {{-- PROFIL SEKOLAH --}}
                <li class="sidebar-item has-sub">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-stack"></i>
                        <span>Profil Sekolah</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item {{ request()->routeIs('profil.profil-sekolah.*') ? 'active' : '' }}">
                            <a href="{{ route('profil.profil-sekolah.index') }}">
                                Profil sekolah
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- DATA SEKOLAH --}}
                <li class="sidebar-item has-sub">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-collection-fill"></i>
                        <span>Data Sekolah</span>
                    </a>
                    <ul class="submenu">
                        {{-- DATA GURU --}}
                        <li class="submenu-item {{ request()->routeIs('admin.guru.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.guru.create') }}">
                                Data Guru
                            </a>
                        </li>
                        {{-- DATA SISWA --}}
                        <li class="submenu-item
                            {{ request()->routeIs('admin.siswa.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.siswa.create') }}">
                                Data Siswa
                            </a>
                        </li>
                        {{-- EKSTRAKURIKULER --}}
                        <li class="submenu-item {{ request()->routeIs('admin.ekstrakurikuler.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.ekstrakurikuler.create') }}">
                                Ekstrakurikuler
                            </a>
                        </li>
                        <li class="submenu-item {{ request()->routeIs('admin.prestasi.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.prestasi.create') }}">
                                Prestasi
                            </a>
                        </li>
                    </ul>
                </li>


                {{-- INFORMASI --}}
                <li class="sidebar-item has-sub">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-grid-1x2-fill"></i>
                        <span>Informasi</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item {{ request()->routeIs('admin.berita.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.berita.create') }}">
                                Berita
                            </a>
                        </li>
                        <a href="{{ route('admin.pengumuman.index') }}" class="sidebar-link">
                            <i class="bi bi-megaphone"></i>
                            <span>Pengumuman</span>
                        </a>
                        <a href="{{ route('admin.galeri.index') }}" class="sidebar-link">
                            <i class="bi bi-megaphone"></i>
                            <span>Galeri</span>
                        </a> 
                    </ul>
                </li>

                <li class="sidebar-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf

                        <button type="submit"
                                class="sidebar-link border-0 bg-transparent w-100 text-start">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </li>

            </ul>

        </div>


        <button class="sidebar-toggler btn x">

            <i data-feather="x"></i>

        </button>

    </div>

</div>