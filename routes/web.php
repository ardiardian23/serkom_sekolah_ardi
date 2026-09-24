<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;



use App\Models\Profilsekolah;

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::post('auth', [AuthController::class, 'auth'])->name('auth');


Route::middleware('checkauth')->group(function(){
    Route::get('/admin', [AdminController::class, 'index'])
        ->name('admin.index');
    
    Route::resource('admin/siswa', SiswaController::class)
        ->names('admin.siswa');
    
    Route::resource('admin/guru', GuruController::class)
        ->names('admin.guru');
    
    Route::resource('admin/ekstrakurikuler', EkstrakurikulerController::class)
        ->names('admin.ekstrakurikuler');
    
    Route::resource('admin/prestasi', PrestasiController::class)
        ->names('admin.prestasi');
    
    Route::resource('admin/berita', BeritaController::class)
        ->names('admin.berita');
    
    Route::resource('admin/user', UserController::class)
        ->names('admin.user');
    
    
        // --Profilsekolah--
    
    Route::get('/admin/profil-sekolah', [ProfilController::class, 'index'])
        ->name('profil.profil-sekolah.index');
    
    Route::get('/admin/profil-sekolah/edit', [ProfilController::class, 'edit'])
        ->name('profil.profil-sekolah.edit');
    
    Route::put('/admin/profil-sekolah', [ProfilController::class, 'update'])
        ->name('profil.profil-sekolah.update');

});