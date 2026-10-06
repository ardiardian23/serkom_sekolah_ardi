@extends('layouts.landing')

@section('title')
Prestasi - {{ $profil->nama_sekolah ?? 'Website Sekolah' }}
@endsection

@section('content')

<section class="section-padding bg-white">

    <div class="container">

        <!-- HEADER -->
        <div class="text-center mb-5">

            <h2 class="section-title">
                Prestasi Sekolah
            </h2>

            <p class="section-subtitle">
                Prestasi dan pencapaian siswa
            </p>

        </div>

        <!-- DATA -->
        <div class="row g-4">

            @forelse($prestasi as $item)

                <div class="col-lg-4 col-md-6">

                    <div class="card news-card shadow-sm h-100">

                        @if($item->foto)

                            <img src="{{ asset('storage/' . $item->foto) }}"
                                 class="news-image"
                                 alt="{{ $item->nama_prestasi }}">

                        @else

                            <div class="news-image bg-light d-flex align-items-center justify-content-center">

                                <i class="bi bi-trophy fs-1 text-warning"></i>

                            </div>

                        @endif

                        <div class="card-body p-4">

                            <span class="badge bg-primary mb-2">

                                {{ $item->tahun_ajaran }}

                            </span>

                            <h5 class="fw-bold">

                                {{ $item->nama_prestasi }}

                            </h5>

                            <p class="text-muted">

                                {{ $item->deskripsi }}

                            </p>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12 text-center">

                    <div class="card info-card shadow-sm">

                        <div class="card-body p-5">

                            <i class="bi bi-trophy fs-1 text-muted"></i>

                            <p class="text-muted mt-3 mb-0">

                                Belum ada data prestasi.

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
