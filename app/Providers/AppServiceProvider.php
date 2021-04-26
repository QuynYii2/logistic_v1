<?php

namespace App\Providers;

use App\Interfaces\RoleInterface;
use App\Interfaces\SendInterface;
use App\Interfaces\ShipmentInterface;
use App\Interfaces\TakeInterface;
use App\Interfaces\UserInterface;
use App\Interfaces\WarehouseInterface;
use App\Repositories\RoleRepository;
use App\Repositories\SendRepository;
use App\Repositories\ShipmentRepository;
use App\Repositories\TakeRepository;
use App\Repositories\UserRepository;
use App\Repositories\WarehouseRepository;
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
        $this->app->bind(RoleInterface::class, RoleRepository::class);
        $this->app->bind(UserInterface::class, UserRepository::class);
        $this->app->bind(ShipmentInterface::class, ShipmentRepository::class);
        $this->app->bind(TakeInterface::class, TakeRepository::class);
        $this->app->bind(SendInterface::class, SendRepository::class);
        $this->app->bind(WarehouseInterface::class, WarehouseRepository::class);
    }
}
