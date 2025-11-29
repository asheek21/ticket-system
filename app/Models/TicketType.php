<?php

namespace App\Models;

use App\Enums\TicketTypeStatusEnum;
use Illuminate\Database\Eloquent\Model;

class TicketType extends Model
{
    protected $fillable = [
        'type',
        'database_name',
        'is_migrated',
    ];

    protected function casts(): array
    {
        return [
            'migration_status' => TicketTypeStatusEnum::class,
        ];
    }
}
