<?php

namespace App\Actions;

use App\Enums\TicketTypeStatusEnum;
use App\Jobs\CreateTicketTypeConfigurationJob;
use App\Models\TicketType;

class CreateTicketTypeAction
{
    public function execute(array $data): TicketType
    {
        $data['migration_status'] = TicketTypeStatusEnum::Started;

        $TicketType = TicketType::create($data);

        CreateTicketTypeConfigurationJob::dispatch($TicketType);

        return $TicketType;
    }
}
