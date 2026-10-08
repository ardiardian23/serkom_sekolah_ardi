@extends('layouts.admin')

@section('title', 'Data Pengumuman')

@section('content')

<div class="page-heading">

    {{-- ========================================== --}}
    {{-- PAGE TITLE --}}
    {{-- ========================================== --}}

    <div class="page-title">

        <div class="row">

            <div class="col-12 col-md-6 order-md-1 order-last">

                <h3>Data Pengumuman</h3>

                <p class="text-subtitle text-muted">
                    Kelola pengumuman sekolah
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
                            Pengumuman
                        </li>

                    </ol>

                </nav>

            </div>

        </div>

    </div>


    {{-- ========================================== --}}
    {{-- SUCCESS --}}
    {{-- ========================================== --}}

    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    {{-- ========================================== --}}
    {{-- ERROR --}}
    {{-- ========================================== --}}

    @if($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif

    {{-- ========================================== --}}
    {{-- DATA PENGUMUMAN --}}
    {{-- ========================================== --}}

    <section class="section">

        <div class="card">

            <div class="card-header">

                <div class="d-flex justify-content-between align-items-center">

                    <h4 class="card-title mb-0">
                        Data Pengumuman
                    </h4>

                @if(auth()->user()->role === 'Admin')
                    <a href="{{ route('admin.pengumuman.create') }}"
                       class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i>
                        Tambah Pengumuman
                    </a>
                @endif
                </div>
            </div>




            <div class="card-body">


                {{-- ========================================== --}}
                {{-- PENCARIAN --}}
                {{-- ========================================== --}}

                <form action="{{ route('admin.pengumuman.index') }}"
                      method="GET"
                      class="mb-4">

                    <div class="row g-2">


                        {{-- INPUT PENCARIAN --}}

                        <div class="col-md-9">

                            <div class="input-group">

                                <span class="input-group-text">

                                    <i class="bi bi-search"></i>

                                </span>

                                <input type="text"
                                       name="search"
                                       class="form-control"
                                       placeholder="Cari judul, isi, atau status..."
                                       value="{{ request('search') }}">

                            </div>

                        </div>


                        {{-- TOMBOL CARI --}}

                        <div class="col-md-1">

                            <button type="submit"
                                    class="btn btn-primary w-100">

                                <i class="bi bi-search"></i>
                                Cari
                            </button>

                        </div>


                        {{-- TOMBOL RESET --}}

                        <div class="col-md-2">

                            <a href="{{ route('admin.pengumuman.index') }}"
                               class="btn btn-secondary w-100">

                                <i class="bi bi-arrow-clockwise"></i>

                                Reset

                            </a>

                        </div>

                    </div>

                </form>


                {{-- ========================================== --}}
                {{-- TABEL --}}
                {{-- ========================================== --}}

                <div class="table-responsive">

                    <table class="table table-striped">

                        <thead>

                            <tr>

                                <th>No</th>

                                <th>Judul</th>

                                <th>Isi</th>

                                <th>Tanggal</th>

                                <th>Status</th>

                                <th>Aksi</th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse($pengumumans as $pengumuman)

                                <tr>


                                    {{-- NO --}}

                                    <td>
                                        {{ $loop->iteration }}
                                    </td>


                                    {{-- JUDUL --}}

                                    <td>
                                        {{ $pengumuman->judul }}
                                    </td>


                                    {{-- ISI --}}

                                    <td>
                                        {{ Str::limit($pengumuman->isi, 50) }}
                                    </td>


                                    {{-- TANGGAL --}}

                                    <td>
                                        {{ $pengumuman->tanggal }}
                                    </td>


                                    {{-- STATUS --}}

                                    <td>

                                        @if($pengumuman->status == 'Publish')

                                            <span class="badge bg-success">
                                                Publish
                                            </span>

                                        @else

                                            <span class="badge bg-secondary">
                                                Draft
                                            </span>

                                        @endif

                                    </td>


                                    {{-- AKSI --}}

                                    <td>


                                        {{-- EDIT --}}

                                        <a href="{{ route(
                                            'admin.pengumuman.edit',
                                            $pengumuman->id_pengumuman
                                        ) }}"
                                           class="btn btn-warning btn-sm">

                                            <i class="bi bi-pencil"></i>

                                            Edit
                                        </a>


                                        {{-- HAPUS --}}

                                        <form action="{{ route(
                                                    'admin.pengumuman.destroy',
                                                    $pengumuman->id_pengumuman
                                                ) }}"
                                              method="POST"
                                              class="d-inline">

                                            @csrf

                                            @method('DELETE')


                                            <button type="submit"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin ingin menghapus pengumuman ini?')">

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

                                        Belum ada data pengumuman.

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
