<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

use Illuminate\Http\Request;

class GsxController extends BaseController
{
    public function receiveuserinfo(Request $request)
    {
        $basesWork = new \App\Work\Gsx\Bases();
        $input = $request->input();
        if (empty($input)){
            $input=[
                '123'
            ];
        }
        $basesWork->getUserInfo($input);
    }
}
