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
            'nama_matapelajaran' => 'required|string|max:255',
        ]);

        Matapelajaran::create([
            'nama_matapelajaran' => $request->nama_matapelajaran,
        ]);

        return redirect()->route('matapelajaran.index')->with('success', 'Mata pelajaran berhasil ditambahkan.');
    }



    public function edit($id)
    {
        $matapelajaran = MataPelajaran::findOrFail($id);
        return view('page.matapelajaran.edit', compact('matapelajaran'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_matapelajaran' => 'required|string|max:255',
        ]);

        $matapelajaran = MataPelajaran::findOrFail($id);
        $matapelajaran->update([
            'nama_matapelajaran' => $request->nama_matapelajaran,
        ]);

        return redirect()->route('matapelajaran.index')->with('success', 'Mata pelajaran berhasil diperbarui.');
    }


    public function destroy($id)
    {
        MataPelajaran::findOrFail($id)->delete();
        return back()->with('success', 'Mata pelajaran berhasil dihapus.');
    }
}
