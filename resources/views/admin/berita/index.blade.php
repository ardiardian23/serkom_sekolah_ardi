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
{{-- ================================================= --}}
{{-- PESAN SUKSES --}}
{{-- ================================================= --}}
@if(session('success'))

    <div class="alert alert-success alert-dismissible fade show">

        <i class="bi bi-check-circle me-2"></i>

        {{ session('success') }}

        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert">
        </button>

    </div>

@endif


{{-- ================================================= --}}
{{-- PESAN ERROR --}}
{{-- ================================================= --}}

@if(session('error'))

    <div class="alert alert-danger alert-dismissible fade show">

        <i class="bi bi-exclamation-circle me-2"></i>

        {{ session('error') }}

        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert">
        </button>

    </div>

@endif


<section class="section">

    <div class="card">

        {{-- ================================================= --}}
        {{-- HEADER --}}
        {{-- ================================================= --}}

        <div class="card-header d-flex justify-content-between align-items-center">

            <div>

                <h4 class="card-title mb-1">
                    <i class="bi bi-newspaper me-2"></i>
                    Data Berita
                </h4>

                <small class="text-muted">
                    Daftar berita sekolah
                </small>

            </div>

            <a href="{{ route('admin.berita.create') }}"
               class="btn btn-primary">

                <i class="bi bi-plus-circle me-1"></i>
                Tambah Berita

            </a>

        </div>


        {{-- ================================================= --}}
        {{-- BODY --}}
        {{-- ================================================= --}}

        <div class="card-body">


            {{-- ================================================= --}}
            {{-- PENCARIAN --}}
            {{-- ================================================= --}}

            <form action="{{ route('admin.berita.index') }}"
                  method="GET"
                  class="mb-4">

                <div class="row">

                    <div class="col-md-6">

                        <div class="input-group">

                            <input type="text"
                                   name="search"
                                   class="form-control"
                                   value="{{ $search ?? '' }}"
                                   placeholder="Cari judul berita...">

                            <button type="submit"
                                    class="btn btn-primary">

                                <i class="bi bi-search me-1"></i>
                                Cari

                            </button>

                            @if(!empty($search))

                                <a href="{{ route('admin.berita.index') }}"
                                   class="btn btn-secondary">

                                    <i class="bi bi-arrow-clockwise"></i>
                                    Reset

                                </a>

                            @endif

                        </div>

                    </div>

                </div>

            </form>


            {{-- ================================================= --}}
            {{-- TABLE --}}
            {{-- ================================================= --}}

            <div class="table-responsive">

                <table class="table table-striped table-hover align-middle">

                    <thead>

                        <tr>

                            <th width="60">
                                No
                            </th>

                            <th>
                                Judul
                            </th>

                            <th>
                                Isi
                            </th>

                            <th>
                                Tanggal
                            </th>

                            <th>
                                Gambar
                            </th>

                            <th>
                                Status
                            </th>

                            <th width="180">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($beritas as $berita)

                            <tr>


                                {{-- NO --}}
                                <td>
                                    {{ $loop->iteration }}
                                </td>


                                {{-- JUDUL --}}
                                <td>

                                    <strong>
                                        {{ $berita->judul }}
                                    </strong>

                                </td>


                                {{-- ISI --}}
                                <td>

                                    <span class="text-muted">

                                        {{ \Illuminate\Support\Str::limit(strip_tags($berita->isi), 80) }}

                                    </span>

                                </td>


                                {{-- TANGGAL --}}
                                <td>

                                    @if($berita->tanggal)

                                        {{ \Carbon\Carbon::parse($berita->tanggal)->format('d-m-Y') }}

                                    @else

                                        <span class="text-muted">
                                            -
                                        </span>

                                    @endif

                                </td>


                                {{-- GAMBAR --}}
                                <td>

                                    @if($berita->gambar)

                                        <img src="{{ asset('storage/' . $berita->gambar) }}"
                                             alt="{{ $berita->judul }}"
                                             width="70"
                                             height="60"
                                             class="rounded"
                                             style="object-fit: cover;">

                                    @else

                                        <div class="d-flex align-items-center justify-content-center bg-light rounded"
                                             style="width: 70px; height: 60px;">

                                            <i class="bi bi-image text-secondary fs-4"></i>

                                        </div>

                                    @endif

                                </td>


                                {{-- STATUS --}}
                                <td>

                                    @if($berita->status === 'Publish')

                                        <span class="badge bg-success">

                                            <i class="bi bi-check-circle me-1"></i>
                                            Publish

                                        </span>

                                    @else

                                        <span class="badge bg-secondary">

                                            <i class="bi bi-file-earmark me-1"></i>
                                            Draft

                                        </span>

                                    @endif

                                </td>


                                {{-- AKSI --}}
                                <td>

                                    {{-- EDIT --}}
                                    <a href="{{ route('admin.berita.edit', $berita->id_berita) }}"
                                       class="btn btn-warning btn-sm"
                                       title="Edit berita">

                                        <i class="bi bi-pencil-square"></i>

                                    </a>


                                    {{-- HAPUS --}}
                                    <form action="{{ route('admin.berita.destroy', $berita->id_berita) }}"
                                          method="POST"
                                          class="d-inline">

                                        @csrf

                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-danger btn-sm"
                                                title="Hapus berita"
                                                onclick="return confirm('Yakin ingin menghapus berita ini?')">

                                            <i class="bi bi-trash"></i>

                                        </button>

                                    </form>

                                </td>

                            </tr>


                        @empty

                            <tr>

                                <td colspan="7"
                                    class="text-center py-5">

                                    @if(!empty($search))

                                        <i class="bi bi-search fs-1 text-secondary"></i>

                                        <p class="text-muted mt-3 mb-0">

                                            Berita dengan kata
                                            <strong>"{{ $search }}"</strong>
                                            tidak ditemukan.

                                        </p>

                                    @else

                                        <i class="bi bi-newspaper fs-1 text-secondary"></i>

                                        <p class="text-muted mt-3 mb-0">
                                            Belum ada berita.
                                        </p>

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

