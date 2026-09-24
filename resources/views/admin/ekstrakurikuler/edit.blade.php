@extends('layouts.admin')

@section('title', 'Edit Ekstrakurikuler')

@section('content')

<div class="page-heading">
    <h3>Edit Ekstrakurikuler</h3>
    <p class="text-subtitle text-muted">
        Ubah data ekstrakurikuler sekolah
    </p>
</div>

<div class="page-content">

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
                <h4 class="card-title">
                    Edit Data Ekstrakurikuler
                </h4>
            </div>

            <div class="card-body">

                <form action="{{ route('admin.ekstrakurikuler.update', $ekskul->id_ekskul) }}"
                      method="POST">

                    @csrf
                    @method('PUT')

                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group mb-3">

                                <label for="nama_ekskul">
                                    Nama Ekstrakurikuler
                                </label>

                                <input type="text"
                                       id="nama_ekskul"
                                       name="nama_ekskul"
                                       class="form-control"
                                       value="{{ old('nama_ekskul', $ekskul->nama_ekskul) }}"
                                       placeholder="Contoh: Pramuka">

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group mb-3">

                                <label for="pembina">
                                    Pembina
                                </label>

                                <input type="text"
                                       id="pembina"
                                       name="pembina"
                                       class="form-control"
                                       value="{{ old('pembina', $ekskul->pembina) }}"
                                       placeholder="Nama pembina">

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group mb-3">

                                <label for="jadwal_latihan">
                                    Jadwal Latihan
                                </label>

                                <input type="text"
                                       id="jadwal_latihan"
                                       name="jadwal_latihan"
                                       class="form-control"
                                       value="{{ old('jadwal_latihan', $ekskul->jadwal_latihan) }}"
                                       placeholder="Contoh: Sabtu, 08.00 - 10.00">

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group mb-3">

                                <label for="gambar">
                                    Gambar
                                </label>

                                <input type="text"
                                       id="gambar"
                                       name="gambar"
                                       class="form-control"
                                       value="{{ old('gambar', $ekskul->gambar) }}"
                                       placeholder="Nama file gambar">

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
                                          placeholder="Deskripsi ekstrakurikuler">{{ old('deskripsi', $ekskul->deskripsi) }}</textarea>

                            </div>

                        </div>

                    </div>

                    <button type="submit"
                            class="btn btn-primary">
                        <i class="bi bi-save"></i>
                        Update Data
                    </button>

                    <a href="{{ route('admin.ekstrakurikuler.create') }}"
                       class="btn btn-secondary">
                        Kembali
                    </a>

                </form>

            </div>

        </div>

    </section>

</div>

@endsection