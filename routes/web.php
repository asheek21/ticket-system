<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LoginShowController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TicketTypeController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', LoginShowController::class)->name('login.show');
    Route::post('/login', LoginController::class)->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/', [TicketController::class, 'index'])->name('home');
    Route::resource('/ticket', TicketController::class)->except('index');
    Route::resource('ticket-type', TicketTypeController::class)->only(['index', 'create', 'store']);
    Route::post('/logout', LogoutController::class)->name('logout');
});
