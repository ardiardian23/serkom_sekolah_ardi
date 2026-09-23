<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\ProfilController;
use App\Models\Profilsekolah;

Route::get('/admin', [AdminController::class, 'index'])
    ->name('admin.index');

Route::resource('admin/siswa', SiswaController::class)
    ->names('admin.siswa');

Route::resource('admin/guru', GuruController::class)
    ->names('admin.guru');


    // --Profilsekolah--

Route::get('/admin/profil-sekolah', [ProfilController::class, 'index'])
    ->name('profil.profil-sekolah.index');

Route::get('/admin/profil-sekolah/edit', [ProfilController::class, 'edit'])
    ->name('profil.profil-sekolah.edit');

Route::put('/admin/profil-sekolah', [ProfilController::class, 'update'])
    ->name('profil.profil-sekolah.update');