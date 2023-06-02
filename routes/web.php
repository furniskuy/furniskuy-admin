<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/admin');
});

Auth::routes();

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
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
});
