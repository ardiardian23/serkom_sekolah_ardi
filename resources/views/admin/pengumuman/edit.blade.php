@extends('layouts.admin')

@section('title', 'Edit Pengumuman')

@section('content')

<div class="page-heading">

    <div class="page-title">

        <div class="row">

            <div class="col-12 col-md-6 order-md-1 order-last">

                <h3>Edit Pengumuman</h3>

                <p class="text-subtitle text-muted">
                    Ubah data pengumuman sekolah
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
                            <a href="{{ route('admin.pengumuman.index') }}">
                                Pengumuman
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


    {{-- Error validasi --}}
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
                    Edit Data Pengumuman
                </h4>

            </div>


            <div class="card-body">

                <form
                    action="{{ route('admin.pengumuman.update', $pengumuman->id_pengumuman) }}"
                    method="POST"
                >

                    @csrf

                    @method('PUT')


                    {{-- Judul --}}
                    <div class="mb-3">

                        <label class="form-label">
                            Judul Pengumuman
                        </label>

                        <input
                            type="text"
                            name="judul"
                            class="form-control"
                            value="{{ old('judul', $pengumuman->judul) }}"
                            maxlength="50"
                            required
                        >

                    </div>


                    {{-- Isi --}}
                    <div class="mb-3">

                        <label class="form-label">
                            Isi Pengumuman
                        </label>

                        <textarea
                            name="isi"
                            class="form-control"
                            rows="6"
                            required
                        >{{ old('isi', $pengumuman->isi) }}</textarea>

                    </div>


                    <div class="row">

                        {{-- Tanggal --}}
                        <div class="col-md-6">

                            <div class="mb-3">

                                <label class="form-label">
                                    Tanggal
                                </label>

                                <input
                                    type="date"
                                    name="tanggal"
                                    class="form-control"
                                    value="{{ old('tanggal', $pengumuman->tanggal) }}"
                                    required
                                >

                            </div>

                        </div>


                        {{-- Status --}}
                        <div class="col-md-6">

                            <div class="mb-3">

                                <label class="form-label">
                                    Status
                                </label>

                                <select
                                    name="status"
                                    class="form-select"
                                    required
                                >

                                    <option value="">
                                        -- Pilih Status --
                                    </option>

                                    <option
                                        value="Publish"
                                        {{ old('status', $pengumuman->status) == 'Publish' ? 'selected' : '' }}
                                    >
                                        Publish
                                    </option>

                                    <option
                                        value="Draft"
                                        {{ old('status', $pengumuman->status) == 'Draft' ? 'selected' : '' }}
                                    >
                                        Draft
                                    </option>

                                </select>

                            </div>

                        </div>

                    </div>


                    {{-- Tombol --}}
                    <div class="mt-4">

                        <button
                            type="submit"
                            class="btn btn-primary"
                        >

                            <i class="bi bi-save"></i>
                            Simpan Perubahan

                        </button>


                        <a
                            href="{{ route('admin.pengumuman.index') }}"
                            class="btn btn-secondary"
                        >

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