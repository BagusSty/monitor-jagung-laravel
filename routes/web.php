<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/login', function () {
    return view('login');
});
Route::get('/', [App\Http\Controllers\AuthController::class,'index'])->name('home');
Route::post('/login', [App\Http\Controllers\AuthController::class,'login'])->name('login');
Route::get('/ubah', [App\Http\Controllers\AuthController::class,'indexChangePW'])->name('ubah-password');
Route::post('/ubah/password', [App\Http\Controllers\AuthController::class,'changePassword'])->name('ubah');
Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
Route::get('/gaslap', [App\Http\Controllers\GaslapController::class,'index'])->name('gaslap');
Route::post('/gaslap/tambah', [App\Http\Controllers\GaslapController::class,'create'])->name('create.gaslap');
Route::post('/gaslap/{user_id}/{gaslap_id}/edit', [App\Http\Controllers\GaslapController::class, 'update'])->name('update.gaslap');
Route::get('/gaslap/{user_id}/{gaslap_id}/hapus', [App\Http\Controllers\GaslapController::class, 'destroy'])->name('delete.gaslap');
Route::get('/produk', [App\Http\Controllers\ProdukController::class,'index'])->name('produk');
Route::post('/produk/tambah', [App\Http\Controllers\ProdukController::class,'create'])->name('create.produk');
Route::post('/produk/{produk_id}/edit', [App\Http\Controllers\ProdukController::class, 'update'])->name('update.produk');
Route::get('/produk/{produk_id}/hapus', [App\Http\Controllers\ProdukController::class, 'destroy'])->name('delete.produk');
