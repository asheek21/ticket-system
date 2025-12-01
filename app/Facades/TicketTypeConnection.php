<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class TicketTypeConnection extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'TicketTypeConnectionManager';
    }
}
