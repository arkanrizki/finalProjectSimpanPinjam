<?php

use App\Http\Controllers\adminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminKoperasiController;
use App\Http\Controllers\adminNasabahController;
use App\Http\Controllers\adminPekerjaanController;
use App\Http\Controllers\adminProvinsiController;
use App\Http\Controllers\adminKabupatenController;
use App\Http\Controllers\adminKecamatanController;
use App\Http\Controllers\adminProfilUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\orderLanggananController;
use App\Http\Controllers\peminjamanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\rekeningController;
use App\Http\Controllers\riwayatReorderController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index']);



//login dan logout
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::post('/logout', [LoginController::class, 'logout']);

//register
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store'])->name('register');

//admin
Route::get('/admin-dashboard/koperasi', [adminKoperasiController::class, 'index'])->middleware('auth', 'auth.role:2');
Route::get('/admin-dashboard/koperasi/create', [adminKoperasiController::class, 'create'])->middleware('auth', 'auth.role:2');
Route::post('/admin-dashboard/koperasi/store', [adminKoperasiController::class, 'store'])->middleware('auth', 'auth.role:2');
Route::get('/admin-dashboard/koperasi/edit/{id}', [adminKoperasiController::class, 'edit'])->middleware('auth', 'auth.role:2');
Route::put('/admin-dashboard/koperasi/update/{id}', [adminKoperasiController::class, 'update'])->middleware('auth', 'auth.role:2');
Route::delete('/admin-dashboard/koperasi/delete/{id}', [adminKoperasiController::class, 'delete'])->middleware('auth', 'auth.role:2');

//admin cs koperasi
Route::get('/admin-dashboard/nasabah', [adminNasabahController::class, 'index'])->middleware('auth', 'auth.role:2');
Route::get('/admin-dashboard/nasabah/create', [adminNasabahController::class, 'create'])->middleware('auth', 'auth.role:2');
Route::post('/admin-dashboard/nasabah/store', [adminNasabahController::class, 'store'])->middleware('auth', 'auth.role:2');
Route::get('/admin-dashboard/nasabah/edit/{id}', [adminNasabahController::class, 'edit'])->middleware('auth', 'auth.role:2');
Route::put('/admin-dashboard/nasabah/update/{id}', [adminNasabahController::class, 'update'])->middleware('auth', 'auth.role:2');
Route::delete('/admin-dashboard/nasabah/delete/{id}', [adminNasabahController::class, 'delete'])->middleware('auth', 'auth.role:2');

// Order Langganan
Route::get('/admin-dashboard/order-langganan', [orderLanggananController::class, 'index'])->middleware('auth', 'auth.role:2');
Route::get('/admin-dashboard/order-langganan/create', [orderLanggananController::class, 'create'])->middleware('auth', 'auth.role:2');
Route::post('/admin-dashboard/order-langganan/store', [orderLanggananController::class, 'store'])->middleware('auth', 'auth.role:2');
Route::get('/admin-dashboard/order-langganan/edit/{id}', [orderLanggananController::class, 'edit'])->middleware('auth', 'auth.role:2');
Route::put('/admin-dashboard/order-langganan/update/{id}', [orderLanggananController::class, 'update'])->middleware('auth', 'auth.role:2');
Route::delete('/admin-dashboard/order-langganan/delete/{id}', [orderLanggananController::class, 'delete'])->middleware('auth', 'auth.role:2');

// Riwayat Reorder
Route::get('/admin-dashboard/riwayat-reorder', [riwayatReorderController::class, 'index'])->middleware('auth', 'auth.role:2');
Route::get('/admin-dashboard/riwayat-reorder/create', [riwayatReorderController::class, 'create'])->middleware('auth', 'auth.role:2');
Route::get('/admin-dashboard/riwayat-reorder/payment', [riwayatReorderController::class, 'payment'])->middleware('auth', 'auth.role:2');
Route::post('/admin-dashboard/riwayat-reorder/store', [riwayatReorderController::class, 'store'])->middleware('auth', 'auth.role:2');
Route::get('/admin-dashboard/riwayat-reorder/edit/{id}', [riwayatReorderController::class, 'edit'])->middleware('auth', 'auth.role:2');
Route::put('/admin-dashboard/riwayat-reorder/update/{id}', [riwayatReorderController::class, 'update'])->middleware('auth', 'auth.role:2');
Route::delete('/admin-dashboard/riwayat-reorder/delete/{id}', [riwayatReorderController::class, 'delete'])->middleware('auth', 'auth.role:2');

//pekerjaan
Route::get('/admin-dashboard/pekerjaan', [adminPekerjaanController::class, 'index'])->middleware('auth', 'auth.role:2');
Route::get('/admin-dashboard/pekerjaan/create', [adminPekerjaanController::class, 'create'])->middleware('auth', 'auth.role:2');
Route::post('/admin-dashboard/pekerjaan/store', [adminPekerjaanController::class, 'store'])->middleware('auth', 'auth.role:2');
Route::get('/admin-dashboard/pekerjaan/edit/{id}', [adminPekerjaanController::class, 'edit'])->middleware('auth', 'auth.role:2');
Route::put('/admin-dashboard/pekerjaan/update/{id}', [adminPekerjaanController::class, 'update'])->middleware('auth', 'auth.role:2');
Route::delete('/admin-dashboard/pekerjaan/delete/{id}', [adminPekerjaanController::class, 'delete'])->middleware('auth', 'auth.role:2');

// peminjaman
Route::get('/admin-dashboard/peminjaman', [peminjamanController::class, 'index'])->middleware('auth', 'auth.role:2');
Route::get('/admin-dashboard/peminjaman/create', [peminjamanController::class, 'create'])->middleware('auth', 'auth.role:2');
Route::post('/admin-dashboard/peminjaman/store', [peminjamanController::class, 'store'])->middleware('auth', 'auth.role:2');
Route::get('/admin-dashboard/peminjaman/edit/{id}', [peminjamanController::class, 'edit'])->middleware('auth', 'auth.role:2');
Route::put('/admin-dashboard/peminjaman/update/{id}', [peminjamanController::class, 'update'])->middleware('auth', 'auth.role:2');
Route::delete('/admin-dashboard/peminjaman/delete/{id}', [peminjamanController::class, 'delete'])->middleware('auth', 'auth.role:2');

// rekening
Route::get('/admin-dashboard/rekening', [rekeningController::class, 'index'])->middleware('auth', 'auth.role:2');
Route::get('/admin-dashboard/rekening/create', [rekeningController::class, 'create'])->middleware('auth', 'auth.role:2');
Route::post('/admin-dashboard/rekening/store', [rekeningController::class, 'store'])->middleware('auth', 'auth.role:2');
Route::get('/admin-dashboard/rekening/edit/{id}', [rekeningController::class, 'edit'])->middleware('auth', 'auth.role:2');
Route::put('/admin-dashboard/rekening/update/{id}', [rekeningController::class, 'update'])->middleware('auth', 'auth.role:2');
Route::delete('/admin-dashboard/rekening/delete/{id}', [rekeningController::class, 'delete'])->middleware('auth', 'auth.role:2');

//admin provinsi
Route::get('/admin-dashboard/provinsi', [adminProvinsiController::class, 'index']);

//admin kabupaten
Route::get('/admin-dashboard/kabupaten', [adminKabupatenController::class, 'index']);

//admin kecamatan
Route::get('/admin-dashboard/kecamatan', [adminKecamatanController::class, 'index']);

// admin profil-user
Route::get('/admin-dashboard/profil-user', [adminProfilUserController::class, 'index']);
