<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;

class EkstrakurikulerController extends Controller
{
    public function index()
    {
        $ekskuls = Ekstrakurikuler::orderBy('id_ekskul', 'desc')->get();

        return view('admin.ekstrakurikuler.index', compact('ekskuls'));
    }

    public function create()
    {
        $ekskuls = Ekstrakurikuler::orderBy('id_ekskul', 'desc')->get();

        return view('admin.ekstrakurikuler.create', compact('ekskuls'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_ekskul' => 'required|string|max:40',
            'pembina' => 'required|string|max:40',
            'jadwal_latihan' => 'required|string|max:40',
            'deskripsi' => 'required|string',
            'gambar' => 'required|string|max:100',
        ]);

        Ekstrakurikuler::create([
            'nama_ekskul' => $request->nama_ekskul,
            'pembina' => $request->pembina,
            'jadwal_latihan' => $request->jadwal_latihan,
            'deskripsi' => $request->deskripsi,
            'gambar' => $request->gambar,
        ]);

        return redirect()
            ->route('admin.ekstrakurikuler.create')
            ->with('success', 'Data ekstrakurikuler berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $ekskul = Ekstrakurikuler::findOrFail($id);

        return view('admin.ekstrakurikuler.edit', compact('ekskul'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_ekskul' => 'required|string|max:40',
            'pembina' => 'required|string|max:40',
            'jadwal_latihan' => 'required|string|max:40',
            'deskripsi' => 'required|string',
            'gambar' => 'required|string|max:100',
        ]);

        $ekskul = Ekstrakurikuler::findOrFail($id);

        $ekskul->update([
            'nama_ekskul' => $request->nama_ekskul,
            'pembina' => $request->pembina,
            'jadwal_latihan' => $request->jadwal_latihan,
            'deskripsi' => $request->deskripsi,
            'gambar' => $request->gambar,
        ]);

        return redirect()
            ->route('admin.ekstrakurikuler.create')
            ->with('success', 'Data ekstrakurikuler berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $ekskul = Ekstrakurikuler::findOrFail($id);

        $ekskul->delete();

        return redirect()
            ->route('admin.ekstrakurikuler.create')
            ->with('success', 'Data ekstrakurikuler berhasil dihapus.');
    }
}