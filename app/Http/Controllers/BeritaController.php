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

    public function index(Request $request)
    {
        $search = $request->search;

        $beritas = Berita::query()
            ->when($search, function ($query) use ($search) {
                $query->where('judul', 'like', '%' . $search . '%');
            })
            ->orderBy('tanggal', 'desc')
            ->get();

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
        $berita = Berita::findOrFail($id);

        $validated = $request->validate([
            'judul'   => 'required|string|max:255',
            'isi'     => 'required|string',
            'tanggal' => 'required|date',
            'gambar'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status'  => 'required|in:Publish,Draft',
        ]);

        if ($request->hasFile('gambar')) {
            // Simpan gambar baru
            $gambarBaru = $request->file('gambar')
                ->store('berita', 'public');

            // Hapus gambar lama jika berada di disk public
            if ($berita->gambar &&
                \Illuminate\Support\Facades\Storage::disk('public')
                    ->exists($berita->gambar)) {
                \Illuminate\Support\Facades\Storage::disk('public')
                    ->delete($berita->gambar);
            }

            $validated['gambar'] = $gambarBaru;
        } else {
            // Pertahankan gambar lama jika tidak upload gambar baru
            unset($validated['gambar']);
        }

        $berita->update($validated);

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);

        $berita->delete();

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil dihapus.');
    }
}
