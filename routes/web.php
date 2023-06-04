<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/admin');

Auth::routes();

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('keranjangs', App\Http\Controllers\KeranjangController::class);
    Route::resource('pegawais', App\Http\Controllers\PegawaiController::class);
    Route::resource('pembelis', App\Http\Controllers\PembeliController::class);
    Route::resource('suppliers', App\Http\Controllers\SupplierController::class);
    Route::resource('ekspedisis', App\Http\Controllers\EkspedisiController::class);
    Route::resource('kategoris', App\Http\Controllers\KategoriController::class);
    Route::resource('inventaris', App\Http\Controllers\InventarisController::class);
    Route::resource('metode-pembayarans', App\Http\Controllers\MetodePembayaranController::class);
    Route::resource('ratings', App\Http\Controllers\RatingController::class);
    Route::resource('transaksi-barangs', App\Http\Controllers\TransaksiBarangController::class);
    Route::resource('users', App\Http\Controllers\UserController::class);

    Route::group(['prefix' => 'transaksis'], function () {
        Route::patch('/status/{id}', [App\Http\Controllers\TransaksiController::class, 'updateStatus'])->name('transaksis.updateStatus');
    });
    Route::resource('transaksis', App\Http\Controllers\TransaksiController::class);
});
