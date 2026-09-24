@extends('layouts.admin')

@section('title', 'Edit Berita')

@section('content')

<div class="page-heading">

    <h3>Edit Berita</h3>

    <p class="text-subtitle text-muted">
        Ubah data berita sekolah
    </p>

</div>

<div class="page-content">

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
                    Edit Data Berita
                </h4>

            </div>

            <div class="card-body">

                <form action="{{ route('admin.berita.update', $berita->id_berita) }}"
                      method="POST">

                    @csrf
                    @method('PUT')

                    <div class="row">

                        {{-- JUDUL --}}
                        <div class="col-md-8">

                            <div class="form-group mb-3">

                                <label for="judul">
                                    Judul Berita
                                </label>

                                <input type="text"
                                       id="judul"
                                       name="judul"
                                       class="form-control"
                                       value="{{ old('judul', $berita->judul) }}"
                                       placeholder="Masukkan judul berita">

                            </div>

                        </div>

                        {{-- TANGGAL --}}
                        <div class="col-md-4">

                            <div class="form-group mb-3">

                                <label for="tanggal">
                                    Tanggal
                                </label>

                                <input type="date"
                                       id="tanggal"
                                       name="tanggal"
                                       class="form-control"
                                       value="{{ old('tanggal', $berita->tanggal) }}">

                            </div>

                        </div>

                        {{-- GAMBAR --}}
                        <div class="col-md-6">

                            <div class="form-group mb-3">

                                <label for="gambar">
                                    Gambar
                                </label>

                                <input type="text"
                                       id="gambar"
                                       name="gambar"
                                       class="form-control"
                                       value="{{ old('gambar', $berita->gambar) }}"
                                       placeholder="Nama file gambar">

                            </div>

                        </div>

                        {{-- STATUS --}}
                        <div class="col-md-6">

                            <div class="form-group mb-3">

                                <label for="status">
                                    Status
                                </label>

                                <select name="status"
                                        id="status"
                                        class="form-select">

                                    <option value="Publish"
                                        {{ old('status', $berita->status) == 'Publish' ? 'selected' : '' }}>
                                        Publish
                                    </option>

                                    <option value="Draft"
                                        {{ old('status', $berita->status) == 'Draft' ? 'selected' : '' }}>
                                        Draft
                                    </option>

                                </select>

                            </div>

                        </div>

                        {{-- ISI --}}
                        <div class="col-12">

                            <div class="form-group mb-3">

                                <label for="isi">
                                    Isi Berita
                                </label>

                                <textarea name="isi"
                                          id="isi"
                                          rows="7"
                                          class="form-control"
                                          placeholder="Masukkan isi berita">{{ old('isi', $berita->isi) }}</textarea>

                            </div>

                        </div>

                    </div>

                    <button type="submit"
                            class="btn btn-primary">

                        <i class="bi bi-save"></i>
                        Update Berita

                    </button>

                    <a href="{{ route('admin.berita.create') }}"
                       class="btn btn-secondary">

                        Kembali

                    </a>

                </form>

            </div>

        </div>

    </section>

</div>

@endsection