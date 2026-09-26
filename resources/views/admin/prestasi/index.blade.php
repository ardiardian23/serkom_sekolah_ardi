@extends('layouts.admin')

@section('title', 'Tambah Prestasi')

@section('content')

<div class="page-heading">

    <h3>Tambah Prestasi</h3>

    <p class="text-subtitle text-muted">
        Tambahkan data prestasi sekolah
    </p>

</div>

<div class="page-content">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

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
                <h4 class="card-title">Form Tambah Prestasi</h4>
            </div>

            <div class="card-body">

                <form action="{{ route('admin.prestasi.store') }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf

                    {{-- Nama Prestasi --}}
                    <div class="mb-3">
                        <label class="form-label">
                            Nama Prestasi
                        </label>

                        <input type="text"
                               name="nama_prestasi"
                               class="form-control"
                               value="{{ old('nama_prestasi') }}"
                               placeholder="Contoh: Juara 1 Lomba Cerdas Cermat"
                               required>
                    </div>

                    {{-- Deskripsi --}}
                    <div class="mb-3">
                        <label class="form-label">
                            Deskripsi
                        </label>

                        <textarea name="deskripsi"
                                  class="form-control"
                                  rows="4"
                                  placeholder="Masukkan deskripsi prestasi"
                                  required>{{ old('deskripsi') }}</textarea>
                    </div>

                    {{-- Foto --}}
                    <div class="mb-3">
                        <label class="form-label">
                            Foto Prestasi
                        </label>

                        <input type="file"
                               name="foto"
                               class="form-control"
                               accept="image/*">

                        <small class="text-muted">
                            Format JPG, JPEG, PNG. Maksimal 2 MB.
                        </small>
                    </div>

                    {{-- Tahun Ajaran --}}
                    <div class="mb-3">
                        <label class="form-label">
                            Tahun Ajaran
                        </label>

                        <input type="text"
                               name="tahun_ajaran"
                               class="form-control"
                               value="{{ old('tahun_ajaran') }}"
                               placeholder="Contoh: 2025/2026"
                               required>
                    </div>

                    <div class="d-flex gap-2">

                        <button type="submit"
                                class="btn btn-primary">

                            <i class="bi bi-save"></i>
                            Simpan

                        </button>

                        <a href="{{ route('admin.prestasi.index') }}"
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