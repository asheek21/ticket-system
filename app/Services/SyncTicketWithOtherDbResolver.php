<?php

namespace App\Services;

use App\Interfaces\TicketActionHandler;
use App\Models\Ticket;

class SyncTicketWithOtherDbResolver
{
    protected array $handlers = [];

    public function register(string $action, TicketActionHandler $handler): void
    {
        $this->handlers[$action] = $handler;
    }

    public function execute(Ticket $ticket, string $action): void
    {
        if (! isset($this->handlers[$action])) {
            throw new \InvalidArgumentException("No handler registered for action: {$action}");
        }

        $this->handlers[$action]->handle($ticket);
    }
}
