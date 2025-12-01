<?php

namespace App\Observers;

use App\Models\Ticket;
use App\Services\SyncTicketWithOtherDbResolver;

class TicketObserver
{
    public SyncTicketWithOtherDbResolver $resolver;

    public function __construct()
    {
        $this->resolver = app(SyncTicketWithOtherDbResolver::class);
    }

    public function created(Ticket $ticket): void
    {
        $this->resolver->execute($ticket, 'created');
    }

    /**
     * Handle the Ticket "updated" event.
     */
    public function updated(Ticket $ticket): void
    {
        $this->resolver->execute($ticket, 'updated');
    }
}
