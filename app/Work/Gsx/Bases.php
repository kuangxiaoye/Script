<?php
/**
 * Created by PhpStorm.
 * User: wangye
 * Date: 2019/1/5
 * Time: 9:19 PM
 */

namespace App\Work\Gsx;


use App\Work\BasesWork;

class Bases extends BasesWork
{
    public function getUserInfo($input)
    {
        echo  123123;
        return response()->json($input);
    }
}