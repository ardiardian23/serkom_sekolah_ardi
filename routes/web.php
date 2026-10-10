
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
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\LandingController;

/*
|--------------------------------------------------------------------------
| HALAMAN UTAMA
|--------------------------------------------------------------------------
*/

Route::get('/', [LandingController::class, 'index'])
    ->name('landing');

/*
|--------------------------------------------------------------------------
| HALAMAN PUBLIK
|--------------------------------------------------------------------------
*/

Route::get('/berita', [BeritaController::class, 'publicIndex'])
    ->name('berita.public');

Route::get('/pengumuman', [PengumumanController::class, 'publicIndex'])
    ->name('pengumuman.public');

Route::get('/guru-staff', [GuruController::class, 'publicIndex'])
    ->name('guru.public');

Route::get('/ekstrakurikuler', [
    EkstrakurikulerController::class,
    'publicIndex',
])->name('ekstrakurikuler.public');

Route::get('/prestasi', [PrestasiController::class, 'publicIndex'])
    ->name('prestasi.public');

Route::get('/galeri', [GaleriController::class, 'publicIndex'])
    ->name('galeri.public');

Route::get('/profil', [ProfilController::class, 'show'])
    ->name('profil.public');

/*
|--------------------------------------------------------------------------
| DETAIL HALAMAN PUBLIK
|--------------------------------------------------------------------------
*/

Route::get('/berita/{id}', [BeritaController::class, 'show'])
    ->name('berita.show');

Route::get('/pengumuman/{id}', [PengumumanController::class, 'show'])
    ->name('pengumuman.show');

Route::get('/guru/{id}', [GuruController::class, 'show'])
    ->name('guru.show');

Route::get('/ekstrakurikuler/{id}', [
    EkstrakurikulerController::class,
    'show',
])->name('ekstrakurikuler.show');

Route::get('/prestasi/{id}', [PrestasiController::class, 'show'])
    ->name('prestasi.show');

Route::get('/galeri/{id}', [GaleriController::class, 'show'])
    ->name('galeri.show');

/*
|--------------------------------------------------------------------------
| LOGIN DAN LOGOUT
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:Admin,Operator'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])
        ->name('admin.index');
});

/*
|--------------------------------------------------------------------------
| USER
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/admin/user/create', [UserController::class, 'create'])
        ->name('admin.user.create');

    Route::post('/admin/user', [UserController::class, 'store'])
        ->name('admin.user.store');

    Route::get('/admin/user/{user}/edit', [UserController::class, 'edit'])
        ->name('admin.user.edit');

    Route::put('/admin/user/{user}', [UserController::class, 'update'])
        ->name('admin.user.update');

    Route::delete('/admin/user/{user}', [UserController::class, 'destroy'])
        ->name('admin.user.destroy');
});

Route::middleware(['auth', 'role:Admin,Operator'])->group(function () {
    Route::get('/admin/user', [UserController::class, 'index'])
        ->name('admin.user.index');

    Route::get('/admin/user/{user}', [UserController::class, 'show'])
        ->name('admin.user.show');
});


/*
|--------------------------------------------------------------------------
| SISWA
|--------------------------------------------------------------------------
*/

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

Route::middleware(['auth', 'role:Admin,Operator'])->group(function () {
    Route::get('/admin/siswa', [SiswaController::class, 'index'])
        ->name('admin.siswa.index');

    Route::get('/admin/siswa/{siswa}', [SiswaController::class, 'show'])
        ->name('admin.siswa.show');
});


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
*/

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

Route::middleware(['auth', 'role:Admin,Operator'])->group(function () {
    Route::get('/admin/guru', [GuruController::class, 'index'])
        ->name('admin.guru.index');

    Route::get('/admin/guru/{guru}', [GuruController::class, 'show'])
        ->name('admin.guru.show');
});

/*
|--------------------------------------------------------------------------
| PROFIL SEKOLAH
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
| CRUD ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:Admin,Operator'])->group(function () {
    Route::resource(
        'admin/ekstrakurikuler',
        EkstrakurikulerController::class
    )->names('admin.ekstrakurikuler');

    Route::resource('admin/prestasi', PrestasiController::class)
        ->names('admin.prestasi');

    Route::resource('admin/berita', BeritaController::class)
        ->names('admin.berita');

    Route::resource('admin/pengumuman', PengumumanController::class)
        ->names('admin.pengumuman');

    Route::resource('admin/galeri', GaleriController::class)
        ->names('admin.galeri');
});

/*
|--------------------------------------------------------------------------
| ADMIN - TAMBAH GALERI
|--------------------------------------------------------------------------
|
| Route create sudah disediakan oleh Route::resource di atas.
| Tidak perlu menambahkan route admin/galeri/create lagi.
|
*/

