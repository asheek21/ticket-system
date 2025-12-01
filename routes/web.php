<?php

use App\Actions\CreateTicketAction;
use App\Http\Controllers\LoadTicketController;
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
    Route::get('/load-tickets', LoadTicketController::class)->name('load-tickets');
    Route::post('/logout', LogoutController::class)->name('logout');
});

Route::get('/test', function () {

    $faker = \Faker\Factory::create('en');

    $action = new CreateTicketAction;

    for ($i = 0; $i < 1; $i++) {
        $action->execute([
            'name' => $faker->name(),
            'email' => $faker->email(),
            'subject' => $faker->sentence(),
            'description' => $faker->paragraph(),
            'ticket_type_id' => rand(1, 3),
        ]);
    }
});
