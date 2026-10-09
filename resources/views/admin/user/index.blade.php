@extends('layouts.admin')

@section('title', 'Data User')

@section('content')
<div class="page-heading">
    <h3>Data User</h3>
</div>

<div class="page-content">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h4>Data User</h4>
        </div>
        <div class="card-body">
            <a href="{{ route('admin.user.create') }}" class="btn btn-primary mb-3">
                <i class="bi bi-plus-circle"></i> Tambah User
            </a>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->role }}</td>
                                <td>
                                    <a href="{{ route('admin.user.edit', $user->id_user) }}" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.user.destroy', $user->id_user) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus user ini?')">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Belum ada data user.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

