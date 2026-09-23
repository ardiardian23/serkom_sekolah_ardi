<?php

namespace App\Http\Controllers;

use App\Models\ProfilSekolah;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        $profil = ProfilSekolah::first();

        return view('profil.profil-sekolah.index', compact('profil'));
    }

    public function edit()
    {
        $profil = ProfilSekolah::first();

        return view('profil.profil-sekolah.edit', compact('profil'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama_sekolah' => 'required|string|max:40',
            'kepala_sekolah' => 'required|string|max:40',
            'npsn' => 'required|string|max:10',
            'alamat' => 'required|string',
            'kontak' => 'required|string|max:15',
            'tahun_berdiri' => 'required|integer',
            'deskripsi' => 'nullable|string',
            'visi_misi' => 'nullable|string',
            'foto' => 'nullable|string|max:100',
            'logo' => 'nullable|string|max:100',
        ]);

        $profil = ProfilSekolah::first();

        if ($profil) {
            $profil->update($request->only([
                'nama_sekolah',
                'kepala_sekolah',
                'npsn',
                'alamat',
                'kontak',
                'tahun_berdiri',
                'deskripsi',
                'visi_misi',
                'foto',
                'logo',
            ]));
        } else {
            ProfilSekolah::create($request->only([
                'nama_sekolah',
                'kepala_sekolah',
                'npsn',
                'alamat',
                'kontak',
                'tahun_berdiri',
                'deskripsi',
                'visi_misi',
                'foto',
                'logo',
            ]));
        }

        return redirect()
            ->route('profil.profil_sekolah.index')
            ->with('success', 'Profil sekolah berhasil disimpan.');
    }
}