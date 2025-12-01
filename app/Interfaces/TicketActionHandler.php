<?php

namespace App\Interfaces;

use App\Models\Ticket;

interface TicketActionHandler
{
    public function handle(Ticket $ticket): void;
}
