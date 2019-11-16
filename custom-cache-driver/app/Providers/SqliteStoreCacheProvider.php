<?php

namespace App\Providers;

use App\CacheDrivers\SqliteStore;
use Illuminate\Support\ServiceProvider;

class SqliteStoreCacheProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        \Cache::extend('sqlite', function ($app){
            return \Cache::respository(new SqliteStore);
        });
    }
}
