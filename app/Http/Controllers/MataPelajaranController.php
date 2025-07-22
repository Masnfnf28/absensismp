<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class MataPelajaranController extends Controller
{
    public function index()
    {
        $data = MataPelajaran::all();
        return view('page.matapelajaran.index', compact('data'));
    }

    public function create()
    {
        return view('page.matapelajaran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_mapel' => 'required|string|max:255',
            'kode_mapel' => 'required|unique:nama_matapelajaran,kode_mapel',
        ]);

        MataPelajaran::create([
            'nama_mapel' => $request->nama_mapel,
            'kode_mapel' => $request->kode_mapel,
        ]);

        return redirect()->route('matapelajaran.index')->with('success', 'Mata pelajaran berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = MataPelajaran::all(); // Untuk table
        $matapelajaran = MataPelajaran::findOrFail($id); // Untuk modal edit

        return view('page.matapelajaran.index', compact('data', 'matapelajaran'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_mapel' => 'required|string|max:255',
            'kode_mapel' => 'required|string|max:50|unique:nama_matapelajaran,kode_mapel,' . $id,
        ]);

        $pelajaran = MataPelajaran::findOrFail($id);
        $pelajaran->update([
            'nama_mapel' => $request->nama_mapel,
            'kode_mapel' => $request->kode_mapel,
        ]);

        return redirect()->route('matapelajaran.index')->with('success', 'Mata pelajaran berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $pelajaran = MataPelajaran::findOrFail($id);
        $pelajaran->delete();

        return redirect()->route('matapelajaran.index')->with('success', 'Mata pelajaran berhasil dihapus!');
    }
}
