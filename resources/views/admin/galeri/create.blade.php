@extends('layouts.admin')

@section('title', 'Tambah Galeri')

@section('content')

<div class="page-heading">

    <div class="page-title">

        <div class="row">

            <div class="col-12 col-md-6 order-md-1 order-last">

                <h3>Tambah Galeri</h3>

                <p class="text-subtitle text-muted">
                    Tambahkan foto atau video galeri sekolah
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
                            <a href="{{ route('admin.galeri.index') }}">
                                Galeri
                            </a>
                        </li>

                        <li class="breadcrumb-item active">
                            Tambah
                        </li>

                    </ol>

                </nav>

            </div>

        </div>

    </div>


    {{-- ERROR --}}

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
                    Form Tambah Galeri
                </h4>

            </div>

            <div class="card-body">

                <form action="{{ route('admin.galeri.store') }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf


                    {{-- JUDUL --}}

                    <div class="mb-3">

                        <label class="form-label">
                            Judul
                        </label>

                        <input type="text"
                               name="judul"
                               class="form-control @error('judul') is-invalid @enderror"
                               value="{{ old('judul') }}"
                               maxlength="50"
                               placeholder="Masukkan judul galeri"
                               required>

                        @error('judul')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- KETERANGAN --}}

                    <div class="mb-3">

                        <label class="form-label">
                            Keterangan
                        </label>

                        <textarea name="keterangan"
                                  class="form-control @error('keterangan') is-invalid @enderror"
                                  rows="5"
                                  placeholder="Masukkan keterangan galeri"
                                  required>{{ old('keterangan') }}</textarea>

                        @error('keterangan')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- KATEGORI --}}

                    <div class="mb-3">

                        <label class="form-label">
                            Kategori
                        </label>

                        <select name="kategori"
                                class="form-select @error('kategori') is-invalid @enderror"
                                required>

                            <option value="">
                                -- Pilih Kategori --
                            </option>

                            <option value="Foto"
                                {{ old('kategori') == 'Foto' ? 'selected' : '' }}>
                                Foto
                            </option>

                            <option value="Video"
                                {{ old('kategori') == 'Video' ? 'selected' : '' }}>
                                Video
                            </option>

                        </select>

                        @error('kategori')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- FILE --}}

                    <div class="mb-3">

                        <label class="form-label">
                            File
                        </label>

                        <input type="file"
                               name="file"
                               class="form-control @error('file') is-invalid @enderror"
                               accept="image/jpeg,image/png,image/jpg"
                               required>

                        <small class="text-muted">
                            Format JPG, JPEG, PNG. Maksimal 2 MB.
                        </small>

                        @error('file')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- TANGGAL --}}

                    <div class="mb-3">

                        <label class="form-label">
                            Tanggal
                        </label>

                        <input type="date"
                               name="tanggal"
                               class="form-control @error('tanggal') is-invalid @enderror"
                               value="{{ old('tanggal', date('Y-m-d')) }}"
                               required>

                        @error('tanggal')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- BUTTON --}}

                    <div class="mt-4">

                        <button type="submit"
                                class="btn btn-primary">

                            <i class="bi bi-save"></i>
                            Simpan

                        </button>


                        <a href="{{ route('admin.galeri.index') }}"
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