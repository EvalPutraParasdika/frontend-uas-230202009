<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatkulController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('dashboard');
});

// Routes Mahasiswa

   Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index'); 
   Route::post('/mahasiswa', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
   Route::get('/mahasiswa/{id_mahasiswa}', [MahasiswaController::class, 'show'])->name('mahasiswa.show');
   Route::put('/mahasiswa/{id_mahasiswa}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
   Route::delete('/mahasiswa/{id_mahasiswa}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy'); 


// Routes Dashbard

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::view('/login', 'login')->name('login');
Route::post('/login', [AuthController::class, 'loginSubmit'])->name('login.submit');
// Route::get('/dashboard', [AuthController::class, 'profile'])->middleware(\App\Http\Middleware\CheckJwtToken::class);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::view('/register', 'register')->name('register');
Route::post('/register', [AuthController::class, 'registerSubmit'])->name('register.submit');






   Route::get('/matakuliah', [MatkulController::class, 'index'])->name('matakuliah.index'); 
   Route::post('/matakuliah', [MatkulController::class, 'store'])->name('matakuliah.store');
   Route::get('/matakuliah/{id_matkul}', [MatkulController::class, 'show'])->name('matakuliah.show');
   Route::put('/matakuliah/{id_matkul}', [MatkulController::class, 'update'])->name('matakuliah.update');
   Route::delete('/matakuliah/{id_matkul}', [MatkulController::class, 'destroy'])->name('matakuliah.destroy'); 




