<?php

namespace App\Enums;

enum TicketTypeStatusEnum: string
{
    case Started = 'Started';
    case Completed = 'Completed';
    case Failed = 'Failed';

    public function color(): string
    {
        return match ($this) {
            self::Started => 'color-warning' ,
            self::Completed => 'color-success',
            self::Failed => 'color-danger',
        };
    }
}
