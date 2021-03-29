<?php

use App\Http\Controllers\API\AdministratorApplicationController;
use App\Http\Controllers\API\InternetPackageController;
use App\Http\Controllers\API\TransactionController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/transaksi/detail/{id}', [TransactionController::class, 'detail'])->name('api.transaksi.detail');
Route::get('/transaksi/{id}', [TransactionController::class, 'show'])->name('api.transaksi.show');
Route::get('/paket-internet/{id}', [InternetPackageController::class, 'show'])->name('api.paket-internet.show');
Route::get('/administrator-aplikasi/{id}', [AdministratorApplicationController::class, 'show'])->name('api.administrator-aplikasi.show');
