@extends('layouts.admin')

@section('title', 'Tambah Prestasi')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold mb-1">
                Tambah Prestasi
            </h3>

            <p class="text-muted mb-0">
                Tambahkan data prestasi sekolah
            </p>
        </div>

        <a href="{{ route('admin.prestasi.index') }}"
           class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i>
            Kembali
        </a>

    </div>

    {{-- Validation Error --}}
    @if($errors->any())

        <div class="alert alert-danger">

            <strong>
                Terdapat kesalahan:
            </strong>

            <ul class="mb-0 mt-2">

                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>

    @endif

    {{-- Form --}}
    <div class="card shadow-sm">

        <div class="card-header bg-white">
            <h5 class="fw-bold mb-0">
                Form Prestasi
            </h5>
        </div>

        <div class="card-body">

            <form action="{{ route('admin.prestasi.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                {{-- Nama Prestasi --}}
                <div class="mb-3">

                    <label for="nama_prestasi"
                           class="form-label fw-semibold">
                        Nama Prestasi
                    </label>

                    <input type="text"
                           name="nama_prestasi"
                           id="nama_prestasi"
                           class="form-control @error('nama_prestasi') is-invalid @enderror"
                           value="{{ old('nama_prestasi') }}"
                           placeholder="Contoh: Juara 1 Lomba Web Design">

                    @error('nama_prestasi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                {{-- Deskripsi --}}
                <div class="mb-3">

                    <label for="deskripsi"
                           class="form-label fw-semibold">
                        Deskripsi
                    </label>

                    <textarea name="deskripsi"
                              id="deskripsi"
                              rows="6"
                              class="form-control @error('deskripsi') is-invalid @enderror"
                              placeholder="Masukkan deskripsi prestasi">{{ old('deskripsi') }}</textarea>

                    @error('deskripsi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                {{-- Foto --}}
                <div class="mb-3">

                    <label for="foto"
                           class="form-label fw-semibold">
                        Foto Prestasi
                    </label>

                    <input type="file"
                           name="foto"
                           id="foto"
                           class="form-control @error('foto') is-invalid @enderror"
                           accept="image/jpeg,image/png,image/jpg,image/webp">

                    <small class="text-muted">
                        Format JPG, JPEG, PNG, WEBP. Maksimal 2 MB.
                    </small>

                    @error('foto')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                {{-- Tahun Ajaran --}}
                <div class="mb-4">

                    <label for="tahun_ajaran"
                           class="form-label fw-semibold">
                        Tahun Ajaran
                    </label>

                    <input type="text"
                           name="tahun_ajaran"
                           id="tahun_ajaran"
                           class="form-control @error('tahun_ajaran') is-invalid @enderror"
                           value="{{ old('tahun_ajaran') }}"
                           placeholder="Contoh: 2025/2026">

                    @error('tahun_ajaran')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                {{-- Button --}}
                <div class="d-flex gap-2">

                    <a href="{{ route('admin.prestasi.index') }}"
                       class="btn btn-secondary">
                        Batal
                    </a>

                    <button type="submit"
                            class="btn btn-primary">
                        <i class="bi bi-save"></i>
                        Simpan
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
