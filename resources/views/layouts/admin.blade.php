<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SMA Negeri 9 Sijunjung</title>

    <link rel="icon" href="{{ asset('assets/images/logo/logosekolah.png')}}">

    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet"
          href="{{ asset('assets/css/bootstrap.css') }}">

    <link rel="stylesheet"
          href="{{ asset('assets/vendors/iconly/bold.css') }}">

    <link rel="stylesheet"
          href="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">

    <link rel="stylesheet"
          href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">

    <link rel="stylesheet"
          href="{{ asset('assets/css/app.css') }}">

    <link rel="shortcut icon"
          href="{{ asset('assets/images/logoschool.jpg')}}"
          type="image/x-icon">


          <style>
            .poster-card {

        position: relative;

        min-height: 430px;

        padding: 28px;

        border-radius: 18px;

        overflow: hidden;

        display: flex;

        flex-direction: column;

        justify-content: space-between;

        box-shadow:
            0 8px 25px rgba(0, 0, 0, 0.10);

        transition:
            transform 0.3s ease,
            box-shadow 0.3s ease;

        color: white;

    }


    /* =========================================
       HOVER
    ========================================= */

    .poster-card:hover {

        transform: translateY(-7px);

        box-shadow:
            0 15px 35px rgba(0, 0, 0, 0.18);

    }


    /* =========================================
       BACKGROUND BERITA
    ========================================= */

    .poster-berita {

        background:
            linear-gradient(
                145deg,
                #1877d2,
                #064b9b
            );

    }


    /* =========================================
       BACKGROUND PENGUMUMAN
    ========================================= */

    .poster-pengumuman {

        background:
            linear-gradient(
                145deg,
                #ffc928,
                #ef9800
            );

    }


    /* =========================================
       BACKGROUND GALERI
    ========================================= */

    .poster-galeri {

        background:
            linear-gradient(
                145deg,
                #8054d8,
                #4d27a2
            );

    }


    /* =========================================
       BACKGROUND PRESTASI
    ========================================= */

    .poster-prestasi {

        background:
            linear-gradient(
                145deg,
                #ef4141,
                #b81919
            );

    }


    /* =========================================
       DEKORASI LINGKARAN
    ========================================= */

    .poster-circle {

        position: absolute;

        border-radius: 50%;

        background:
            rgba(255,255,255,0.10);

        pointer-events: none;

    }


    .circle-1 {

        width: 240px;

        height: 240px;

        right: -100px;

        bottom: 45px;

    }


    .circle-2 {

        width: 140px;

        height: 140px;

        right: 70px;

        top: -70px;

        background:
            rgba(255,255,255,0.08);

    }


    /* =========================================
       CONTENT
    ========================================= */

    .poster-content {

        position: relative;

        z-index: 2;

    }


    /* =========================================
       ICON
    ========================================= */

    .poster-icon {

        width: 62px;

        height: 62px;

        border-radius: 50%;

        display: flex;

        align-items: center;

        justify-content: center;

        background: white;

        color: #3159bd;

        font-size: 27px;

        margin-bottom: 25px;

        box-shadow:
            0 5px 15px rgba(0,0,0,0.12);

    }


    /* =========================================
       JUDUL POSTER
    ========================================= */

    .poster-card h3 {

        color: white;

        font-size: 29px;

        line-height: 1.08;

        font-weight: 700;

        margin-bottom: 12px;

    }


    /* =========================================
       GARIS KUNING
    ========================================= */

    .poster-line {

        width: 55px;

        height: 4px;

        border-radius: 10px;

        background: #ffdc35;

        margin-bottom: 18px;

    }


    /* =========================================
       DESKRIPSI
    ========================================= */

    .poster-card p {

        color: rgba(255,255,255,0.95);

        font-size: 14px;

        line-height: 1.6;

        max-width: 230px;

        margin-bottom: 18px;

    }


    /* =========================================
       JUMLAH DATA
    ========================================= */

    .poster-number {

        position: relative;

        z-index: 2;

        color: white;

        font-size: 32px;

        font-weight: 700;

    }


    .poster-number span {

        font-size: 14px;

        font-weight: 400;

        opacity: 0.9;

    }


    /* =========================================
       BUTTON
    ========================================= */

    .poster-button {

        position: relative;

        z-index: 5;

        width: 100%;

        padding: 13px 15px;

        border-radius: 7px;

        background: white;

        color: #3159bd;

        text-align: center;

        text-decoration: none;

        font-size: 14px;

        font-weight: 600;

        transition: all 0.25s ease;

    }


    .poster-button:hover {

        background: #3159bd;

        color: white;

        transform: translateY(-2px);

    }


    /* =========================================
       RESPONSIVE
    ========================================= */

    @media (max-width: 1200px) {

        .poster-card {

            min-height: 410px;

        }


        .poster-card h3 {

            font-size: 26px;

        }

    }


    @media (max-width: 768px) {

        .poster-card {

            min-height: 400px;

        }

    }
     </style>

    @stack('styles')
</head>

<body>

<div id="app">

    {{-- SIDEBAR --}}
    @include('layouts.sidebar')

    {{-- MAIN --}}
    <div id="main">

        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        {{-- CONTENT --}}
        @yield('content')

        {{-- FOOTER --}}
        <footer>
            <div class="footer clearfix mb-0 text-muted">

                <div class="float-start">
                    <p>2026 &copy; Sistem Informasi Sekolah</p>
                </div>

                <div class="float-end">
                    <p>
                        Dibuat dengan
                        <span class="text-danger">
                            <i class="bi bi-heart"></i>
                        </span>
                    </p>
                </div>

            </div>
        </footer>

    </div>

</div>

<script src="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('assets/js/main.js') }}"></script>

@stack('scripts')

</body>
</html>
