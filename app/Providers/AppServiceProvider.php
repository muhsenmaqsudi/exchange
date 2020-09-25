<?php

namespace App\Providers;

use App\Models\Currency;
use App\Models\Exchange;
use App\Observers\CurrencyObserver;
use App\Observers\ExchangeObserver;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Currency::observe(CurrencyObserver::class);
        Exchange::observe(ExchangeObserver::class);
    }
}
