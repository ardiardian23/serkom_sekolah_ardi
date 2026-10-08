<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use App\Models\ProfilSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EkstrakurikulerController extends Controller
{

    public function publicIndex()
    {
        $profil = ProfilSekolah::first();

        $ekskuls = Ekstrakurikuler::get();

        return view('public.ekstrakurikuler', compact(
            'profil',
            'ekskuls'
        ));
    }
    /**
     * Menampilkan semua data ekstrakurikuler
     */
    public function index(Request $request)
        {
            $search = $request->search;

            $ekskuls = Ekstrakurikuler::query()
                ->when($search, function ($query) use ($search) {
                    $query->where(function ($q) use ($search) {
                         $q->where('nama_ekskul', 'like', '%' . $search . '%')
                            ->orWhere('pembina', 'like', '%' . $search . '%');
                   });
                })
                ->orderByDesc('id_ekskul')
                ->get();
         return view('admin.ekstrakurikuler.index', compact('ekskuls', 'search'));
        }

    /**
     * Menampilkan form tambah + data ekstrakurikuler
     */
    public function create()
    {
        // Karena create.blade.php juga menampilkan tabel data,
        // data harus dikirim ke view.
        $ekskuls = Ekstrakurikuler::orderByDesc('id_ekskul')->get();

        return view('admin.ekstrakurikuler.create', compact('ekskuls'));
    }

    /**
     * Menyimpan data ekstrakurikuler
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_ekskul'     => 'required|string|max:255',
            'pembina'         => 'required|string|max:255',
            'jadwal_latihan'  => 'required|string|max:255',
            'deskripsi'       => 'required|string',
            'gambar'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'nama_ekskul.required'    => 'Nama ekstrakurikuler wajib diisi.',
            'pembina.required'        => 'Pembina wajib diisi.',
            'jadwal_latihan.required' => 'Jadwal latihan wajib diisi.',
            'deskripsi.required'      => 'Deskripsi wajib diisi.',
            'gambar.image'            => 'File harus berupa gambar.',
            'gambar.mimes'            => 'Gambar harus berformat JPG, JPEG, atau PNG.',
            'gambar.max'              => 'Ukuran gambar maksimal 2 MB.',
        ]);

        $data = [
            'nama_ekskul'    => $request->nama_ekskul,
            'pembina'        => $request->pembina,
            'jadwal_latihan' => $request->jadwal_latihan,
            'deskripsi'      => $request->deskripsi,
        ];

        // Upload gambar
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')
                ->store('ekstrakurikuler', 'public');
        }

        Ekstrakurikuler::create($data);

        return redirect()
            ->route('admin.ekstrakurikuler.index')
            ->with('success', 'Data ekstrakurikuler berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail ekstrakurikuler
     */
    public function show($id)
    {
        $ekskul = Ekstrakurikuler::where('id_ekskul', $id)->firstOrFail();

        $profil = ProfilSekolah::first();

        return view('landing.ekstrakurikuler.show', compact(
            'ekskul',
            'profil'
        ));
    }

    /**
     * Menampilkan form edit
     */
    public function edit($id)
    {
        $ekskul = Ekstrakurikuler::findOrFail($id);

        return view('admin.ekstrakurikuler.edit', compact('ekskul'));
    }

    /**
     * Memperbarui data ekstrakurikuler
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_ekskul'     => 'required|string|max:255',
            'pembina'         => 'required|string|max:255',
            'jadwal_latihan'  => 'required|string|max:255',
            'deskripsi'       => 'required|string',
            'gambar'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'nama_ekskul.required'    => 'Nama ekstrakurikuler wajib diisi.',
            'pembina.required'        => 'Pembina wajib diisi.',
            'jadwal_latihan.required' => 'Jadwal latihan wajib diisi.',
            'deskripsi.required'      => 'Deskripsi wajib diisi.',
            'gambar.image'            => 'File harus berupa gambar.',
            'gambar.mimes'            => 'Gambar harus berformat JPG, JPEG, atau PNG.',
            'gambar.max'              => 'Ukuran gambar maksimal 2 MB.',
        ]);

        $ekskul = Ekstrakurikuler::findOrFail($id);

        $data = [
            'nama_ekskul'    => $request->nama_ekskul,
            'pembina'        => $request->pembina,
            'jadwal_latihan' => $request->jadwal_latihan,
            'deskripsi'      => $request->deskripsi,
        ];

        // Jika ada gambar baru
        if ($request->hasFile('gambar')) {

            // Hapus gambar lama
            if ($ekskul->gambar) {
                Storage::disk('public')->delete($ekskul->gambar);
            }

            // Simpan gambar baru
            $data['gambar'] = $request->file('gambar')
                ->store('ekstrakurikuler', 'public');
        }

        $ekskul->update($data);

        return redirect()
            ->route('admin.ekstrakurikuler.index')
            ->with('success', 'Data ekstrakurikuler berhasil diperbarui.');
    }

    /**
     * Menghapus data ekstrakurikuler
     */
    public function destroy($id)
    {
        $ekskul = Ekstrakurikuler::findOrFail($id);

        // Hapus gambar dari storage
        if ($ekskul->gambar) {
            Storage::disk('public')->delete($ekskul->gambar);
        }

        // Hapus data database
        $ekskul->delete();

        return redirect()
            ->route('admin.ekstrakurikuler.index')
            ->with('success', 'Data ekstrakurikuler berhasil dihapus.');
    }
}
