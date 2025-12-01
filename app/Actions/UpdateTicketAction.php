<?php

namespace App\Actions;

use App\Enums\TicketStatusEnum;
use App\Models\Ticket;

class UpdateTicketAction
{
    public function execute(Ticket $ticket, array $data): void
    {
        $ticket->name = $data['name'];
        $ticket->email = $data['email'];
        $ticket->subject = $data['subject'];
        $ticket->description = $data['description'];
        $ticket->status = $this->checkIfItIsNoted($ticket, $data);
        $ticket->notes = $data['notes'] ?? null;
        $ticket->save();
    }

    private function checkIfItIsNoted(Ticket $ticket, array $data): TicketStatusEnum
    {
        $notes = $data['notes'] ?? null;

        if ($ticket->status == TicketStatusEnum::Noted) {
            return TicketStatusEnum::Noted;
        }

        return empty($notes) ? TicketStatusEnum::Open : TicketStatusEnum::Noted;

    }
}
