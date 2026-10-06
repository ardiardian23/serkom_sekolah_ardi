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

                    <div class="card info-card shadow-sm text-center h-100">

                        <div class="card-body p-4">

                            @if($item->foto)

                                <img src="{{ asset('storage/' . $item->foto) }}"
                                     class="teacher-image"
                                     alt="{{ $item->nama_guru }}">

                            @else

                                <div class="teacher-image mx-auto bg-light d-flex align-items-center justify-content-center">

                                    <i class="bi bi-person fs-1 text-secondary"></i>

                                </div>

                            @endif

                            <h5 class="fw-bold mt-4 mb-1">

                                {{ $item->nama_guru }}

                            </h5>

                            <p class="text-primary mb-2">

                                {{ $item->mapel }}

                            </p>

                            <small class="text-muted">

                                NIP: {{ $item->nip ?? '-' }}

                            </small>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12 text-center">

                    <div class="card info-card shadow-sm">

                        <div class="card-body p-5">

                            <i class="bi bi-people fs-1 text-muted"></i>

                            <p class="text-muted mt-3 mb-0">

                                Belum ada data guru dan staff.

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
