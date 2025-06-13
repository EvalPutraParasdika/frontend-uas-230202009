<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = Http::get('http://localhost:8080/matakuliah');
        $matakuliah = $response->json()['data_matkul'];

        // Ambil hanya data matakuliahnya


        return view('matakuliah.index', ['matakuliah' => $matakuliah]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $matakuliah = Http::get('http://localhost:8080/matakuliah');
        return view('matakuliah.create', ['matakuliah' => $matakuliah]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'nama' => 'required',
        'dosen_id' => 'required'
    ]);

    $response = Http::asJson()->post('http://localhost:8080/matakuliah', $validated);

    if ($response->successful()) {
        return redirect('/matakuliah')->with('success', 'Data berhasil ditambahkan');
    } else {
        return redirect('/matakuliah')->with('error', 'Gagal menambahkan data: ' . $response->body());
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
        $response = Http::get("http://localhost:8080/matakuliah/{$id}");
        $matakuliah = $response->json();

        return view('matakuliah.edit', ['matakuliah' => $matakuliah]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'dosen_id' => 'required',  
        ]);

        Http::put("http://localhost:8080/matakuliah/{$id}", $validated);

        return redirect('/matakuliah')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Http::delete("http://localhost:8080/matakuliah/{$id}");

        return redirect('/matakuliah')->with('success', 'Data berhasil dihapus');
    }
}
