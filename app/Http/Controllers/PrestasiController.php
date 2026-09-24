<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    /**
     * Menampilkan semua data prestasi
     */
    public function index()
    {
        $prestasis = Prestasi::orderBy('id', 'desc')->get();

        return view('admin.prestasi.index', compact('prestasis'));
    }

    /**
     * Menampilkan form tambah prestasi
     */
    public function create()
    {
        $prestasis = Prestasi::orderBy('id', 'desc')->get();

        return view('admin.prestasi.create', compact('prestasis'));
    }

    /**
     * Menyimpan data prestasi
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_prestasi' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|string|max:100',
            'tahun_ajaran' => 'required|string|max:20',
        ], [
            'nama_prestasi.required' => 'Nama prestasi wajib diisi.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'tahun_ajaran.required' => 'Tahun ajaran wajib diisi.',
        ]);

        Prestasi::create([
            'nama_prestasi' => $request->nama_prestasi,
            'deskripsi' => $request->deskripsi,
            'foto' => $request->foto,
            'tahun_ajaran' => $request->tahun_ajaran,
        ]);

        return redirect()
            ->route('admin.prestasi.create')
            ->with('success', 'Data prestasi berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail prestasi
     */
    public function show($id)
    {
        $prestasi = Prestasi::findOrFail($id);

        return view('admin.prestasi.show', compact('prestasi'));
    }

    /**
     * Menampilkan form edit
     */
    public function edit($id)
    {
        $prestasi = Prestasi::findOrFail($id);

        return view('admin.prestasi.edit', compact('prestasi'));
    }

    /**
     * Memperbarui data prestasi
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_prestasi' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|string|max:100',
            'tahun_ajaran' => 'required|string|max:20',
        ], [
            'nama_prestasi.required' => 'Nama prestasi wajib diisi.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'tahun_ajaran.required' => 'Tahun ajaran wajib diisi.',
        ]);

        $prestasi = Prestasi::findOrFail($id);

        $prestasi->update([
            'nama_prestasi' => $request->nama_prestasi,
            'deskripsi' => $request->deskripsi,
            'foto' => $request->foto,
            'tahun_ajaran' => $request->tahun_ajaran,
        ]);

        return redirect()
            ->route('admin.prestasi.create')
            ->with('success', 'Data prestasi berhasil diperbarui.');
    }

    /**
     * Menghapus data prestasi
     */
    public function destroy($id)
    {
        $prestasi = Prestasi::findOrFail($id);

        $prestasi->delete();

        return redirect()
            ->route('admin.prestasi.create')
            ->with('success', 'Data prestasi berhasil dihapus.');
    }
}