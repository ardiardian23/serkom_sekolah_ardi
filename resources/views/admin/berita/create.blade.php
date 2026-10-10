@extends('layouts.admin')

@section('title', 'Tambah Berita')

@section('content')
<div class="page-heading">
    <h3>Tambah Berita</h3>
    <p class="text-subtitle text-muted">Tambah berita sekolah</p>
</div>

<div class="page-content">
    {{-- PESAN BERHASIL --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- PESAN ERROR --}}
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
                <h4 class="card-title">Tambah Berita</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        {{-- JUDUL --}}
                        <div class="col-md-8">
                            <div class="form-group mb-3">
                                <label for="judul">Judul Berita</label>
                                <input type="text" id="judul" name="judul" class="form-control"
                                    value="{{ old('judul') }}" placeholder="Masukkan judul berita">
                            </div>
                        </div>

                        {{-- TANGGAL --}}
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" id="tanggal" name="tanggal" class="form-control"
                                    value="{{ old('tanggal') }}">
                            </div>
                        </div>

                        {{-- GAMBAR --}}
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="gambar">Gambar</label>
                                <input type="file" id="gambar" name="gambar" class="form-control"
                                    accept="image/*">
                            </div>
                        </div>

                        {{-- STATUS --}}
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-select">
                                    <option value="">-- Pilih Status --</option>
                                    <option value="Publish" {{ old('status') == 'Publish' ? 'selected' : '' }}>
                                        Publish
                                    </option>
                                    <option value="Draft" {{ old('status') == 'Draft' ? 'selected' : '' }}>
                                        Draft
                                    </option>
                                </select>
                            </div>
                        </div>

                        {{-- ISI BERITA --}}
                        <div class="col-12">
                            <div class="form-group mb-3">
                                <label for="isi">Isi Berita</label>
                                <textarea name="isi" id="isi" rows="7" class="form-control"
                                    placeholder="Masukkan isi berita">{{ old('isi') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Simpan Berita
                    </button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection

