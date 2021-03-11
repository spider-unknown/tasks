<?php


namespace App\Services\Api;


use App\Http\Requests\Api\V1\ConvertApiRequest;

interface CurrencyExchangeService
{
    public function rates();
    public function convert(ConvertApiRequest $request);
}
