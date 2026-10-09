@extends('layouts.admin')

@section('title', 'Data Ekstrakurikuler')

@section('content')
<div class="page-heading">
    <h3>Data Ekstrakurikuler</h3>
    <p class="text-subtitle text-muted">Kelola data ekstrakurikuler sekolah</p>
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
        {{-- FORM TAMBAH --}}
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tambah Ekstrakurikuler</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.ekstrakurikuler.store') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        {{-- NAMA EKSTRAKURIKULER --}}
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="nama_ekskul">Nama Ekstrakurikuler</label>
                                <input type="text" id="nama_ekskul" name="nama_ekskul"
                                    class="form-control" placeholder="Contoh: Pramuka"
                                    value="{{ old('nama_ekskul') }}" required>
                            </div>
                        </div>

                        {{-- PEMBINA --}}
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="pembina">Pembina</label>
                                <input type="text" id="pembina" name="pembina"
                                    class="form-control" placeholder="Nama pembina"
                                    value="{{ old('pembina') }}" required>
                            </div>
                        </div>

                        {{-- JADWAL LATIHAN --}}
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="jadwal_latihan">Jadwal Latihan</label>
                                <input type="text" id="jadwal_latihan" name="jadwal_latihan"
                                    class="form-control" placeholder="Contoh: Sabtu, 08.00 - 10.00"
                                    value="{{ old('jadwal_latihan') }}" required>
                            </div>
                        </div>

                        {{-- GAMBAR --}}
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="gambar">Gambar Ekstrakurikuler</label>
                                <input type="file" id="gambar" name="gambar" class="form-control"
                                    accept=".jpg,.jpeg,.png">
                                <small class="text-muted">Format JPG, JPEG, PNG. Maksimal 2 MB.</small>
                            </div>
                        </div>

                        {{-- DESKRIPSI --}}
                        <div class="col-12">
                            <div class="form-group mb-3">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea id="deskripsi" name="deskripsi" class="form-control"
                                    rows="4" placeholder="Deskripsi ekstrakurikuler"
                                    required>{{ old('deskripsi') }}</textarea>
                            </div>
                        </div>
                    </div>

                    {{-- BUTTON --}}
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Simpan Data
                    </button>
                    <button type="reset" class="btn btn-secondary">
                        <i class="bi bi-arrow-counterclockwise"></i> Reset
                    </button>

                        <a href="{{ route('admin.ekstrakurikuler.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>

                </form>
            </div>
        </div>
    </section>
</div>
@endsection
