<?php

namespace App\Providers;

use App\Domain\Contracts\AdvertisementContract;
use App\Domain\Contracts\UserContracts;
use App\Domain\Repository\AdvertisementRepository;
use App\Domain\Repository\UserRepository;
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
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }

        $this->app->bind(UserContracts::class,UserRepository::class);
        $this->app->bind(AdvertisementContract::class,AdvertisementRepository::class);
    }
}
