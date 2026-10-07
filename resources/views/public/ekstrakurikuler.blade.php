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

                    <div class="card ekskul-card shadow-sm">

                        {{-- FOTO --}}
                        <div class="ekskul-image-wrapper">

                            <img
                                src="{{ $item->gambar
                                    ? asset('storage/' . $item->gambar)
                                    : asset('assets/images/logo/logosekolah.png') }}"
                                alt="{{ $item->nama_ekskul }}"
                                class="ekskul-image"
                            >

                        </div>

                        {{-- ISI --}}
                        <div class="card-body">

                            <h5 class="fw-bold mb-2">
                                {{ $item->nama_ekskul }}
                            </h5>

                            <p class="ekskul-pembina mb-2">
                                <i class="bi bi-person-badge me-1"></i>
                                {{ $item->pembina ?: '-' }}
                            </p>

                            <p class="ekskul-jadwal mb-3">
                                <i class="bi bi-calendar3 me-1"></i>
                                {{ $item->jadwal_latihan ?: '-' }}
                            </p>

                            <p class="text-muted">
                                {{ \Illuminate\Support\Str::limit(
                                    strip_tags($item->deskripsi),
                                    100
                                ) }}
                            </p>

                            {{-- DETAIL --}}
                            <a href="{{ route('ekstrakurikuler.show', ['id' => $item->id_ekskul]) }}"
                            class="ekskul-detail-link">

                                Lihat Detail
                                <i class="bi bi-arrow-right"></i>

                            </a>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12 text-center">

                    <p class="text-muted">
                        Belum ada data ekstrakurikuler.
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
