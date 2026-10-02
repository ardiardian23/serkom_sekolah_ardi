@extends('layouts.admin')

@section('title', 'Edit Agenda')

@section('content')

<div class="page-heading">

    <div class="page-title mb-4">

        <div class="row">

            <div class="col-12 col-md-6 order-md-1 order-last">

                <h3>Edit Agenda</h3>

                <p class="text-subtitle text-muted">
                    Perbarui data agenda sekolah
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
                            <a href="{{ route('admin.agenda.index') }}">
                                Agenda
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


    <div class="card">

        <div class="card-header">

            <h4 class="card-title">
                Form Edit Agenda
            </h4>

        </div>


        <div class="card-body">

            <form action="{{ route('admin.agenda.update', $agenda->id_agenda) }}"
                  method="POST">

                @csrf

                @method('PUT')


                {{-- JUDUL --}}
                <div class="mb-3">

                    <label class="form-label">
                        Judul Agenda
                    </label>

                    <input type="text"
                           name="judul"
                           class="form-control @error('judul') is-invalid @enderror"
                           value="{{ old('judul', $agenda->judul) }}">

                    @error('judul')
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
                           value="{{ old('tanggal', $agenda->tanggal) }}">

                    @error('tanggal')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- WAKTU --}}
                <div class="mb-3">

                    <label class="form-label">
                        Waktu
                    </label>

                    <input type="time"
                           name="waktu"
                           class="form-control @error('waktu') is-invalid @enderror"
                           value="{{ old('waktu', $agenda->waktu) }}">

                    @error('waktu')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- LOKASI --}}
                <div class="mb-3">

                    <label class="form-label">
                        Lokasi
                    </label>

                    <input type="text"
                           name="lokasi"
                           class="form-control @error('lokasi') is-invalid @enderror"
                           value="{{ old('lokasi', $agenda->lokasi) }}">

                    @error('lokasi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- DESKRIPSI --}}
                <div class="mb-4">

                    <label class="form-label">
                        Deskripsi
                    </label>

                    <textarea name="deskripsi"
                              rows="5"
                              class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi', $agenda->deskripsi) }}</textarea>

                    @error('deskripsi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- BUTTON --}}
                <div class="d-flex gap-2">

                    <a href="{{ route('admin.agenda.index') }}"
                       class="btn btn-secondary">

                        <i class="bi bi-arrow-left"></i>
                        Kembali

                    </a>

                    <button type="submit"
                            class="btn btn-primary">

                        <i class="bi bi-save"></i>
                        Update Agenda

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection