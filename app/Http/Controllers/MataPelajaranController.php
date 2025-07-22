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
        MataPelajaran::create($request->all());
        return redirect()->route('matapelajaran.index')->with('success', 'Mata pelajaran berhasil ditambahkan!');
    }




    public function edit($id)
    {
        $data = MataPelajaran::all(); // ini penting untuk table
        $matapelajaran = MataPelajaran::findOrFail($id); // ini untuk modal edit

        return view('page.matapelajaran.index', compact('data', 'matapelajaran'));
    }


    public function update(Request $request, $id)
    {
        $pelajaran = MataPelajaran::findOrFail($id);
        $pelajaran->update($request->all());
        return redirect()->route('matapelajaran.index')->with('success', 'Mata pelajaran berhasil diperbarui!');
    }




    public function destroy($id)
    {
        $pelajaran = MataPelajaran::findOrFail($id);
        $pelajaran->delete();
        return redirect()->route('matapelajaran.index')->with('success', 'Mata pelajaran berhasil dihapus!');
    }
}
