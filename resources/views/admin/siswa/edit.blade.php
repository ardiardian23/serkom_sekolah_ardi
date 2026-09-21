@extends('layouts.admin')

@section('title', 'Edit Data Siswa')

@section('content')

<div class="page-heading">

    <div class="page-title">

        <div class="row">

            <div class="col-12 col-md-6 order-md-1 order-last">

                <h3>Edit Data Siswa</h3>

                <p class="text-subtitle text-muted">
                    Ubah data siswa
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
                            <a href="{{ route('admin.siswa.create') }}">
                                Data Siswa
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


    <section class="section">

        <div class="card">

            <div class="card-header">

                <h4 class="card-title">
                    Edit Data Siswa
                </h4>

            </div>


            <div class="card-body">

                <form
                    action="{{ route('admin.siswa.update', $siswa->id_siswa) }}"
                    method="POST">

                    @csrf

                    @method('PUT')


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
                                    value="{{ old('nisn', $siswa->nisn) }}"
                                    maxlength="10"
                                    required>

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
                                    value="{{ old('nama_siswa', $siswa->nama_siswa) }}"
                                    maxlength="40"
                                    required>

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
                                    required>

                                    <option value="">
                                        -- Pilih Jenis Kelamin --
                                    </option>

                                    <option
                                        value="Laki-Laki"
                                        {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'Laki-Laki' ? 'selected' : '' }}>
                                        Laki-Laki
                                    </option>

                                    <option
                                        value="Perempuan"
                                        {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
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
                                    value="{{ old('tahun_masuk', $siswa->tahun_masuk) }}"
                                    min="1900"
                                    max="2100"
                                    required>

                            </div>

                        </div>

                    </div>


                    <div class="mt-3">

                        <button
                            type="submit"
                            class="btn btn-primary">

                            <i class="bi bi-save"></i>
                            Simpan Perubahan

                        </button>


                        <a
                            href="{{ route('admin.siswa.create') }}"
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