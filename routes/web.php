<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SessionController;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
});



Route::middleware('auth')->group(function () {
    Route::delete("/logout", [SessionController::class, 'destroy']);
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get("/login", [SessionController::class, 'index']);
    Route::post("/login", [SessionController::class, 'store']);
});

