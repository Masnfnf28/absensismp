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
    // public function store(Request $request)
    // {
    //     try {
    //         $data = [
    //             'nip' => $request->input('nip'),
    //             'nama' => $request->input('nama'),
    //             'jenis_kelamin' => $request->input('jenis_kelamin'),
    //             'alamat' => $request->input('alamat'),
    //             'tgl_lahir' => $request->input('tgl_lahir')
    //         ];
    //         DataGuru::create($data);

    //         return redirect()
    //             ->route('dataguru.index')
    //             ->with('message_insert', 'Data Guru Sudah ditambahkan');
    //     } catch (\Exception $e) {
    //         echo "<script>console.error('PHP Error: " .
    //             addslashes($e->getMessage()) . "');</script>";
    //         return view('error.index');
    //     }
    // }

    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|unique:dataguru,nip',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'tgl_lahir' => 'required|date',
        ], [
            'nip.required' => 'NIP wajib diisi.',
            'nip.unique' => 'NIP ini sudah dipakai. Mohon input ulang!',
        ]);

        try {
            $data = [
                'nip' => $request->input('nip'),
                'nama' => $request->input('nama'),
                'jenis_kelamin' => $request->input('jenis_kelamin'),
                'alamat' => $request->input('alamat'),
                'tgl_lahir' => $request->input('tgl_lahir')
            ];

            DataGuru::create($data);

            return redirect()
                ->route('dataguru.index')
                ->with('message_insert', 'Data Guru Berhasil Ditambahkan!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data.'])
                ->withInput();
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
    public function update(Request $request, string $id)
    {
        try {
            $data = [
                'nip' => $request->input('nip'),
                'nama' => $request->input('nama'),
                'jenis_kelamin' => $request->input('jenis_kelamin'),
                'alamat' => $request->input('alamat'),
                'tgl_lahir' => $request->input('tgl_lahir'),
            ];


            $datas = DataGuru::findOrFail($id);
            $datas->update($data);
            // return back()->with('message_delete', 'Data Album Sudah dihapus');

            return redirect()
                ->route('dataguru.index')
                ->with('message_insert', 'Data Guru Berhasil di Edit!');
        } catch (\Exception $e) {
            echo "<script>console.error('PHP Error: " .
                addslashes($e->getMessage()) . "');</script>";
            return view('error.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = DataGuru::findOrFail($id);
            $data->delete();
            return back()->with('message_delete', 'Data Guru Berhasil Dihapus!');
        } catch (\Exception $e) {
            echo "<script>console.error('PHP Error: " .
                addslashes($e->getMessage()) . "');</script>";
            return view('error.index');
        }
    }
}
