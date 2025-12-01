<?php

namespace App\Jobs;

use App\Enums\TicketTypeStatusEnum;
use App\Models\TicketType;
use App\Services\DatabaseService;
use App\Services\ModelService;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

use function Laravel\Prompts\error;

class CreateTicketTypeConfigurationJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public TicketType $ticketType) {}

    /**
     * Execute the job.
     */
    public function handle(DatabaseService $service, ModelService $modelService): void
    {
        info("Creating ticket type: {$this->ticketType->type}");
        try {

            $service->execute($this->ticketType);

            $modelService->execute($this->ticketType->database_name);

            $this->ticketType->migration_status = TicketTypeStatusEnum::Completed;
            $this->ticketType->save();

        } catch (Exception $e) {
            error($e);

            $this->ticketType->migration_status = TicketTypeStatusEnum::Failed;
            $this->ticketType->save();
        }
    }
}
