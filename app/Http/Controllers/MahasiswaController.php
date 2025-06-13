<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $responseMhs = Http::get('http://localhost:8080/mahasiswa');

        $dataMhs = $responseMhs->json();

        return view('mahasiswa.index', [
            'mahasiswa' => $dataMhs['data_mahasiswa'] 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mahasiswa = Http::get('http://localhost:8080/mahasiswa');
        return view('mahasiswa.create', ['mahasiswa' => $mahasiswa]);
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required',
            'kelas_id' => 'required',
        ]);
        $response = Http::post('http://localhost:8080/mahasiswa', [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'kelas_id' => $request->kelas_id
        ]);
        if ($response->successful()) {
            return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil DItambahkan!');
        }
        return back()->with('error', 'Gagal Menambahkan Data');
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
        $response = Http::get("http://localhost:8080/mahasiswa/{$id}");
        $mahasiswa = $response->json();

        return view('mahasiswa.edit', ['mahasiswa' => $mahasiswa]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'kelas_id' => 'required'
        ]);

        Http::put("http://localhost:8080/mahasiswa/{$id}", $validated);

        return redirect('/mahasiswa')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Http::delete("http://localhost:8080/mahasiswa/{$id}");

        return redirect('/mahasiswa')->with('success', 'Data berhasil dihapus');
    }
}
