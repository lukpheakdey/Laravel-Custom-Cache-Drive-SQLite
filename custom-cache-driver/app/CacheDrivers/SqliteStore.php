<?php

namespace App\CacheDrivers;

use Illuminate\Cache\DatabaseStore;
use Illuminate\Database\ConnectionInterface;
use Illuminate\Support\Facades\Config;

class SqliteStore extends DatabaseStore
{

    public function __construct()
    {
        $config = config('cache.stores.sqlite', [
            'driver' => 'sqlite',
            'table' => 'cache',
            'database' => database_path('cache.sqlite'),
            'prefix' => ''
        ]);

        Config::set('database.connections.sqlite_cache', [
            'driver' => 'sqlite',
            'database' => $config['database'],
            'prefix' => $config['prefix']
        ]);

        $connection = app('db')->connection('sqlite_cache');

        parent::__construct($connection, $config['table'], $config['prefix']);
    }
}