<?php

namespace App\Observers;

use App\Models\Currency;
use App\Repositories\Contracts\CurrencyRepository;

class CurrencyObserver
{
    /**
     * @var CurrencyRepository
     */
    protected $currencyRepository;

    /**
     * CurrencyObserver constructor.
     * @param CurrencyRepository $currencyRepository
     */
    public function __construct(CurrencyRepository $currencyRepository)
    {
        $this->currencyRepository = $currencyRepository;
    }
    /**
     * Handle the currency "created" event.
     *
     * @param  \App\Models\Currency  $currency
     * @return void
     */
    public function created(Currency $currency)
    {
        $prevActiveCurrency = $this->currencyRepository
            ->ofActive()
            ->where('code', $currency->code)
            ->first();
        if ($prevActiveCurrency && $prevActiveCurrency->id !== $currency->id) {
            $prevActiveCurrency->active = false;
            $prevActiveCurrency->save();
        }
    }

    /**
     * Handle the currency "updated" event.
     *
     * @param  \App\Models\Currency  $currency
     * @return void
     */
    public function updated(Currency $currency)
    {
        //
    }

    /**
     * Handle the currency "deleted" event.
     *
     * @param  \App\Models\Currency  $currency
     * @return void
     */
    public function deleted(Currency $currency)
    {
        //
    }

    /**
     * Handle the currency "restored" event.
     *
     * @param  \App\Models\Currency  $currency
     * @return void
     */
    public function restored(Currency $currency)
    {
        //
    }

    /**
     * Handle the currency "force deleted" event.
     *
     * @param  \App\Models\Currency  $currency
     * @return void
     */
    public function forceDeleted(Currency $currency)
    {
        //
    }
}
