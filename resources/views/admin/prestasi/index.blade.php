@extends('layouts.admin')

@section('title', 'Data Prestasi')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Data Prestasi</h3>
            <p class="text-muted mb-0">
                Kelola data prestasi sekolah
            </p>
        </div>

        <a href="{{ route('admin.prestasi.create') }}"
           class="btn btn-primary">
            <i class="bi bi-plus-circle"></i>
            Tambah Prestasi
        </a>
    </div>

    {{-- Alert sukses --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>
            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>
        </div>
    @endif

    {{-- Alert error --}}
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-circle me-2"></i>
            {{ session('error') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>
        </div>
    @endif

    {{-- Search --}}
    <div class="card shadow-sm mb-4">
        <div class="card-body">

            <form action="{{ route('admin.prestasi.index') }}"
                  method="GET">

                <div class="row g-2">

                    <div class="col-md-10">
                        <input type="text"
                               name="search"
                               class="form-control"
                               value="{{ $search ?? '' }}"
                               placeholder="Cari nama prestasi atau tahun ajaran...">
                    </div>

                    <div class="col-md-2">
                        <button type="submit"
                                class="btn btn-primary w-100">
                            <i class="bi bi-search"></i>
                            Cari
                        </button>
                    </div>

                </div>

            </form>

        </div>
    </div>

    {{-- Tabel --}}
    <div class="card shadow-sm">

        <div class="card-header bg-white">
            <h5 class="mb-0 fw-bold">
                Daftar Prestasi
            </h5>
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

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                {{-- Foto --}}
                                <td>
                                    @if($prestasi->foto)
                                        <img src="{{ asset('storage/' . $prestasi->foto) }}"
                                             alt="{{ $prestasi->nama_prestasi }}"
                                             width="90"
                                             height="70"
                                             class="rounded"
                                             style="object-fit: cover;">
                                    @else
                                        <div class="bg-light rounded d-flex align-items-center justify-content-center"
                                             style="width: 90px; height: 70px;">
                                            <i class="bi bi-image text-muted fs-4"></i>
                                        </div>
                                    @endif
                                </td>

                                {{-- Nama --}}
                                <td>
                                    <strong>
                                        {{ $prestasi->nama_prestasi }}
                                    </strong>
                                </td>

                                {{-- Deskripsi --}}
                                <td>
                                    {{ Str::limit($prestasi->deskripsi, 100) }}
                                </td>

                                {{-- Tahun --}}
                                <td>
                                    {{ $prestasi->tahun_ajaran }}
                                </td>

                                {{-- Aksi --}}
                                <td>

                                    <a href="{{ route('admin.prestasi.edit', ['prestasi' => $prestasi->id]) }}"
                                       class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil-square"></i>
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.prestasi.destroy', ['prestasi' => $prestasi->id]) }}"
                                          method="POST"
                                          class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin ingin menghapus prestasi ini?')">
                                            <i class="bi bi-trash"></i>
                                            Hapus
                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="6"
                                    class="text-center py-5">

                                    <i class="bi bi-award fs-1 text-muted"></i>

                                    <p class="text-muted mt-2 mb-0">
                                        Belum ada data prestasi.
                                    </p>

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
