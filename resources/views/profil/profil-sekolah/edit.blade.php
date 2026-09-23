@extends('layouts.admin')

@section('title', 'Edit Profil Sekolah')

@section('content')

<div class="page-heading">

    <div class="page-title">

        <div class="row">

            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Profil Sekolah</h3>
                <p class="text-subtitle text-muted">
                    Perbarui informasi profil sekolah
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


    {{-- Error --}}
    @if($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

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
                      method="POST">

                    @csrf
                    @method('PUT')


                    {{-- Nama Sekolah --}}
                    <div class="mb-3">

                        <label for="nama_sekolah"
                               class="form-label">
                            Nama Sekolah
                        </label>

                        <input type="text"
                               name="nama_sekolah"
                               id="nama_sekolah"
                               class="form-control @error('nama_sekolah') is-invalid @enderror"
                               value="{{ old('nama_sekolah', $profil->nama_sekolah ?? '') }}"
                               placeholder="Masukkan nama sekolah">

                        @error('nama_sekolah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- Kepala Sekolah --}}
                    <div class="mb-3">

                        <label for="kepala_sekolah"
                               class="form-label">
                            Kepala Sekolah
                        </label>

                        <input type="text"
                               name="kepala_sekolah"
                               id="kepala_sekolah"
                               class="form-control @error('kepala_sekolah') is-invalid @enderror"
                               value="{{ old('kepala_sekolah', $profil->kepala_sekolah ?? '') }}"
                               placeholder="Masukkan nama kepala sekolah">

                        @error('kepala_sekolah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- NPSN --}}
                    <div class="mb-3">

                        <label for="npsn"
                               class="form-label">
                            NPSN
                        </label>

                        <input type="text"
                               name="npsn"
                               id="npsn"
                               class="form-control @error('npsn') is-invalid @enderror"
                               value="{{ old('npsn', $profil->npsn ?? '') }}"
                               placeholder="Masukkan NPSN">

                        @error('npsn')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- Tahun Berdiri --}}
                    <div class="mb-3">

                        <label for="tahun_berdiri"
                               class="form-label">
                            Tahun Berdiri
                        </label>

                        <input type="number"
                               name="tahun_berdiri"
                               id="tahun_berdiri"
                               class="form-control @error('tahun_berdiri') is-invalid @enderror"
                               value="{{ old('tahun_berdiri', $profil->tahun_berdiri ?? '') }}"
                               placeholder="Contoh: 2005">

                        @error('tahun_berdiri')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- Alamat --}}
                    <div class="mb-3">

                        <label for="alamat"
                               class="form-label">
                            Alamat Sekolah
                        </label>

                        <textarea name="alamat"
                                  id="alamat"
                                  rows="3"
                                  class="form-control @error('alamat') is-invalid @enderror"
                                  placeholder="Masukkan alamat sekolah">{{ old('alamat', $profil->alamat ?? '') }}</textarea>

                        @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- Kontak --}}
                    <div class="mb-3">

                        <label for="kontak"
                               class="form-label">
                            Kontak
                        </label>

                        <input type="text"
                               name="kontak"
                               id="kontak"
                               class="form-control @error('kontak') is-invalid @enderror"
                               value="{{ old('kontak', $profil->kontak ?? '') }}"
                               placeholder="Contoh: 081234567890">

                        @error('kontak')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- Deskripsi --}}
                    <div class="mb-3">

                        <label for="deskripsi"
                               class="form-label">
                            Deskripsi Sekolah
                        </label>

                        <textarea name="deskripsi"
                                  id="deskripsi"
                                  rows="5"
                                  class="form-control"
                                  placeholder="Masukkan deskripsi sekolah">{{ old('deskripsi', $profil->deskripsi ?? '') }}</textarea>

                    </div>


                    {{-- VISI --}}
                    <div class="mb-3">

                        <label for="visi_misi"
                               class="form-label">
                            Visi dan Misi
                        </label>

                        <textarea name="visi_misi"
                                  id="visi_misi"
                                  rows="10"
                                  class="form-control"
                                  placeholder="Masukkan visi dan misi sekolah">{{ old('visi_misi', $profil->visi_misi ?? '') }}</textarea>

                        <small class="text-muted">
                            Pisahkan visi dan misi menggunakan baris baru.
                        </small>

                    </div>


                    {{-- Foto --}}
                    <div class="mb-3">

                        <label for="foto"
                               class="form-label">
                            Foto Sekolah
                        </label>

                        <input type="text"
                               name="foto"
                               id="foto"
                               class="form-control"
                               value="{{ old('foto', $profil->foto ?? '') }}"
                               placeholder="Nama file foto">

                    </div>


                    {{-- Logo --}}
                    <div class="mb-3">

                        <label for="logo"
                               class="form-label">
                            Logo Sekolah
                        </label>

                        <input type="text"
                               name="logo"
                               id="logo"
                               class="form-control"
                               value="{{ old('logo', $profil->logo ?? '') }}"
                               placeholder="Nama file logo">

                    </div>


                    {{-- Tombol --}}
                    <div class="d-flex gap-2">

                        <button type="submit"
                                class="btn btn-primary">

                            <i class="bi bi-save"></i>
                            Simpan

                        </button>

                        <a href="{{ route('profil.profil-sekolah.index') }}"
                           class="btn btn-light-secondary">

                            Kembali

                        </a>

                    </div>

                </form>

            </div>

        </div>

    </section>

</div>

@endsection