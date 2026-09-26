<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'tahun_ajaran' => 'required|string|max:20',
        ], [
            'nama_prestasi.required' => 'Nama prestasi wajib diisi.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'foto.image' => 'File foto harus berupa gambar.',
            'foto.mimes' => 'Foto harus berformat JPG, JPEG, atau PNG.',
            'foto.max' => 'Ukuran foto maksimal 2 MB.',
            'tahun_ajaran.required' => 'Tahun ajaran wajib diisi.',
        ]);

        $data = [
            'nama_prestasi' => $request->nama_prestasi,
            'deskripsi' => $request->deskripsi,
            'tahun_ajaran' => $request->tahun_ajaran,
        ];

        // Upload foto
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')
                ->store('prestasi', 'public');
        }

        Prestasi::create($data);

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
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'tahun_ajaran' => 'required|string|max:20',
        ], [
            'nama_prestasi.required' => 'Nama prestasi wajib diisi.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'foto.image' => 'File foto harus berupa gambar.',
            'foto.mimes' => 'Foto harus berformat JPG, JPEG, atau PNG.',
            'foto.max' => 'Ukuran foto maksimal 2 MB.',
            'tahun_ajaran.required' => 'Tahun ajaran wajib diisi.',
        ]);

        $prestasi = Prestasi::findOrFail($id);

        $data = [
            'nama_prestasi' => $request->nama_prestasi,
            'deskripsi' => $request->deskripsi,
            'tahun_ajaran' => $request->tahun_ajaran,
        ];

        // Jika upload foto baru
        if ($request->hasFile('foto')) {

            // Hapus foto lama
            if ($prestasi->foto) {
                Storage::disk('public')->delete($prestasi->foto);
            }

            // Simpan foto baru
            $data['foto'] = $request->file('foto')
                ->store('prestasi', 'public');
        }

        $prestasi->update($data);

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

        // Hapus file foto
        if ($prestasi->foto) {
            Storage::disk('public')->delete($prestasi->foto);
        }

        $prestasi->delete();

        return redirect()
            ->route('admin.prestasi.create')
            ->with('success', 'Data prestasi berhasil dihapus.');
    }
}