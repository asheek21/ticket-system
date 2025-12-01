<?php

namespace App\Enums;

enum TicketStatusEnum: string
{
    case Open = 'Open';
    case Noted = 'Noted';
    case Closed = 'Closed';

    public function color(): string
    {
        return match ($this) {
            self::Open => 'bg-blue-100 text-blue-700',
            self::Noted => 'bg-yellow-100 text-yellow-700',
            self::Closed => 'bg-gray-100 text-gray-700',
        };
    }
}
