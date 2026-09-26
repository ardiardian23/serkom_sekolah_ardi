<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SMAN 1 SINGAPARNA</title>

    <link rel="icon" href="{{ asset('assets/images/logoschool.jpg')}}">

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