<?php

namespace App\Http\Requests\Api\V1;

use App\Http\Requests\Api\ApiBaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class ConvertApiRequest extends ApiBaseRequest
{
    public function injectedRules()
    {
        return [
            'currency_from' => ['required', 'exists:currencies,currency'],
            'currency_to' => ['required', 'exists:currencies,currency'],
            'value' => ['required', 'numeric', 'min:0.01']
        ];
    }
}
