<?php

namespace App\Actions;

use App\Models\TicketType;
use Illuminate\Database\Eloquent\Collection;

class RetrieveDatabaseConfigurations
{
    public function execute(): Collection
    {
        return TicketType::select([
            'id',
            'type',
            'database_name',
        ])->get();
    }
}
