<?php

namespace App\Http\Controllers;

use App\Events\CurrencyValueUpdated;
use App\Exceptions\UnableToCreateResourceException;
use App\Http\Requests\StoreCurrencyRequest;
use App\Http\Resources\CurrencyResource;
use App\Http\Resources\StoreCurrencyResource;
use App\Repositories\Contracts\CurrencyRepository;

class CurrencyController extends Controller
{
    /**
     * @var CurrencyRepository
     */
    protected $currencyRepository;

    /**
     * CurrencyController constructor.
     * @param CurrencyRepository $currencyRepository
     */
    public function __construct(CurrencyRepository $currencyRepository)
    {
        $this->currencyRepository = $currencyRepository;
    }

    /**
     * @param StoreCurrencyRequest $request
     * @return StoreCurrencyResource
     * @throws UnableToCreateResourceException
     */
    public function store(StoreCurrencyRequest $request)
    {
        try {
            $currency = $this->currencyRepository->create($request->only(['name', 'code', 'value']));
            event(new CurrencyValueUpdated($this->currencyRepository->ofActive()));
        } catch (\Exception $exception) {
            throw new UnableToCreateResourceException('for some reason we couldn\'t create your resource', '500');
        }
        return StoreCurrencyResource::make($currency);
    }
}
