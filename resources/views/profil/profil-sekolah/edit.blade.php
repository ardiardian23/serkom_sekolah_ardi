@extends('layouts.admin')

@section('title', 'Edit Profil Sekolah')

@section('content')

<div class="page-heading">

    <div class="page-title">

        <div class="row">

            <div class="col-12 col-md-6 order-md-1 order-last">

                <h3>Edit Profil Sekolah</h3>

                <p class="text-subtitle text-muted">
                    Kelola informasi profil sekolah
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

                        <li class="breadcrumb-item">
                            <a href="{{ route('profil.profil-sekolah.index') }}">
                                Profil Sekolah
                            </a>
                        </li>

                        <li class="breadcrumb-item active">
                            Edit
                        </li>

                    </ol>

                </nav>

            </div>

        </div>

    </div>


    {{-- ERROR --}}

    @if($errors->any())

        <div class="alert alert-danger">

            <strong>Periksa data berikut:</strong>

            <ul class="mb-0 mt-2">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <section class="section">

        <div class="card">

            <div class="card-header">

                <h4 class="card-title">
                    Form Profil Sekolah
                </h4>

            </div>

            <div class="card-body">

                <form action="{{ route('profil.profil-sekolah.update') }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf

                    @method('PUT')


                    {{-- NAMA SEKOLAH --}}

                    <div class="mb-3">

                        <label class="form-label">
                            Nama Sekolah
                        </label>

                        <input type="text"
                               name="nama_sekolah"
                               class="form-control"
                               value="{{ old('nama_sekolah', $profil->nama_sekolah ?? '') }}"
                               required>

                    </div>


                    {{-- KEPALA SEKOLAH --}}

                    <div class="mb-3">

                        <label class="form-label">
                            Kepala Sekolah
                        </label>

                        <input type="text"
                               name="kepala_sekolah"
                               class="form-control"
                               value="{{ old('kepala_sekolah', $profil->kepala_sekolah ?? '') }}"
                               required>

                    </div>


                    {{-- NPSN --}}

                    <div class="mb-3">

                        <label class="form-label">
                            NPSN
                        </label>

                        <input type="text"
                               name="npsn"
                               class="form-control"
                               value="{{ old('npsn', $profil->npsn ?? '') }}"
                               required>

                    </div>


                    {{-- ALAMAT --}}

                    <div class="mb-3">

                        <label class="form-label">
                            Alamat
                        </label>

                        <textarea name="alamat"
                                  class="form-control"
                                  rows="3"
                                  required>{{ old('alamat', $profil->alamat ?? '') }}</textarea>

                    </div>


                    {{-- KONTAK --}}

                    <div class="mb-3">

                        <label class="form-label">
                            Kontak
                        </label>

                        <input type="text"
                               name="kontak"
                               class="form-control"
                               value="{{ old('kontak', $profil->kontak ?? '') }}"
                               required>

                    </div>


                    {{-- TAHUN BERDIRI --}}

                    <div class="mb-3">

                        <label class="form-label">
                            Tahun Berdiri
                        </label>

                        <input type="number"
                               name="tahun_berdiri"
                               class="form-control"
                               value="{{ old('tahun_berdiri', $profil->tahun_berdiri ?? '') }}"
                               required>

                    </div>


                    {{-- DESKRIPSI --}}

                    <div class="mb-3">

                        <label class="form-label">
                            Deskripsi
                        </label>

                        <textarea name="deskripsi"
                                  class="form-control"
                                  rows="4"
                                  required>{{ old('deskripsi', $profil->deskripsi ?? '') }}</textarea>

                    </div>


                    {{-- VISI MISI --}}

                    <div class="mb-3">

                        <label class="form-label">
                            Visi & Misi
                        </label>

                        <textarea name="visi_misi"
                                  class="form-control"
                                  rows="5"
                                  required>{{ old('visi_misi', $profil->visi_misi ?? '') }}</textarea>

                    </div>


                    {{-- FOTO SEKOLAH --}}

                    <div class="mb-4">

                        <label class="form-label">
                            Foto Sekolah
                        </label>

                        @if(!empty($profil?->foto))

                            <div class="mb-3">
                                <label class="form-label">Foto Sekolah</label>
                                <input type="file"
                                    name="foto"
                                    class="form-control"
                                    accept="image/*">
                            </div>

                        @endif

                        <input type="file"
                               name="foto"
                               class="form-control"
                               accept=".jpg,.jpeg,.png">

                        <small class="text-muted">
                            Pilih foto sekolah. Maksimal 2 MB.
                        </small>

                    </div>


                    {{-- LOGO SEKOLAH --}}

                    <div class="mb-4">

                        <label class="form-label">
                            Logo Sekolah
                        </label>

                        @if(!empty($profil?->logo))

                            <div class="mb-3">
                            <label class="form-label">Logo Sekolah</label>
                            <input type="file"
                                name="logo"
                                class="form-control"
                                accept="image/*">
                        </div>

                        @endif

                        <input type="file"
                               name="logo"
                               class="form-control"
                               accept=".jpg,.jpeg,.png">

                        <small class="text-muted">
                            Pilih logo sekolah. Maksimal 2 MB.
                        </small>

                    </div>


                    {{-- BUTTON --}}

                    <div class="mt-4">

                        <button type="submit"
                                class="btn btn-primary">

                            <i class="bi bi-save"></i>
                            Simpan

                        </button>

                        <a href="{{ route('profil.profil-sekolah.index') }}"
                           class="btn btn-secondary">

                            <i class="bi bi-arrow-left"></i>
                            Kembali

                        </a>

                    </div>

                </form>

            </div>

        </div>

    </section>

</div>

@endsection