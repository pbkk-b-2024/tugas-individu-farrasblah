<?php

namespace App\Providers;

use App\Http\Controllers\AdminController;
use App\Http\Middleware\UserAkses;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Daftarkan middleware secara manual jika tidak menggunakan Kernel.php
        Route::middleware([UserAkses::class])->group(function () {
            Route::get('/author', [AdminController::class, 'author']);
            Route::get('/registered_user', [AdminController::class, 'registered_user']);
        });

        // Route::middleware(['auth'])->group(function () {
        //     Route::get('/registered_user', [AdminController::class, 'registered_user']);
        // });
    }
}
