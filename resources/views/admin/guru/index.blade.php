@extends('layouts.admin')

@section('title', 'Data Guru')

@section('content')

<div class="page-heading">
    <h3>Data Guru</h3>
    <p class="text-subtitle text-muted">
        Data guru sekolah
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
                <h4 class="card-title">Data Guru</h4>

                <a href="{{ route('admin.guru.create') }}"
                   class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i>
                    Tambah Guru
                </a>
            </div>

            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-striped" id="table1">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIP</th>
                                <th>Nama Guru</th>
                                <th>Jenis Kelamin</th>
                                <th>Mata Pelajaran</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($gurus as $guru)

                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    <td>
                                        {{ $guru->nip }}
                                    </td>

                                    <td>
                                        {{ $guru->nama_guru }}
                                    </td>

                                    <td>
                                        {{ $guru->jenis_kelamin ?? '-' }}
                                    </td>

                                    <td>
                                        {{ $guru->mapel ?? '-' }}
                                    </td>

                                    <td>
                                        @if($guru->foto)
                                            <img src="{{ asset('storage/' . $guru->foto) }}"
                                                width="50"
                                                height="50"
                                                style="object-fit: cover;"
                                                class="rounded">
                                        @else
                                            <span class="text-muted">
                                                Tidak ada foto
                                            </span>
                                        @endif
                                    </td>

                                    <td>
                                        <a href="{{ route('admin.guru.edit', $guru->id_guru) }}"
                                        class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-square"></i>
                                            Edit
                                        </a>

                                        <form action="{{ route('admin.guru.destroy', $guru->id_guru) }}"
                                            method="POST"
                                            class="d-inline">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin ingin menghapus data guru ini?')">
                                                <i class="bi bi-trash"></i>
                                                Hapus
                                            </button>

                                        </form>
                                    </td>
                                </tr>

                            @empty

                                <tr>
                                    <td colspan="7" class="text-center">
                                        Belum ada data guru.
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