<?php

namespace App\Http\Controllers;

use App\Models\ProfilSekolah;
use App\Models\Guru;
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

        $berita = Berita::orderBy('tanggal', 'desc')
            ->take(3)
            ->get();

        $pengumuman = Pengumuman::orderBy('tanggal', 'desc')
            ->take(3)
            ->get();

        $guru = Guru::take(3)->get();

        $ekskuls = Ekstrakurikuler::take(3)->get();

        $prestasi = Prestasi::take(3)->get();

        $galeris = Galeri::take(4)->get();

        $totalGuru = Guru::count();
        $totalEkstrakurikuler = Ekstrakurikuler::count();
        $totalPrestasi = Prestasi::count();
        $totalBerita = Berita::count();
        $totalPengumuman = Pengumuman::count();
        $totalGaleri = Galeri::count();

        return view('landing.index', compact(
            'profil',
            'berita',
            'pengumuman',
            'guru',
            'ekskuls',
            'prestasi',
            'galeris',
            'totalGuru',
            'totalEkstrakurikuler',
            'totalPrestasi',
            'totalBerita',
            'totalPengumuman',
            'totalGaleri'
        ));
    }
}
