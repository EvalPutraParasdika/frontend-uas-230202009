<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function loginSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $response = Http::post('http://localhost:8080/auth/login', [
            'email' => $request->email,
            'password' => $request->password
        ]);

        if ($response->successful()) {
            session(['jwt_token' => $response['token']]);
            return redirect('/dashboard');
        }

        return back()->withErrors(['message' => 'Login gagal!']);
    }

    public function registerSubmit(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $response = Http::post('http://localhost:8080/auth/register', [
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password
        ]);

        if ($response->successful()) {
            return redirect('/login')->with('success', 'Registrasi berhasil!');
        }

        return back()->withErrors(['message' => 'Registrasi gagal!']);
    }

   public function profile()
{
    $token = session('jwt_token');

    $response = Http::withToken($token)->get('http://localhost:8080/auth/me');

    if ($response->successful()) {
        // Di sini bisa fetch data dashboard juga (jumlah mahasiswa, dst)
        // Contoh dummy:
        $jumlahMahasiswa = 120;
        $jumlahStaff = 15;
        $jumlahJurusan = 5;
        $jumlahProdi = 10;
        $jumlahPengajuan = 23;

        return view('dashboard', [
            'user' => $response['user'],
            'jumlahMahasiswa' => $jumlahMahasiswa,
            'jumlahStaff' => $jumlahStaff,
            'jumlahJurusan' => $jumlahJurusan,
            'jumlahProdi' => $jumlahProdi,
            'jumlahPengajuan' => $jumlahPengajuan,
        ]);
    }

    return redirect('/login')->withErrors(['message' => 'Silakan login ulang']);
}

    public function logout()
    {
        session()->forget('jwt_token');
        return redirect('/login');
    }
}
