<?php

namespace App\Listeners;

use App\Events\CurrencyValueUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Cache;

class CurrencyCacheUpdater
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param CurrencyValueUpdated $event
     * @return void
     */
    public function handle(CurrencyValueUpdated $event)
    {
        Cache::forever('active_currencies', $event->activeCurrencies);
    }

}
