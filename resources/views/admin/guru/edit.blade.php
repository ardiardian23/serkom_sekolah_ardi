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
                            <a href="{{ route('admin.guru.create') }}">
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
                    Edit Data Guru
                </h4>

            </div>


            <div class="card-body">

                <form
                    action="{{ route('admin.guru.update', $guru->id_guru) }}"
                    method="POST">

                    @csrf

                    @method('PUT')


                    <div class="row">

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
                                    value="{{ old('nip', $guru->nip) }}"
                                    maxlength="30"
                                    required>

                            </div>

                        </div>


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
                                    value="{{ old('nama_guru', $guru->nama_guru) }}"
                                    maxlength="40"
                                    required>

                            </div>

                        </div>


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
                                        {{ old('jenis_kelamin', $guru->jenis_kelamin) == 'Laki-Laki' ? 'selected' : '' }}>
                                        Laki-Laki
                                    </option>

                                    <option
                                        value="Perempuan"
                                        {{ old('jenis_kelamin', $guru->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
                                        Perempuan
                                    </option>

                                </select>

                            </div>

                        </div>


                        <div class="col-md-6">

                            <div class="form-group mb-3">

                                <label for="mata_pelajaran">
                                    Mata Pelajaran
                                </label>

                                <input
                                    type="text"
                                    id="mata_pelajaran"
                                    name="mata_pelajaran"
                                    class="form-control"
                                    value="{{ old('mata_pelajaran', $guru->mata_pelajaran) }}"
                                    maxlength="50"
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
                            href="{{ route('admin.guru.create') }}"
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