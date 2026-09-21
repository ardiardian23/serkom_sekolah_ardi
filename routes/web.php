<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuruController;

Route::get('/admin', [AdminController::class, 'index'])
    ->name('admin.index');

Route::resource('admin/siswa', SiswaController::class)
    ->names('admin.siswa');

Route::resource('admin/guru', GuruController::class)
    ->names('admin.guru');