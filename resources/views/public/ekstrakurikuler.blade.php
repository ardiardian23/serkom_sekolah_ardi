@extends('layouts.landing')

@section('title')
Ekstrakurikuler - {{ $profil->nama_sekolah ?? 'Website Sekolah' }}
@endsection

@section('content')

<section class="section-padding bg-light">

    <div class="container">

        <!-- HEADER -->
        <div class="text-center mb-5">

            <h2 class="section-title">
                Ekstrakurikuler
            </h2>

            <p class="section-subtitle">
                Kegiatan pengembangan minat dan bakat siswa
            </p>

        </div>

        <!-- DATA -->
        <div class="row g-4">

            @forelse($ekskuls as $item)

                <div class="col-lg-4 col-md-6">

                    <div class="card info-card shadow-sm overflow-hidden h-100">

                        @if($item->gambar)

                            <img src="{{ asset('storage/' . $item->gambar) }}"
                                 class="news-image"
                                 alt="{{ $item->nama_ekskul }}">

                        @else

                            <div class="news-image bg-white d-flex align-items-center justify-content-center">

                                <i class="bi bi-people fs-1 text-primary"></i>

                            </div>

                        @endif

                        <div class="card-body p-4">

                            <h5 class="fw-bold">

                                {{ $item->nama_ekskul }}

                            </h5>

                            <p class="text-muted mb-2">

                                <i class="bi bi-person me-1"></i>

                                {{ $item->pembina ?? '-' }}

                            </p>

                            <p class="text-muted mb-0">

                                <i class="bi bi-calendar-event me-1"></i>

                                {{ $item->jadwal_latihan ?? '-' }}

                            </p>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12 text-center">

                    <div class="card info-card shadow-sm">

                        <div class="card-body p-5">

                            <i class="bi bi-people fs-1 text-muted"></i>

                            <p class="text-muted mt-3 mb-0">

                                Belum ada data ekstrakurikuler.

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
