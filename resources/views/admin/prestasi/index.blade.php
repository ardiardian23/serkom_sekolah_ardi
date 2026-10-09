@extends('layouts.admin')

@section('title', 'Data Prestasi')

@section('content')
<div class="container-fluid">
    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Data Prestasi</h3>
            <p class="text-muted mb-0">Kelola data prestasi sekolah</p>
        </div>
        <a href="{{ route('admin.prestasi.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Prestasi
        </a>
    </div>

    {{-- ALERT SUKSES --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- ALERT ERROR --}}
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-circle me-2"></i>
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- PENCARIAN --}}
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <form action="{{ route('admin.prestasi.index') }}" method="GET">
                <div class="row g-2">
                    <div class="col-md-9">
                        <input type="text" name="search" class="form-control"
                            placeholder="Cari nama prestasi, deskripsi, atau tahun ajaran..."
                            value="{{ request('search') }}">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-search me-1"></i> Cari
                        </button>
                    </div>
                    @if(request('search'))
                        <div class="col-md-1">
                            <a href="{{ route('admin.prestasi.index') }}"
                                class="btn btn-secondary w-100" title="Reset pencarian">
                                <i class="bi bi-arrow-clockwise"></i> Reset
                            </a>
                        </div>
                    @endif
                </div>
            </form>
        </div>
    </div>

    {{-- TABEL PRESTASI --}}
    <div class="card shadow-sm">
        <div class="card-header bg-white">
            <h5 class="mb-0 fw-bold">Daftar Prestasi</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th width="60">No</th>
                            <th width="120">Foto</th>
                            <th>Nama Prestasi</th>
                            <th>Deskripsi</th>
                            <th width="130">Tahun Ajaran</th>
                            <th width="180">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($prestasis as $prestasi)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                {{-- FOTO --}}
                                <td>
                                    @if($prestasi->foto)
                                        <img src="{{ asset('storage/' . $prestasi->foto) }}"
                                            alt="{{ $prestasi->nama_prestasi }}"
                                            width="90" height="70" class="rounded"
                                            style="object-fit: cover;">
                                    @else
                                        <div class="bg-light rounded d-flex align-items-center justify-content-center"
                                            style="width: 90px; height: 70px;">
                                            <i class="bi bi-image text-muted fs-4"></i>
                                        </div>
                                    @endif
                                </td>
                                {{-- NAMA --}}
                                <td><strong>{{ $prestasi->nama_prestasi }}</strong></td>
                                {{-- DESKRIPSI --}}
                                <td>{{ Str::limit($prestasi->deskripsi, 100) }}</td>
                                {{-- TAHUN AJARAN --}}
                                <td>{{ $prestasi->tahun_ajaran }}</td>
                                {{-- AKSI --}}
                                <td>
                                    <a href="{{ route('admin.prestasi.edit', ['prestasi' => $prestasi->id]) }}"
                                        class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.prestasi.destroy', ['prestasi' => $prestasi->id]) }}"
                                        method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus prestasi ini?')">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <i class="bi bi-award fs-1 text-muted"></i>
                                    <p class="text-muted mt-2 mb-0">Belum ada data prestasi.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

