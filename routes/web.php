<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LoginShowController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', LoginShowController::class)->name('login.show');
    Route::post('/login', LoginController::class)->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/', [TicketController::class, 'index'])->name('home');
});
