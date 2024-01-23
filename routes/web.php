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
Route::post('/login', [App\Http\Controllers\AuthController::class,'login']);
Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
Route::get('/gaslap', [App\Http\Controllers\GaslapController::class,'index'])->name('gaslap');
Route::post('/gaslap/tambah', [App\Http\Controllers\GaslapController::class,'create'])->name('create.gaslap');
Route::post('/gaslap/{user_id}/{gaslap_id}/edit', [App\Http\Controllers\GaslapController::class, 'update'])->name('update.gaslap');
Route::get('/gaslap/{user_id}/{gaslap_id}/hapus', [App\Http\Controllers\GaslapController::class, 'destroy'])->name('delete.gaslap');
Route::get('/produk', [App\Http\Controllers\ProdukController::class,'index'])->name('produk');
