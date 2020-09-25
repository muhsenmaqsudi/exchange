<?php

namespace App\Providers;

use App\Repositories\Contracts\CurrencyRepository;
use App\Repositories\Contracts\ExchangeRepository;
use App\Repositories\Contracts\UserRepository;
use App\Repositories\Eloquent\CurrencyRepositoryImplementor;
use App\Repositories\Eloquent\ExchangeRepositoryImplementor;
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
        $this->app->bind(CurrencyRepository::class, CurrencyRepositoryImplementor::class);
        $this->app->bind(ExchangeRepository::class, ExchangeRepositoryImplementor::class);
    }
}
