<?php

namespace Leoalmar\CodeCategory\Providers;


use Illuminate\Support\ServiceProvider;
use Leoalmar\CodeCategory\Repository\CategoryRepositoryEloquent;
use Leoalmar\CodeCategory\Repository\CategoryRepositoryInterface;

class CodeCategoryServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->publishes([__DIR__ . '/../../resources/migrations'=> base_path('database/migrations')], 'migrations');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views/codecategory','codecategory');
        require __DIR__ . '/../../routes.php';
    }

    public function register()
    {
        $this->app->bind(CategoryRepositoryInterface::class,CategoryRepositoryEloquent::class);
    }
}