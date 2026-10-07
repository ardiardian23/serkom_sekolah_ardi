@extends('layouts.landing')

@section('title', $guru->nama_guru . ' - ' . ($profil->nama_sekolah ?? 'Website Sekolah'))

@section('content')

<br>
<br>

<section class="detail-section">

    <div class="container">

        <div class="detail-card">

            {{-- HEADER --}}
            <div class="detail-header">

                <span class="detail-label">
                    <i class="bi bi-person-badge"></i>
                    Guru & Staff
                </span>

                <h1 class="detail-title">
                    {{ $guru->nama_guru }}
                </h1>

            </div>


            {{-- CONTENT --}}
            <div class="detail-content">

                {{-- FOTO --}}
                <div class="detail-image-wrapper">

                    <img
                        src="{{ $guru->foto
                            ? asset('storage/' . $guru->foto)
                            : asset('assets/images/faces/kepsek.png') }}"
                        alt="{{ $guru->nama_guru }}"
                        class="detail-image"
                    >

                </div>


                {{-- INFORMASI GURU --}}
                <div class="detail-description">

                    <div class="guru-info">

                        {{-- NAMA --}}
                        <div class="guru-info-item">

                            <div class="guru-info-icon">
                                <i class="bi bi-person-fill"></i>
                            </div>

                            <div>
                                <small>Nama Guru</small>

                                <strong>
                                    {{ $guru->nama_guru }}
                                </strong>
                            </div>

                        </div>


                        {{-- NIP --}}
                        <div class="guru-info-item">

                            <div class="guru-info-icon">
                                <i class="bi bi-card-text"></i>
                            </div>

                            <div>
                                <small>NIP</small>

                                <strong>
                                    {{ $guru->nip ?: '-' }}
                                </strong>
                            </div>

                        </div>


                        {{-- JENIS KELAMIN --}}
                        <div class="guru-info-item">

                            <div class="guru-info-icon">
                                <i class="bi bi-gender-ambiguous"></i>
                            </div>

                            <div>
                                <small>Jenis Kelamin</small>

                                <strong>
                                    {{ $guru->jenis_kelamin ?: '-' }}
                                </strong>
                            </div>

                        </div>


                        {{-- MATA PELAJARAN --}}
                        <div class="guru-info-item">

                            <div class="guru-info-icon">
                                <i class="bi bi-book-fill"></i>
                            </div>

                            <div>
                                <small>Mata Pelajaran</small>

                                <strong>
                                    {{ $guru->mapel ?: '-' }}
                                </strong>
                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- FOOTER --}}
            <div class="detail-footer">

                {{-- LIHAT SEMUA GURU --}}
                <a href="{{ route('guru.public') }}"
                   class="btn-detail-back">

                    <i class="bi bi-people-fill"></i>

                    Lihat Semua Guru

                </a>


                {{-- KEMBALI --}}
                <a href="{{ url('/') }}"
                   class="btn-detail-back">

                    <i class="bi bi-arrow-left"></i>

                    Kembali ke Beranda

                </a>

            </div>

        </div>

    </div>

</section>

<br>
<br>

@endsection
