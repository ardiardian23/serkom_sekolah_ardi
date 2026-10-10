@extends('layouts.admin')

@section('title', 'Data Guru')

@section('content')
<div class="page-heading">
    <h3>Data Guru</h3>
    <p class="text-subtitle text-muted">Data guru sekolah</p>
</div>

<div class="page-content">
    {{-- SUCCESS --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
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
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Data Guru</h4>
                @if(auth()->user()->role === 'Admin')
                    <a href="{{ route('admin.guru.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> Tambah Guru
                    </a>
                @endif
            </div>

            <div class="card-body">
                {{-- SEARCH --}}
                <form action="{{ route('admin.guru.index') }}" method="GET" class="mb-3">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control"
                            placeholder="Cari nama guru atau NIP..."
                            value="{{ $search ?? '' }}">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-search"></i> Cari
                        </button>
                        @if(!empty($search))
                            <a href="{{ route('admin.guru.index') }}" class="btn btn-secondary">
                                <i class="bi bi-x-circle"></i> Reset
                            </a>
                        @endif
                    </div>
                </form>

                {{-- TABEL --}}
                <div class="table-responsive">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIP</th>
                                <th>Nama Guru</th>
                                <th>Mata Pelajaran</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($gurus as $guru)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $guru->nip }}</td>
                                    <td>{{ $guru->nama_guru }}</td>
                                    <td>{{ $guru->mapel ?? '-' }}</td>
                                    <td>
                                        @if($guru->foto)
                                            <img src="{{ asset('storage/' . $guru->foto) }}"
                                                alt="Foto {{ $guru->nama_guru }}"
                                                width="50" height="50"
                                                style="object-fit: cover;"
                                                class="rounded">
                                        @else
                                            <span class="text-muted">Tidak ada foto</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{-- ADMIN ONLY --}}
                                        @if(auth()->user()->role === 'Admin')
                                            <a href="{{ route('admin.guru.edit',Crypt::encrypt ($guru->id_guru)) }}"
                                                class="btn btn-warning btn-sm" title="Edit">
                                                <i class="bi bi-pencil"></i> Edit
                                            </a>

                                            <form action="{{ route('admin.guru.destroy', $guru->id_guru) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    title="Hapus"
                                                    onclick="return confirm('Apakah kamu yakin ingin menghapus data guru ini?')">
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
                                            Data guru dengan pencarian
                                            "<strong>{{ $search }}</strong>" tidak ditemukan.
                                        @else
                                            Belum ada data guru.
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

