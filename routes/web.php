<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ProdukController::class, 'index'])->name('produk.index');
Route::put('/produk/{id}/stok', [ProdukController::class, 'stok'])->name('produk.stok');
Route::get('produk/available', [ProdukController::class, 'getAvailable'])->name('produk.available');
Route::get('produk/unavailable', [ProdukController::class, 'getUnavailable'])->name('produk.unavailable');
Route::resource("/produk", ProdukController::class);