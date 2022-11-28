<?php

use App\Http\Controllers\adminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminKoperasiController;
use App\Http\Controllers\adminNasabahController;
use App\Http\Controllers\adminPekerjaanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;


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
route::get('/admin-dashboard', [adminController::class, 'index']);

//login
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');

//register
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store'])->name('register');

//logout
Route::get('/logout', [LogoutController::class, 'index']);
Route::post('/logout', [LogoutController::class, 'authenticate'])->name('logout');

//admin koperasi
Route::get('/admin-dashboard/koperasi', [adminKoperasiController::class, 'index']);
Route::get('/admin-dashboard/koperasi/create', [adminKoperasiController::class, 'create']);
Route::post('/admin-dashboard/koperasi/store', [adminKoperasiController::class, 'store']);
Route::get('/admin-dashboard/koperasi/edit/{id}', [adminKoperasiController::class, 'edit']);
Route::put('/admin-dashboard/koperasi/update/{id}', [adminKoperasiController::class, 'update']);
Route::delete('/admin-dashboard/koperasi/delete/{id}', [adminKoperasiController::class, 'delete']);

//admin nasabah
Route::get('/admin-dashboard/nasabah', [adminNasabahController::class, 'index']);
Route::get('/admin-dashboard/nasabah/create', [adminNasabahController::class, 'create']);
Route::post('/admin-dashboard/nasabah/store', [adminNasabahController::class, 'store']);

//admin pekerjaan
Route::get('/admin-dashboard/pekerjaan', [adminPekerjaanController::class, 'index']);
Route::get('/admin-dashboard/pekerjaan/create', [adminPekerjaanController::class, 'create']);
Route::post('/admin-dashboard/pekerjaan/store', [adminPekerjaanController::class, 'store']);
Route::get('/admin-dashboard/pekerjaan/edit/{id}', [adminPekerjaanController::class, 'edit']);
Route::put('/admin-dashboard/pekerjaan/update/{id}', [adminPekerjaanController::class, 'update']);
Route::delete('/admin-dashboard/pekerjaan/delete/{id}', [adminPekerjaanController::class, 'delete']);
