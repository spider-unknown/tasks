<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 12.07.2020
 * Time: 16:29
 */

namespace App\Http\Controllers\Api\V1\Auth;


use App\Http\Controllers\Api\ApiBaseController;
use App\Http\Requests\Api\V1\Auth\LoginApiRequest;
use App\Http\Requests\Api\V1\Auth\RegisterApiRequest;
use App\Services\Api\V1\AuthService;

class AuthController extends ApiBaseController
{

    protected $authService;

    /**
     * AuthController constructor.
     * @param $authService
     */
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }


    public function login(LoginApiRequest $request)
    {
        return $this->success(
            $this->authService->login(
                $request->email,
                $request->password
            )
        );
    }

    public function register(RegisterApiRequest $request)
    {
        return $this->success($this->authService->register(
            $request->email,
            $request->name,
            $request->password
        ));
    }
}
