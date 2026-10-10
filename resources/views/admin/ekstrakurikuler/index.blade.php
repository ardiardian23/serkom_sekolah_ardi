@extends('layouts.admin')

@section('title', 'Data Ekstrakurikuler')

@section('content')
<div class="card-header d-flex justify-content-between align-items-center">
    <div>
        <h5 class="mb-1">Data Ekstrakurikuler</h5>
        <small class="text-muted">Kelola data ekstrakurikuler sekolah</small>
    </div>
    <a href="{{ route('admin.ekstrakurikuler.create') }}" class="btn btn-primary">
        <i class="fas fa-plus-circle"></i> Tambah Ekstrakurikuler
    </a>
</div>

<div class="page-content">
    {{-- PESAN BERHASIL --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- PESAN ERROR --}}
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            <i class="bi bi-exclamation-circle me-2"></i>
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Ekstrakurikuler</h4>
            </div>
            <div class="card-body">
                {{-- PENCARIAN --}}
                <form action="{{ route('admin.ekstrakurikuler.index') }}" method="GET" class="mb-3">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control"
                            placeholder="Cari nama ekskul atau pembina..."
                            value="{{ $search ?? '' }}">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-search"></i> Cari
                        </button>
                        @if(!empty($search))
                            <a href="{{ route('admin.ekstrakurikuler.index') }}" class="btn btn-secondary">
                                <i class="bi bi-x-circle"></i> Reset
                            </a>
                        @endif
                    </div>
                </form>

                {{-- TABEL DATA --}}
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Ekskul</th>
                                <th>Pembina</th>
                                <th>Jadwal Latihan</th>
                                <th>Deskripsi</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($ekskuls as $ekskul)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $ekskul->nama_ekskul }}</td>
                                    <td>{{ $ekskul->pembina }}</td>
                                    <td>{{ $ekskul->jadwal_latihan }}</td>
                                    <td>{{ $ekskul->deskripsi }}</td>
                                    <td>
                                        @if($ekskul->gambar)
                                            <img src="{{ asset('storage/' . $ekskul->gambar) }}"
                                                alt="Gambar {{ $ekskul->nama_ekskul }}"
                                                width="90" height="65"
                                                style="object-fit: cover; border-radius: 8px;">
                                        @else
                                            <span class="text-muted">Tidak ada gambar</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if(auth()->user()->role === 'Admin')
                                            {{-- EDIT --}}
                                            <a href="{{ route('admin.ekstrakurikuler.edit', Crypt::encrypt($ekskul->id_ekskul) ) }}"
                                                class="btn btn-warning btn-sm" title="Edit">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </a>
                                            {{-- HAPUS --}}
                                            <form action="{{ route('admin.ekstrakurikuler.destroy', $ekskul->id_ekskul) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" title="Hapus"
                                                    onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                    <i class="bi bi-trash"></i> Hapus
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">
                                        @if(!empty($search))
                                            Data ekstrakurikuler dengan pencarian
                                            "<strong>{{ $search }}</strong>" tidak ditemukan.
                                        @else
                                            Belum ada data ekstrakurikuler.
                                        @endif
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

