@extends('layouts.admin')

@section('title', 'Tambah Berita')

@section('content')

<div class="page-heading">

    <h3>Data Berita</h3>

    <p class="text-subtitle text-muted">
        Tambah berita sekolah
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

        {{-- FORM TAMBAH BERITA --}}
        <div class="card">

            <div class="card-header">

                <h4 class="card-title">
                    Tambah Berita
                </h4>

            </div>

            <div class="card-body">

                <form action="{{ route('admin.berita.store') }}"
                      method="POST">

                    @csrf

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
                                       value="{{ old('judul') }}"
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
                                       value="{{ old('tanggal') }}">

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
                                       value="{{ old('gambar') }}"
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

                                    <option value="">
                                        -- Pilih Status --
                                    </option>

                                    <option value="Publish"
                                        {{ old('status') == 'Publish' ? 'selected' : '' }}>
                                        Publish
                                    </option>

                                    <option value="Draft"
                                        {{ old('status') == 'Draft' ? 'selected' : '' }}>
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
                                          placeholder="Masukkan isi berita">{{ old('isi') }}</textarea>

                            </div>

                        </div>

                    </div>

                    <button type="submit"
                            class="btn btn-primary">

                        <i class="bi bi-save"></i>
                        Simpan Berita

                    </button>

                    <button type="reset"
                            class="btn btn-secondary">

                        Reset

                    </button>

                </form>

            </div>

        </div>


        {{-- TABEL DATA BERITA --}}
        <div class="card mt-4">

            <div class="card-header">

                <h4 class="card-title">
                    Data Berita
                </h4>

            </div>

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-striped">

                        <thead>

                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>

                        </thead>

                        <tbody>

                            @forelse($beritas as $berita)

                                <tr>

                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        {{ $berita->judul }}
                                    </td>

                                    <td>
                                        {{ $berita->tanggal }}
                                    </td>

                                    <td>

                                        @if($berita->status == 'Publish')

                                            <span class="badge bg-success">
                                                Publish
                                            </span>

                                        @else

                                            <span class="badge bg-secondary">
                                                Draft
                                            </span>

                                        @endif

                                    </td>

                                    <td>

                                        <a href="{{ route('admin.berita.edit', $berita->id_berita) }}"
                                           class="btn btn-warning btn-sm">

                                            <i class="bi bi-pencil-square"></i>
                                            Edit

                                        </a>

                                        <form action="{{ route('admin.berita.destroy', $berita->id_berita) }}"
                                              method="POST"
                                              class="d-inline">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin ingin menghapus berita ini?')">

                                                <i class="bi bi-trash"></i>
                                                Hapus

                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="5"
                                        class="text-center">

                                        Belum ada berita.

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