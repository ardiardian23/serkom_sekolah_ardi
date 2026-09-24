@extends('layouts.admin')

@section('title', 'Data Pengumuman')

@section('content')

<div class="page-heading">

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


    {{-- Pesan berhasil --}}
    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif


    {{-- Error validasi --}}
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


        {{-- FORM TAMBAH PENGUMUMAN --}}
        <div class="card">

            <div class="card-header">

                <h4 class="card-title">
                    Tambah Pengumuman
                </h4>

            </div>


            <div class="card-body">

                <form action="{{ route('admin.pengumuman.store') }}"
                      method="POST">

                    @csrf


                    <div class="mb-3">

                        <label class="form-label">
                            Judul Pengumuman
                        </label>

                        <input
                            type="text"
                            name="judul"
                            class="form-control"
                            value="{{ old('judul') }}"
                            maxlength="50"
                            placeholder="Masukkan judul pengumuman"
                            required
                        >

                    </div>


                    <div class="mb-3">

                        <label class="form-label">
                            Isi Pengumuman
                        </label>

                        <textarea
                            name="isi"
                            class="form-control"
                            rows="5"
                            placeholder="Masukkan isi pengumuman"
                            required
                        >{{ old('isi') }}</textarea>

                    </div>


                    <div class="row">

                        <div class="col-md-6">

                            <div class="mb-3">

                                <label class="form-label">
                                    Tanggal
                                </label>

                                <input
                                    type="date"
                                    name="tanggal"
                                    class="form-control"
                                    value="{{ old('tanggal', date('Y-m-d')) }}"
                                    required
                                >

                            </div>

                        </div>


                        <div class="col-md-6">

                            <div class="mb-3">

                                <label class="form-label">
                                    Status
                                </label>

                                <select
                                    name="status"
                                    class="form-select"
                                    required
                                >

                                    <option value="">
                                        -- Pilih Status --
                                    </option>

                                    <option value="Publish"
                                        {{ old('status') == 'Publish' ? 'selected' : '' }}>
                                        Publish
                                    </option>

                                    <option value="Draft"
                                        {{ old('status') == 'Draft' ? 'selected' : '' }}>
                                        Draft
                                    </option>

                                </select>

                            </div>

                        </div>

                    </div>


                    <button type="submit"
                            class="btn btn-primary">

                        <i class="bi bi-save"></i>
                        Simpan Pengumuman

                    </button>

                </form>

            </div>

        </div>


        {{-- DAFTAR PENGUMUMAN --}}
        <div class="card">

            <div class="card-header">

                <h4 class="card-title">
                    Daftar Pengumuman
                </h4>

            </div>


            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-hover">

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

                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        {{ $pengumuman->judul }}
                                    </td>

                                    <td>
                                        {{ \Illuminate\Support\Str::limit($pengumuman->isi, 50) }}
                                    </td>

                                    <td>
                                        {{ $pengumuman->tanggal }}
                                    </td>

                                    <td>

                                        @if($pengumuman->status === 'Publish')

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

                                        {{-- Detail --}}
                                        <a
                                            href="{{ route('admin.pengumuman.show', $pengumuman->id_pengumuman) }}"
                                            class="btn btn-info btn-sm"
                                        >

                                            <i class="bi bi-eye"></i>

                                        </a>


                                        {{-- Edit --}}
                                        <a
                                            href="{{ route('admin.pengumuman.edit', $pengumuman->id_pengumuman) }}"
                                            class="btn btn-warning btn-sm"
                                        >

                                            <i class="bi bi-pencil"></i>

                                        </a>


                                        {{-- Hapus --}}
                                        <form
                                            action="{{ route('admin.pengumuman.destroy', $pengumuman->id_pengumuman) }}"
                                            method="POST"
                                            class="d-inline"
                                        >

                                            @csrf

                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin ingin menghapus pengumuman ini?')"
                                            >

                                                <i class="bi bi-trash"></i>

                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td
                                        colspan="6"
                                        class="text-center text-muted"
                                    >

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