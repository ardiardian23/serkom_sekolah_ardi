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

// Halaman login
Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

// Proses login
Route::post('/login', [AuthController::class, 'login']);

// Proses logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
| Admin dan Operator sama-sama boleh masuk Dashboard
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:Admin,Operator'])->group(function () {

    Route::get('/admin', [AdminController::class, 'index'])
        ->name('admin.index');

});


/*
|--------------------------------------------------------------------------
| SISWA
|--------------------------------------------------------------------------
| Admin      = lihat + tambah + edit + hapus
| Operator   = hanya lihat
|--------------------------------------------------------------------------
*/


// ADMIN - CRUD SISWA
Route::middleware(['auth', 'role:Admin'])->group(function () {

    Route::get('/admin/siswa/create', [SiswaController::class, 'create'])
        ->name('admin.siswa.create');

    Route::post('/admin/siswa', [SiswaController::class, 'store'])
        ->name('admin.siswa.store');

    Route::get('/admin/siswa/{siswa}/edit', [SiswaController::class, 'edit'])
        ->name('admin.siswa.edit');

    Route::put('/admin/siswa/{siswa}', [SiswaController::class, 'update'])
        ->name('admin.siswa.update');

    Route::delete('/admin/siswa/{siswa}', [SiswaController::class, 'destroy'])
        ->name('admin.siswa.destroy');

});


// ADMIN + OPERATOR - LIHAT SISWA
Route::middleware(['auth', 'role:Admin,Operator'])->group(function () {

    Route::get('/admin/siswa', [SiswaController::class, 'index'])
        ->name('admin.siswa.index');

    Route::get('/admin/siswa/{siswa}', [SiswaController::class, 'show'])
        ->name('admin.siswa.show');

});


/*
|--------------------------------------------------------------------------
| GURU
|--------------------------------------------------------------------------
| Admin      = lihat + tambah + edit + hapus
| Operator   = hanya lihat
|--------------------------------------------------------------------------
*/


// ADMIN - CRUD GURU
Route::middleware(['auth', 'role:Admin'])->group(function () {

    Route::get('/admin/guru/create', [GuruController::class, 'create'])
        ->name('admin.guru.create');

    Route::post('/admin/guru', [GuruController::class, 'store'])
        ->name('admin.guru.store');

    Route::get('/admin/guru/{guru}/edit', [GuruController::class, 'edit'])
        ->name('admin.guru.edit');

    Route::put('/admin/guru/{guru}', [GuruController::class, 'update'])
        ->name('admin.guru.update');

    Route::delete('/admin/guru/{guru}', [GuruController::class, 'destroy'])
        ->name('admin.guru.destroy');

});


// ADMIN + OPERATOR - LIHAT GURU
Route::middleware(['auth', 'role:Admin,Operator'])->group(function () {

    Route::get('/admin/guru', [GuruController::class, 'index'])
        ->name('admin.guru.index');

    Route::get('/admin/guru/{guru}', [GuruController::class, 'show'])
        ->name('admin.guru.show');

});


/*
|--------------------------------------------------------------------------
| USER / PENGGUNA
|--------------------------------------------------------------------------
| Admin      = lihat + tambah + edit + hapus
| Operator   = hanya lihat
|--------------------------------------------------------------------------
*/


// ADMIN - CRUD USER
Route::middleware(['auth', 'role:Admin'])->group(function () {

    Route::resource('admin/user', UserController::class)
        ->names('admin.user');

});


// ADMIN + OPERATOR - LIHAT USER
Route::middleware(['auth', 'role:Admin,Operator'])->group(function () {

    Route::get('/admin/user', [UserController::class, 'index'])
        ->name('admin.user.index');

    Route::get('/admin/user/{user}', [UserController::class, 'show'])
        ->name('admin.user.show');

});


/*
|--------------------------------------------------------------------------
| PROFIL SEKOLAH
|--------------------------------------------------------------------------
| Admin + Operator
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:Admin,Operator'])->group(function () {

    Route::get('/admin/profil-sekolah', [ProfilController::class, 'index'])
        ->name('profil.profil-sekolah.index');

    Route::get('/admin/profil-sekolah/edit', [ProfilController::class, 'edit'])
        ->name('profil.profil-sekolah.edit');

    Route::put('/admin/profil-sekolah', [ProfilController::class, 'update'])
        ->name('profil.profil-sekolah.update');

});


/*
|--------------------------------------------------------------------------
| EKSTRAKURIKULER
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:Admin,Operator'])->group(function () {

    Route::resource('admin/ekstrakurikuler', EkstrakurikulerController::class)
        ->names('admin.ekstrakurikuler');

});


/*
|--------------------------------------------------------------------------
| PRESTASI
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:Admin,Operator'])->group(function () {

    Route::resource('admin/prestasi', PrestasiController::class)
        ->names('admin.prestasi');

});


/*
|--------------------------------------------------------------------------
| BERITA
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:Admin,Operator'])->group(function () {

    Route::resource('admin/berita', BeritaController::class)
        ->names('admin.berita');

});


/*
|--------------------------------------------------------------------------
| PENGUMUMAN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:Admin,Operator'])->group(function () {

    Route::resource('admin/pengumuman', PengumumanController::class)
        ->names('admin.pengumuman');

});


/*
|--------------------------------------------------------------------------
| GALERI
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:Admin,Operator'])->group(function () {

    Route::resource('admin/galeri', GaleriController::class)
        ->names('admin.galeri');

});