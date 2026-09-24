@extends('layouts.admin')

@section('title', 'Edit Prestasi')

@section('content')

<div class="page-heading">

    <h3>Edit Prestasi</h3>

    <p class="text-subtitle text-muted">
        Ubah data prestasi sekolah
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
                    Edit Data Prestasi
                </h4>

            </div>

            <div class="card-body">

                <form action="{{ route('admin.prestasi.update', $prestasi->id) }}"
                      method="POST">

                    @csrf
                    @method('PUT')

                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group mb-3">

                                <label for="nama_prestasi">
                                    Nama Prestasi
                                </label>

                                <input type="text"
                                       id="nama_prestasi"
                                       name="nama_prestasi"
                                       class="form-control"
                                       value="{{ old('nama_prestasi', $prestasi->nama_prestasi) }}"
                                       placeholder="Nama prestasi">

                            </div>

                        </div>


                        <div class="col-md-6">

                            <div class="form-group mb-3">

                                <label for="tahun_ajaran">
                                    Tahun Ajaran
                                </label>

                                <input type="text"
                                       id="tahun_ajaran"
                                       name="tahun_ajaran"
                                       class="form-control"
                                       value="{{ old('tahun_ajaran', $prestasi->tahun_ajaran) }}"
                                       placeholder="Contoh: 2025/2026">

                            </div>

                        </div>


                        <div class="col-md-6">

                            <div class="form-group mb-3">

                                <label for="foto">
                                    Foto
                                </label>

                                <input type="text"
                                       id="foto"
                                       name="foto"
                                       class="form-control"
                                       value="{{ old('foto', $prestasi->foto) }}"
                                       placeholder="Nama file foto">

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
                                          placeholder="Deskripsi prestasi">{{ old('deskripsi', $prestasi->deskripsi) }}</textarea>

                            </div>

                        </div>

                    </div>


                    <button type="submit"
                            class="btn btn-primary">

                        <i class="bi bi-save"></i>
                        Update Data

                    </button>


                    <a href="{{ route('admin.prestasi.create') }}"
                       class="btn btn-secondary">

                        Kembali

                    </a>

                </form>

            </div>

        </div>

    </section>

</div>

@endsection