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

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resources([
        'klien' => ClientController::class,
        'tagihan' => TransactionController::class,
        'paket-internet' => InternetPackageController::class,
        'administrator-aplikasi' => AdministratorApplicationController::class
    ]);

    Route::name('laporan.')->prefix('laporan')->group(function () {
        Route::resource('rekap', TransactionReportController::class);
        Route::get('/export/rekap/{year}', [TransactionReportController::class, 'exportRecap'])->name('export.recap');
        Route::get('/export/rekap/iuran/{year}', [TransactionReportController::class, 'listOfDuesExport'])->name('export.dues');
    });
});

require __DIR__ . '/auth.php';
