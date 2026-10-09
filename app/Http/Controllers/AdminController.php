<?php

namespace App\Http\Controllers;

use App\Models\ProfilSekolah;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Ekstrakurikuler;
use App\Models\Prestasi;
use App\Models\Berita;
use App\Models\Pengumuman;
use App\Models\Galeri;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        // Profil sekolah
        $profil = ProfilSekolah::first();

        // Total data
        $totalGuru = Guru::count();
        $totalSiswa = Siswa::count();
        $totalEkstrakurikuler = Ekstrakurikuler::count();
        $totalPrestasi = Prestasi::count();
        $totalBerita = Berita::count();
        $totalPengumuman = Pengumuman::count();
        $totalGaleri = Galeri::count();
        // Data user
        $users = User::orderByDesc('id_user')->get();
        // Data terbaru untuk ditampilkan gambarnya
        $eskulTerbaru = Ekstrakurikuler::orderByDesc('id_ekskul')->first();
        $prestasiTerbaru = Prestasi::orderByDesc('id')->first();
        return view('admin.index', compact(
            'profil',
            'totalGuru',
            'totalSiswa',
            'totalEkstrakurikuler',
            'totalPrestasi',
            'totalBerita',
            'totalPengumuman',
            'totalGaleri',
            'users',
            'eskulTerbaru',
            'prestasiTerbaru'
        ));
    }
}
