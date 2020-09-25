<?php

namespace App\Http\Requests;

use App\Models\Currency;
use Illuminate\Foundation\Http\FormRequest;

class StoreExchangeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required',
            'source' => 'required|in:' . implode(',', Currency::AVAILABLE_CURRENCY_CODES),
            'destination' => 'required|in:' . implode(',', Currency::AVAILABLE_CURRENCY_CODES),
            'amount' => 'required|integer'
        ];
    }
}
