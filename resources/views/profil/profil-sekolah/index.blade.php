@extends('layouts.admin')

@section('title', 'Profil Sekolah')

@section('content')

<div class="page-heading">

    <div class="page-title">
        <div class="row">

            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Profil Sekolah</h3>

                <p class="text-subtitle text-muted">
                    Informasi profil sekolah
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


    {{-- Pesan sukses --}}
    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif


    <section class="section">

        <div class="card">

            <div class="card-header d-flex justify-content-between align-items-center">

                <h4 class="card-title">
                    Data Profil Sekolah
                </h4>

                <a href="{{ route('profil.profil-sekolah.edit') }}"
                   class="btn btn-primary">

                    <i class="bi bi-pencil-square"></i>
                    Edit Profil

                </a>

            </div>


            <div class="card-body">

                @if($profil)

                    <div class="row">

                        <div class="col-md-6">

                            <div class="mb-3">

                                <strong>Nama Sekolah</strong>

                                <p class="text-muted">
                                    {{ $profil->nama_sekolah }}
                                </p>

                            </div>


                            <div class="mb-3">

                                <strong>Kepala Sekolah</strong>

                                <p class="text-muted">
                                    {{ $profil->kepala_sekolah }}
                                </p>

                            </div>


                            <div class="mb-3">

                                <strong>NPSN</strong>

                                <p class="text-muted">
                                    {{ $profil->npsn }}
                                </p>

                            </div>


                            <div class="mb-3">

                                <strong>Tahun Berdiri</strong>

                                <p class="text-muted">
                                    {{ $profil->tahun_berdiri }}
                                </p>

                            </div>

                        </div>


                        <div class="col-md-6">

                            <div class="mb-3">

                                <strong>Alamat</strong>

                                <p class="text-muted">
                                    {{ $profil->alamat }}
                                </p>

                            </div>


                            <div class="mb-3">

                                <strong>Kontak</strong>

                                <p class="text-muted">
                                    {{ $profil->kontak }}
                                </p>

                            </div>


                            <div class="mb-3">

                                <strong>Deskripsi</strong>

                                <p class="text-muted">
                                    {{ $profil->deskripsi }}
                                </p>

                            </div>

                        </div>

                    </div>


                    <hr>


                    <h5 class="mb-3">
                        Visi dan Misi
                    </h5>

                    <div class="border rounded p-3">

                        {!! nl2br(e($profil->visi_misi)) !!}

                    </div>

                @else

                    <div class="text-center py-5">

                        <i class="bi bi-building fs-1 text-muted"></i>

                        <h5 class="mt-3">
                            Data profil sekolah belum tersedia
                        </h5>

                        <p class="text-muted">
                            Silakan tambahkan data profil sekolah.
                        </p>

                        <a href="{{ route('profil.profil-sekolah.edit') }}"
                           class="btn btn-primary">

                            <i class="bi bi-plus-circle"></i>
                            Tambah Profil Sekolah

                        </a>

                    </div>

                @endif

            </div>

        </div>

    </section>

</div>

@endsection