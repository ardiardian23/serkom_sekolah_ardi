@extends('layouts.admin')

@section('title', 'Data Guru')

@section('content')

<div class="page-heading">

    <div class="page-title">

        <div class="row">

            <div class="col-12 col-md-6 order-md-1 order-last">

                <h3>Data Guru</h3>

                <p class="text-subtitle text-muted">
                    Kelola data guru sekolah
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
                            Data Guru
                        </li>

                    </ol>

                </nav>

            </div>

        </div>

    </div>


    {{-- SUCCESS --}}
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show"
             role="alert">

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    {{-- ERROR --}}
    @if($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- FORM INPUT --}}
    <section class="section">

        <div class="card">

            <div class="card-header">

                <h4 class="card-title">
                    Input Data Guru
                </h4>

            </div>


            <div class="card-body">

                <form action="{{ route('admin.guru.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="row">

                        {{-- NIP --}}
                        <div class="col-md-6">

                            <div class="form-group mb-3">

                                <label for="nip">
                                    NIP
                                </label>

                                <input
                                    type="text"
                                    id="nip"
                                    name="nip"
                                    class="form-control"
                                    value="{{ old('nip') }}"
                                    placeholder="Masukkan NIP"
                                    maxlength="30"
                                    required>

                            </div>

                        </div>


                        {{-- NAMA --}}
                        <div class="col-md-6">

                            <div class="form-group mb-3">

                                <label for="nama_guru">
                                    Nama Guru
                                </label>

                                <input
                                    type="text"
                                    id="nama_guru"
                                    name="nama_guru"
                                    class="form-control"
                                    value="{{ old('nama_guru') }}"
                                    placeholder="Masukkan nama guru"
                                    maxlength="40"
                                    required>

                            </div>

                        </div>


                        {{-- JENIS KELAMIN --}}
                        <div class="col-md-6">

                            <div class="form-group mb-3">

                                <label for="jenis_kelamin">
                                    Jenis Kelamin
                                </label>

                                <select
                                    id="jenis_kelamin"
                                    name="jenis_kelamin"
                                    class="form-select"
                                    required>

                                    <option value="">
                                        -- Pilih Jenis Kelamin --
                                    </option>

                                    <option
                                        value="Laki-Laki"
                                        {{ old('jenis_kelamin') == 'Laki-Laki' ? 'selected' : '' }}>
                                        Laki-Laki
                                    </option>

                                    <option
                                        value="Perempuan"
                                        {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                                        Perempuan
                                    </option>

                                </select>

                            </div>

                        </div>


                        {{-- MATA PELAJARAN --}}
                        <div class="col-md-6">

                            <div class="form-group mb-3">

                                <label for="mata_pelajaran">
                                    Mata Pelajaran
                                </label>

                                <input
                                    type="text"
                                    id="mapel"
                                    name="mapel"
                                    class="form-control"
                                    value="{{ old('mata_pelajaran') }}"
                                    placeholder="Contoh: Matematika"
                                    maxlength="50"
                                    required>

                            </div>

                        </div>

                        <div class="mb-3">
                            <label class="form-label">Foto Guru</label>
                            <input
                                type="file"
                                name="foto"
                                class="form-control"
                                accept="image/*"
                            >
                            <small class="text-muted">
                                Format JPG, JPEG, PNG. Maksimal 2 MB.
                            </small>
                        </div>

                    </div>


                    <div class="mt-3">

                        <button
                            type="submit"
                            class="btn btn-primary">

                            <i class="bi bi-save"></i>
                            Simpan Data

                        </button>

                        <button
                            type="reset"
                            class="btn btn-light-secondary">

                            Reset

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </section>


    {{-- TABEL DATA --}}
    <section class="section">

        <div class="card">

            <div class="card-header">

                <h4 class="card-title">
                    Data Guru
                </h4>

            </div>


            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-striped">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIP</th>
                                <th>Nama Guru</th>
                                <th>Jenis Kelamin</th>
                                <th>Mata Pelajaran</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>


                        <tbody>
                            @forelse($gurus as $guru)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    <td>{{ $guru->nip }}</td>

                                    <td>{{ $guru->nama_guru }}</td>

                                    <td>{{ $guru->jenis_kelamin ?? '-' }}</td>

                                    <td>{{ $guru->mapel ?? '-' }}</td>

                                    <td>
                                    @if($guru->foto)
                                        <img
                                            src="{{ asset('storage/' . $guru->foto) }}"
                                            alt="Foto {{ $guru->nama_guru }}"
                                            width="70"
                                            height="70"
                                            style="object-fit: cover; border-radius: 8px;"
                                        >
                                    @else
                                        <span class="text-muted">Tidak ada foto</span>
                                    @endif
</td>

                                    <td>
                                        <a href="{{ route('admin.guru.edit', $guru->id_guru) }}"
                                        class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-square"></i>
                                            Edit
                                        </a>

                                        <form action="{{ route('admin.guru.destroy', $guru->id_guru) }}"
                                            method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin ingin menghapus data guru ini?')">
                                                <i class="bi bi-trash"></i>
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">
                                        Belum ada data guru.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </section>

</div>

@endsection