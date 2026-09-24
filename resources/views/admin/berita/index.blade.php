@extends('layouts.admin')

@section('title', 'Data Berita')

@section('content')

<div class="page-heading">
    <h3>Data Berita</h3>
    <p class="text-subtitle text-muted">
        Kelola berita sekolah
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
                    Data Berita
                </h4>

                <a href="{{ route('admin.berita.create') }}"
                   class="btn btn-primary">

                    <i class="bi bi-plus-circle"></i>
                    Tambah Berita

                </a>

            </div>

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-striped">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Isi</th>
                                <th>Tanggal</th>
                                <th>Gambar</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($beritas as $berita)

                                <tr>

                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        {{ $berita->judul }}
                                    </td>

                                    <td>
                                        {{ Str::limit($berita->isi, 80) }}
                                    </td>

                                    <td>
                                        {{ $berita->tanggal }}
                                    </td>

                                    <td>

                                        @if($berita->gambar)

                                            <img src="{{ asset('storage/' . $berita->gambar) }}"
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

                                        @if($berita->status == 'Publish')

                                            <span class="badge bg-success">
                                                Publish
                                            </span>

                                        @else

                                            <span class="badge bg-secondary">
                                                Draft
                                            </span>

                                        @endif

                                    </td>

                                    <td>

                                        <a href="{{ route('admin.berita.edit', $berita->id_berita) }}"
                                           class="btn btn-warning btn-sm">

                                            <i class="bi bi-pencil-square"></i>
                                            Edit

                                        </a>

                                        <form action="{{ route('admin.berita.destroy', $berita->id_berita) }}"
                                              method="POST"
                                              class="d-inline">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin ingin menghapus berita ini?')">

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

                                        Belum ada berita.

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