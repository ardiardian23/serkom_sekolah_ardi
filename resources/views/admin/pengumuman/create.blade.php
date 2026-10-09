@extends('layouts.admin')

@section('title', 'Data Pengumuman')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Pengumuman</h3>
                <p class="text-subtitle text-muted">Kelola pengumuman sekolah</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.index') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Pengumuman</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    {{-- Pesan sukses --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

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
                <h4 class="card-title">Tambah Pengumuman</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.pengumuman.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Judul Pengumuman</label>
                        <input type="text" name="judul" class="form-control" value="{{ old('judul') }}" maxlength="50" placeholder="Masukkan judul pengumuman" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Isi Pengumuman</label>
                        <textarea name="isi" class="form-control" rows="5" placeholder="Masukkan isi pengumuman" required>{{ old('isi') }}</textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Tanggal</label>
                                <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', date('Y-m-d')) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-select" required>
                                    <option value="">-- Pilih Status --</option>
                                    <option value="Publish" {{ old('status') == 'Publish' ? 'selected' : '' }}>Publish</option>
                                    <option value="Draft" {{ old('status') == 'Draft' ? 'selected' : '' }}>Draft</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Simpan Pengumuman
                    </button>
                    <a href="{{ route('admin.pengumuman .index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection
