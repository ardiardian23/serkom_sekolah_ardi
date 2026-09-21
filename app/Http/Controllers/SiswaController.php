<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Menampilkan data siswa
     */
    public function index()
    {
        $siswas = Siswa::orderBy('id_siswa', 'desc')->get();

        return view('admin.siswa.index', compact('siswas'));
    }

    /**
     * Halaman input siswa
     */
    public function create()
    {
        $siswas = Siswa::orderBy('id_siswa', 'desc')->get();

        return view('admin.siswa.create', compact('siswas'));
    }

    /**
     * Simpan data siswa
     */
    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required|string|max:10',
            'nama_siswa' => 'required|string|max:40',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'tahun_masuk' => 'required|integer|min:1900|max:2100',
        ], [
            'nisn.required' => 'NISN wajib diisi.',
            'nama_siswa.required' => 'Nama siswa wajib diisi.',
            'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih.',
            'tahun_masuk.required' => 'Tahun masuk wajib diisi.',
        ]);

        Siswa::create([
            'nisn' => $request->nisn,
            'nama_siswa' => $request->nama_siswa,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tahun_masuk' => $request->tahun_masuk,
        ]);

        return redirect()
            ->route('admin.siswa.create')
            ->with('success', 'Data siswa berhasil ditambahkan.');
    }

    /**
     * Halaman edit
     */
    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);

        return view('admin.siswa.edit', compact('siswa'));
    }

    /**
     * Update data siswa
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nisn' => 'required|string|max:10',
            'nama_siswa' => 'required|string|max:40',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'tahun_masuk' => 'required|integer|min:1900|max:2100',
        ]);

        $siswa = Siswa::findOrFail($id);

        $siswa->update([
            'nisn' => $request->nisn,
            'nama_siswa' => $request->nama_siswa,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tahun_masuk' => $request->tahun_masuk,
        ]);

        return redirect()
            ->route('admin.siswa.create')
            ->with('success', 'Data siswa berhasil diperbarui.');
    }

    /**
     * Hapus data siswa
     */
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);

        $siswa->delete();

        return redirect()
            ->route('admin.siswa.create')
            ->with('success', 'Data siswa berhasil dihapus.');
    }
}