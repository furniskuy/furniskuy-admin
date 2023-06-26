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
        Route::post('logout', [App\Http\Controllers\API\AuthController::class, 'logout']);
        Route::post('profile', [App\Http\Controllers\API\AuthController::class, 'profile']);
        Route::get('user', [App\Http\Controllers\API\AuthController::class, 'user']);
    });
});


Route::apiResource('api-inventaris', App\Http\Controllers\API\InventarisAPIController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('api-pegawais', App\Http\Controllers\API\PegawaiAPIController::class);

    Route::apiResource('api-pembelis', App\Http\Controllers\API\PembeliAPIController::class);

    Route::apiResource('api-suppliers', App\Http\Controllers\API\SupplierAPIController::class);

    Route::apiResource('api-ekspedisis', App\Http\Controllers\API\EkspedisiAPIController::class);

    Route::apiResource('api-kategoris', App\Http\Controllers\API\KategoriAPIController::class);

    Route::apiResource('api-metode-pembayaran', App\Http\Controllers\API\MetodePembayaranAPIController::class);

    Route::apiResource('api-ratings', App\Http\Controllers\API\RatingAPIController::class);

    Route::apiResource('api-transaksi-barangs', App\Http\Controllers\API\TransaksiBarangAPIController::class);

    Route::apiResource('api-users', App\Http\Controllers\API\UserAPIController::class);

    Route::group(['prefix' => 'keranjangs'], function () {
        Route::get('/user', [App\Http\Controllers\API\KeranjangAPIController::class, 'keranjangUser']);
        Route::post('/checkout', [App\Http\Controllers\API\KeranjangAPIController::class, 'checkout']);
    });

    Route::apiResource('api-keranjangs', App\Http\Controllers\API\KeranjangAPIController::class);

    Route::group(['prefix' => 'transaksi'], function () {
        Route::get('/user', [App\Http\Controllers\API\TransaksiAPIController::class, 'transaksiUser']);
    });

    Route::apiResource('api-transaksi', App\Http\Controllers\API\TransaksiAPIController::class);
});
