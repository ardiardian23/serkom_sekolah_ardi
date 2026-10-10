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



    /* =========================================================
       HERO
    ========================================================= */

    .hero {
        position: relative;
        min-height: 680px;
        display: flex;
        align-items: center;
        overflow: hidden;

        background:
            linear-gradient(
                90deg,
                rgba(3, 35, 75, 0.97) 0%,
                rgba(3, 45, 90, 0.92) 35%,
                rgba(3, 55, 105, 0.70) 60%,
                rgba(3, 55, 105, 0.25) 100%
            ),
            url('{{ $profil && $profil->foto
                    ? asset('storage/' . $profil->foto)
                    : asset('assets/images/logo/logosekolah.png') }}');

        background-size: cover;
        background-position: center;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        padding: 80px 0;
    }

    .hero-title {
        color: #fff;
        font-size: clamp(45px, 6vw, 76px);
        line-height: 1.05;
        font-weight: 800;
        letter-spacing: -2px;
        max-width: 800px;
        margin-bottom: 25px;
    }

    .hero-text {
        color: rgba(255,255,255,.92);
        font-size: 17px;
        line-height: 1.8;
        max-width: 650px;
    }

    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 10px 17px;
        border-radius: 30px;
        font-weight: 600;
        box-shadow: 0 8px 25px rgba(0,0,0,.12);
    }

    .hero-btn {
        border-radius: 10px;
        padding: 13px 22px;
        font-weight: 600;
        transition: .3s ease;
    }

    .hero-btn:hover {
        transform: translateY(-3px);
    }


    /* STATISTIK */
    .statistik-section {
        padding: 35px 0;
        background: #f4f7fb;
    }

    .statistik-section .container {
        max-width: 1200px;
    }

    .statistik-grid {
        display: grid;
        grid-template-columns: repeat(6, minmax(0, 1fr));
        gap: 14px;
    }

    .statistik-card {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 16px 12px;
        min-width: 0;
        background: #fff;
        border-radius: 14px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
    }

    .statistik-icon {
        width: 42px;
        height: 42px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        background: #eaf1ff;
        color: #0d6efd;
        font-size: 20px;
    }

    .statistik-info h3 {
        margin: 0;
        font-size: 24px;
        font-weight: 700;
        color: #17365d;
    }

    .statistik-info p {
        margin: 3px 0 0;
        font-size: 12px;
        color: #64748b;
    }

        /* RESPONSIVE */
        @media (max-width: 992px) {
            .statistik-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }

        @media (max-width: 576px) {
            .statistik-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 10px;
                }

        .statistik-card {
            padding: 12px 9px;
            gap: 8px;
        }

        .statistik-icon {
            width: 34px;
            height: 34px;
            font-size: 17px;
        }

        .statistik-info h3 {
            font-size: 20px;
        }

        .statistik-info p {
            font-size: 11px;
        }
    }



    /* =========================================================
       SECTION
    ========================================================= */

    .section-padding {
        padding: 90px 0;
    }

    .section-title {
        font-weight: 800;
        color: #172033;
    }

    .section-subtitle {
        color: #6b7280;
    }

/* PAGINATION SIMPLE */
    .pagination {
        justify-content: center;
        margin-top: 20px;
    }

    .pagination .page-link {
        color: #0d6efd;
        border-radius: 5px;
    }

    .pagination .page-item.active .page-link {
        background: #0d6efd;
        border-color: #0d6efd;
        color: white;
    }





/```css
/* =========================================================
   PERBAIKAN LAYOUT PROFIL SEKOLAH
========================================================= */

.profile-modern {
    padding: 65px 0;
    background: #f5f8fc;
}

.profile-modern .container {
    max-width: 1200px;
}

/* HEADER PROFIL */

.profile-header-modern {
    text-align: center;
    margin-bottom: 35px;
}

.profile-header-modern .profile-label {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 8px 16px;
    margin-bottom: 14px;
    border-radius: 30px;
    background: #eaf2ff;
    color: #1769e0;
    font-size: 14px;
    font-weight: 600;
}

.profile-header-modern h2 {
    margin-bottom: 10px;
    color: #10204e;
    font-size: clamp(26px, 3vw, 36px);
    font-weight: 800;
    line-height: 1.3;
}

.profile-header-modern p {
    margin-bottom: 16px;
    color: #718096;
    font-size: 15px;
    line-height: 1.7;
}

.profile-header-modern .title-line {
    width: 55px;
    height: 4px;
    margin: 0 auto;
    border-radius: 10px;
    background: #1769e0;
}

/* KARTU UTAMA */

.profile-modern-card {
    padding: 25px;
    background: #fff;
    border: 1px solid #e8edf5;
    border-radius: 20px;
    box-shadow: 0 10px 35px rgba(15, 31, 77, 0.06);
}

.profile-modern-card > .row {
    align-items: stretch;
}

.profile-modern-card > .row > [class*="col-"] {
    min-width: 0;
}

/* IDENTITAS SEKOLAH */

.school-profile-box {
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;

    height: 100%;
    min-height: 400px;
    padding: 25px 22px;

    text-align: center;
    overflow: hidden;

    background: linear-gradient(145deg, #edf5ff, #fff);
    border: 1px solid #e2ebf8;
    border-radius: 18px;
}

.school-profile-box::before,
.school-profile-box::after {
    content: "";
    position: absolute;
    width: 150px;
    height: 150px;
    border-radius: 50%;
    background: rgba(37, 99, 235, 0.05);
    pointer-events: none;
}

.school-profile-box::before {
    top: -75px;
    left: -65px;
}

.school-profile-box::after {
    right: -70px;
    bottom: -75px;
}

/* FOTO KEPALA SEKOLAH
   Mengikuti class school-headmaster-photo pada Blade */

.school-profile-box img.school-headmaster-photo {
    display: block;
    position: relative;
    z-index: 2;

    width: 145px;
    height: 175px;
    max-width: 100%;

    margin: -8px auto 18px;
    padding: 0;

    object-fit: contain;
    object-position: center top;

    background: #fff;
    border: 3px solid #fff;
    border-radius: 14px;

    box-shadow: 0 8px 22px rgba(15, 31, 77, 0.12);
}

.school-profile-box h3 {
    position: relative;
    z-index: 1;

    max-width: 100%;
    margin-bottom: 8px;

    color: #10204e;
    font-size: 21px;
    font-weight: 800;
    line-height: 1.5;

    overflow-wrap: anywhere;
}

.school-profile-box .npsn {
    position: relative;
    z-index: 1;
    color: #718096;
    font-size: 14px;
    overflow-wrap: anywhere;
}

.school-profile-box .profile-divider {
    position: relative;
    z-index: 1;

    width: 48px;
    height: 4px;
    margin: 18px auto;

    background: #1769e0;
    border-radius: 10px;
}

.school-profile-box .profile-quote {
    position: relative;
    z-index: 1;

    max-width: 280px;
    margin: 0;

    color: #5b6780;
    font-size: 14px;
    line-height: 1.8;
    font-style: italic;
}

/* INFORMASI SEKOLAH */

.about-school-modern {
    height: 100%;
    min-width: 0;
    padding: 15px 10px 15px 20px;
}

.about-title-modern {
    display: flex;
    align-items: center;
    gap: 14px;
    margin-bottom: 20px;
}

.about-icon-modern {
    display: flex;
    flex-shrink: 0;
    align-items: center;
    justify-content: center;

    width: 48px;
    height: 48px;

    color: #1769e0;
    background: #eaf2ff;
    border-radius: 13px;
    font-size: 21px;
}

.about-title-modern h3 {
    margin: 0;
    color: #10204e;
    font-size: 25px;
    font-weight: 800;
    line-height: 1.4;
}

.about-description-modern {
    margin-bottom: 25px;
    color: #5b6780;
    font-size: 15px;
    line-height: 1.9;
    text-align: justify;
    overflow-wrap: anywhere;
}

/* INFORMASI KEPALA SEKOLAH DAN TAHUN BERDIRI */

.profile-info-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 14px;
    margin-bottom: 14px;
}

.profile-info-item,
.profile-address {
    display: flex;
    align-items: flex-start;
    gap: 12px;

    min-width: 0;
    padding: 17px;

    background: #f8faff;
    border: 1px solid #e5edf8;
    border-radius: 14px;

    transition: border-color .2s ease, box-shadow .2s ease;
}

.profile-info-item:hover,
.profile-address:hover {
    border-color: #cbdcf5;
    box-shadow: 0 5px 16px rgba(37, 99, 235, 0.06);
}

.profile-info-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    flex: 0 0 40px;

    width: 40px;
    height: 40px;

    color: #1769e0;
    background: #eaf2ff;
    border-radius: 11px;
    font-size: 17px;
}

.profile-info-item > div:last-child,
.profile-address > div:last-child {
    flex: 1;
    min-width: 0;
}

.profile-info-item small,
.profile-address small {
    display: block;
    margin-bottom: 6px;
    color: #718096;
    font-size: 12px;
    line-height: 1.5;
}

.profile-info-item strong,
.profile-address strong {
    display: block;
    color: #172554;
    font-size: 14px;
    font-weight: 600;
    line-height: 1.7;
    overflow-wrap: anywhere;
}

.profile-address {
    margin-top: 0;
}

/* =========================================================
   TABLET
========================================================= */

@media (max-width: 991.98px) {
    .profile-modern {
        padding: 55px 0;
    }

    .profile-modern-card {
        padding: 20px;
    }

    .school-profile-box {
        min-height: 350px;
    }

    .about-school-modern {
        padding: 10px 0 0;
    }

    .about-title-modern h3 {
        font-size: 23px;
    }

    .about-description-modern {
        line-height: 1.8;
    }
}

/* =========================================================
   HP
========================================================= */

@media (max-width: 767.98px) {
    .profile-modern {
        padding: 45px 0;
    }

    .profile-header-modern {
        margin-bottom: 25px;
    }

    .profile-header-modern h2 {
        font-size: 27px;
    }

    .profile-header-modern p {
        font-size: 14px;
    }

    .profile-modern-card {
        padding: 14px;
        border-radius: 16px;
    }

    .school-profile-box {
        height: auto;
        min-height: 0;
        padding: 28px 18px;
    }

    .school-profile-box img.school-headmaster-photo {
        width: 130px;
        height: 155px;
        margin: 0 auto 15px;
    }

    .school-profile-box h3 {
        font-size: 19px;
    }

    .about-school-modern {
        padding: 12px 2px 2px;
    }

    .about-title-modern {
        gap: 11px;
        margin-bottom: 15px;
    }

    .about-title-modern h3 {
        font-size: 21px;
    }

    .about-icon-modern {
        width: 42px;
        height: 42px;
    }

    .about-description-modern {
        font-size: 14px;
        line-height: 1.8;
        margin-bottom: 20px;
    }

    .profile-info-grid {
        grid-template-columns: minmax(0, 1fr);
        gap: 10px;
    }

    .profile-info-item,
    .profile-address {
        padding: 14px;
    }
}

/* HP LAYAR KECIL */

@media (max-width: 380px) {
    .profile-modern-card {
        padding: 10px;
    }

    .school-profile-box {
        padding: 24px 14px;
    }

    .profile-info-item,
    .profile-address {
        gap: 10px;
        padding: 12px;
    }

    .profile-info-item strong,
    .profile-address strong {
        font-size: 13px;
    }
}
```


    /* =========================================================
       VISI MISI
    ========================================================= */

    .visi-misi-modern {
        padding: 90px 0;
        background: #fff;
    }

    .visi-card-modern {
        height: 100%;
        padding: 35px;
        border-radius: 20px;

        background: #fff;

        border: 1px solid #edf0f5;

        box-shadow: 0 10px 30px rgba(0,0,0,.05);

        transition: .3s ease;
    }

    .visi-card-modern:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0,0,0,.09);
    }

    .visi-card-icon {
        width: 55px;
        height: 55px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 14px;

        background: rgba(13,110,253,.1);
        color: #0d6efd;

        font-size: 24px;

        margin-bottom: 20px;
    }

    .visi-card-modern h4 {
        font-weight: 800;
        color: #172033;
        margin-bottom: 15px;
    }

    .visi-content {
        color: #667085;
        line-height: 1.8;
        white-space: normal;
    }

    /* =========================================================
       CARD
    ========================================================= */

    .news-card,
    .info-card {
        border: none;
        border-radius: 18px;
        overflow: hidden;
        transition: .3s ease;
    }

    .news-card:hover,
    .info-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 15px 35px rgba(0,0,0,.1) !important;
    }

    .news-image {
        width: 100%;
        height: 220px;
        object-fit: cover;
    }


    /* =========================================================
       GALERI
    ========================================================= */

    .gallery-image {
        width: 100%;
        height: 230px;

        object-fit: cover;

        border-radius: 14px;

        transition: .3s ease;
    }

    .gallery-image:hover {
        transform: scale(1.02);
    }

    /* =========================================================
       ICON KONTAK
    ========================================================= */

    .info-icon {
        width: 55px;
        height: 55px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 14px;

        font-size: 23px;

        margin-bottom: 18px;
    }

    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 1200px) {

        .stats-wrapper {
            grid-template-columns: repeat(3, 1fr);
        }

    }

    @media (max-width: 768px) {

        .hero {
            min-height: 650px;
        }

        .hero-content {
            padding: 60px 0;
        }

        .hero-title {
            font-size: 45px;
            letter-spacing: -1px;
        }

        .hero-text {
            font-size: 15px;
        }

        .stats-wrapper {
            grid-template-columns: repeat(2, 1fr);
        }

        .school-stats {
            margin-top: -30px;
        }

        .profile-info-grid {
            grid-template-columns: 1fr;
        }

        .profile-header-modern h2,
        .visi-header h2 {
            font-size: 30px;
        }

    }

    @media (max-width: 576px) {

        .hero {
            min-height: 680px;
        }

        .hero-title {
            font-size: 38px;
        }

        .hero-btn {
            width: 100%;
            margin: 5px 0 !important;
        }

        .stats-wrapper {
            grid-template-columns: 1fr;
        }

        .stat-card {
            padding: 18px;
        }

        .section-padding,
        .profile-modern,
        .visi-misi-modern {
            padding: 65px 0;
        }

        .profile-modern-card {
            padding: 18px;
        }

        .school-profile-box {
            min-height: 320px;
        }

        .gallery-image {
            height: 180px;
        }

    }



        /* =========================================================
           GLOBAL
        ========================================================= */

        html {
            scroll-behavior: smooth;
        }

        section {
            scroll-margin-top: 80px;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f8f9fa;
            color: #212529;
        }


        /* =========================================================
           NAVBAR
        ========================================================= */

        .navbar {
            transition: 0.3s;
        }

        .navbar-brand img {
            width: 45px;
            height: 45px;
            object-fit: contain;
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


        /* =========================================================
           HERO
        ========================================================= */

        .hero {
            min-height: 650px;
            display: flex;
            align-items: center;
            position: relative;

            background:
                linear-gradient(
                    rgba(0, 50, 100, 0.72),
                    rgba(0, 50, 100, 0.72)
                ),
                url('{{ $profil && $profil->foto
                    ? asset('storage/' . $profil->foto)
                    : asset('assets/images/logo/logoschool.jpg') }}');

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


        /* =========================================================
           SECTION
        ========================================================= */

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


        /* =========================================================
           PROFIL SEKOLAH
        ========================================================= */

        .profile-modern {
            background: #f8fafc;
            padding: 90px 0;
        }

        .profile-header-modern {
            text-align: center;
            margin-bottom: 50px;
        }

        .profile-header-modern .profile-label {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            padding: 9px 18px;

            border-radius: 30px;

            background: #eaf2ff;
            color: #1769e0;

            font-size: 14px;
            font-weight: 600;

            margin-bottom: 15px;
        }

        .profile-header-modern h2 {
            font-size: 38px;
            font-weight: 800;
            color: #10204e;
            margin-bottom: 10px;
        }

        .profile-header-modern p {
            color: #718096;
            margin: 0;
            font-size: 16px;
        }

        .profile-header-modern .title-line {
            width: 50px;
            height: 4px;
            border-radius: 20px;
            background: #1769e0;
            margin: 18px auto 0;
        }


        /* =========================================================
           CARD PROFIL
        ========================================================= */

        .profile-modern-card {
            background: #ffffff;
            border-radius: 24px;
            padding: 25px;

            box-shadow:
                0 15px 45px rgba(15, 31, 77, 0.08);

            border: 1px solid #edf2f7;
        }


        /* =========================================================
           IDENTITAS SEKOLAH
        ========================================================= */

        .school-profile-box {
            height: 100%;
            min-height: 480px;

            border-radius: 20px;

            background:
                linear-gradient(
                    145deg,
                    #eef6ff 0%,
                    #ffffff 70%
                );

            border: 1px solid #e1ecfb;

            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;

            text-align: center;

            padding: 35px 25px;

            position: relative;
            overflow: hidden;
        }

        .school-profile-box::before {
            content: "";

            position: absolute;

            width: 190px;
            height: 190px;

            border-radius: 50%;

            background: rgba(37, 99, 235, 0.06);

            top: -90px;
            left: -80px;
        }

        .school-profile-box::after {
            content: "";

            position: absolute;

            width: 180px;
            height: 180px;

            border-radius: 50%;

            background: rgba(37, 99, 235, 0.05);

            bottom: -90px;
            right: -70px;
        }

        .school-logo-modern {
            width: 170px;
            height: 170px;

            object-fit: contain;

            background: #ffffff;

            padding: 12px;

            border-radius: 50%;

            border: 6px solid #ffffff;

            box-shadow:
                0 10px 30px rgba(37, 99, 235, 0.15);

            margin-bottom: 25px;

            position: relative;
            z-index: 2;
        }

        .school-profile-box h3 {
            position: relative;
            z-index: 2;

            font-size: 25px;
            font-weight: 800;

            color: #10204e;

            margin-bottom: 7px;
        }

        .school-profile-box .npsn {
            position: relative;
            z-index: 2;

            color: #718096;

            font-size: 15px;
        }

        .school-profile-box .profile-divider {
            width: 45px;
            height: 4px;

            border-radius: 20px;

            background: #1769e0;

            margin: 20px 0;

            position: relative;
            z-index: 2;
        }

        .school-profile-box .profile-quote {
            position: relative;
            z-index: 2;

            color: #5b6780;

            font-size: 15px;

            font-style: italic;

            line-height: 1.7;

            max-width: 300px;
        }


        /* =========================================================
           TENTANG SEKOLAH
        ========================================================= */

        .about-school-modern {
            padding: 15px 15px 15px 30px;
        }

        .about-title-modern {
            display: flex;
            align-items: center;

            gap: 14px;

            margin-bottom: 18px;
        }

        .about-icon-modern {
            width: 50px;
            height: 50px;

            border-radius: 50%;

            background: #eaf2ff;
            color: #1769e0;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 21px;

            flex-shrink: 0;
        }

        .about-title-modern h3 {
            margin: 0;

            color: #10204e;

            font-size: 29px;

            font-weight: 800;
        }

        .about-description-modern {
            color: #5b6780;

            line-height: 1.85;

            font-size: 16px;

            margin-bottom: 28px;

            text-align: justify;
        }


        /* =========================================================
           INFORMASI SEKOLAH
        ========================================================= */

        .profile-info-grid {
            display: grid;

            grid-template-columns: repeat(2, 1fr);

            gap: 15px;
        }

        .profile-info-item {
            display: flex;

            gap: 14px;

            padding: 20px;

            border-radius: 16px;

            background: #f7faff;

            border: 1px solid #e4edfa;

            transition: 0.25s ease;
        }

        .profile-info-item:hover {
            transform: translateY(-3px);

            box-shadow:
                0 8px 25px rgba(37, 99, 235, 0.08);

            border-color: #cbdcf5;
        }

        .profile-info-icon {
            width: 43px;
            height: 43px;

            border-radius: 50%;

            background: #2879e8;

            color: white;

            display: flex;
            align-items: center;
            justify-content: center;

            flex-shrink: 0;
        }

        .profile-info-item small {
            display: block;

            color: #718096;

            font-size: 13px;

            margin-bottom: 5px;
        }

        .profile-info-item strong {
            display: block;

            color: #172554;

            font-size: 14px;

            line-height: 1.6;

            text-align: justify;
        }


        /* =========================================================
           ALAMAT
        ========================================================= */

        .profile-address {
            display: flex;

            gap: 14px;

            margin-top: 15px;

            padding: 20px;

            border-radius: 16px;

            background: #f7faff;

            border: 1px solid #e4edfa;
        }

        .profile-address strong {
            color: #172554;

            font-size: 14px;

            line-height: 1.7;

            text-align: justify;
        }


        /* =========================================================
           VISI & MISI SECTION
        ========================================================= */

        .visi-misi-modern {
            padding: 90px 0;

            background:
                linear-gradient(
                    135deg,
                    #eef6ff 0%,
                    #ffffff 50%,
                    #f3f8ff 100%
                );

            position: relative;

            overflow: hidden;
        }

        .visi-misi-modern::before {
            content: "";

            position: absolute;

            width: 260px;
            height: 260px;

            border-radius: 50%;

            background: rgba(37, 99, 235, 0.06);

            left: -100px;
            bottom: -100px;
        }

        .visi-misi-modern::after {
            content: "";

            position: absolute;

            width: 250px;
            height: 250px;

            border-radius: 50%;

            background: rgba(37, 99, 235, 0.05);

            right: -100px;
            top: -100px;
        }


        /* =========================================================
           HEADER VISI MISI
        ========================================================= */

        .visi-header {
            text-align: center;

            position: relative;

            z-index: 2;

            margin-bottom: 45px;
        }

        .visi-header h2 {
            color: #10204e;

            font-size: 36px;

            font-weight: 800;

            margin-bottom: 8px;
        }

        .visi-header p {
            color: #718096;

            margin-bottom: 15px;
        }

        .visi-line {
            width: 50px;

            height: 4px;

            border-radius: 20px;

            background: #1769e0;

            margin: auto;
        }


        /* =========================================================
           CARD VISI MISI
        ========================================================= */

        .visi-card-modern {
            position: relative;

            z-index: 2;

            height: 100%;

            background: #ffffff;

            border-radius: 20px;

            padding: 35px;

            border: 1px solid #e5edf8;

            box-shadow:
                0 10px 35px rgba(15, 31, 77, 0.06);
        }

        .visi-card-icon {
            width: 55px;
            height: 55px;

            border-radius: 15px;

            background: #eaf2ff;

            color: #1769e0;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 23px;

            margin-bottom: 20px;
        }

        .visi-card-modern h4 {
            color: #10204e;

            font-size: 22px;

            font-weight: 800;

            margin-bottom: 8px;
        }

        .visi-card-modern .card-subtitle {
            color: #718096;

            font-size: 14px;

            margin-bottom: 20px;
        }


        /* =========================================================
           ISI VISI
        ========================================================= */

        .visi-content {
            color: #5b6780;

            font-size: 15px;

            line-height: 1.65;

            text-align: justify;
        }

        .visi-list {
            margin: 0;

            padding-left: 22px;
        }

        .visi-list li {
            margin-bottom: 6px;

            padding-left: 5px;

            text-align: justify;
        }

        .visi-list li:last-child {
            margin-bottom: 0;
        }

        .visi-list li::marker {
            color: #1769e0;

            font-size: 13px;
        }


        /* =========================================================
           ISI MISI
        ========================================================= */

        .misi-content {
            color: #5b6780;

            font-size: 15px;

            line-height: 1.65;

            text-align: justify;
        }

        .misi-list {
            margin: 0;

            padding-left: 25px;
        }

        .misi-list li {
            margin-bottom: 8px;

            padding-left: 5px;

            text-align: justify;
        }

        .misi-list li:last-child {
            margin-bottom: 0;
        }

        .misi-list li::marker {
            color: #1769e0;

            font-weight: 600;
        }


        /* =========================================================
           STATISTIK
        ========================================================= */

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

            box-shadow:
                0 8px 25px rgba(0, 0, 0, 0.08);

            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-7px);

            box-shadow:
                0 15px 35px rgba(0, 0, 0, 0.12);
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


        /* =========================================================
           CARD UMUM
        ========================================================= */

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

            box-shadow:
                0 15px 35px rgba(0, 0, 0, 0.10);
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


        /* =========================================================
           BERITA
        ========================================================= */

        .news-card {
            border: none;

            border-radius: 16px;

            overflow: hidden;

            height: 100%;

            transition: 0.3s;
        }

        .news-card:hover {
            transform: translateY(-5px);

            box-shadow:
                0 12px 30px rgba(0, 0, 0, 0.10);
        }

        .news-image {
            height: 220px;

            width: 100%;

            object-fit: cover;
        }

        /* =========================================
        CARD PRESTASI
        ========================================= */

        .prestasi-card {
            height: 100%;
            border: 0;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .prestasi-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08) !important;
        }

        /* FOTO */
        .prestasi-image-wrapper {
            width: 100%;
            height: 220px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #f8f9fa;
            overflow: hidden;
        }

        .prestasi-image {
            width: 100%;
            height: 100%;

            object-fit: cover;
            object-position: center;

            display: block;
        }

        /* BODY */
        .prestasi-card .card-body {
            padding: 20px;
        }

        .prestasi-tahun {
            color: #0d6efd;
            font-size: 14px;
            font-weight: 600;
        }

        /* DETAIL */
        .prestasi-detail-link {
            display: inline-flex;
            align-items: center;
            gap: 5px;

            color: #0d6efd;
            text-decoration: none;
            font-weight: 600;

            transition: all 0.2s ease;
        }

        .prestasi-detail-link:hover {
            color: #084298;
            gap: 8px;
        }

        /* =========================================
        CARD BERITA
        ========================================= */

                .detail-footer {
            margin-top: 30px;
            padding-top: 22px;
            border-top: 1px solid #e9ecef;

            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
        }

        .detail-footer-left,
        .detail-footer-right {
            display: flex;
            align-items: center;
        }

        .btn-detail-back {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            padding: 9px 16px;

            border: 1px solid #0d6efd;
            color: #0d6efd;
            background: #fff;

            border-radius: 7px;
            text-decoration: none;
            font-size: 14px;

            transition: all .2s ease;
        }

        .btn-detail-back:hover {
            background: #0d6efd;
            color: #fff;
        }

        @media (max-width: 576px) {

            .detail-footer {
                flex-direction: column;
                align-items: stretch;
            }

            .detail-footer-left,
            .detail-footer-right {
                width: 100%;
            }

            .btn-detail-back {
                justify-content: center;
                width: 100%;
            }

        }
        .berita-card {
            height: 100%;
            border: 0;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .berita-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08) !important;
        }

        /* GAMBAR */
        .berita-image-wrapper {
            width: 100%;
            height: 220px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #f8f9fa;
            overflow: hidden;
        }

        .berita-image {
            width: 100%;
            height: 100%;

            object-fit: cover;
            object-position: center;

            display: block;
        }

        /* BODY */
        .berita-card .card-body {
            padding: 20px;
        }

        .berita-date {
            color: #6c757d;
            font-size: 14px;
        }

        .berita-card h5 {
            line-height: 1.4;
        }

        /* DETAIL */
        .berita-detail-link {
            display: inline-flex;
            align-items: center;
            gap: 5px;

            color: #0d6efd;
            text-decoration: none;
            font-weight: 600;

            transition: all 0.2s ease;
        }

        .berita-detail-link:hover {
            color: #084298;
            gap: 8px;
        }
        /* =========================================
        CARD EKSTRAKURIKULER
        ========================================= */

        .ekskul-card {
            height: 100%;
            text-align: center;
            padding-top: 25px;
            border: 0;
            border-radius: 15px;
            transition: all 0.3s ease;
        }

        .ekskul-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08) !important;
        }

        /* FOTO */
        .ekskul-image-wrapper {
            width: 150px;
            height: 150px;

            margin: 0 auto 20px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 15px;
            overflow: hidden;

            background: #f8f9fa;
        }

        .ekskul-image {
            width: 100%;
            height: 100%;

            object-fit: cover;
            object-position: center;

            display: block;
        }

        /* ISI CARD */
        .ekskul-card .card-body {
            padding: 0 25px 25px;
        }

        .ekskul-card h5 {
            min-height: 24px;
        }

        .ekskul-card .ekskul-pembina {
            color: #0d6efd;
            font-weight: 600;
        }

        .ekskul-card .ekskul-jadwal {
            color: #6c757d;
            font-size: 14px;
        }

        /* DETAIL */
        .ekskul-detail-link {
            display: inline-flex;
            align-items: center;
            gap: 5px;

            margin-top: 8px;

            color: #0d6efd;
            text-decoration: none;
            font-weight: 600;

            transition: all 0.2s ease;
        }

        .ekskul-detail-link:hover {
            color: #084298;
            gap: 8px;
        }
        /* =========================================================
           GURU
        ========================================================= */

        .teacher-image-wrapper {
            width: 180px;
            height: 180px;
            margin: 0 auto 20px;

            overflow: hidden;
            border-radius: 0 !important;
            border: 4px solid #fff;

            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.12);
        }

        .teacher-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            display: block;
            border-radius: 0 !important;
        }




        /* =========================================================
           GALERI
        ========================================================= */

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


        /* =========================================================
           FOOTER
        ========================================================= */

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


        /* =========================================================
           RESPONSIVE
        ========================================================= */

        @media (max-width: 991px) {

            .profile-modern {
                padding: 70px 0;
            }

            .profile-header-modern h2 {
                font-size: 32px;
            }

            .about-school-modern {
                padding: 25px 5px 10px;
            }

            .profile-info-grid {
                grid-template-columns: 1fr;
            }

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

            .stats-wrapper {
                grid-template-columns: 1fr;
            }

            .stat-card {
                padding: 25px;
            }

        }


        @media (max-width: 767px) {

            .profile-modern {
                padding: 55px 0;
            }

            .profile-header-modern h2 {
                font-size: 28px;
            }

            .profile-modern-card {
                padding: 15px;

                border-radius: 18px;
            }

            .school-profile-box {
                min-height: auto;

                padding: 35px 20px;
            }

            .school-logo-modern {
                width: 140px;
                height: 140px;
            }

            .about-title-modern h3 {
                font-size: 25px;
            }

            .visi-misi-modern {
                padding: 60px 0;
            }

            .visi-header h2 {
                font-size: 30px;
            }

            .visi-card-modern {
                padding: 25px;

                margin-bottom: 15px;
            }

            .visi-content,
            .misi-content {
                font-size: 14px;

                line-height: 1.65;
            }

            .visi-list,
            .misi-list {
                padding-left: 22px;
            }

            .visi-list li,
            .misi-list li {
                padding-left: 3px;

                margin-bottom: 6px;
            }

        }

        <>
    .detail-section {
        padding: 60px 0;
        background: #f8f9fa;
        min-height: calc(100vh - 80px);
    }

    .detail-card {
        max-width: 1100px;
        margin: auto;
        background: #fff;
        border-radius: 20px;
        padding: 35px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.06);

        /* Mencegah konten keluar */
        overflow: hidden;
    }

    /* HEADER */

    .detail-header {
        margin-bottom: 28px;
    }

    .detail-label {
        display: inline-flex;
        align-items: center;
        gap: 6px;

        background: #e8f1ff;
        color: #0d6efd;

        padding: 7px 14px;
        border-radius: 50px;

        font-size: 14px;
        font-weight: 600;

        margin-bottom: 15px;
    }

    .detail-title {
        font-size: 32px;
        font-weight: 700;
        color: #212529;

        line-height: 1.3;
        margin-bottom: 12px;

        overflow-wrap: anywhere;
        word-break: break-word;
    }

    .detail-date {
        color: #6c757d;
        font-size: 15px;

        display: flex;
        align-items: center;
        gap: 7px;
    }


    /* CONTENT */

    .detail-content {
        display: flex;
        align-items: flex-start;
        gap: 30px;
        width: 100%;
    }

    .detail-image-wrapper {
        width: 52%;
        height: 340px;
        flex-shrink: 0;
        background: #ffffff;
        border-radius: 15px;
        overflow: hidden;

        display: flex;
        align-items: center;
        justify-content: center;
    }

    .detail-image {
        width: 100%;
        max-width: 280px;
        height: 280px;
        object-fit: cover;
        border-radius: 0;
    }



    .detail-description {
        flex: 1;
        min-width: 0;

        color: #5f6b7a;

        font-size: 16px;
        line-height: 1.8;

        text-align: justify;

        /* Mencegah teks panjang menembus card */
        overflow-wrap: anywhere;
        word-break: break-word;
    }

    .detail-description p {
        margin-bottom: 15px;
    }


    /* FOOTER */

    .detail-footer {
        margin-top: 30px;
        padding-top: 22px;

        border-top: 1px solid #e9ecef;

        display: flex;
        justify-content: flex-end;
    }

    .btn-detail-back {
        display: inline-flex;
        align-items: center;
        gap: 8px;

        padding: 9px 16px;

        border: 1px solid #0d6efd;
        color: #0d6efd;
        background: #fff;

        border-radius: 7px;

        text-decoration: none;
        font-size: 14px;

        transition: all 0.2s ease;
    }

    .btn-detail-back:hover {
        background: #0d6efd;
        color: #fff;
    }


    /* TABLET */

    @media (max-width: 991px) {

        .detail-card {
            padding: 28px;
        }

        .detail-content {
            gap: 25px;
        }

        .detail-image-wrapper {
            width: 50%;
        }

        .detail-image {
            height: 300px;
        }

        .detail-title {
            font-size: 28px;
        }
    }


    /* MOBILE */

    @media (max-width: 767px) {

        .detail-section {
            padding: 35px 0;
        }

        .detail-card {
            padding: 20px;
            border-radius: 15px;
        }

        .detail-title {
            font-size: 25px;
        }

        .detail-content {
            flex-direction: column;
            gap: 22px;
        }

        .detail-image-wrapper {
            width: 100%;
        }

        .detail-image {
            height: 230px;
        }

        .detail-description {
            font-size: 15px;
            line-height: 1.7;
        }

        .detail-footer {
            justify-content: flex-start;
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
