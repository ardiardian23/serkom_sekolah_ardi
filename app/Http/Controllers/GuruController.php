<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    public function index()
    {
        $gurus = Guru::orderBy('id_guru', 'desc')->get();

        return view('admin.guru.index', compact('gurus'));
    }

    public function edit($id)
    {
        $guru = Guru::findOrFail($id);

        return view('admin.guru.edit', compact('guru'));
    }

    public function create()
    {
        $gurus = Guru::orderBy('id_guru', 'desc')->get();

        return view('admin.guru.create', compact('gurus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_guru' => 'required|string|max:40',
            'nip' => 'required|string|max:15',
            'jenis_kelamin' => 'required|string|max:20',
            'mapel' => 'required|string|max:40',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $foto = null;

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('guru', 'public');
        }

        Guru::create([
            'nama_guru' => $request->nama_guru,
            'nip' => $request->nip,
            'jenis_kelamin' => $request->jenis_kelamin,
            'mapel' => $request->mapel,
            'foto' => $foto,
        ]);

        return redirect()
            ->route('admin.guru.create')
            ->with('success', 'Data guru berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $guru = Guru::findOrFail($id);

        $request->validate([
            'nama_guru' => 'required|string|max:40',
            'nip' => 'required|string|max:15',
            'jenis_kelamin' => 'required|string|max:20',
            'mapel' => 'required|string|max:40',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $guru->nama_guru = $request->nama_guru;
        $guru->nip = $request->nip;
        $guru->jenis_kelamin = $request->jenis_kelamin;
        $guru->mapel = $request->mapel;

        // Jika memilih foto baru
        if ($request->hasFile('foto')) {

            // Hapus foto lama
            if ($guru->foto) {
                Storage::disk('public')->delete($guru->foto);
            }

            // Simpan foto baru
            $guru->foto = $request->file('foto')->store('guru', 'public');
        }

        $guru->save();

        return redirect()
            ->route('admin.guru.index')
            ->with('success', 'Data guru dan foto berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);

        $guru->delete();

        return redirect()
            ->route('admin.guru.create')
            ->with('success', 'Data guru berhasil dihapus.');
    }
}