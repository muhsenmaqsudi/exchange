<?php

namespace App\Repositories\Contracts;

interface ExchangeRepository extends BaseRepositoryInterface
{
    public function convertExchange(array $attributes);
}
