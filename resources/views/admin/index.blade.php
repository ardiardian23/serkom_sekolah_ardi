

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css')}}">

    <link rel="stylesheet" href="{{ asset('assets/vendors/iconly/bold.css')}}">

    <link rel="stylesheet" href="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css')}}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.svg')}}" type="image/x-icon">
</head>

<body>

    <header class="mb-3">

    <nav class="navbar navbar-expand navbar-dark bg-primary navbar-top">

        <div class="container-fluid">

            {{-- Tombol sidebar mobile --}}
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>

            {{-- Nama halaman / sekolah --}}
            <div class="d-none d-md-block text">
                <h5 class="mb-0">
                    Sistem Informasi Sekolah
                </h5>
                <small class="text-muted">
                    SMAN 1 SINGAPARNA
                </small>
            </div>

            {{-- Bagian kanan --}}
            <div class="ms-auto">

                <ul class="navbar-nav">

                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle"
                           href="#"
                           data-bs-toggle="dropdown"
                           aria-expanded="false">

                            <div class="d-flex align-items-center">

                                <div class="avatar avatar-md">
                                    <img
                                        src="{{ asset('assets/images/faces/1.jpg') }}"
                                        alt="User"
                                    >
                                </div>

                                <div class="ms-2 d-none d-md-block">
                                    <span class="fw-bold">
                                        Admin
                                    </span>
                                    <small class="d-block text-muted">
                                        Administrator
                                    </small>
                                </div>

                            </div>

                        </a>

                        <ul class="dropdown-menu dropdown-menu-end">

                            <li>
                                <a class="dropdown-item"
                                   href="#">
                                    <i class="bi bi-person me-2"></i>
                                    Profil
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item"
                                   href="{{ route('profil.profil-sekolah.index') }}">
                                    <i class="bi bi-building me-2"></i>
                                    Profil Sekolah
                                </a>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item text-danger"
                                   href="#">
                                    <i class="bi bi-box-arrow-right me-2"></i>
                                    Logout
                                </a>
                            </li>

                        </ul>

                    </li>

                </ul>

            </div>

        </div>

    </nav>

</header>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-center ">
                        <div class="logo">
                            <a href="{{ route('admin.index') }}">
                                <img src="assets/images/logo/logoschool.jpg" alt="Logo" srcset="" style="width: 130px; height:150px; object-fit: contain; display: block;
                margin: 0 auto;" >  <h5>SMAN 1 SINGAPARNA</h5></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item active ">
                            <a href="{{ route('admin.index') }}" class="sidebar-link">
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item has-sub">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-stack"></i>
                        <span>Profil Sekolah</span>
                    </a>

                    <ul class="submenu">

                        <li class="submenu-item">
                            <a href="{{ route('profil.profil-sekolah.index') }}">
                                Profil sekolah
                            </a>
                        </li>

                    </ul>
                </li>


                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-collection-fill"></i>
                                <span>Data Sekolah</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                   <a href="{{ route('admin.guru.create') }}"> Data Guru</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{ route('admin.siswa.create') }}">Data Siswa</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{ route('admin.ekstrakurikuler.create') }}">Ekstrakurikuler</a>
                                </li>                                                         
                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>Informasi</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="{{ route('admin.berita.create') }}">Berita</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{ route('admin.pengumuman.create') }}">Pengumuman</a>
                                </li>   
                                <li class="submenu-item ">
                                    <a href="{{ route('admin.prestasi.create') }}">Prestasi</a>
                                </li>                                                       
                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-hexagon-fill"></i>
                                <a href="{{ route('admin.galeri.create') }}">Galeri</a>
                            </a>
                        </li>                        
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Selamat Datang di Website Sekolah</h3>
            </div>
            
    <script src="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{asset('assets/vendors/apexcharts/apexcharts.js')}}"></script>
    <script src="{{asset('assets/js/pages/dashboard.js')}}"></script>

    <script src="{{ asset('assets/js/main.js')}}"></script>
</body>

</html>