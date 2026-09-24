@extends('layouts.admin')

@section('title', 'Data Ekstrakurikuler')

@section('content')

<div class="page-heading">
    <h3>Data Ekstrakurikuler</h3>
    <p class="text-subtitle text-muted">
        Kelola data ekstrakurikuler sekolah
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
                <h4 class="card-title">Data Ekstrakurikuler</h4>

                <a href="{{ route('admin.ekstrakurikuler.create') }}"
                   class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i>
                    Tambah Eskul
                </a>
            </div>

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-striped">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Eskul</th>
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

                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        {{ $ekskul->nama_ekskul }}
                                    </td>

                                    <td>
                                        {{ $ekskul->pembina }}
                                    </td>

                                    <td>
                                        {{ $ekskul->jadwal_latihan }}
                                    </td>

                                    <td>
                                        {{ $ekskul->deskripsi }}
                                    </td>

                                    <td>
                                        @if($ekskul->gambar)
                                            <img src="{{ asset('storage/' . $ekskul->gambar) }}"
                                                 width="60"
                                                 height="60"
                                                 style="object-fit: cover;"
                                                 class="rounded">
                                        @else
                                            <span class="text-muted">
                                                Tidak ada gambar
                                            </span>
                                        @endif
                                    </td>

                                    <td>

                                        <a href="{{ route('admin.ekstrakurikuler.edit', $ekskul->id_ekskul) }}"
                                           class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-square"></i>
                                            Edit
                                        </a>

                                        <form action="{{ route('admin.ekstrakurikuler.destroy', $ekskul->id_ekskul) }}"
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
                                    <td colspan="7"
                                        class="text-center">
                                        Belum ada data ekstrakurikuler.
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