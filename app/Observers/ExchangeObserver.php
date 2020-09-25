<?php

namespace App\Observers;

use App\Models\Exchange;
use Illuminate\Support\Str;

class ExchangeObserver
{
    public function creating(Exchange $exchange)
    {
        $exchange->tracking_code = Str::random(32);
    }
    /**
     * Handle the exchange "created" event.
     *
     * @param  \App\Models\Exchange  $exchange
     * @return void
     */
    public function created(Exchange $exchange)
    {
        //
    }

    /**
     * Handle the exchange "updated" event.
     *
     * @param  \App\Models\Exchange  $exchange
     * @return void
     */
    public function updated(Exchange $exchange)
    {
        //
    }

    /**
     * Handle the exchange "deleted" event.
     *
     * @param  \App\Models\Exchange  $exchange
     * @return void
     */
    public function deleted(Exchange $exchange)
    {
        //
    }

    /**
     * Handle the exchange "restored" event.
     *
     * @param  \App\Models\Exchange  $exchange
     * @return void
     */
    public function restored(Exchange $exchange)
    {
        //
    }

    /**
     * Handle the exchange "force deleted" event.
     *
     * @param  \App\Models\Exchange  $exchange
     * @return void
     */
    public function forceDeleted(Exchange $exchange)
    {
        //
    }
}
