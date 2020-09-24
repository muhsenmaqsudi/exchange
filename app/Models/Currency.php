<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'code', 'value', 'base', 'active'
    ];

    const IRR = 'IRR';
    const USD = 'USD';
    const EUR = 'EUR';
    const AVAILABLE_CURRENCY_CODES = [
        self::IRR, self::USD, self::EUR
    ];

    public function scopeOfActive()
    {
        return $this->where('active', true)->get();
    }

}
