<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use App\Models\ProfilSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PrestasiController extends Controller
{
   public function publicIndex()
    {
        $profil = ProfilSekolah::first();

        $prestasi = Prestasi::take(3)->get();

        return view('public.prestasi', compact(
            'profil',
            'prestasi'
        ));
    }
    /**
     * Menampilkan semua data prestasi
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $prestasis = Prestasi::query()
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('nama_prestasi', 'like', '%' . $search . '%')
                    ->orWhere('tahun_ajaran', 'like', '%' . $search . '%');
                });
            })
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.prestasi.index', compact('prestasis', 'search'));
    }

    /**
     * Menampilkan form tambah prestasi
     */
    public function create()
    {
        return view('admin.prestasi.create');
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
            'nama_prestasi.max' => 'Nama prestasi maksimal 100 karakter.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'foto.image' => 'File harus berupa gambar.',
            'foto.mimes' => 'Foto harus berformat JPG, JPEG, atau PNG.',
            'foto.max' => 'Ukuran foto maksimal 2 MB.',
            'tahun_ajaran.required' => 'Tahun ajaran wajib diisi.',
        ]);

        $foto = null;

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('prestasi', 'public');
        }

        Prestasi::create([
            'nama_prestasi' => $request->nama_prestasi,
            'deskripsi' => $request->deskripsi,
            'foto' => $foto,
            'tahun_ajaran' => $request->tahun_ajaran,
        ]);

        return redirect()
            ->route('admin.prestasi.index')
            ->with('success', 'Data prestasi berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail prestasi
     */
    public function show($id)
    {
        $prestasi = Prestasi::findOrFail($id);

        $profil = ProfilSekolah::first();

        return view('landing.prestasi.show', compact(
            'prestasi',
            'profil'
        ));
    }

    /**
     * Menampilkan form edit prestasi
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
        $prestasi = Prestasi::findOrFail($id);

        $request->validate([
            'nama_prestasi' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'tahun_ajaran' => 'required|string|max:20',
        ], [
            'nama_prestasi.required' => 'Nama prestasi wajib diisi.',
            'nama_prestasi.max' => 'Nama prestasi maksimal 100 karakter.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'foto.image' => 'File harus berupa gambar.',
            'foto.mimes' => 'Foto harus berformat JPG, JPEG, atau PNG.',
            'foto.max' => 'Ukuran foto maksimal 2 MB.',
            'tahun_ajaran.required' => 'Tahun ajaran wajib diisi.',
        ]);

        $prestasi->nama_prestasi = $request->nama_prestasi;
        $prestasi->deskripsi = $request->deskripsi;
        $prestasi->tahun_ajaran = $request->tahun_ajaran;

        // Jika upload foto baru
        if ($request->hasFile('foto')) {

            // Hapus foto lama
            if ($prestasi->foto) {
                Storage::disk('public')->delete($prestasi->foto);
            }

            // Simpan foto baru
            $prestasi->foto = $request->file('foto')
                ->store('prestasi', 'public');
        }

        $prestasi->save();

        return redirect()
            ->route('admin.prestasi.index')
            ->with('success', 'Data prestasi berhasil diperbarui.');
    }

    /**
     * Menghapus data prestasi
     */
    public function destroy($id)
    {
        $prestasi = Prestasi::findOrFail($id);

        // Hapus file foto dari storage
        if ($prestasi->foto) {
            Storage::disk('public')->delete($prestasi->foto);
        }

        // Hapus data dari database
        $prestasi->delete();

        return redirect()
            ->route('admin.prestasi.index')
            ->with('success', 'Data prestasi berhasil dihapus.');
    }
}

