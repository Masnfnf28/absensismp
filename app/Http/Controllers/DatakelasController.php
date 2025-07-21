<?php

namespace App\Http\Controllers;

use App\Models\Datakelas;
use Illuminate\Http\Request;

class DatakelasController extends Controller
{
    public function index()
    {
        try {
            $datakelas = Datakelas::paginate(5);
            return view('page.datakelas.index', compact('datakelas'));
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return view('error.index');
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'kodekelas' => 'required|string|unique:datakelas,kodekelas',
                'kelas' => 'required|string',
            ]);

            Datakelas::create($request->only('kodekelas', 'kelas'));

            return redirect()->route('datakelas.index')->with('message_insert', 'Data kelas berhasil ditambahkan');
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return view('error.index');
        }
    }

    public function update(Request $request, string $kodekelas)
    {
        try {
            $request->validate([
                'kelas' => 'required|string',
            ]);

            $data = Datakelas::findOrFail($kodekelas);
            $data->update(['kelas' => $request->kelas]);

            return redirect()->route('datakelas.index')->with('message_insert', 'Data kelas berhasil diupdate');
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return view('error.index');
        }
    }

    public function destroy(string $kodekelas)
    {
        try {
            $data = Datakelas::findOrFail($kodekelas);
            $data->delete();
            return back()->with('message_delete', 'Data kelas berhasil dihapus');
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return view('error.index');
        }
    }
}
