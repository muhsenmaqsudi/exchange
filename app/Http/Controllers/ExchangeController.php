<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExchangeRequest;
use App\Repositories\Contracts\ExchangeRepository;

class ExchangeController extends Controller
{
    /**
     * @var ExchangeRepository
     */
    protected $exchangeRepository;

    /**
     * ExchangeController constructor.
     * @param ExchangeRepository $exchangeRepository
     */
    public function __construct(ExchangeRepository $exchangeRepository)
    {
        $this->exchangeRepository = $exchangeRepository;
    }

    public function store(StoreExchangeRequest $request)
    {
        $result = $this->exchangeRepository->convertExchange($request->only(['source', 'destination', 'amount']));

        return $this->exchangeRepository->create([
            'email' => $request->input('email'),
            'source' => $request->input('source'),
            'destination' => $request->input('destination'),
            'amount' => $request->input('amount'),
            'result' => $result
        ]);
    }
}
