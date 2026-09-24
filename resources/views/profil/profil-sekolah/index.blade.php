@extends('layouts.admin')

@section('title', 'Profil Sekolah')

@section('content')

<div class="page-heading">

    <div class="page-title">

        <div class="row">

            <div class="col-12 col-md-6 order-md-1 order-last">

                <h3>Profil Sekolah</h3>

                <p class="text-subtitle text-muted">
                    Informasi sekolah
                </p>

            </div>

            <div class="col-12 col-md-6 order-md-2 order-first">

                <nav aria-label="breadcrumb"
                     class="breadcrumb-header float-start float-lg-end">

                    <ol class="breadcrumb">

                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.index') }}">
                                Dashboard
                            </a>
                        </li>

                        <li class="breadcrumb-item active">
                            Profil Sekolah
                        </li>

                    </ol>

                </nav>

            </div>

        </div>

    </div>


    {{-- SUCCESS --}}

    @if(session('success'))

        <div class="alert alert-success">

            <i class="bi bi-check-circle"></i>

            {{ session('success') }}

        </div>

    @endif


    <section class="section">

        <div class="card">

            <div class="card-header d-flex justify-content-between align-items-center">

                <h4 class="card-title mb-0">
                    Data Profil Sekolah
                </h4>

                <a href="{{ route('profil.profil-sekolah.edit') }}"
                   class="btn btn-warning">

                    <i class="bi bi-pencil-square"></i>
                    Edit

                </a>

            </div>


            <div class="card-body">

                @if($profil)

                    {{-- FOTO DAN LOGO --}}

                    <div class="row mb-4">

                        {{-- FOTO SEKOLAH --}}

                        <div class="col-md-6 text-center">

                            <h6 class="mb-3">
                                Foto Sekolah
                            </h6>

                            @if($profil->foto)

                                <img src="{{ asset('storage/' . $profil->foto) }}"
                                     alt="Foto Sekolah"
                                     width="250"
                                     height="170"
                                     style="
                                        object-fit: cover;
                                        border-radius: 10px;
                                        border: 1px solid #ddd;
                                     ">

                            @else

                                <p class="text-muted">
                                    Foto belum tersedia
                                </p>

                            @endif

                        </div>


                        {{-- LOGO SEKOLAH --}}

                        <div class="col-md-6 text-center">

                            <h6 class="mb-3">
                                Logo Sekolah
                            </h6>

                            @if($profil->logo)

                                <img src="{{ asset('storage/' . $profil->logo) }}"
                                     alt="Logo Sekolah"
                                     width="170"
                                     height="170"
                                     style="
                                        object-fit: contain;
                                        border-radius: 10px;
                                        border: 1px solid #ddd;
                                        padding: 5px;
                                     ">

                            @else

                                <p class="text-muted">
                                    Logo belum tersedia
                                </p>

                            @endif

                        </div>

                    </div>


                    <hr>


                    {{-- DATA --}}

                    <div class="row mt-4">

                        <div class="col-md-6">

                            <div class="mb-4">

                                <h6>Nama Sekolah</h6>

                                <p>
                                    {{ $profil->nama_sekolah }}
                                </p>

                            </div>


                            <div class="mb-4">

                                <h6>Kepala Sekolah</h6>

                                <p>
                                    {{ $profil->kepala_sekolah }}
                                </p>

                            </div>


                            <div class="mb-4">

                                <h6>NPSN</h6>

                                <p>
                                    {{ $profil->npsn }}
                                </p>

                            </div>


                            <div class="mb-4">

                                <h6>Tahun Berdiri</h6>

                                <p>
                                    {{ $profil->tahun_berdiri }}
                                </p>

                            </div>

                        </div>


                        <div class="col-md-6">

                            <div class="mb-4">

                                <h6>Alamat</h6>

                                <p>
                                    {{ $profil->alamat }}
                                </p>

                            </div>


                            <div class="mb-4">

                                <h6>Kontak</h6>

                                <p>
                                    {{ $profil->kontak }}
                                </p>

                            </div>


                            <div class="mb-4">

                                <h6>Deskripsi</h6>

                                <p>
                                    {{ $profil->deskripsi }}
                                </p>

                            </div>

                        </div>

                    </div>


                    <hr>


                    {{-- VISI MISI --}}

                    <div class="mt-4">

                        <h5>
                            Visi & Misi
                        </h5>

                        <div class="border rounded p-3 mt-3">

                            {!! nl2br(e($profil->visi_misi)) !!}

                        </div>

                    </div>

                @else

                    <div class="text-center py-5">

                        <h5>
                            Data profil sekolah belum tersedia
                        </h5>

                        <p class="text-muted">
                            Silakan isi data profil sekolah.
                        </p>

                        <a href="{{ route('profil.profil-sekolah.edit') }}"
                           class="btn btn-primary">

                            <i class="bi bi-plus-circle"></i>
                            Isi Profil Sekolah

                        </a>

                    </div>

                @endif

            </div>

        </div>

    </section>

</div>

@endsection