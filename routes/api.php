<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::redirect('/', '/api/documentation');


Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [App\Http\Controllers\API\AuthController::class, 'login']);
    Route::post('signup', [App\Http\Controllers\API\AuthController::class, 'signup']);

    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::get('logout', [App\Http\Controllers\API\AuthController::class, 'logout']);
        Route::get('user', [App\Http\Controllers\API\AuthController::class, 'user']);
    });
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::resource('barang-keluars', App\Http\Controllers\API\BarangKeluarAPIController::class)
        ->except(['create', 'edit']);

    Route::resource('barang-masuks', App\Http\Controllers\API\BarangMasukAPIController::class)
        ->except(['create', 'edit']);

    Route::resource('ekspedisis', App\Http\Controllers\API\EkspedisiAPIController::class)
        ->except(['create', 'edit']);

    Route::resource('inventaris', App\Http\Controllers\API\InventarisAPIController::class)
        ->except(['create', 'edit']);

    Route::resource('pegawais', App\Http\Controllers\API\PegawaiAPIController::class)
        ->except(['create', 'edit']);

    Route::resource('pembelis', App\Http\Controllers\API\PembeliAPIController::class)
        ->except(['create', 'edit']);

    Route::resource('suppliers', App\Http\Controllers\API\SupplierAPIController::class)
        ->except(['create', 'edit']);

    Route::resource('transaksis', App\Http\Controllers\API\TransaksiAPIController::class)
        ->except(['create', 'edit']);


    Route::group(['prefix' => 'keranjangs'], function () {
        Route::get('/user', [App\Http\Controllers\API\KeranjangAPIController::class, 'keranjangUser']);
        Route::post('/checkout', [App\Http\Controllers\API\KeranjangAPIController::class, 'checkout']);
    });

    Route::resource('keranjangs', App\Http\Controllers\API\KeranjangAPIController::class)
        ->except(['create', 'edit']);


    Route::resource('ratings', App\Http\Controllers\API\RatingAPIController::class)
        ->except(['create', 'edit']);
});
