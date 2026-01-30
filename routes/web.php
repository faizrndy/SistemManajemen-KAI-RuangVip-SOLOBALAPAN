<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VipMonitoringController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\JadwalVipController;
use App\Http\Controllers\Admin\RiwayatVipController;
use App\Http\Controllers\VipPublicController;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tv', [VipMonitoringController::class, 'index']);

Route::get('/ruang-vip', [VipPublicController::class, 'index']);

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.process');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES (PROTECTED)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    /*
    |-----------------------
    | JADWAL VIP
    |-----------------------
    */
    Route::get('/jadwal', [JadwalVipController::class, 'index'])
        ->name('jadwal.index');

    Route::get('/jadwal/create', [JadwalVipController::class, 'create'])
        ->name('jadwal.create');

    Route::post('/jadwal', [JadwalVipController::class, 'store'])
        ->name('jadwal.store');

    Route::get('/jadwal/{jadwal}/edit', [JadwalVipController::class, 'edit'])
        ->name('jadwal.edit');

    Route::put('/jadwal/{jadwal}', [JadwalVipController::class, 'update'])
        ->name('jadwal.update');

    Route::delete('/jadwal/{jadwal}', [JadwalVipController::class, 'destroy'])
        ->name('jadwal.destroy');

    Route::patch('/jadwal/{jadwal}/status', [JadwalVipController::class, 'updateStatus'])
        ->name('jadwal.updateStatus');

    /*
    |-----------------------
    | RIWAYAT PENGGUNAAN
    |-----------------------
    */
    Route::get('/riwayat', [RiwayatVipController::class, 'index'])
        ->name('riwayat.index');

    Route::get('/riwayat/pdf', [RiwayatVipController::class, 'pdf'])
        ->name('riwayat.pdf');
});
