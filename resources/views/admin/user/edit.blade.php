@extends('layouts.admin')

@section('title', 'Edit User')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit User</h3>
                <p class="text-subtitle text-muted">Perbarui data pengguna</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.index') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.user.index') }}">Data User</a>
                        </li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Form Edit User</h4>
            </div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.user.update', $user->id_user) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-3">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" value="{{ old('username', $user->username) }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="password">Password Baru</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Kosongkan jika tidak ingin mengganti password">
                        <small class="text-muted">Kosongkan jika password tidak ingin diubah.</small>
                    </div>

                    <div class="form-group mb-3">
                        <label for="role">Role</label>
                        <select name="role" id="role" class="form-select" required>
                            <option value="Operator" {{ old('role', $user->role) == 'Operator' ? 'selected' : '' }}>Operator</option>
                            <option value="Admin" {{ old('role', $user->role) == 'Admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                    </div>

                    <div class="d-flex gap-2">
                        <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection

