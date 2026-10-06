<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Website Sekolah')
    </title>

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>


        .school-stats {
    background: #f5f8fc;
    padding: 50px 0;
}

.stats-wrapper {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 25px;
}

.stat-card {
    background: #ffffff;
    border-radius: 18px;
    padding: 30px;
    display: flex;
    align-items: center;
    gap: 20px;

    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);

    transition: all 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-7px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
}

.stat-icon {
    width: 65px;
    height: 65px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #eaf2ff;
    color: #0d6efd;

    border-radius: 15px;

    font-size: 28px;
    flex-shrink: 0;
}

.stat-content h2 {
    margin: 0;
    font-size: 38px;
    font-weight: 700;
    color: #172b4d;
}

.stat-content p {
    margin: 3px 0 0;
    font-size: 16px;
    color: #6c757d;
}

/* Responsive */
@media (max-width: 768px) {

    .stats-wrapper {
        grid-template-columns: 1fr;
    }

    .stat-card {
        padding: 25px;
    }

}
        html {
    scroll-behavior: smooth;
    }

    section {
        scroll-margin-top: 80px;
    }
        .navbar .nav-link {
    position: relative;
    color: #555;
    font-weight: 400;
    transition: all 0.3s ease;
    }

    .navbar .nav-link:hover {
        color: #0d6efd;
    }

    .navbar .nav-link.active {
        color: #0d6efd;
        font-weight: 600;
    }

    .navbar .nav-link.active::after {
        content: "";
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        height: 2px;
        background-color: #0d6efd;
        border-radius: 2px;
    }
        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f8f9fa;
            color: #212529;
        }

        .navbar {
            transition: 0.3s;
        }

        .navbar-brand img {
            width: 45px;
            height: 45px;
            object-fit: contain;
        }

        .hero {
            min-height: 650px;
            display: flex;
            align-items: center;
            position: relative;
            background:
                linear-gradient(rgba(0, 50, 100, 0.72), rgba(0, 50, 100, 0.72)),
                url('{{ $profil && $profil->foto ? asset('storage/' . $profil->foto) : asset('assets/images/logo/logoschool.jpg') }}');
            background-size: cover;
            background-position: center;
        }

        .hero-content {
            color: white;
        }

        .hero-title {
            font-size: 52px;
            font-weight: 800;
            line-height: 1.15;
        }

        .hero-text {
            font-size: 18px;
            max-width: 650px;
            line-height: 1.8;
        }

        .section-padding {
            padding: 80px 0;
        }

        .section-title {
            font-weight: 800;
            margin-bottom: 10px;
        }

        .section-subtitle {
            color: #6c757d;
            margin-bottom: 45px;
        }

        .school-logo {
            width: 150px;
            height: 150px;
            object-fit: contain;
        }

        .info-card {
            border: none;
            border-radius: 18px;
            transition: 0.3s;
            height: 100%;
        }

        .info-card:hover {
            transform: translateY(-7px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.10);
        }

        .info-icon {
            width: 65px;
            height: 65px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            margin-bottom: 20px;
        }

        .news-card {
            border: none;
            border-radius: 16px;
            overflow: hidden;
            height: 100%;
            transition: 0.3s;
        }

        .news-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.10);
        }

        .news-image {
            height: 220px;
            width: 100%;
            object-fit: cover;
        }

        .teacher-image {
            width: 130px;
            height: 130px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid white;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.10);
        }

        .gallery-image {
            width: 100%;
            height: 230px;
            object-fit: cover;
            border-radius: 15px;
            transition: 0.3s;
        }

        .gallery-image:hover {
            transform: scale(1.03);
        }

        .stat-section {
            background: #0d6efd;
            color: white;
        }

        .stat-number {
            font-size: 42px;
            font-weight: 800;
        }

        .stat-label {
            font-size: 17px;
            opacity: 0.9;
        }

        .footer {
            background: #101828;
            color: white;
        }

        .footer a {
            color: #adb5bd;
            text-decoration: none;
        }

        .footer a:hover {
            color: white;
        }

        @media (max-width: 768px) {
            .hero {
                min-height: 550px;
            }

            .hero-title {
                font-size: 36px;
            }

            .hero-text {
                font-size: 16px;
            }
        }
    </style>

    @stack('styles')
</head>

<body>

    @include('landing.navbar')

    @yield('content')

    @include('landing.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')

</body>

</html>
