<?php

namespace App\Actions\Tickets;

use App\Facades\TicketTypeConnection;
use App\Interfaces\TicketActionHandler;
use App\Models\Ticket;
use App\Models\TicketType;

class CreatedTicketHandler implements TicketActionHandler
{
    public function handle(Ticket $ticket): void
    {
        $ticket->load('ticketType');

        /** @var TicketType $ticketType */
        $ticketType = $ticket->ticketType;

        $connection = TicketTypeConnection::connect($ticketType->database_name);

        $connection->table('tickets')->insert([
            'reference_id' => $ticket->id,
            'name' => $ticket->name,
            'email' => $ticket->email,
            'subject' => $ticket->subject,
            'description' => $ticket->description,
            'status' => $ticket->status->value,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
