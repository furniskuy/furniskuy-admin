<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::resource('barang-keluars', App\Http\Controllers\BarangKeluarController::class);
Route::resource('barang-masuks', App\Http\Controllers\BarangMasukController::class);
Route::resource('ekspedisis', App\Http\Controllers\EkspedisiController::class);
Route::resource('inventaris', App\Http\Controllers\InventarisController::class);
Route::resource('pegawais', App\Http\Controllers\PegawaiController::class);
Route::resource('pembelis', App\Http\Controllers\PembeliController::class);
Route::resource('transaksis', App\Http\Controllers\TransaksiController::class);
Route::resource('suppliers', App\Http\Controllers\SupplierController::class);
Route::resource('keranjangs', App\Http\Controllers\KeranjangController::class);
Route::resource('ratings', App\Http\Controllers\RatingController::class);
