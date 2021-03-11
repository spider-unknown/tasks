<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 12.07.2020
 * Time: 19:03
 */

namespace App\Http\Requests\Api\V1\Auth;


use App\Http\Requests\Api\ApiBaseRequest;
use App\Models\Entities\Core\Role;
use App\Models\Enums\Platform;
use Illuminate\Validation\Rule;

class RegisterApiRequest extends ApiBaseRequest
{
    public function injectedRules()
    {
        return [
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6'],
            'name' => ['required', 'string']
        ];
    }

}
