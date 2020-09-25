<?php


namespace App\Repositories\Eloquent;

use App\Models\Currency;
use App\Repositories\Contracts\CurrencyRepository;

class CurrencyRepositoryImplementor extends BaseRepository implements CurrencyRepository
{
    public function model()
    {
        return Currency::class;
    }

    public function ofActive()
    {
        return $this->model->ofActive();
    }
}
