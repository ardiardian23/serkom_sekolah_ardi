<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\GaleriController;


/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:Admin'])->group(function () {

    Route::get('/admin', [AdminController::class, 'index'])
        ->name('admin.index');

    Route::resource('admin/user', UserController::class)
        ->names('admin.user');

});


/*
|--------------------------------------------------------------------------
| ADMIN + OPERATOR
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:Admin,Operator'])->group(function () {

    Route::resource('admin/siswa', SiswaController::class)
        ->names('admin.siswa');

    Route::resource('admin/guru', GuruController::class)
        ->names('admin.guru');

    Route::get('/admin/profil-sekolah', [ProfilController::class, 'index'])
        ->name('profil.profil-sekolah.index');

    Route::get('/admin/profil-sekolah/edit', [ProfilController::class, 'edit'])
        ->name('profil.profil-sekolah.edit');

    Route::put('/admin/profil-sekolah', [ProfilController::class, 'update'])
        ->name('profil.profil-sekolah.update');

    Route::resource('admin/ekstrakurikuler', EkstrakurikulerController::class)
        ->names('admin.ekstrakurikuler');

    Route::resource('admin/prestasi', PrestasiController::class)
        ->names('admin.prestasi');

    Route::resource('admin/berita', BeritaController::class)
        ->names('admin.berita');

    Route::resource('admin/pengumuman', PengumumanController::class)
        ->names('admin.pengumuman');

    Route::resource('admin/galeri', GaleriController::class)
        ->names('admin.galeri');

});