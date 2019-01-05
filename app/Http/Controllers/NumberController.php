<?php
/**
 * Created by PhpStorm.
 * User: wangye
 * Date: 2019/1/5
 * Time: 9:17 PM
 */

namespace App\Http\Controllers;


class NumberController extends Controller
{
    public function NumberLogic()
    {
        $numberWork=new \App\Work\Number\Bases();
        $numberWork->doSelectNum();
    }
}