<div id="sidebar" class="active ">

    <div class="sidebar-wrapper active">

        <div class="sidebar-header ">

            <div class="d-flex justify-content-between">

                <div class="logo">
                    <a href="{{ route('admin.index') }}">
                        <img
                            src="{{ asset('assets/images/logo/logo.png') }}"
                            alt="Logo">
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

                        <li class="submenu-item {{ request()->routeIs('profil.profil-sekolah.*') ? 'active' : '' }}">
                            <a href="{{ route('profil.profil-sekolah.edit') }}">
                                Visi dan Misi
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

                        <li class="submenu-item">

                            <a href="#">
                                Pengumuman
                            </a>

                        </li>

                    </ul>

                </li>


                {{-- GALERI --}}
                <li class="sidebar-item has-sub">

                    <a href="#" class="sidebar-link">

                        <i class="bi bi-hexagon-fill"></i>

                        <span>Galeri</span>

                    </a>

                </li>

            </ul>

        </div>


        <button class="sidebar-toggler btn x">

            <i data-feather="x"></i>

        </button>

    </div>

</div>