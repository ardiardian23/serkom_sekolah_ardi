
@extends('layouts.admin')

@section('title', 'Galeri')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Galeri</h3>
                <p class="text-subtitle text-muted">Kelola galeri foto sekolah</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.index') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Galeri</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    {{-- SUCCESS --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
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

    {{-- DATA GALERI --}}
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">Data Galeri</h4>
                    @if(auth()->user()->role === 'Admin')
                        <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle"></i> Tambah Galeri
                        </a>
                    @endif
                </div>
            </div>

            <div class="card-body">
                {{-- PENCARIAN --}}
                <form action="{{ route('admin.galeri.index') }}" method="GET" class="mb-4">
                    <div class="row g-2">
                        <div class="col-md-9">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-search"></i>
                                </span>
                                <input type="text" name="search" class="form-control"
                                    placeholder="Cari judul, keterangan, atau kategori..."
                                    value="{{ request('search') }}">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary w-100">
                                <i class="bi bi-arrow-clockwise"></i> Reset
                            </a>
                        </div>
                    </div>
                </form>

                {{-- TABEL GALERI --}}
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
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if($galeri->file)
                                            <img src="{{ asset('storage/' . $galeri->file) }}"
                                                alt="{{ $galeri->judul }}"
                                                width="80" height="60"
                                                style="object-fit: cover; border-radius: 8px;">
                                        @else
                                            <span class="text-muted">Tidak ada file</span>
                                        @endif
                                    </td>
                                    <td>{{ $galeri->judul }}</td>
                                    <td>{{ Str::limit($galeri->keterangan, 50) }}</td>
                                    <td>
                                        @if($galeri->kategori == 'Foto')
                                            <span class="badge bg-primary">Foto</span>
                                        @else
                                            <span class="badge bg-danger">Video</span>
                                        @endif
                                    </td>
                                    <td>{{ $galeri->tanggal }}</td>
                                    <td>
                                        <a href="{{ route('admin.galeri.edit', $galeri->id_galeri) }}"
                                            class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.galeri.destroy', $galeri->id_galeri) }}"
                                            method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin ingin menghapus galeri ini?')">
                                                <i class="bi bi-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Belum ada data galeri.</td>
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

