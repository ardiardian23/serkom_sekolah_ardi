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


class LandingController extends Controller
{
    public function index()
    {
        $profil = ProfilSekolah::first();

        $siswas = Siswa::orderByDesc('id_siswa')->get();

        $guru = Guru::orderBy('id_guru', 'desc')
            ->take(6)
            ->get();

        $berita = Berita::where('status', 'Publish')
            ->orderBy('tanggal', 'desc')
            ->take(3)
            ->get();

        $pengumuman = Pengumuman::where('status', 'Publish')
            ->orderBy('tanggal', 'desc')
            ->take(3)
            ->get();

        $prestasi = Prestasi::orderBy('id', 'desc')
            ->take(3)
            ->get();

        $ekskuls = Ekstrakurikuler::orderBy('id_ekskul', 'desc')
            ->take(6)
            ->get();

        $galeris = Galeri::orderBy('id_galeri', 'desc')
            ->take(8)
            ->get();

        $totalGuru = Guru::count();
        $totalSiswa = Siswa::count();

        return view('landing.index', compact(
            'profil',
            'guru',
            'berita',
            'pengumuman',
            'prestasi',
            'ekskuls',
            'galeris',
            'totalGuru',
            'totalSiswa',
            'siswas'
        ));
    }
}
