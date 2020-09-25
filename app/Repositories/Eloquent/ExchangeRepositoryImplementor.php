<?php


namespace App\Repositories\Eloquent;

use App\Models\Exchange;
use App\Repositories\Contracts\ExchangeRepository;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class ExchangeRepositoryImplementor extends BaseRepository implements ExchangeRepository
{
    public function model()
    {
        return Exchange::class;
    }

    /**
     * @param array $attributes
     * @return false|float|int|null
     */
    public function convertExchange(array $attributes)
    {
        $source_code = $attributes['source'];
        $destination_code = $attributes['destination'];
        $source_rate = (int)Redis::connection()->client()->get($source_code) ?: Cache::get('active_currencies')->where('code', $source_code)->first()->value;
        $destination_rate = (int)Redis::connection()->client()->get($destination_code) ?: Cache::get('active_currencies')->where('code', $destination_code)->first()->value;
        $amount = (int)$attributes['amount'];

        try {
            if ($source_rate === $destination_rate) {
                $result = $amount;
            } else {
                $result = ($amount * $source_rate) / $destination_rate;
            }
        } catch (\Exception $e) {
            return null;
        }
        return $result;
    }
}
