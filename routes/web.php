<?php

use App\Http\Controllers\PeminjamanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[HomeController::class,'home']);
Route::get('/dashboard', function () {
    return view('layout.dashboardLayout');
});
Route::get('/navbar', function () {
    return view('layout.navlayout');
});
Route::get('/coba', function () {
    return view('data-mobil');
});

// ABOUT LOGIN & REGISTER
Route::get('/login', [LoginController::class,'login'])->middleware('guest');
Route::post('/login', [LoginController::class,'cek_login'])->middleware('guest');
Route::get('/login', [LoginController::class,'regist'])->middleware('guest');
Route::get('/logout', [LoginController::class,'logout'])->middleware('auth');
Route::post('/regist-save', [UserController::class,'addcreate'])->middleware('guest');
Route::post('/regist-add', [UserController::class,'addstore'])->middleware('guest');

// USER //
Route::get('/user',[UserController::class,'index'])->middleware('auth');
Route::get('/user-add', [UserController::class,'create'])->middleware('auth');
Route::post('/user-save', [UserController::class,'store'])->middleware('auth');
Route::get('/user-edit/{id}', [UserController::class,'edit'])->middleware('auth');
Route::put('/user-update/{id}', [UserController::class,'update'])->middleware('auth');
Route::get('/user-delete/{id}', [UserController::class,'destroy'])->middleware('auth');
Route::get('/petugas',[UserController::class,'tampil'])->middleware('auth');
Route::get('/petugas-add', [UserController::class,'tambah'])->middleware('auth');
Route::post('/petugas-save', [UserController::class,'kirim'])->middleware('auth');
Route::get('/petugas-edit/{id}', [UserController::class,'ubah'])->middleware('auth');
Route::put('/petugas-update/{id}', [UserController::class,'diubah'])->middleware('auth');
Route::get('/petugas-delete/{id}', [UserController::class,'hapus'])->middleware('auth');

// MOBIL //
Route::get('/mobil', [MobilController::class,'index'])->middleware('auth');
Route::get('/mobil-add', [MobilController::class,'create'])->middleware('auth');
Route::post('/mobil-save', [MobilController::class,'store'])->middleware('auth');
Route::get('/mobil-edit/{id}', [MobilController::class,'edit'])->middleware('auth');
Route::put('/mobil-update/{id}', [MobilController::class,'update'])->middleware('auth');
Route::get('/mobil-delete/{id}', [MobilController::class,'destroy'])->middleware('auth');
Route::get('/pilih-hari', [MobilController::class, 'pilihHari'])->middleware('auth');


//PEMINJAMAN//
Route::get('/peminjaman',[PeminjamanController::class,'index']);
Route::get('/peminjaman-add',[PeminjamanController::class,'create']);
Route::post('/peminjaman-save',[PeminjamanController::class,'store']);
Route::get('/peminjaman-edit/{id}',[PeminjamanController::class,'edit']);
Route::put('/peminjaman-update/{id}',[PeminjamanController::class,'update']);
Route::get('/peminjaman-delete/{id}',[PeminjamanController::class,'destroy']);


// HOME //
Route::get('/home',[HomeController::class,'home']);
Route::get('/detail-mobil/{id}',[HomeController::class,'detail']);
Route::get('/pinjam-mobil/{id}', [HomeController::class, 'pinjam']);
Route::post('/peminjaman-mobil', [HomeController::class, 'peminjaman_mobil']);
Route::get('/data-mobil', [HomeController::class, 'dmobil']);
Route::get('/pengembalian-mobil', [HomeController::class, 'pengembalian_mobil']);
Route::patch('/pengembalian-update/{id}', [HomeController::class, 'updateReturnDate'])->name('pengembalian.update');
