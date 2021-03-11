<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 12.07.2020
 * Time: 16:30
 */

namespace App\Http\Requests\Api\V1\Auth;


use App\Http\Requests\Api\ApiBaseRequest;
use App\Models\Enums\Platform;
use Illuminate\Validation\Rule;

class LoginApiRequest extends ApiBaseRequest
{
    public function injectedRules()
    {
        return [
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required', 'string', 'min:6']
        ];
    }

}
