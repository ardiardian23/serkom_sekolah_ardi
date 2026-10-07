<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\ProfilSekolah;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BeritaController extends Controller
{

    public function publicIndex()
    {
        $profil = ProfilSekolah::first();

        $berita = Berita::orderBy('tanggal', 'desc')->get();

        return view('public.berita', compact(
            'profil',
            'berita'
        ));
    }

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
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|in:Publish,Draft',
            'isi' => 'required|string',
        ]);

        $data = [
            'id_user' => Auth::id(),
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
            'isi' => $request->isi,
        ];

        if ($request->hasFile('gambar')) {

            $data['gambar'] = $request
                ->file('gambar')
                ->store('berita', 'public');

        }

        Berita::create($data);

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    public function show($id)
    {
        $berita = Berita::where('id_berita', $id)->firstOrFail();

        $profil = \App\Models\ProfilSekolah::first();

        return view('landing.berita.show', compact(
            'berita',
            'profil'
        ));
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
