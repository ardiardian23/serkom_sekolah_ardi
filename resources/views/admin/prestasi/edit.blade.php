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

        <div class="card">

            <div class="card-header">

                <h4 class="card-title">
                    Edit Data Prestasi
                </h4>

            </div>

            <div class="card-body">

                <form action="{{ route('admin.prestasi.update', $prestasi->id) }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="row">

                        {{-- Nama Prestasi --}}
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
                                       placeholder="Nama prestasi"
                                       required>

                            </div>

                        </div>


                        {{-- Tahun Ajaran --}}
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
                                       placeholder="Contoh: 2025/2026"
                                       required>

                            </div>

                        </div>


                        {{-- Foto --}}
                        <div class="col-md-6">

                            <div class="form-group mb-3">

                                <label for="foto">
                                    Foto Prestasi
                                </label>

                                {{-- Foto lama --}}
                                @if($prestasi->foto)

                                    <div class="mb-2">

                                        <img src="{{ asset('storage/' . $prestasi->foto) }}"
                                             alt="Foto Prestasi"
                                             width="120"
                                             height="90"
                                             style="object-fit: cover; border-radius: 8px;">

                                    </div>

                                @endif

                                <input type="file"
                                       id="foto"
                                       name="foto"
                                       class="form-control"
                                       accept="image/*">

                                <small class="text-muted">
                                    Kosongkan jika tidak ingin mengganti foto.
                                    Format JPG, JPEG, PNG. Maksimal 2 MB.
                                </small>

                            </div>

                        </div>


                        {{-- Deskripsi --}}
                        <div class="col-12">

                            <div class="form-group mb-3">

                                <label for="deskripsi">
                                    Deskripsi
                                </label>

                                <textarea id="deskripsi"
                                          name="deskripsi"
                                          class="form-control"
                                          rows="5"
                                          placeholder="Deskripsi prestasi"
                                          required>{{ old('deskripsi', $prestasi->deskripsi) }}</textarea>

                            </div>

                        </div>

                    </div>


                    {{-- Tombol --}}
                    <button type="submit"
                            class="btn btn-primary">

                        <i class="bi bi-save"></i>
                        Update Data

                    </button>


                    <a href="{{ route('admin.prestasi.create') }}"
                       class="btn btn-secondary">

                        <i class="bi bi-arrow-left"></i>
                        Kembali

                    </a>

                </form>

            </div>

        </div>

    </section>

</div>
@endsection