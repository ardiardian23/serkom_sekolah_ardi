@extends('layouts.admin')

@section('title', 'Data Siswa')

@section('content')

<div class="page-heading">

    <div class="page-title">
        <div class="row">

            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Siswa</h3>
                <p class="text-subtitle text-muted">
                    Kelola data siswa sekolah
                </p>
            </div>

            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb"
                     class="breadcrumb-header float-start float-lg-end">

                    <ol class="breadcrumb">

                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.index') }}">
                                Dashboard
                            </a>
                        </li>

                        <li class="breadcrumb-item active">
                            Data Siswa
                        </li>

                    </ol>

                </nav>
            </div>

        </div>
    </div>


    {{-- PESAN BERHASIL --}}
    @if(session('success'))
        <div class="alert alert-success">
            <i class="bi bi-check-circle"></i>
            {{ session('success') }}
        </div>
    @endif


    {{-- PESAN ERROR --}}
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

        <div class="card">

            <div class="card-header">

                <div class="d-flex justify-content-between align-items-center">

                    <div>
                        <h4 class="card-title mb-0">
                            Data Siswa
                        </h4>

                        <small class="text-muted">
                            Daftar seluruh siswa
                        </small>
                    </div>

                    @if(auth()->user()->role === 'Admin')
                        <a href="{{ route('admin.siswa.create') }}"
                        class="btn btn-primary">
                            <i class="bi bi-plus-circle"></i>
                            Tambah Siswa
                        </a>
                    @endif

                </div>

            </div>


            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-striped table-hover">

                        <thead>

                            <tr>
                                <th>No</th>

                                @if($siswas->count() > 0)

                                    @foreach($siswas->first()->getAttributes() as $field => $value)

                                        @if($field !== 'id_siswa')
                                            <th>
                                                {{ ucwords(str_replace('_', ' ', $field)) }}
                                            </th>
                                        @endif

                                    @endforeach

                                @endif

                                <th>Aksi</th>
                            </tr>

                        </thead>


                        <tbody>

                            @forelse($siswas as $index => $siswa)

                                <tr>

                                    <td>
                                        {{ $index + 1 }}
                                    </td>


                                    @foreach($siswa->getAttributes() as $field => $value)

                                        @if($field !== 'id_siswa')

                                            <td>

                                                @if($value === null || $value === '')
                                                    <span class="text-muted">
                                                        -
                                                    </span>
                                                @else
                                                    {{ $value }}
                                                @endif

                                            </td>

                                        @endif

                                    @endforeach


                                    <td>

                                        {{-- LIHAT --}}
                                        <a href="{{ route('admin.siswa.show', $siswa->id_siswa) }}"
                                        class="btn btn-info btn-sm">
                                            <i class="bi bi-eye"></i>
                                        </a>


                                        {{-- KHUSUS ADMIN --}}
                                        @if(auth()->user()->role === 'Admin')

                                            <a href="{{ route('admin.siswa.edit', $siswa->id_siswa) }}"
                                            class="btn btn-warning btn-sm">
                                                <i class="bi bi-pencil"></i>
                                            </a>

                                            <form action="{{ route('admin.siswa.destroy', $siswa->id_siswa) }}"
                                                method="POST"
                                                class="d-inline">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="btn btn-danger btn-sm">
                                                    <i class="bi bi-trash"></i>
                                                </button>

                                            </form>

                                        @endif

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="100%" class="text-center py-4">

                                        <i class="bi bi-inbox"
                                           style="font-size: 40px;">
                                        </i>

                                        <p class="mt-2 mb-0">
                                            Belum ada data siswa.
                                        </p>

                                        <a href="{{ route('admin.siswa.create') }}"
                                           class="btn btn-primary btn-sm mt-3">

                                            <i class="bi bi-plus-circle"></i>
                                            Tambah Siswa

                                        </a>

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