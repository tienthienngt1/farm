<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\TestRepositories;

class TestServiceProvider extends ServiceProvider
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
        //
    }
}
