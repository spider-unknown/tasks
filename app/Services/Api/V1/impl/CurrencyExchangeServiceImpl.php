<?php


namespace App\Services\Api\V1\impl;


use App\Http\Requests\Api\V1\ConvertApiRequest;
use App\Http\Resources\ConvertationResource;
use App\Http\Resources\CurrencyResource;
use App\Models\Entities\Convertation;
use App\Models\Entities\Currency;
use App\Services\Api\CurrencyExchangeService;
use Spatie\QueryBuilder\QueryBuilder;

class CurrencyExchangeServiceImpl implements CurrencyExchangeService
{
    public function convert(ConvertApiRequest $request)
    {
        $currencies = Currency::whereIn('currency', [$request->currency_from, $request->currency_to])->get();
        $from = $currencies->where('currency', $request->currency_from)->first();
        $to = $currencies->where('currency', $request->currency_to)->first();
        $converted_value = $to->value * 1.02 / $from->value * 1.02 * $request->value;
        $convertation = Convertation::create([
            'currency_from' => $request->currency_from,
            'currency_to' => $request->currency_to,
            'value' => $request->value,
            'converted_value' => $converted_value,
            'rate' => $to->value / $from->value,
        ]);
        return new ConvertationResource($convertation);
    }

    public function rates()
    {
        $currencies = QueryBuilder::for(Currency::class)
            ->allowedFilters('currency')
            ->orderby('value', 'desc')
            ->get();
        return CurrencyResource::collection($currencies);
    }


}
