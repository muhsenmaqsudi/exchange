<?php

namespace App\Providers;

use App\Repositories\Contracts\UserRepository;
use App\Repositories\Eloquent\UserRepositoryImplementor;
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
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(UserRepository::class, UserRepositoryImplementor::class);
    }
}
