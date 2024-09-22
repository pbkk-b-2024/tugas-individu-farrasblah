<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\UserAkses;
use App\Http\Middleware\AuthorAccess;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PostController;

// Rute default (untuk semua pengguna)
Route::get('/', function () {
    return view('components.layout');
});

// Rute untuk guest (hanya bisa diakses oleh pengguna yang belum login)
Route::middleware(['guest'])->group(function() {
    Route::get('/login-site', [UserController::class, 'index'])->name('login-site');
    Route::post('/login-site', [UserController::class, 'login']);
    //Route::get('/blog', [PostController::class, 'index'])->name('guest-blog');

    Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [UserController::class, 'register'])->name('register.submit');
});

// // Rute untuk pengguna yang sudah login (hanya bisa diakses oleh pengguna yang sudah login)
Route::middleware(['auth'])->group(function() {
    Route::get('/registered_user', [AdminController::class, 'registered_user'])->middleware('auth');
    
    // Rute logout hanya bisa diakses oleh pengguna yang sudah login
    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/');
    })->name('logout');

});

Route::middleware(['auth', AuthorAccess::class])->group(function () {
    Route::get('/author', [AuthorController::class, 'author']);
    Route::get('/author/blog', [PostController::class, 'create'])->name('author.blog.create');
    Route::post('/author/blog', [PostController::class, 'store'])->name('author.blog.store');
});

Route::get('/blog', [PostController::class, 'index']);
    

Route::fallback(function () {
    return redirect('/');
});