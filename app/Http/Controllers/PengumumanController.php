<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index()
{
    $pengumumans = Pengumuman::orderBy('id_pengumuman', 'desc')->get();

    return view('admin.pengumuman.index', compact('pengumumans'));
}

public function create()
{
    return redirect()->route('admin.pengumuman.index');
}

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:50',
            'isi' => 'required|string',
            'tanggal' => 'required|date',
            'status' => 'required|in:Publish,Draft',
        ], [
            'judul.required' => 'Judul pengumuman wajib diisi.',
            'judul.max' => 'Judul maksimal 50 karakter.',
            'isi.required' => 'Isi pengumuman wajib diisi.',
            'tanggal.required' => 'Tanggal wajib diisi.',
            'status.required' => 'Status wajib dipilih.',
        ]);

        Pengumuman::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
            'id_user' => auth()->id() ?? 1,
        ]);

        return redirect()
            ->route('admin.pengumuman.create')
            ->with('success', 'Pengumuman berhasil ditambahkan.');
    }

    public function show($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        return view('admin.pengumuman.show', compact('pengumuman'));
    }

    public function edit($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        return view('admin.pengumuman.edit', compact('pengumuman'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:50',
            'isi' => 'required|string',
            'tanggal' => 'required|date',
            'status' => 'required|in:Publish,Draft',
        ], [
            'judul.required' => 'Judul pengumuman wajib diisi.',
            'judul.max' => 'Judul maksimal 50 karakter.',
            'isi.required' => 'Isi pengumuman wajib diisi.',
            'tanggal.required' => 'Tanggal wajib diisi.',
            'status.required' => 'Status wajib dipilih.',
        ]);

        $pengumuman = Pengumuman::findOrFail($id);

        $pengumuman->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.pengumuman.create')
            ->with('success', 'Pengumuman berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        $pengumuman->delete();

        return redirect()
            ->route('admin.pengumuman.create')
            ->with('success', 'Pengumuman berhasil dihapus.');
    }
}