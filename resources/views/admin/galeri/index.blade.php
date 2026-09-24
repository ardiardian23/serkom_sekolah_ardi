@extends('layouts.admin')

@section('title', 'Galeri')

@section('content')

<div class="page-heading">

    <div class="page-title">

        <div class="row">

            <div class="col-12 col-md-6 order-md-1 order-last">

                <h3>Galeri</h3>

                <p class="text-subtitle text-muted">
                    Kelola galeri foto sekolah
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
                            Galeri
                        </li>

                    </ol>

                </nav>

            </div>

        </div>

    </div>


    {{-- SUCCESS --}}

    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

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

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- FORM TAMBAH --}}

    <section class="section">

        <div class="card">

            <div class="card-header">

                <h4 class="card-title">
                    Tambah Galeri
                </h4>

            </div>

            <div class="card-body">

                <form action="{{ route('admin.galeri.store') }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf

                    <div class="mb-3">

                        <label class="form-label">
                            Judul
                        </label>

                        <input type="text"
                               name="judul"
                               class="form-control"
                               value="{{ old('judul') }}"
                               maxlength="50"
                               required>

                    </div>


                    <div class="mb-3">

                        <label class="form-label">
                            Keterangan
                        </label>

                        <textarea name="keterangan"
                                  class="form-control"
                                  rows="4"
                                  required>{{ old('keterangan') }}</textarea>

                    </div>


                    <div class="mb-3">

                        <label class="form-label">
                            File
                        </label>

                        <input type="file"
                               name="file"
                               class="form-control"
                               accept="image/*"
                               required>

                        <small class="text-muted">
                            JPG, JPEG, PNG maksimal 2 MB.
                        </small>

                    </div>


                    <div class="row">

                        <div class="col-md-6">

                            <div class="mb-3">

                                <label class="form-label">
                                    Kategori
                                </label>

                                <select name="kategori"
                                        class="form-select"
                                        required>

                                    <option value="">
                                        -- Pilih Kategori --
                                    </option>

                                    <option value="Foto"
                                        {{ old('kategori') == 'Foto' ? 'selected' : '' }}>
                                        Foto
                                    </option>

                                    <option value="Video"
                                        {{ old('kategori') == 'Video' ? 'selected' : '' }}>
                                        Video
                                    </option>

                                </select>

                            </div>

                        </div>


                        <div class="col-md-6">

                            <div class="mb-3">

                                <label class="form-label">
                                    Tanggal
                                </label>

                                <input type="date"
                                       name="tanggal"
                                       class="form-control"
                                       value="{{ old('tanggal', date('Y-m-d')) }}"
                                       required>

                            </div>

                        </div>

                    </div>


                    <button type="submit"
                            class="btn btn-primary">

                        <i class="bi bi-plus-circle"></i>
                        Tambah Galeri

                    </button>

                </form>

            </div>

        </div>

    </section>


    {{-- DATA GALERI --}}

    <section class="section">

        <div class="card">

            <div class="card-header">

                <h4 class="card-title">
                    Data Galeri
                </h4>

            </div>

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-striped">

                        <thead>

                            <tr>

                                <th>No</th>
                                <th>File</th>
                                <th>Judul</th>
                                <th>Keterangan</th>
                                <th>Kategori</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($galeris as $galeri)

                                <tr>

                                    <td>
                                        {{ $loop->iteration }}
                                    </td>


                                    <td>

                                        @if($galeri->file)

                                            <img
                                                src="{{ asset('storage/' . $galeri->file) }}"
                                                alt="{{ $galeri->judul }}"
                                                width="80"
                                                height="60"
                                                style="object-fit: cover; border-radius: 8px;"
                                            >

                                        @else

                                            <span class="text-muted">
                                                Tidak ada file
                                            </span>

                                        @endif

                                    </td>


                                    <td>
                                        {{ $galeri->judul }}
                                    </td>


                                    <td>
                                        {{ Str::limit($galeri->keterangan, 50) }}
                                    </td>


                                    <td>

                                        @if($galeri->kategori == 'Foto')

                                            <span class="badge bg-primary">
                                                Foto
                                            </span>

                                        @else

                                            <span class="badge bg-danger">
                                                Video
                                            </span>

                                        @endif

                                    </td>


                                    <td>
                                        {{ $galeri->tanggal }}
                                    </td>


                                    <td>

                                        <a href="{{ route('admin.galeri.show', $galeri->id_galeri) }}"
                                           class="btn btn-info btn-sm">

                                            <i class="bi bi-eye"></i>

                                        </a>


                                        <a href="{{ route('admin.galeri.edit', $galeri->id_galeri) }}"
                                           class="btn btn-warning btn-sm">

                                            <i class="bi bi-pencil"></i>

                                        </a>


                                        <form action="{{ route('admin.galeri.destroy', $galeri->id_galeri) }}"
                                              method="POST"
                                              class="d-inline">

                                            @csrf

                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin ingin menghapus galeri ini?')">

                                                <i class="bi bi-trash"></i>

                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="7"
                                        class="text-center">

                                        Belum ada data galeri.

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