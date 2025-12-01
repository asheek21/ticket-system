<?php

namespace App\Services;

use App\Exceptions\DatabaseCreatedFailedException;
use App\Models\TicketType;
use Exception;
use Illuminate\Support\Facades\DB;

class DatabaseService
{
    public function execute(TicketType $ticketType): void
    {
        try {

            $this->removeExistingDatabase($ticketType->database_name);

            $this->createDatabase($ticketType->database_name);

        } catch (Exception $e) {
            throw new DatabaseCreatedFailedException(
                'Database creation failed for '.$ticketType->type.'. Reason: '.$e->getMessage(),
                previous: $e
            );
        }
    }

    private function createDatabase(string $dbName)
    {
        $charset = config('database.connections.mysql.charset', 'utf8mb4');
        $collation = config('database.connections.mysql.collation', 'utf8mb4_unicode_ci');

        DB::connection('mysql')->statement(
            "CREATE DATABASE `{$dbName}` 
            CHARACTER SET {$charset} 
            COLLATE {$collation}"
        );

        info("Database {$dbName} created successfully.");
    }

    private function removeExistingDatabase(string $dbName)
    {
        try {
            DB::connection('mysql')->statement(
                "DROP DATABASE IF EXISTS `{$dbName}`"
            );
        } catch (\Throwable $e) {
            info('DatabaseService: safe ignore DROP error: '.$e->getMessage());
        }
    }
}
