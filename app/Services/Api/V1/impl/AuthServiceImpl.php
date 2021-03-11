<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 12.07.2020
 * Time: 16:28
 */

namespace App\Services\Api\V1\impl;


use App\Core\Utils\JwtUtil;
use App\Http\Resources\UserResource;
use App\Models\Entities\User;
use App\Models\Enums\ErrorCode;
use App\Services\Api\V1\AuthService;
use App\Services\BaseService;
use Illuminate\Support\Facades\Hash;

class AuthServiceImpl extends BaseService implements AuthService
{

    public function login($email, $password)
    {
        $user = User::where('email', $email)->first();
        if (!Hash::check($password, $user->password)) {
            $this->apiFail([
                'errorCode' => ErrorCode::PASSWORDS_MISMATCH,
                'errors' => [
                    'Неправильный пароль'
                ]
            ]);
        }

        return [
            'token' => JwtUtil::generateTokenFromUser($user),
            'user' => new UserResource($user)
        ];
    }

    public function register($email, $name, $password)
    {
        try {
            $user = User::create([
                'name' => $name,
                'email' => $email,
                'password' => bcrypt($password)
            ]);

        } catch (\Exception $exception) {
            $this->apiFail([
                'errorCode' => ErrorCode::SYSTEM_ERROR,
                'errors' => [
                    'Системная ошибка',
                    $exception->getMessage()
                ]
            ]);

        }

        return [
            'token' => JwtUtil::generateTokenFromUser($user),
            'user' => new UserResource($user)
        ];
    }


}
