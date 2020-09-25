<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExchangeRequest;
use App\Http\Resources\ShowExchangeResource;
use App\Http\Resources\StoreExchangeResource;
use App\Repositories\Contracts\ExchangeRepository;
use Illuminate\Http\Request;

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

    /**
     * @param StoreExchangeRequest $request
     * @return mixed
     * @throws \App\Exceptions\RepositoryException
     */
    public function store(StoreExchangeRequest $request)
    {
        $result = $this->exchangeRepository->convertExchange($request->only(['source', 'destination', 'amount']));

        $exchange = $this->exchangeRepository->create([
            'email' => $request->input('email'),
            'source' => $request->input('source'),
            'destination' => $request->input('destination'),
            'amount' => $request->input('amount'),
            'result' => $result
        ]);

        return StoreExchangeResource::make($exchange);
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws \App\Exceptions\RepositoryException
     */
    public function show(Request $request)
    {
        $exchange = $this->exchangeRepository->findByField('tracking_code', $request->route('tracking_code'))->first();
        return ShowExchangeResource::make($exchange);
    }
}
