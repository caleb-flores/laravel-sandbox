<?php

namespace App\Providers;

use App\Services\ProductService;
use App\Services\ProductValidator;
use App\Repositories\ProductRepository;
use App\Repositories\ProductRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(
            ProductRepository::class,
            ProductRepositoryEloquent::class
        );

        $this->app->bind(
            ProductValidator::class,
            ProductValidator::class
        );

        $this->app->bind(
            ProductService::class,
            ProductService::class
        );
    }
}
