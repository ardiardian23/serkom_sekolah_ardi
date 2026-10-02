<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Berita;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $agenda = Agenda::orderBy('id_agenda', 'desc')->get();

        return view('admin.agenda.index', compact('agenda'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $agenda = Agenda::orderBy('id_agenda', 'desc')->get();

        return view('admin.agenda.create', compact('agenda'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'judul' => 'required|string|max:50',
            'tanggal' => 'required|date',
            'waktu' => 'required|date_format:H:i',
            'lokasi' => 'required|string|max:50',
            'deskripsi' => 'required|string|max:200',
        ],[
            'judul.required' => 'Judul harus di isi',
            'tanggal.required' => 'tanggal harus di isi',
            'waktu.required' => 'waktu harus di isi',
            'lokasi.required' => 'lokasi harus di isi',
            'deskripsi.required' => 'deskripsi harus di isi',
        ]);

        Agenda::create([
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'lokasi' => $request->lokasi,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()
        ->route('admin.agenda.create')
        ->with('success', 'Agenda berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $agenda = Agenda::findOrFail($id);

        return view('admin.agenda.edit', compact('agenda'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'judul' => 'required|string|max:50',
            'tanggal' => 'required|date',
            'waktu' => 'required|date_format:H:i',
            'lokasi' => 'required|string|max:50',
            'deskripsi' => 'required|string|max:200',
        ],[
            'judul.required' => 'Judul harus di isi',
            'tanggal.required' => 'tanggal harus di isi',
            'waktu.required' => 'waktu harus di isi',
            'lokasi.required' => 'lokasi harus di isi',
            'deskripsi.required' => 'deskripsi harus di isi',
        ]);

        $agenda = Agenda::findOrFail($id);

        Agenda::create([
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'lokasi' => $request->lokasi,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()
        ->route('admin.agenda.create')
        ->with('success', 'Agenda berhasil di perbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $agenda = Berita::findOrFail($id);

        $agenda->delete();

        return redirect()
        ->route('admin.agenda.create')
        ->with('success' , 'agenda berhasil di hapus');
    }
}
