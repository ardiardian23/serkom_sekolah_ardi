<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::orderBy('id_galeri', 'desc')->get();

        return view('admin.galeri.index', compact('galeris'));
    }

    public function create()
    {
        return redirect()->route('admin.galeri.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:50',
            'keterangan' => 'required|string',
            'file' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'kategori' => 'required|in:Foto,Video',
            'tanggal' => 'required|date',
        ], [
            'judul.required' => 'Judul wajib diisi.',
            'judul.max' => 'Judul maksimal 50 karakter.',
            'keterangan.required' => 'Keterangan wajib diisi.',
            'file.required' => 'File wajib dipilih.',
            'file.image' => 'File harus berupa gambar.',
            'file.mimes' => 'Format harus JPG, JPEG, atau PNG.',
            'file.max' => 'Ukuran file maksimal 2 MB.',
            'kategori.required' => 'Kategori wajib dipilih.',
            'tanggal.required' => 'Tanggal wajib diisi.',
        ]);

        $file = $request->file('file')->store('galeri', 'public');

        Galeri::create([
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'file' => $file,
            'kategori' => $request->kategori,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()
            ->route('admin.galeri.index')
            ->with('success', 'Galeri berhasil ditambahkan.');
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);

        return view('admin.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, $id)
    {
        $galeri = Galeri::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:50',
            'keterangan' => 'required|string',
            'file' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'kategori' => 'required|in:Foto,Video',
            'tanggal' => 'required|date',
        ], [
            'judul.required' => 'Judul wajib diisi.',
            'judul.max' => 'Judul maksimal 50 karakter.',
            'keterangan.required' => 'Keterangan wajib diisi.',
            'file.image' => 'File harus berupa gambar.',
            'file.mimes' => 'Format harus JPG, JPEG, atau PNG.',
            'file.max' => 'Ukuran file maksimal 2 MB.',
            'kategori.required' => 'Kategori wajib dipilih.',
            'tanggal.required' => 'Tanggal wajib diisi.',
        ]);

        $data = [
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'kategori' => $request->kategori,
            'tanggal' => $request->tanggal,
        ];

        if ($request->hasFile('file')) {

            if ($galeri->file) {
                Storage::disk('public')->delete($galeri->file);
            }

            $data['file'] = $request->file('file')
                ->store('galeri', 'public');
        }

        $galeri->update($data);

        return redirect()
            ->route('admin.galeri.index')
            ->with('success', 'Galeri berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);

        if ($galeri->file) {
            Storage::disk('public')->delete($galeri->file);
        }

        $galeri->delete();

        return redirect()
            ->route('admin.galeri.index')
            ->with('success', 'Galeri berhasil dihapus.');
    }
}