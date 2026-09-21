@extends('layouts.admin')

@section('title', 'Data Siswa')

@section('content')

<div class="page-heading">

    {{-- Judul halaman --}}
    <div class="page-title">
        <div class="row">

            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Siswa</h3>

                <p class="text-subtitle text-muted">
                    Kelola data siswa sekolah
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
                            Data Siswa
                        </li>

                    </ol>

                </nav>

            </div>

        </div>
    </div>


    {{-- Pesan berhasil --}}
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


    {{-- Pesan error --}}
    @if($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- ================= INPUT DATA ================= --}}
    <section class="section">

        <div class="card">

            <div class="card-header">

                <h4 class="card-title">
                    Input Data Siswa
                </h4>

            </div>

            <div class="card-body">

                <form action="{{ route('admin.siswa.store') }}"
                      method="POST">

                    @csrf

                    <div class="row">

                        {{-- NISN --}}
                        <div class="col-md-6">

                            <div class="form-group mb-3">

                                <label for="nisn">
                                    NISN
                                </label>

                                <input
                                    type="text"
                                    id="nisn"
                                    name="nisn"
                                    class="form-control"
                                    value="{{ old('nisn') }}"
                                    placeholder="Masukkan NISN"
                                    maxlength="10"
                                    required
                                >

                            </div>

                        </div>


                        {{-- Nama --}}
                        <div class="col-md-6">

                            <div class="form-group mb-3">

                                <label for="nama_siswa">
                                    Nama Siswa
                                </label>

                                <input
                                    type="text"
                                    id="nama_siswa"
                                    name="nama_siswa"
                                    class="form-control"
                                    value="{{ old('nama_siswa') }}"
                                    placeholder="Masukkan nama siswa"
                                    maxlength="40"
                                    required
                                >

                            </div>

                        </div>


                        {{-- Jenis Kelamin --}}
                        <div class="col-md-6">

                            <div class="form-group mb-3">

                                <label for="jenis_kelamin">
                                    Jenis Kelamin
                                </label>

                                <select
                                    id="jenis_kelamin"
                                    name="jenis_kelamin"
                                    class="form-select"
                                    required
                                >

                                    <option value="">
                                        -- Pilih Jenis Kelamin --
                                    </option>

                                    <option value="Laki-Laki"
                                        {{ old('jenis_kelamin') == 'Laki-Laki' ? 'selected' : '' }}>
                                        Laki-Laki
                                    </option>

                                    <option value="Perempuan"
                                        {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                                        Perempuan
                                    </option>

                                </select>

                            </div>

                        </div>


                        {{-- Tahun Masuk --}}
                        <div class="col-md-6">

                            <div class="form-group mb-3">

                                <label for="tahun_masuk">
                                    Tahun Masuk
                                </label>

                                <input
                                    type="number"
                                    id="tahun_masuk"
                                    name="tahun_masuk"
                                    class="form-control"
                                    value="{{ old('tahun_masuk') }}"
                                    placeholder="Contoh: 2026"
                                    min="1900"
                                    max="2100"
                                    required
                                >

                            </div>

                        </div>

                    </div>


                    <div class="mt-3">

                        <button type="submit"
                                class="btn btn-primary">

                            <i class="bi bi-save"></i>
                            Simpan Data

                        </button>

                        <button type="reset"
                                class="btn btn-light-secondary">

                            Reset

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </section>


    {{-- ================= DATA SISWA ================= --}}
    <section class="section">

        <div class="card">

            <div class="card-header">

                <h4 class="card-title">
                    Data Siswa
                </h4>

            </div>

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-striped">

                        <thead>

                            <tr>

                                <th>No</th>
                                <th>NISN</th>
                                <th>Nama Siswa</th>
                                <th>Jenis Kelamin</th>
                                <th>Tahun Masuk</th>
                                <th>Aksi</th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($siswas as $siswa)

                                <tr>

                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        {{ $siswa->nisn }}
                                    </td>

                                    <td>
                                        {{ $siswa->nama_siswa }}
                                    </td>

                                    <td>
                                        {{ $siswa->jenis_kelamin }}
                                    </td>

                                    <td>
                                        {{ $siswa->tahun_masuk }}
                                    </td>

                                    <td>

                                        <a href="{{ route('admin.siswa.edit', $siswa->id_siswa) }}"
                                           class="btn btn-sm btn-warning">

                                            <i class="bi bi-pencil-square"></i>
                                            Edit

                                        </a>

                                        <form
                                            action="{{ route('admin.siswa.destroy', $siswa->id_siswa) }}"
                                            method="POST"
                                            class="d-inline"
                                        >

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('Yakin ingin menghapus data siswa ini?')"
                                            >

                                                <i class="bi bi-trash"></i>
                                                Hapus

                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="6"
                                        class="text-center">

                                        Belum ada data siswa.

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