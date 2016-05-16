<?php

namespace Leoalmar\CodeCategory\Providers;


use Illuminate\Support\ServiceProvider;

class LeoalmarServiceProvider extends ServiceProvider
{


    public function boot()
    {
        $this->publishes([__DIR__ . '/../../resources/migrations'=> base_path('database/migrations')], 'migrations');
    }

    public function register()
    {
        
    }

}