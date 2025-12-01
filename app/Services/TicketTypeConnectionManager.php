<?php

namespace App\Services;

use Illuminate\Database\MySqlConnection;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class TicketTypeConnectionManager
{
    public function connect(string $dataBaseName): MySqlConnection
    {
        $connectionName = "mysql_{$dataBaseName}";

        $base = config('database.connections.mysql');

        $base['database'] = $dataBaseName;

        Config::set("database.connections.{$connectionName}", $base);

        /** @var \Illuminate\Database\MySqlConnection $connection */
        $connection = DB::connection($connectionName);

        return $connection;
    }
}
