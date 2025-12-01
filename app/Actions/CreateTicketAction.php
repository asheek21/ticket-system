<?php

namespace App\Actions;

use App\Enums\TicketStatusEnum;
use App\Models\Ticket;

class CreateTicketAction
{
    public function execute(array $data): void
    {
        $ticket = new Ticket;

        $ticket->name = $data['name'];
        $ticket->email = $data['email'];
        $ticket->subject = $data['subject'];
        $ticket->description = $data['description'];
        $ticket->ticket_type_id = $data['ticket_type_id'];
        $ticket->status = TicketStatusEnum::Open;
        $ticket->save();
    }
}
