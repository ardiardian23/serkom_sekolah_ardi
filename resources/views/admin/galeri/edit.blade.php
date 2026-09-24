@extends('layouts.admin')

@section('title', 'Edit Galeri')

@section('content')

<div class="page-heading">

    <div class="page-title">

        <div class="row">

            <div class="col-12 col-md-6 order-md-1 order-last">

                <h3>Edit Galeri</h3>

                <p class="text-subtitle text-muted">
                    Ubah data galeri sekolah
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
                            <a href="{{ route('admin.galeri.index') }}">
                                Galeri
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

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <section class="section">

        <div class="card">

            <div class="card-header">
                <h4 class="card-title">
                    Edit Data Galeri
                </h4>
            </div>

            <div class="card-body">

                <form action="{{ route('admin.galeri.update', $galeri->id_galeri) }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf

                    @method('PUT')


                    <div class="mb-3">

                        <label class="form-label">
                            Judul
                        </label>

                        <input type="text"
                               name="judul"
                               class="form-control"
                               value="{{ old('judul', $galeri->judul) }}"
                               maxlength="50"
                               required>

                    </div>


                    <div class="mb-3">

                        <label class="form-label">
                            Keterangan
                        </label>

                        <textarea name="keterangan"
                                  class="form-control"
                                  rows="5"
                                  required>{{ old('keterangan', $galeri->keterangan) }}</textarea>

                    </div>


                    <div class="mb-3">

                        <label class="form-label">
                            Kategori
                        </label>

                        <select name="kategori"
                                class="form-select"
                                required>

                            <option value="Foto"
                                {{ old('kategori', $galeri->kategori) == 'Foto' ? 'selected' : '' }}>
                                Foto
                            </option>

                            <option value="Video"
                                {{ old('kategori', $galeri->kategori) == 'Video' ? 'selected' : '' }}>
                                Video
                            </option>

                        </select>

                    </div>


                    <div class="mb-3">

                        <label class="form-label">
                            Tanggal
                        </label>

                        <input type="date"
                               name="tanggal"
                               class="form-control"
                               value="{{ old('tanggal', $galeri->tanggal) }}"
                               required>

                    </div>


                    <div class="mb-3">

                        <label class="form-label">
                            File Saat Ini
                        </label>

                        <br>

                        @if($galeri->file)

                            <img
                                src="{{ asset('storage/' . $galeri->file) }}"
                                alt="{{ $galeri->judul }}"
                                width="200"
                                height="150"
                                style="object-fit: cover; border-radius: 10px;"
                            >

                        @endif

                    </div>


                    <div class="mb-3">

                        <label class="form-label">
                            Ganti File
                        </label>

                        <input type="file"
                               name="file"
                               class="form-control"
                               accept="image/*">

                        <small class="text-muted">
                            Kosongkan jika tidak ingin mengganti file.
                        </small>

                    </div>


                    <button type="submit"
                            class="btn btn-primary">

                        <i class="bi bi-save"></i>
                        Simpan Perubahan

                    </button>


                    <a href="{{ route('admin.galeri.index') }}"
                       class="btn btn-secondary">

                        <i class="bi bi-arrow-left"></i>
                        Kembali

                    </a>

                </form>

            </div>

        </div>

    </section>

</div>

@endsection