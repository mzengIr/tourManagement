<?php

namespace App\Providers;

use App\Repositories\TourRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('TourRepository', \App\Repositories\TourRepository::class);

        $this->app->bind(\App\Managers\Tour\ITourManager::class, function ($app) {
            return new \App\Managers\Tour\TourManager($app);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
