@extends('layouts.admin')

@section('title', 'Edit Data Guru')

@section('content')

<div class="page-heading">

    <div class="page-title">
        <div class="row">

            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Data Guru</h3>
                <p class="text-subtitle text-muted">
                    Ubah data guru
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
                            <a href="{{ route('admin.guru.index') }}">
                                Data Guru
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


    <section class="section">

        <div class="card">

            <div class="card-header">
                <h4 class="card-title">
                    Edit Data Guru
                </h4>
            </div>

            <div class="card-body">

                <form action="{{ route('admin.guru.update', $guru->id_guru) }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="row">

                        {{-- NIP --}}
                        <div class="col-md-6 mb-3">

                            <label for="nip" class="form-label">
                                NIP
                            </label>

                            <input type="text"
                                   id="nip"
                                   name="nip"
                                   class="form-control"
                                   value="{{ old('nip', $guru->nip) }}"
                                   required>

                        </div>


                        {{-- NAMA GURU --}}
                        <div class="col-md-6 mb-3">

                            <label for="nama_guru" class="form-label">
                                Nama Guru
                            </label>

                            <input type="text"
                                   id="nama_guru"
                                   name="nama_guru"
                                   class="form-control"
                                   value="{{ old('nama_guru', $guru->nama_guru) }}"
                                   required>

                        </div>


                        {{-- JENIS KELAMIN --}}
                        <div class="col-md-6 mb-3">

                            <label for="jenis_kelamin" class="form-label">
                                Jenis Kelamin
                            </label>

                            <select name="jenis_kelamin"
                                    id="jenis_kelamin"
                                    class="form-select"
                                    required>

                                <option value="">
                                    -- Pilih Jenis Kelamin --
                                </option>

                                <option value="Laki-laki"
                                    {{ old('jenis_kelamin', $guru->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>
                                    Laki-Laki
                                </option>

                                <option value="Perempuan"
                                    {{ old('jenis_kelamin', $guru->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
                                    Perempuan
                                </option>

                            </select>

                        </div>


                        {{-- MAPEL --}}
                        <div class="col-md-6 mb-3">

                            <label for="mapel" class="form-label">
                                Mata Pelajaran
                            </label>

                            <input type="text"
                                   id="mapel"
                                   name="mapel"
                                   class="form-control"
                                   value="{{ old('mapel', $guru->mapel) }}"
                                   required>

                        </div>


                        {{-- FOTO --}}
                        <div class="col-md-12 mb-3">

                            <label for="foto" class="form-label">
                                Foto Guru
                            </label>

                            {{-- FOTO LAMA --}}
                            @if($guru->foto)

                                <div class="mb-3">

                                    <p class="mb-2 text-muted">
                                        Foto saat ini:
                                    </p>

                                    <img
                                        src="{{ asset('storage/' . $guru->foto) }}"
                                        alt="Foto {{ $guru->nama_guru }}"
                                        width="120"
                                        height="120"
                                        style="
                                            object-fit: cover;
                                            border-radius: 10px;
                                            border: 1px solid #ddd;
                                        "
                                    >

                                </div>

                            @endif


                            {{-- PILIH FOTO BARU --}}
                            <input type="file"
                                   id="foto"
                                   name="foto"
                                   class="form-control"
                                   accept=".jpg,.jpeg,.png">

                            <small class="text-muted">
                                Pilih foto baru jika ingin mengganti foto.
                                Format JPG, JPEG, PNG. Maksimal 2 MB.
                            </small>

                        </div>

                    </div>


                    {{-- BUTTON --}}
                    <div class="mt-3">

                        <button type="submit"
                                class="btn btn-primary">

                            <i class="bi bi-save"></i>
                            Simpan Perubahan

                        </button>

                        <a href="{{ route('admin.guru.index') }}"
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