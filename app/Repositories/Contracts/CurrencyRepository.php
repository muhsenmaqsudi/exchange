<?php

namespace App\Repositories\Contracts;

interface CurrencyRepository extends BaseRepositoryInterface
{
    public function ofActive();
}
