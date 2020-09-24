<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencies = [
            ['name' => 'Iranian Rial', 'code' => 'IRR', 'value' => '1', 'base' => 'IRR'],
            ['name' => 'United States Dollar', 'code' => 'USD', 'value' => '277970', 'base' => 'IRR'],
            ['name' => 'Euro', 'code' => 'EUR', 'value' => '324020', 'base' => 'IRR'],
        ];

        foreach ($currencies as $currency) {
            Currency::create($currency);
        }
    }
}
