<?php

namespace App\Providers;

use App\Entities\UserRepository;
use App\Repositories\RestuarentRepository;
use App\Repositories\RestuarentRepositoryEloquent;
use App\Repositories\UserRepository as RepositoriesUserRepository;
use App\Repositories\UserRepositoryEloquent;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class,RepositoriesUserRepository::class);
        $this->app->bind(RestuarentRepository::class,RestuarentRepositoryEloquent::class);
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
