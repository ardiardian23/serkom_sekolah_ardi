@extends('layouts.admin')

@section('title', 'Data Prestasi')

@section('content')

<div class="page-heading">

    <h3>Data Prestasi</h3>

    <p class="text-subtitle text-muted">
        Daftar prestasi sekolah
    </p>

</div>

<div class="page-content">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <section class="section">

        <div class="card">

            <div class="card-header d-flex justify-content-between align-items-center">

                <h4 class="card-title">
                    Data Prestasi
                </h4>

                <a href="{{ route('admin.prestasi.create') }}"
                   class="btn btn-primary">

                    <i class="bi bi-plus-circle"></i>
                    Tambah Prestasi

                </a>

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