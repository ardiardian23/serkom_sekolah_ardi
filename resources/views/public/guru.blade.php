@extends('layouts.landing')
@section('title')
    Guru & Staff - {{ $profil->nama_sekolah ?? 'Website Sekolah' }}
@endsection

@section('content')
    <section class="section-padding bg-white">
        <div class="container">

            <!-- HEADER -->
            <div class="text-center mb-5">
                <h2 class="section-title">
                    Guru dan Staff
                </h2>

                <p class="section-subtitle">
                    Tenaga pendidik profesional sekolah
                </p>
            </div>

            <!-- DATA -->
            <div class="row g-4">
                @forelse($guru as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100 border-0 shadow-sm teacher-card">

                            {{-- FOTO --}}
                            <div class="teacher-image-wrapper">
                                <img
                                    src="{{ $item->foto
                                        ? asset('storage/' . $item->foto)
                                        : asset('assets/images/faces/kepsek.png') }}"
                                    alt="{{ $item->nama_guru }}"
                                    class="teacher-image"
                                >
                            </div>

                            {{-- DATA GURU --}}
                            <div class="card-body text-center">
                                <h5 class="fw-bold mb-1">
                                    {{ $item->nama_guru }}
                                </h5>

                                <p class="text-primary mb-2">
                                    {{ $item->mapel }}
                                </p>

                                <small class="text-muted d-block mb-3">
                                    NIP: {{ $item->nip ?: '-' }}
                                </small>

                                {{-- LIHAT DETAIL --}}
                                <a
                                    href="{{ route('guru.show', ['id' => $item->id_guru]) }}"
                                    class="text-primary text-decoration-none fw-semibold"
                                >
                                    Lihat Detail
                                    <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                            </div>

                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p class="text-muted">
                            Belum ada data guru.
                        </p>
                    </div>
                @endforelse
            </div>


            <!-- PAGINATION -->
            <div class="d-flex justify-content-center mt-4">
                {{ $guru->links('pagination::bootstrap-5') }}
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

