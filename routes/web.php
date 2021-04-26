<?php

use App\Http\Controllers\AdministratorApplicationController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExportDuesController;
use App\Http\Controllers\ExportRecapController;
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

    Route::resource('klien', ClientController::class);

    Route::resource('tagihan', TransactionController::class)->except([
        'create', 'edit', 'show'
    ]);

    Route::resource('paket-internet', InternetPackageController::class)->except([
        'create', 'show', 'edit'
    ]);

    Route::resource('administrator-aplikasi', AdministratorApplicationController::class)->except([
        'create', ' show', 'edit'
    ]);

    Route::name('laporan.')->prefix('laporan')->group(function () {
        Route::get('rekap', [TransactionReportController::class, 'index'])->name('rekap.index');
        Route::get('/export/rekap/{year}', ExportRecapController::class)->name('export.recap');
        Route::get('/export/rekap/iuran/{year}', ExportDuesController::class)->name('export.dues');
    });
});

require __DIR__ . '/auth.php';

// If no route matched, 404 page will be returned.
Route::fallback(function () {
    abort(404);
});
