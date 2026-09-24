<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\User;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::orderBy('id_berita', 'desc')->get();

        return view('admin.berita.index', compact('beritas'));
    }

    public function create()
    {
        $beritas = Berita::orderBy('id_berita', 'desc')->get();

        return view('admin.berita.create', compact('beritas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:50',
            'isi' => 'required|string',
            'tanggal' => 'required|date',
            'gambar' => 'required|string|max:100',
            'status' => 'required|in:Publish,Draft',
        ], [
            'judul.required' => 'Judul berita wajib diisi.',
            'isi.required' => 'Isi berita wajib diisi.',
            'tanggal.required' => 'Tanggal wajib diisi.',
            'gambar.required' => 'Gambar wajib diisi.',
            'status.required' => 'Status berita wajib dipilih.',
        ]);

        Berita::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'gambar' => $request->gambar,
            'status' => $request->status,
            'id_user' => 2,
        ]);

        return redirect()
            ->route('admin.berita.create')
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    public function show($id)
    {
        $berita = Berita::findOrFail($id);

        return view('admin.berita.show', compact('berita'));
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);

        return view('admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:50',
            'isi' => 'required|string',
            'tanggal' => 'required|date',
            'gambar' => 'required|string|max:100',
            'status' => 'required|in:Publish,Draft',
        ], [
            'judul.required' => 'Judul berita wajib diisi.',
            'isi.required' => 'Isi berita wajib diisi.',
            'tanggal.required' => 'Tanggal wajib diisi.',
            'gambar.required' => 'Gambar wajib diisi.',
            'status.required' => 'Status berita wajib dipilih.',
        ]);

        $berita = Berita::findOrFail($id);

        $berita->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'gambar' => $request->gambar,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.berita.create')
            ->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);

        $berita->delete();

        return redirect()
            ->route('admin.berita.create')
            ->with('success', 'Berita berhasil dihapus.');
    }
}