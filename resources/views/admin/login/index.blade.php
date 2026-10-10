
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Sistem Informasi Sekolah</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap"
          rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/auth.css') }}">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Nunito', sans-serif;
            background: #f3f5fb;
            color: #263d78;
        }

        #auth {
            min-height: 100vh;
            padding: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .auth-card {
            width: 100%;
            max-width: 1100px;
            min-height: 650px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            background: #fff;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 15px 45px rgba(38, 61, 120, 0.10);
        }

        /* PANEL KIRI */
        .auth-left {
            padding: 55px 65px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .auth-title {
            color: #263d78;
            font-size: 40px;
            font-weight: 800;
            margin: 0 0 12px;
        }

        .auth-subtitle {
            color: #8b99b3;
            font-size: 15px;
            line-height: 1.8;
            margin-bottom: 32px;
        }

        .form-label {
            display: block;
            color: #263d78;
            font-weight: 700;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .form-control {
            height: 50px;
            border: 1px solid #d9e3f5;
            border-radius: 10px;
            padding: 12px 15px;
            background: #f0f5ff;
            color: #263d78;
            font-family: 'Nunito', sans-serif;
            box-shadow: none;
        }

        .form-control:focus {
            background: #fff;
            border-color: #4963c5;
            box-shadow: 0 0 0 3px rgba(73, 99, 197, 0.12);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn-login {
            width: 100%;
            min-height: 50px;
            border: none;
            border-radius: 10px;
            background: #4059bd;
            color: #fff;
            font-family: 'Nunito', sans-serif;
            font-weight: 800;
            font-size: 15px;
            margin-top: 5px;
            transition: 0.2s ease;
        }

        .btn-login:hover {
            background: #3049a8;
            color: #fff;
            transform: translateY(-1px);
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 28px;
            color: #4059bd;
            text-decoration: none;
            font-size: 14px;
            font-weight: 700;
        }

        .back-link:hover {
            color: #263d78;
        }

        .alert {
            font-size: 14px;
            border-radius: 10px;
        }

        /* PANEL KANAN */
        .auth-right {
            position: relative;
            padding: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #fff;
            background: linear-gradient(145deg, #3d559f, #536fc0);
            overflow: hidden;
        }

        .auth-right::before,
        .auth-right::after {
            content: "";
            position: absolute;
            width: 360px;
            height: 360px;
            border: 1px solid rgba(255, 255, 255, 0.09);
            border-radius: 50%;
            pointer-events: none;
        }

        .auth-right::before {
            top: -180px;
            right: -90px;
        }

        .auth-right::after {
            bottom: -250px;
            left: -120px;
        }

        .auth-right-content {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 390px;
        }

        .auth-school-logo {
            width: 125px;
            height: 125px;
            object-fit: contain;
            padding: 12px;
            background: #fff;
            border-radius: 24px;
            margin-bottom: 28px;
            box-shadow: 0 10px 25px rgba(20, 35, 80, 0.12);
        }

        .auth-right-content h2 {
            color: #fff;
            font-size: 32px;
            font-weight: 800;
            line-height: 1.35;
            margin-bottom: 18px;
        }

        .auth-right-content p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 15px;
            line-height: 1.9;
            margin-bottom: 36px;
        }

        .auth-footer {
            color: rgba(255, 255, 255, 0.85);
            font-size: 13px;
        }

        .auth-footer i {
            margin-right: 6px;
        }

        /* RESPONSIVE */
        @media (max-width: 991px) {
            #auth {
                padding: 18px;
            }

            .auth-card {
                max-width: 560px;
                min-height: auto;
                grid-template-columns: 1fr;
            }

            .auth-left {
                padding: 45px 35px;
            }

            .auth-right {
                display: none;
            }

            .auth-title {
                font-size: 34px;
            }
        }

        @media (max-width: 480px) {
            #auth {
                padding: 12px;
            }

            .auth-card {
                border-radius: 18px;
            }

            .auth-left {
                padding: 35px 24px;
            }

            .auth-title {
                font-size: 30px;
            }

            .auth-subtitle {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>

<div id="auth">
    <div class="auth-card">

        {{-- PANEL KIRI: FORM LOGIN --}}
        <div class="auth-left">

            <h1 class="auth-title">Selamat Datang!</h1>

            <p class="auth-subtitle">
                Masuk ke sistem informasi sekolah menggunakan
                username dan password akun Anda.
            </p>

            {{-- PESAN ERROR LOGIN --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <i class="bi bi-exclamation-circle me-1"></i>
                    {{ $errors->first() }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="username" class="form-label">
                        Username
                    </label>

                    <input
                        type="text"
                        id="username"
                        name="username"
                        class="form-control"
                        placeholder="Masukkan username"
                        value="{{ old('username') }}"
                        autocomplete="username"
                        required
                        autofocus
                    >
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">
                        Password
                    </label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-control"
                        placeholder="Masukkan password"
                        autocomplete="current-password"
                        required
                    >
                </div>

                <button type="submit" class="btn btn-login">
                    <i class="bi bi-box-arrow-in-right me-2"></i>
                    Masuk ke Sistem
                </button>
            </form>

            <a href="{{ url('/') }}" class="back-link">
                <i class="bi bi-arrow-left me-1"></i>
                Kembali ke halaman utama
            </a>

        </div>

        {{-- PANEL KANAN: LOGO DAN INFORMASI SEKOLAH --}}
        <div class="auth-right">
            <div class="auth-right-content">

                <img
                    src="{{ asset('assets/images/logo/logosekolah.png') }}"
                    alt="Logo Sekolah"
                    class="auth-school-logo"
                >

                <h2>Website Resmi Sekolah</h2>

                <p>
                    Selamat datang di sistem informasi sekolah.
                    Silakan masuk untuk mengakses layanan sesuai
                    dengan akun dan hak akses Anda.
                </p>

                <div class="auth-footer">
                    <i class="bi bi-shield-check"></i>
                    Sistem Informasi Sekolah
                </div>

            </div>
        </div>

    </div>
</div>

</body>
</html>

