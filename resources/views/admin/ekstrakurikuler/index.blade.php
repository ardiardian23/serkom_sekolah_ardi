```blade
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

    {{-- SUCCESS --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- ERROR --}}
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
        @if(auth()->user()->role === 'Admin')

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


                            {{-- NAMA --}}
                            <div class="col-md-6">

                                <div class="form-group mb-3">

                                    <label>
                                        Nama Ekstrakurikuler
                                    </label>

                                    <input
                                        type="text"
                                        name="nama_ekskul"
                                        class="form-control"
                                        placeholder="Contoh: Pramuka"
                                        value="{{ old('nama_ekskul') }}"
                                    >

                                </div>

                            </div>


                            {{-- PEMBINA --}}
                            <div class="col-md-6">

                                <div class="form-group mb-3">

                                    <label>
                                        Pembina
                                    </label>

                                    <input
                                        type="text"
                                        name="pembina"
                                        class="form-control"
                                        placeholder="Nama pembina"
                                        value="{{ old('pembina') }}"
                                    >

                                </div>

                            </div>


                            {{-- JADWAL --}}
                            <div class="col-md-6">

                                <div class="form-group mb-3">

                                    <label>
                                        Jadwal Latihan
                                    </label>

                                    <input
                                        type="text"
                                        name="jadwal_latihan"
                                        class="form-control"
                                        placeholder="Contoh: Sabtu, 08.00 - 10.00"
                                        value="{{ old('jadwal_latihan') }}"
                                    >

                                </div>

                            </div>


                            {{-- GAMBAR --}}
                            <div class="col-md-6">

                                <div class="form-group mb-3">

                                    <label>
                                        Gambar
                                    </label>

                                    <input
                                        type="file"
                                        name="gambar"
                                        class="form-control"
                                        accept="image/*"
                                    >

                                    <small class="text-muted">
                                        JPG, JPEG, PNG. Maksimal 2 MB.
                                    </small>

                                </div>

                            </div>


                            {{-- DESKRIPSI --}}
                            <div class="col-12">

                                <div class="form-group mb-3">

                                    <label>
                                        Deskripsi
                                    </label>

                                    <textarea
                                        name="deskripsi"
                                        class="form-control"
                                        rows="4"
                                        placeholder="Deskripsi ekstrakurikuler"
                                    >{{ old('deskripsi') }}</textarea>

                                </div>

                            </div>

                        </div>


                        <button
                            type="submit"
                            class="btn btn-primary"
                        >

                            <i class="bi bi-save"></i>
                            Simpan Data

                        </button>


                        <button
                            type="reset"
                            class="btn btn-secondary"
                        >

                            Reset

                        </button>

                    </form>

                </div>

            </div>

        @endif


        {{-- TABEL DATA --}}
        <div class="card">

            <div class="card-header d-flex justify-content-between align-items-center">

                <h4 class="card-title">
                    Data Ekstrakurikuler
                </h4>

            </div>


            <div class="card-body">


                {{-- SEARCH --}}
                <form
                    action="{{ route('admin.ekstrakurikuler.index') }}"
                    method="GET"
                    class="mb-3"
                >

                    <div class="input-group">

                        <input
                            type="text"
                            name="search"
                            class="form-control"
                            placeholder="Cari nama ekskul atau pembina..."
                            value="{{ $search ?? '' }}"
                        >

                        <button
                            type="submit"
                            class="btn btn-primary"
                        >

                            <i class="bi bi-search"></i>
                            Cari

                        </button>


                        @if(!empty($search))

                            <a
                                href="{{ route('admin.ekstrakurikuler.index') }}"
                                class="btn btn-secondary"
                            >

                                <i class="bi bi-x-circle"></i>
                                Reset

                            </a>

                        @endif

                    </div>

                </form>


                <div class="table-responsive">

                    <table class="table table-striped">

                        <thead>

                            <tr>

                                <th>No</th>
                                <th>Nama Ekskul</th>
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


                                    {{-- GAMBAR --}}
                                    <td>

                                        @if($ekskul->gambar)

                                            <img
                                                src="{{ asset('storage/' . $ekskul->gambar) }}"
                                                alt="Gambar {{ $ekskul->nama_ekskul }}"
                                                width="90"
                                                height="65"
                                                style="object-fit: cover; border-radius: 8px;"
                                            >

                                        @else

                                            <span class="text-muted">
                                                Tidak ada gambar
                                            </span>

                                        @endif

                                    </td>


                                    {{-- AKSI --}}
                                    <td>
                                        @if(auth()->user()->role === 'Admin')

                                            {{-- EDIT --}}
                                            <a
                                                href="{{ route('admin.ekstrakurikuler.edit', $ekskul->id_ekskul) }}"
                                                class="btn btn-warning btn-sm"
                                                title="Edit"
                                            >

                                                <i class="bi bi-pencil-square"></i>

                                            </a>


                                            {{-- HAPUS --}}
                                            <form
                                                action="{{ route('admin.ekstrakurikuler.destroy', $ekskul->id_ekskul) }}"
                                                method="POST"
                                                class="d-inline"
                                            >

                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="btn btn-danger btn-sm"
                                                    title="Hapus"
                                                    onclick="return confirm('Yakin ingin menghapus data ini?')"
                                                >

                                                    <i class="bi bi-trash"></i>

                                                </button>

                                            </form>

                                        @endif

                                    </td>

                                </tr>


                            @empty

                                <tr>

                                    <td
                                        colspan="7"
                                        class="text-center"
                                    >

                                        @if(!empty($search))

                                            Data ekstrakurikuler dengan pencarian
                                            "<strong>{{ $search }}</strong>"
                                            tidak ditemukan.

                                        @else

                                            Belum ada data ekstrakurikuler.

                                        @endif

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


