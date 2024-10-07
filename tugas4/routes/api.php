<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware(['auth:sanctum'])->group(function(){
    Route::post('/logout', [AuthController::class, 'logout']);
    // Route::get('/blog', [AuthController::class, 'blog']);

    Route::apiResource('posts', PostController::class);
});


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
