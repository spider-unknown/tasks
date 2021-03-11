<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 12.07.2020
 * Time: 16:28
 */

namespace App\Services\Api\V1;


interface AuthService
{
    public function login($email, $password);

    public function register($email, $name, $password);
}
