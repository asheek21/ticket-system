<?php

namespace App\Http\Resources;

use App\Models\TicketType;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property-read \App\Models\Ticket $resource
 *
 * @mixin \App\Models\Ticket
 */
class TicketResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        /** @var TicketType $ticketType */
        $ticketType = $this->ticketType;

        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'subject' => $this->subject,
            'description' => $this->description,
            'ticket_type' => $ticketType->type,
            'status' => $this->status->value,
            'status_color' => $this->status->color(),
        ];
    }
}
