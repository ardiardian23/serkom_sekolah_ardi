@extends('layouts.admin')

@section('title', 'Data Prestasi')

@section('content')

<div class="page-heading">
    <h3>Data Prestasi</h3>
    <p class="text-subtitle text-muted">
        Kelola data prestasi sekolah
    </p>
</div>

<div class="page-content">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

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
                <h4 class="card-title">
                    Tambah Prestasi
                </h4>
            </div>

            <div class="card-body">

                <form action="{{ route('admin.prestasi.store') }}"
                      method="POST">

                    @csrf

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="nama_prestasi">
                                    Nama Prestasi
                                </label>

                                <input type="text"
                                       id="nama_prestasi"
                                       name="nama_prestasi"
                                       class="form-control"
                                       value="{{ old('nama_prestasi') }}"
                                       placeholder="Contoh: Juara 1 Olimpiade Matematika">

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="tahun_ajaran">
                                    Tahun Ajaran
                                </label>

                                <input type="text"
                                       id="tahun_ajaran"
                                       name="tahun_ajaran"
                                       class="form-control"
                                       value="{{ old('tahun_ajaran') }}"
                                       placeholder="Contoh: 2025/2026">

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="foto">
                                    Foto
                                </label>

                                <input type="text"
                                       id="foto"
                                       name="foto"
                                       class="form-control"
                                       value="{{ old('foto') }}"
                                       placeholder="Nama file foto">

                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group mb-3">
                                <label for="deskripsi">
                                    Deskripsi
                                </label>

                                <textarea id="deskripsi"
                                          name="deskripsi"
                                          class="form-control"
                                          rows="5"
                                          placeholder="Deskripsi prestasi">{{ old('deskripsi') }}</textarea>

                            </div>
                        </div>

                    </div>

                    <button type="submit"
                            class="btn btn-primary">
                        <i class="bi bi-save"></i>
                        Simpan Data
                    </button>

                    <button type="reset"
                            class="btn btn-secondary">
                        Reset
                    </button>

                </form>

            </div>
        </div>


        {{-- TABEL DATA --}}
        <div class="card mt-4">

            <div class="card-header">
                <h4 class="card-title">
                    Data Prestasi
                </h4>
            </div>

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-striped">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Prestasi</th>
                                <th>Deskripsi</th>
                                <th>Foto</th>
                                <th>Tahun Ajaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($prestasis as $prestasi)

                                <tr>

                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        {{ $prestasi->nama_prestasi }}
                                    </td>

                                    <td>
                                        {{ $prestasi->deskripsi }}
                                    </td>

                                    <td>
                                        @if($prestasi->foto)
                                            <img src="{{ asset('storage/' . $prestasi->foto) }}"
                                                 width="60"
                                                 height="60"
                                                 style="object-fit: cover;"
                                                 class="rounded">
                                        @else
                                            <span class="text-muted">
                                                Tidak ada foto
                                            </span>
                                        @endif
                                    </td>

                                    <td>
                                        {{ $prestasi->tahun_ajaran }}
                                    </td>

                                    <td>

                                        <a href="{{ route('admin.prestasi.edit', $prestasi->id) }}"
                                           class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-square"></i>
                                            Edit
                                        </a>

                                        <form action="{{ route('admin.prestasi.destroy', $prestasi->id) }}"
                                              method="POST"
                                              class="d-inline">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin ingin menghapus data ini?')">

                                                <i class="bi bi-trash"></i>
                                                Hapus

                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="6"
                                        class="text-center">
                                        Belum ada data prestasi.
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