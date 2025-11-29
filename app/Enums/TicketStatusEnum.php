<?php

namespace App\Enums;

enum TicketStatusEnum: string
{
    case Open = 'Open';
    case Noted = 'Noted';
    case Closed = 'Closed';
}
