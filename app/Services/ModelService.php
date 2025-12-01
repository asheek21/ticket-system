<?php

namespace App\Services;

use App\Exceptions\ModelCreatedFailedException;
use App\Facades\TicketTypeConnection;
use Exception;
use Illuminate\Support\Facades\Artisan;

class ModelService
{
    public function execute(string $dataBaseName): void
    {
        try {

            $connection = TicketTypeConnection::connect($dataBaseName);

            $this->runTicketMigrations($connection->getName());

        } catch (Exception $e) {
            throw new ModelCreatedFailedException(
                'Database creation failed for '.$dataBaseName.'. Reason: '.$e->getMessage(),
                previous: $e
            );
        }
    }

    private function runTicketMigrations(string $connectionName): void
    {
        Artisan::call('migrate', [
            '--database' => $connectionName,
            '--path' => 'database/migrations/tickets',
            '--force' => true,
        ]);
    }
}
