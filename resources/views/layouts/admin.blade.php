<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SMA Negeri 9 Sijunjung</title>

    <link rel="icon" href="{{ asset('assets/images/logo/logosekolah.png') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/logoschool.jpg') }}" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/iconly/bold.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">

    <style>
        /* =========================================
           LAYOUT DASHBOARD
        ========================================= */
        html,
        body {
            min-height: 100%;
            margin: 0;
            font-family: 'Nunito', sans-serif;
        }

        #app {
            min-height: 100vh;
        }

        #main.admin-main {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .admin-content {
            flex: 1 0 auto;
            min-width: 0;
        }

        /* =========================================
           FOOTER ADMIN - SAMA DENGAN LANDING
        ========================================= */
        .admin-footer {
            background: #101828;
            color: #ffffff;
            padding: 40px 0 20px;
            margin-top: 30px;
            width: 100%;
            box-sizing: border-box;
            font-family: 'Nunito', sans-serif;
        }

        .admin-footer-title {
            color: #ffffff;
            font-size: 16px;
            font-weight: 800;
            margin-bottom: 12px;
        }

        .admin-footer-text {
            color: #8492a6;
            font-size: 13px;
            line-height: 1.7;
            margin-bottom: 8px;
        }

        .admin-footer-text i {
            color: #8492a6;
        }

        .admin-footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.12);
            margin-top: 25px;
            padding-top: 22px;
            text-align: center;
            color: #8492a6;
            font-size: 12px;
        }

        /* =========================================
           POSTER - LINGKARAN DEKORATIF
        ========================================= */
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
            background: rgba(255, 255, 255, 0.08);
        }

        /* =========================================
           POSTER CONTENT
        ========================================= */
        .poster-content {
            position: relative;
            z-index: 2;
        }

        /* =========================================
           POSTER ICON
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
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.12);
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
           DESKRIPSI POSTER
        ========================================= */
        .poster-card p {
            color: rgba(255, 255, 255, 0.95);
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
           TOMBOL POSTER
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

        .foto-kepala-dashboard {
            width: 280px !important;
            height: 320px !important;
            max-width: 100%;
            object-fit: contain;
            object-position: center;
            display: block;
            margin: 0 auto;
            border-radius: 12px;
            transform: translateY(-50px);
        }



        @media (max-width: 767px) {
            .foto-kepala-dashboard {
                width: 200px !important;
                height: 240px !important;
            }
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
            .admin-footer {
                padding: 30px 20px 18px;
            }

            .admin-footer-bottom {
                margin-top: 20px;
                padding-top: 18px;
            }

            .poster-card {
                min-height: 400px;
            }
        }

        @media (max-width: 576px) {
            .admin-footer {
                padding: 14px 16px;
            }

            .admin-footer-content {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>

    @stack('styles')
</head>

<body>
    <div id="app">
        {{-- SIDEBAR --}}
        @include('layouts.sidebar')

        {{-- MAIN CONTENT --}}
        <div id="main" class="admin-main">
            {{-- HEADER --}}
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            {{-- CONTENT HALAMAN --}}
            <main class="admin-content">
                @yield('content')
            </main>


        </div>
    </div>

    {{-- JAVASCRIPT --}}
    <script src="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    @stack('scripts')
</body>

</html>

