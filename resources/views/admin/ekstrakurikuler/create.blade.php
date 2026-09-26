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
                    Tambah Ekstrakurikuler
                </h4>
            </div>

            <div class="card-body">

                <form action="{{ route('admin.ekstrakurikuler.store') }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf

                    <div class="row">

                        {{-- Nama Ekstrakurikuler --}}
                        <div class="col-md-6">

                            <div class="form-group mb-3">

                                <label>
                                    Nama Ekstrakurikuler
                                </label>

                                <input type="text"
                                       name="nama_ekskul"
                                       class="form-control"
                                       placeholder="Contoh: Pramuka"
                                       value="{{ old('nama_ekskul') }}"
                                       required>

                            </div>

                        </div>

                        {{-- Pembina --}}
                        <div class="col-md-6">

                            <div class="form-group mb-3">

                                <label>
                                    Pembina
                                </label>

                                <input type="text"
                                       name="pembina"
                                       class="form-control"
                                       placeholder="Nama pembina"
                                       value="{{ old('pembina') }}"
                                       required>

                            </div>

                        </div>

                        {{-- Jadwal --}}
                        <div class="col-md-6">

                            <div class="form-group mb-3">

                                <label>
                                    Jadwal Latihan
                                </label>

                                <input type="text"
                                       name="jadwal_latihan"
                                       class="form-control"
                                       placeholder="Contoh: Sabtu, 08.00 - 10.00"
                                       value="{{ old('jadwal_latihan') }}"
                                       required>

                            </div>

                        </div>

                        {{-- Gambar --}}
                        <div class="col-md-6">

                            <div class="form-group mb-3">

                                <label>
                                    Gambar Ekstrakurikuler
                                </label>

                                <input type="file"
                                       name="gambar"
                                       class="form-control"
                                       accept="image/jpeg,image/jpg,image/png">

                                <small class="text-muted">
                                    Format JPG, JPEG, PNG. Maksimal 2 MB.
                                </small>

                            </div>

                        </div>

                        {{-- Deskripsi --}}
                        <div class="col-12">

                            <div class="form-group mb-3">

                                <label>
                                    Deskripsi
                                </label>

                                <textarea name="deskripsi"
                                          class="form-control"
                                          rows="4"
                                          placeholder="Deskripsi ekstrakurikuler"
                                          required>{{ old('deskripsi') }}</textarea>

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

                        <i class="bi bi-arrow-counterclockwise"></i>
                        Reset

                    </button>

                </form>

            </div>

        </div>


        {{-- TABEL DATA --}}
        <div class="card">

            <div class="card-header">

                <h4 class="card-title">
                    Data Ekstrakurikuler
                </h4>

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

                            @forelse($ekskuls as $item)

                                <tr>

                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        {{ $item->nama_ekskul }}
                                    </td>

                                    <td>
                                        {{ $item->pembina }}
                                    </td>

                                    <td>
                                        {{ $item->jadwal_latihan }}
                                    </td>

                                    <td>
                                        {{ $item->deskripsi }}
                                    </td>

                                    <td>

                                        @if($item->gambar)

                                            <img src="{{ asset('storage/' . $item->gambar) }}"
                                                 alt="Gambar {{ $item->nama_ekskul }}"
                                                 width="80"
                                                 height="60"
                                                 style="object-fit: cover; border-radius: 8px;">

                                        @else

                                            <span class="text-muted">
                                                Tidak ada gambar
                                            </span>

                                        @endif

                                    </td>

                                    <td>

                                        <a href="{{ route('admin.ekstrakurikuler.edit', $item->id_ekskul) }}"
                                           class="btn btn-warning btn-sm">

                                            <i class="bi bi-pencil-square"></i>
                                            Edit

                                        </a>

                                        <form action="{{ route('admin.ekstrakurikuler.destroy', $item->id_ekskul) }}"
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