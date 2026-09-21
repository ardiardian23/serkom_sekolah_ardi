<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $gurus = Guru::orderBy('id_guru', 'desc')->get();

        return view('admin.guru.index', compact('gurus'));
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
            'mapel' => 'required|string|max:40',
            'foto' => 'nullable|string|max:100',
        ], [
            'nama_guru.required' => 'Nama guru wajib diisi.',
            'nip.required' => 'NIP wajib diisi.',
            'mapel.required' => 'Mata pelajaran wajib diisi.',
        ]);

        Guru::create([
            'nama_guru' => $request->nama_guru,
            'nip' => $request->nip,
            'mapel' => $request->mapel,
            'foto' => $request->foto,
        ]);

        return redirect()
            ->route('admin.guru.create')
            ->with('success', 'Data guru berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $guru = Guru::findOrFail($id);

        return view('admin.guru.edit', compact('guru'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_guru' => 'required|string|max:40',
            'nip' => 'required|string|max:15',
            'mapel' => 'required|string|max:40',
            'foto' => 'nullable|string|max:100',
        ]);

        $guru = Guru::findOrFail($id);

        $guru->update([
            'nama_guru' => $request->nama_guru,
            'nip' => $request->nip,
            'mapel' => $request->mapel,
            'foto' => $request->foto,
        ]);

        return redirect()
            ->route('admin.guru.create')
            ->with('success', 'Data guru berhasil diperbarui.');
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