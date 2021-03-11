<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 12.07.2020
 * Time: 13:38
 */

namespace App\Core\Traits;


use App\Core\Utils\RespUtil;

trait RespTrait
{

    public function success($data)
    {
        return RespUtil::success($data);
    }

    public function error($data)
    {
        return RespUtil::error($data);
    }

    public function resp($data, $code)
    {
        return RespUtil::resp($data, $code);
    }
}
