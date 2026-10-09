@extends('layouts.landing')

@section('title')
    Galeri - {{ $profil->nama_sekolah ?? 'Website Sekolah' }}
@endsection

@section('content')
    <section class="section-padding bg-light">
        <div class="container">

            <!-- HEADER -->
            <div class="text-center mb-5">
                <h2 class="section-title">
                    Galeri Sekolah
                </h2>

                <p class="section-subtitle">
                    Dokumentasi kegiatan sekolah
                </p>
            </div>

            <!-- DATA -->
            <div class="row g-4">
                @forelse($galeris as $item)
                    <div class="col-lg-3 col-md-4 col-6">
                        <div class="card info-card shadow-sm overflow-hidden h-100">

                            @if($item->file)
                                <img
                                    src="{{ asset('storage/' . $item->file) }}"
                                    class="gallery-image w-100"
                                    alt="{{ $item->judul }}"
                                >
                            @else
                                <div class="gallery-image bg-white d-flex align-items-center justify-content-center">
                                    <i class="bi bi-image fs-1 text-muted"></i>
                                </div>
                            @endif

                            <div class="card-body p-3">
                                <h6 class="fw-bold mb-1">
                                    {{ $item->judul }}
                                </h6>

                                <small class="text-muted">
                                    {{ $item->kategori }}
                                </small>
                            </div>

                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <div class="card info-card shadow-sm">
                            <div class="card-body p-5">
                                <i class="bi bi-images fs-1 text-muted"></i>

                                <p class="text-muted mt-3 mb-0">
                                    Belum ada foto galeri.
                                </p>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- KEMBALI -->
            <div class="text-center mt-5">
                <a
                    href="{{ url('/') }}"
                    class="btn btn-outline-primary"
                >
                    <i class="bi bi-arrow-left me-1"></i>
                    Kembali ke Beranda
                </a>
            </div>

        </div>
    </section>
@endsection

