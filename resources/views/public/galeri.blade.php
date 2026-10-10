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

                <div class="row g-4 gallery-grid">
                    @forelse($galeri as $item)
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="card gallery-card h-100">
                                <a href="{{ route('galeri.show', ['id' => $item->id_galeri]) }}"
                                class="gallery-image-link">
                                    @if($item->file)
                                        <img
                                            src="{{ asset('storage/' . $item->file) }}"
                                            alt="{{ $item->judul }}"
                                            class="gallery-image"
                                        >
                                    @else
                                        <div class="gallery-image gallery-placeholder">
                                            <i class="bi bi-image"></i>
                                        </div>
                                    @endif
                                </a>

                                <div class="card-body text-center">
                                    <h6 class="gallery-title">
                                        {{ $item->judul }}
                                    </h6>

                                    <p class="gallery-category">
                                        {{ $item->kategori }}
                                    </p>

                                    <a href="{{ route('galeri.show', ['id' => $item->id_galeri]) }}"
                                    class="gallery-detail-link">
                                        Lihat Detail <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center py-5">
                            <i class="bi bi-images fs-1 text-muted"></i>
                            <p class="mt-3 text-muted">Belum ada dokumentasi galeri.</p>
                        </div>
                    @endforelse
                </div>

                <!-- PAGINATION -->
            <div class="d-flex justify-content-center mt-4">
                {{ $galeri->links('pagination::bootstrap-5') }}
            </div>
                


    </section>

@endsection

