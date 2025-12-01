<?php

namespace App\Providers;

use App\Actions\Tickets\CreatedTicketHandler;
use App\Actions\Tickets\UpdatedTicketHandler;
use App\Services\SyncTicketWithOtherDbResolver;
use App\Services\TicketTypeConnectionManager;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton('TicketTypeConnectionManager', function () {
            return new TicketTypeConnectionManager;
        });

        $this->app->singleton(SyncTicketWithOtherDbResolver::class, function ($app) {
            $executor = new SyncTicketWithOtherDbResolver;

            $executor->register('created', new CreatedTicketHandler);
            $executor->register('updated', new UpdatedTicketHandler);

            return $executor;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::component('auth.components.layout', 'guest-layout');
        Blade::component('layouts.app-layout', 'app-layout');
    }
}
