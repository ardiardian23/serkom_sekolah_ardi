@extends('layouts.landing')

@section('title')
Berita - {{ $profil->nama_sekolah ?? 'Website Sekolah' }}
@endsection

@section('content')

<section class="section-padding bg-light">

    <div class="container">

        <!-- HEADER -->
        <div class="text-center mb-5">

            <h2 class="section-title">
                Berita Sekolah
            </h2>

            <p class="section-subtitle">
                Informasi dan berita terbaru dari sekolah
            </p>

        </div>

        <!-- DATA BERITA -->
        <div class="row g-4">

            @forelse($berita as $item)

                <div class="col-lg-4 col-md-6">

                    <div class="card news-card shadow-sm h-100">

                        @if($item->gambar)

                            <img src="{{ asset('storage/' . $item->gambar) }}"
                                 class="news-image"
                                 alt="{{ $item->judul }}">

                        @else

                            <div class="news-image bg-white d-flex align-items-center justify-content-center">

                                <i class="bi bi-newspaper fs-1 text-secondary"></i>

                            </div>

                        @endif

                        <div class="card-body p-4">

                            <small class="text-primary">

                                <i class="bi bi-calendar3 me-1"></i>

                                {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}

                            </small>

                            <h5 class="fw-bold mt-2">
                                {{ $item->judul }}
                            </h5>

                            <p class="text-muted">

                                {{ \Illuminate\Support\Str::limit(
                                    strip_tags($item->isi),
                                    180
                                ) }}

                            </p>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12 text-center">

                    <div class="card info-card shadow-sm">

                        <div class="card-body p-5">

                            <i class="bi bi-newspaper fs-1 text-muted"></i>

                            <p class="text-muted mt-3 mb-0">
                                Belum ada berita sekolah.
                            </p>

                        </div>

                    </div>

                </div>

            @endforelse

        </div>

        <!-- KEMBALI -->
        <div class="text-center mt-5">

            <a href="{{ url('/') }}"
               class="btn btn-outline-primary">

                <i class="bi bi-arrow-left me-1"></i>
                Kembali ke Beranda

            </a>

        </div>

    </div>

</section>

@endsection
