@extends('layouts.admin')

@section('title', 'Agenda Sekolah')

@section('content')

<div class="page-heading">

    <div class="page-title mb-4">

        <div class="row">

            <div class="col-12 col-md-6 order-md-1 order-last">

                <h3>Agenda Sekolah</h3>

                <p class="text-subtitle text-muted">
                    Kelola agenda dan kegiatan sekolah
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
                            Agenda
                        </li>

                    </ol>

                </nav>

            </div>

        </div>

    </div>


    <div class="card">

        <div class="card-header">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h4 class="card-title mb-1">
                        Data Agenda
                    </h4>

                    <p class="text-muted mb-0">
                        Daftar kegiatan sekolah
                    </p>

                </div>

                <a href="{{ route('admin.agenda.create') }}"
                   class="btn btn-primary">

                    <i class="bi bi-plus-circle"></i>

                    Tambah Agenda

                </a>

            </div>

        </div>


        <div class="card-body">

            @if(session('success'))

                <div class="alert alert-success">
                    <i class="bi bi-check-circle"></i>
                    {{ session('success') }}
                </div>

            @endif


            @if($agenda->count() == 0)

                <div class="text-center py-5">

                    <i class="bi bi-calendar-event text-muted"
                       style="font-size: 60px;">
                    </i>

                    <h5 class="mt-3">
                        Belum ada agenda
                    </h5>

                    <p class="text-muted">
                        Silakan tambahkan agenda sekolah.
                    </p>

                    <a href="{{ route('admin.agenda.create') }}"
                       class="btn btn-primary">

                        <i class="bi bi-plus-circle"></i>
                        Tambah Agenda

                    </a>

                </div>

            @else

                <div class="table-responsive">

                    <table class="table table-hover align-middle">

                        <thead>

                            <tr>

                                <th>No</th>

                                <th>Judul</th>

                                <th>Tanggal</th>

                                <th>Waktu</th>

                                <th>Lokasi</th>

                                <th>Deskripsi</th>

                                <th>Aksi</th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach($agenda as $agenda)

                                <tr>

                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        <strong>
                                            {{ $agenda->judul }}
                                        </strong>
                                    </td>

                                    <td>
                                        {{ \Carbon\Carbon::parse($agenda->tanggal)->format('d-m-Y') }}
                                    </td>

                                    <td>
                                        {{ \Carbon\Carbon::parse($agenda->waktu)->format('H:i') }}
                                    </td>

                                    <td>
                                        {{ $agenda->lokasi }}
                                    </td>

                                    <td>
                                        {{ Str::limit($agenda->deskripsi, 60) }}
                                    </td>

                                    <td>

                                        <div class="d-flex gap-1">

                                            <a href="{{ route('admin.agenda.edit', $agenda->id_agenda) }}"
                                               class="btn btn-warning btn-sm">

                                                <i class="bi bi-pencil-square"></i>

                                            </a>


                                            <form action="{{ route('admin.agenda.destroy', $agenda->id_agenda) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Yakin ingin menghapus agenda ini?')">

                                                @csrf

                                                @method('DELETE')

                                                <button type="submit"
                                                        class="btn btn-danger btn-sm">

                                                    <i class="bi bi-trash"></i>

                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            @endif

        </div>

    </div>

</div>

@endsection