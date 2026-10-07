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

                    <div class="card berita-card shadow-sm">

                        {{-- GAMBAR --}}
                        <div class="berita-image-wrapper">

                            <img
                                src="{{ $item->gambar
                                    ? asset('storage/' . $item->gambar)
                                    : asset('assets/images/logo/logosekolah.png') }}"
                                alt="{{ $item->judul }}"
                                class="berita-image"
                            >

                        </div>


                        {{-- ISI --}}
                        <div class="card-body">

                            {{-- TANGGAL --}}
                            <div class="berita-date mb-2">

                                <i class="bi bi-calendar3 me-1"></i>

                                {{ \Carbon\Carbon::parse($item->tanggal)
                                    ->translatedFormat('d F Y') }}

                            </div>


                            {{-- JUDUL --}}
                            <h5 class="fw-bold mb-2">

                                {{ $item->judul }}

                            </h5>


                            {{-- RINGKASAN --}}
                            <p class="text-muted mb-3">

                                {{ \Illuminate\Support\Str::limit(
                                    strip_tags($item->isi),
                                    120
                                ) }}

                            </p>


                            {{-- DETAIL --}}
                            <a href="{{ route('berita.show', ['id' => $item->id_berita]) }}"
                            class="berita-detail-link">

                                Lihat Detail

                                <i class="bi bi-arrow-right"></i>

                            </a>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12 text-center">

                    <p class="text-muted">
                        Belum ada berita.
                    </p>

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
