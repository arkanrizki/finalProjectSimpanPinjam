<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\koperasiController;


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
    return view('/read/welcome');
});

Route::get('/home', [HomeController::class, 'index']);

//tabel koperasi
Route::get('/datakoperasi', [koperasiController::class, 'index']);
Route::get('/koperasi', [koperasiController::class, 'create']);
Route::post('/koperasi', [koperasiController::class, 'store']);
Route::get('/datakoperasi/{koperasi}/edit', [koperasiController::class, 'edit']);
Route::put('/datakoperasi/{koperasi}', [koperasiController::class, 'update']);
Route::delete('/datakoperasi/{koperasi}', [koperasiController::class, 'destroy']);
