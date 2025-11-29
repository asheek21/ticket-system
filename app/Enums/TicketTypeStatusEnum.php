<?php

namespace App\Enums;

enum TicketTypeStatusEnum: string
{
    case Started = 'Started';
    case DbCreated = 'db_created';
    case ModelCreated = 'model_created';
    case Completed = 'Completed';
    case Failed = 'Failed';
}
