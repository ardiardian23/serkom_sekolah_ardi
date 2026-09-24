<?php

namespace App\Http\Controllers;

use App\Models\ProfilSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    /**
     * Menampilkan profil sekolah
     */
    public function index()
    {
        $profil = ProfilSekolah::first();

        return view('profil.profil-sekolah.index', compact('profil'));
    }

    /**
     * Form edit profil sekolah
     */
    public function edit()
    {
        $profil = ProfilSekolah::first();

        return view('profil.profil-sekolah.edit', compact('profil'));
    }

    /**
     * Menyimpan profil sekolah
     */
    public function update(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDASI
        |--------------------------------------------------------------------------
        */

        $request->validate([
            'nama_sekolah' => 'required|string|max:255',
            'kepala_sekolah' => 'required|string|max:255',
            'npsn' => 'required|string|max:50',
            'alamat' => 'required|string',
            'kontak' => 'required|string|max:50',
            'tahun_berdiri' => 'required|integer',
            'deskripsi' => 'required|string',
            'visi_misi' => 'required|string',

            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'nama_sekolah.required' => 'Nama sekolah wajib diisi.',
            'kepala_sekolah.required' => 'Kepala sekolah wajib diisi.',
            'npsn.required' => 'NPSN wajib diisi.',
            'alamat.required' => 'Alamat wajib diisi.',
            'kontak.required' => 'Kontak wajib diisi.',
            'tahun_berdiri.required' => 'Tahun berdiri wajib diisi.',
            'tahun_berdiri.integer' => 'Tahun berdiri harus berupa angka.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'visi_misi.required' => 'Visi dan misi wajib diisi.',

            'foto.image' => 'Foto sekolah harus berupa gambar.',
            'foto.mimes' => 'Foto sekolah harus JPG, JPEG, atau PNG.',
            'foto.max' => 'Ukuran foto sekolah maksimal 2 MB.',

            'logo.image' => 'Logo sekolah harus berupa gambar.',
            'logo.mimes' => 'Logo sekolah harus JPG, JPEG, atau PNG.',
            'logo.max' => 'Ukuran logo sekolah maksimal 2 MB.',
        ]);

        /*
        |--------------------------------------------------------------------------
        | AMBIL DATA LAMA
        |--------------------------------------------------------------------------
        */

        $profil = ProfilSekolah::first();

        /*
        |--------------------------------------------------------------------------
        | DATA BARU
        |--------------------------------------------------------------------------
        */

        if (!$profil) {
            $profil = new ProfilSekolah();
        }

        $profil->nama_sekolah = $request->nama_sekolah;
        $profil->kepala_sekolah = $request->kepala_sekolah;
        $profil->npsn = $request->npsn;
        $profil->alamat = $request->alamat;
        $profil->kontak = $request->kontak;
        $profil->tahun_berdiri = $request->tahun_berdiri;
        $profil->deskripsi = $request->deskripsi;
        $profil->visi_misi = $request->visi_misi;

        /*
        |--------------------------------------------------------------------------
        | FOTO SEKOLAH
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('foto')) {

            // Hapus foto lama
            if ($profil->foto) {
                Storage::disk('public')->delete($profil->foto);
            }

            // Simpan foto baru
            $profil->foto = $request->file('foto')
                ->store('profil', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | LOGO SEKOLAH
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('logo')) {

            // Hapus logo lama
            if ($profil->logo) {
                Storage::disk('public')->delete($profil->logo);
            }

            // Simpan logo baru
            $profil->logo = $request->file('logo')
                ->store('profil', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | SIMPAN DATABASE
        |--------------------------------------------------------------------------
        */

        $profil->save();

        return redirect()
            ->route('profil.profil-sekolah.index')
            ->with('success', 'Profil sekolah berhasil disimpan.');
    }
}