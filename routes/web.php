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
Route::get('/', [App\Http\Controllers\IndexController::class,'index'])->name('home');
Route::post('/login', [App\Http\Controllers\AuthController::class,'login'])->name('login');
Route::get('/ubah', [App\Http\Controllers\AuthController::class,'indexChangePW'])->name('ubah-password');
Route::post('/ubah/password', [App\Http\Controllers\AuthController::class,'changePassword'])->name('ubah');
Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
// Gaslap
Route::get('/gaslap', [App\Http\Controllers\GaslapController::class,'index'])->name('gaslap');
Route::post('/gaslap/tambah', [App\Http\Controllers\GaslapController::class,'create'])->name('create.gaslap');
Route::post('/gaslap/{user_id}/{gaslap_id}/edit', [App\Http\Controllers\GaslapController::class, 'update'])->name('update.gaslap');
Route::get('/gaslap/{user_id}/{gaslap_id}/hapus', [App\Http\Controllers\GaslapController::class, 'destroy'])->name('delete.gaslap');
// Produk
Route::get('/produk', [App\Http\Controllers\ProdukController::class,'index'])->name('produk');
Route::post('/produk/tambah', [App\Http\Controllers\ProdukController::class,'create'])->name('create.produk');
Route::post('/produk/{produk_id}/edit', [App\Http\Controllers\ProdukController::class, 'update'])->name('update.produk');
Route::get('/produk/{produk_id}/hapus', [App\Http\Controllers\ProdukController::class, 'destroy'])->name('delete.produk');
// Kios
Route::get('/kios', [App\Http\Controllers\KiosController::class,'index'])->name('kios');
Route::post('/kios/tambah', [App\Http\Controllers\KiosController::class,'create'])->name('create.kios');
Route::post('/kios/{kios_id}/edit', [App\Http\Controllers\KiosController::class, 'update'])->name('update.kios');
Route::get('/kios/{kios_id}/hapus', [App\Http\Controllers\KiosController::class, 'destroy'])->name('delete.kios');
// Distributor
Route::get('/distributor', [App\Http\Controllers\DistributorController::class,'index'])->name('distributor');
Route::post('/dist/tambah', [App\Http\Controllers\DistributorController::class,'create'])->name('create.dist');
Route::post('/dist/{produk_id}/edit', [App\Http\Controllers\DistributorController::class, 'update'])->name('update.dist');
Route::get('/dist/{produk_id}/hapus', [App\Http\Controllers\DistributorController::class, 'destroy'])->name('delete.dist');
// ? entry data produk Masuk
Route::post('/produk-masuk', [App\Http\Controllers\IndexController::class, 'create'])->name('create.produk-masuk');
Route::post('/produk-masuk/{id_produk_masuk}/edit', [App\Http\Controllers\IndexController::class,'update'])->name('update.produk-masuk');
Route::get('/produk-masuk/{produk_masuk_id}/hapus', [App\Http\Controllers\IndexController::class, 'destroy'])->name('destroy.produk-masuk');
Route::post('/laporanPdf', [App\Http\Controllers\IndexController::class,'laporanPDF'])->name('cetak-pdf');
Route::post('/laporanExcel', [App\Http\Controllers\IndexController::class,'laporanExcel'])->name('cetak-excel');
