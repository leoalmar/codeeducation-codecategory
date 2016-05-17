<?php

namespace Leoalmar\CodeCategory\Providers;


use Illuminate\Support\ServiceProvider;

class CodeCategoryServiceProvider extends ServiceProvider
{


    public function boot()
    {
        $this->publishes([__DIR__ . '/../../resources/migrations'=> base_path('database/migrations')], 'migrations');
        require __DIR__ . '/../routes.php';
    }

    public function register()
    {
        
    }

}