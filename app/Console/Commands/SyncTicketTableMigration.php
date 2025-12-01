<?php

namespace App\Console\Commands;

use App\Actions\RetrieveDatabaseConfigurations;
use App\Services\ModelService;
use Illuminate\Console\Command;

class SyncTicketTableMigration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sync-ticket-table-migration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $databases = app(RetrieveDatabaseConfigurations::class)->execute();

        /** @var \App\Models\TicketType $ticketType */
        foreach ($databases as $ticketType) {
            app(ModelService::class)->execute($ticketType->database_name);
        }

    }
}
