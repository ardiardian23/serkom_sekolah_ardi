@extends('layouts.landing')

@section('title')
Pengumuman - {{ $profil->nama_sekolah ?? 'Website Sekolah' }}
@endsection

@section('content')

<section class="section-padding bg-light">

    <div class="container">

        <!-- HEADER -->
        <div class="text-center mb-5">

            <h2 class="section-title">
                Pengumuman
            </h2>

            <p class="section-subtitle">
                Informasi penting untuk siswa dan orang tua
            </p>

        </div>

        <!-- DATA -->
        <div class="row g-4">

            @forelse($pengumumans as $item)

                <div class="col-lg-4 col-md-6">

                    <div class="card info-card shadow-sm h-100">

                        <div class="card-body p-4">

                            <!-- HEADER CARD -->
                            <div class="d-flex align-items-center mb-4">

                                <div class="info-icon bg-primary bg-opacity-10 text-primary mb-0 me-3">

                                    <i class="bi bi-megaphone"></i>

                                </div>

                                <div>

                                    <small class="text-muted">
                                        {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                                    </small>

                                    <h5 class="fw-bold mb-0">
                                        {{ $item->judul }}
                                    </h5>

                                </div>

                            </div>

                            <!-- ISI SINGKAT -->
                            <p class="text-muted mb-4"
                               style="line-height: 1.8;">

                                {{ \Illuminate\Support\Str::limit(strip_tags($item->isi), 150) }}

                            </p>

                            <!-- LIHAT DETAIL -->
                            <div class="mt-auto">

                                <a href="{{ route('pengumuman.show', ['id' => $item->id_pengumuman]) }}"
                                   class="text-primary text-decoration-none fw-semibold">

                                    Lihat Detail

                                    <i class="bi bi-arrow-right ms-1"></i>

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12 text-center">

                    <div class="card info-card shadow-sm">

                        <div class="card-body p-5">

                            <i class="bi bi-megaphone fs-1 text-muted"></i>

                            <p class="text-muted mt-3 mb-0">

                                Belum ada pengumuman.

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
