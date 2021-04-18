<?php

use App\Http\Controllers\API\AdministratorApplicationController;
use App\Http\Controllers\API\DashboardChartController;
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

Route::get('/chart-monthly', [DashboardChartController::class, 'chartMonthly'])->name('api.chart.monthly');

Route::get('/tagihan/detail/{id}', [TransactionController::class, 'detail'])->name('api.tagihan.detail');
Route::get('/tagihan/{id}', [TransactionController::class, 'show'])->name('api.tagihan.show');
Route::get('/tagihan/detail/klien/{id}', [TransactionController::class, 'clientDetail'])->name('api.tagihan-client.detail');

Route::get('/paket-internet/{id}', [InternetPackageController::class, 'show'])->name('api.paket-internet.show');
Route::get('/administrator-aplikasi/{id}', [AdministratorApplicationController::class, 'show'])->name('api.administrator-aplikasi.show');
