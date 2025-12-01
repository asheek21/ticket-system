<?php

namespace App\Observers;

use App\Jobs\CreateTicketTypeConfigurationJob;
use App\Models\TicketType;

class TicketTypeObserver
{
    /**
     * Handle the TicketType "created" event.
     */
    public function created(TicketType $ticketType): void
    {
        CreateTicketTypeConfigurationJob::dispatch($ticketType);
    }
}
