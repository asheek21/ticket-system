<?php

namespace App\Console\Commands;

use App\Actions\RetrieveDatabaseConfigurations;
use App\Jobs\CreateTicketTypeConfigurationJob;
use Illuminate\Console\Command;

class CreateTicketTypeMigration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-ticket-type-migration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create databases and tables from ticket type configuration';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $databases = app(RetrieveDatabaseConfigurations::class)->execute();

        /** @var \App\Models\TicketType $ticketType */
        foreach ($databases as $ticketType) {
            CreateTicketTypeConfigurationJob::dispatch($ticketType);
        }

        return Command::SUCCESS;
    }
}
