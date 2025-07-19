<?php

namespace App\Http\Controllers;

use App\Models\DataGuru;
use Illuminate\Http\Request;

class DataGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $dataguru = DataGuru::paginate(3);
            return view('page.dataguru.index', compact('dataguru'));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = [
                'nip' => $request->input('nip'),
                'nama' => $request->input('nama'),
                'jenis_kelamin' => $request->input('jenis_kelamin'),
                'alamat' => $request->input('alamat'),
                'tgl_lahir' => $request->input('tgl_lahir')
            ];
            DataGuru::create($data);

            // return back()->with('message_delete', 'Data Customer Sudah di Hapus');

            return redirect()
                ->route('dataguru.index')
                ->with('message_insert', 'Data Guru Sudah ditambahkan');
        } catch (\Exception $e) {
            echo "<script>console.error('PHP Error: " .
                addslashes($e->getMessage()) . "');</script>";
            return view('error.index');
        }
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $nip)
    {
        try {
            $data = [
                'nip' => $request->input('nip'),
                'nama' => $request->input('nama'),
                'jenis_kelamin' => $request->input('jenis_kelamin'),
                'alamat' => $request->input('alamat'),
                'tgl_lahir' => $request->input('tgl_lahir'),
            ];


            $datas = DataGuru::findOrFail($nip);
            $datas->update($data);
            // return back()->with('message_delete', 'Data Album Sudah dihapus');

            return redirect()
                ->route('dataguru.index')
                ->with('message_insert', 'Data Wardrobe Sudah ditambahkan');
        } catch (\Exception $e) {
            echo "<script>console.error('PHP Error: " .
                addslashes($e->getMessage()) . "');</script>";
            return view('error.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $nip)
    {
        try {
            $data = DataGuru::findOrFail($nip);
            $data->delete();
            return back()->with('message_delete', 'Data Guru Sudah dihapus');
        } catch (\Exception $e) {
            echo "<script>console.error('PHP Error: " .
                addslashes($e->getMessage()) . "');</script>";
            return view('error.index');
        }
    }
}
