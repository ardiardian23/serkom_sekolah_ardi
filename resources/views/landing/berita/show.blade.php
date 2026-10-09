@extends('layouts.landing')

@section('title', $berita->judul)

@section('content')
<br>
<br>

<section class="detail-section">
    <div class="container">
        <x-detail-card
            label="Berita"
            icon="newspaper"
            :title="$berita->judul"
            :date="\Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y')"
            :image="$berita->gambar
                ? asset('storage/' . $berita->gambar)
                : asset('assets/images/logo/logosekolah.png')"
            :description="$berita->isi"
            :all-url="route('berita.public')"
            all-text="Lihat Semua Berita"
            :back-url="url('/')"
            back-text="Kembali ke Beranda"
        />
    </div>
</section>

<br>
<br>
@endsection

