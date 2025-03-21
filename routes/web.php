<?php

use Illuminate\Support\Facades\Route;

Livewire::setUpdateRoute(function ($handle) {
    return Route::post('/ekonseling-unkhair/public/livewire/update', $handle);
});

Livewire::setScriptRoute(function ($handle) {
    return Route::get('/ekonseling-unkhair/public/livewire/livewire.js', $handle);
});

Route::controller(App\Http\Controllers\WebController::class)->group(function () {
    Route::get('/', 'index')->name('frontend.index');
    Route::get('/beranda', 'index')->name('frontend.beranda');
    Route::get('/konselor', 'konselor')->name('frontend.konselor');

    Route::get('/aktivasi-akun/{params}', 'aktivasi_akun')->name('frontend.aktivasi_akun');
});

Route::middleware('isLogin')->group(function () {
    // route admin
    Route::prefix('admin')->group(function () {
        Route::controller(App\Http\Controllers\Admin\DashboardController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('admin.dashboard');
            Route::get('/logout', 'logout')->name('admin.logout');
        });

        Route::controller(App\Http\Controllers\Admin\KonselorController::class)->group(function () {
            Route::get('/konselor/index', 'index')->name('admin.konselor.index');
            Route::get('/konselor/add', 'create')->name('admin.konselor.add');
            Route::post('/konselor/store', 'store')->name('admin.konselor.store');
            Route::get('/konselor/edit/{id}', 'edit')->name('admin.konselor.edit');
            Route::patch('/konselor/update/{id}', 'update')->name('admin.konselor.update');
        });
    });


    // route konselor
    Route::prefix('counselor')->group(function () {
        Route::controller(App\Http\Controllers\Konselor\DashboardController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('counselor.dashboard');
            Route::get('/notification', 'notification')->name('counselor.notification');
            Route::get('/notification-list', 'list_notification')->name('counselor.notification.list');
            Route::get('/notification/{id}/read', 'read_notification')->name('counselor.notification.read');
            Route::get('/logout', 'logout')->name('counselor.logout');
        });

        Route::controller(App\Http\Controllers\Konselor\KelengkapanController::class)->group(function () {
            Route::get('/kelengkapan/identitas', 'index')->name('counselor.kelengkapan.identitas');
            Route::get('/kelengkapan/jadwal', 'jadwal')->name('counselor.kelengkapan.jadwal');
        });

        Route::controller(App\Http\Controllers\Konselor\PermintaanKonselingController::class)->group(function () {
            Route::get('/permintaan-konseling', 'index')->name('counselor.permintaan_konseling.index');
        });
    });

    // route user
    Route::prefix('user')->group(function () {
        Route::controller(App\Http\Controllers\User\DashboardController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('user.dashboard');
            Route::get('/profile', 'profile')->name('user.profile');
            Route::get('/logout', 'logout')->name('user.logout');
        });

        Route::controller(App\Http\Controllers\User\PilihKoselorController::class)->group(function () {
            Route::get('/daftar-konselor', 'index')->name('user.pilih_konselor');
        });

        Route::controller(App\Http\Controllers\User\JadwalKonselingController::class)->group(function () {
            Route::get('/jadwal-konseling', 'index')->name('user.jadwal_konseling.index');
        });
    });
});
