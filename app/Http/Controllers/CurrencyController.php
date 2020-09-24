<?php

namespace App\Http\Controllers;

use App\Exceptions\UnableToCreateResourceException;
use App\Http\Requests\StoreCurrencyRequest;
use App\Repositories\Contracts\CurrencyRepository;
use Illuminate\Http\Request;

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
     * @return mixed
     * @throws UnableToCreateResourceException
     */
    public function store(StoreCurrencyRequest $request)
    {
        try {
            $currency = $this->currencyRepository->create($request->only(['name', 'code', 'value']));
        } catch (\Exception $exception) {
            throw new UnableToCreateResourceException('for some reason we couldn\'t create your resource', '500');
        }
        return $currency;
    }
}
