<?php

use App\Http\Controllers\AdministratorApplicationController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InternetPackageController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionReportController;
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
    return redirect()->route('dashboard');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::resource('klien', ClientController::class);
Route::resource('tagihan', TransactionController::class);
Route::resource('paket-internet', InternetPackageController::class);
Route::resource('administrator-aplikasi', AdministratorApplicationController::class);

Route::name('laporan.')->prefix('laporan')->group(function () {
    Route::resource('transaksi', TransactionReportController::class);
    Route::get('/export/{year}', [TransactionReportController::class, 'export'])->name('export.year');
});

require __DIR__ . '/auth.php';
