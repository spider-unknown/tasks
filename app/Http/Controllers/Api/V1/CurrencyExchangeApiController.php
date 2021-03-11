<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\ApiBaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\ConvertApiRequest;
use App\Services\Api\CurrencyExchangeService;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class CurrencyExchangeApiController extends ApiBaseController
{

    protected $currencyExchangeService;

    /**
     * AuthController constructor.
     * @param $authService
     */
    public function __construct(CurrencyExchangeService $currencyExchangeService)
    {
        $this->currencyExchangeService = $currencyExchangeService;
    }

    public function rates() {
        return $this->success($this->currencyExchangeService->rates());

    }

    public function convert(ConvertApiRequest $request) {
        return $this->success($this->currencyExchangeService->convert($request));
    }
}
