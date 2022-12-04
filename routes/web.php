<?php

use App\Http\Controllers\adminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminKoperasiController;
use App\Http\Controllers\adminNasabahController;
use App\Http\Controllers\adminPekerjaanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\orderLanggananController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\riwayatReorder;
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

// admin
route::get('/admin-dashboard', [adminKoperasiController::class, 'index']);

//login dan logout
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::post('/logout', [LoginController::class, 'logout']);

//register
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store'])->name('register');

//admin pimpinan koperasi
Route::get('/admin-dashboard/koperasi', [adminKoperasiController::class, 'index']);
Route::get('/admin-dashboard/koperasi/create', [adminKoperasiController::class, 'create']);
Route::post('/admin-dashboard/koperasi/store', [adminKoperasiController::class, 'store']);
Route::get('/admin-dashboard/koperasi/edit/{id}', [adminKoperasiController::class, 'edit']);
Route::put('/admin-dashboard/koperasi/update/{id}', [adminKoperasiController::class, 'update']);
Route::delete('/admin-dashboard/koperasi/delete/{id}', [adminKoperasiController::class, 'delete']);

//admin cs koperasi
Route::get('/admin-dashboard/nasabah', [adminNasabahController::class, 'index']);
Route::get('/admin-dashboard/nasabah/create', [adminNasabahController::class, 'create']);
Route::post('/admin-dashboard/nasabah/store', [adminNasabahController::class, 'store']);
Route::get('/admin-dashboard/nasabah/edit/{id}', [adminNasabahController::class, 'edit']);
Route::put('/admin-dashboard/nasabah/update/{id}', [adminNasabahController::class, 'update']);
Route::delete('/admin-dashboard/nasabah/delete/{id}', [adminNasabahController::class, 'delete']);

// Order Langganan
Route::get('/admin-dashboard/order-langganan', [orderLanggananController::class, 'index']);
Route::get('/admin-dashboard/order-langganan/create', [orderLanggananController::class, 'create']);
Route::post('/admin-dashboard/order-langganan/store', [orderLanggananController::class, 'store']);
Route::get('/admin-dashboard/order-langganan/edit/{id}', [orderLanggananController::class, 'edit']);
Route::put('/admin-dashboard/order-langganan/update/{id}', [orderLanggananController::class, 'update']);
Route::delete('/admin-dashboard/order-langganan/delete/{id}', [orderLanggananController::class, 'delete']);

// Riwayat Reorder
Route::get('/admin-dashboard/riwayat-reorder', [riwayatReorderController::class, 'index']);
Route::get('/admin-dashboard/riwayat-reorder/create', [riwayatReorderController::class, 'create']);
Route::post('/admin-dashboard/riwayat-reorder/store', [riwayatReorderController::class, 'store']);
Route::get('/admin-dashboard/riwayat-reorder/edit/{id}', [riwayatReorderController::class, 'edit']);
Route::put('/admin-dashboard/riwayat-reorder/update/{id}', [riwayatReorderController::class, 'update']);
Route::delete('/admin-dashboard/riwayat-reorder/delete/{id}', [riwayatReorderController::class, 'delete']);

//admin pekerjaan
Route::get('/admin-dashboard/pekerjaan', [adminPekerjaanController::class, 'index']);
Route::get('/admin-dashboard/pekerjaan/create', [adminPekerjaanController::class, 'create']);
Route::post('/admin-dashboard/pekerjaan/store', [adminPekerjaanController::class, 'store']);
Route::get('/admin-dashboard/pekerjaan/edit/{id}', [adminPekerjaanController::class, 'edit']);
Route::put('/admin-dashboard/pekerjaan/update/{id}', [adminPekerjaanController::class, 'update']);
Route::delete('/admin-dashboard/pekerjaan/delete/{id}', [adminPekerjaanController::class, 'delete']);
