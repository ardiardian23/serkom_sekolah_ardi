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
                        <div class="card prestasi-card shadow-sm">

                            {{-- FOTO --}}
                            <div class="prestasi-image-wrapper">
                                <img
                                    src="{{ $item->foto
                                        ? asset('storage/' . $item->foto)
                                        : asset('assets/images/logo/logosekolah.png') }}"
                                    alt="{{ $item->nama_prestasi }}"
                                    class="prestasi-image"
                                >
                            </div>

                            {{-- ISI --}}
                            <div class="card-body">

                                {{-- TAHUN --}}
                                <div class="prestasi-tahun mb-2">
                                    <i class="bi bi-calendar3 me-1"></i>
                                    {{ $item->tahun_ajaran ?: '-' }}
                                </div>

                                {{-- NAMA PRESTASI --}}
                                <h5 class="fw-bold mb-2">
                                    {{ $item->nama_prestasi }}
                                </h5>

                                {{-- DESKRIPSI --}}
                                <p class="text-muted mb-3">
                                    {{ \Illuminate\Support\Str::limit(
                                        strip_tags($item->deskripsi),
                                        120
                                    ) }}
                                </p>

                                {{-- DETAIL --}}
                                <a
                                    href="{{ route('prestasi.show', ['id' => $item->id]) }}"
                                    class="prestasi-detail-link"
                                >
                                    Lihat Detail
                                    <i class="bi bi-arrow-right"></i>
                                </a>

                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p class="text-muted">
                            Belum ada data prestasi.
                        </p>
                    </div>
                @endforelse
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $prestasi->links('pagination::bootstrap-5') }}
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

