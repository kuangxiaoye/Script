<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

use Illuminate\Http\Request;

class GsxController extends BaseController
{
    public function receiveuserinfo(Request $request)
    {
        $basesWork = new \App\Work\Gsx\Bases();
        $email = $request->input(['email']);
        $model = $request->input(['model']);
        $tel = $request->input(['tel']);
        $serial = $request->input(['serial']);
        $userInfo = [
            'email'  => $email,
            'model'  => $model,
            'tel'    => $tel,
            'serial' => $serial,
        ];


        $result = $basesWork->handleUserInfo($userInfo);

        return response()->json($result);
    }

    public function searchschedule(Request $request)
    {
        $basesWork = new \App\Work\Gsx\Bases();
        $email = $request->input('emial');

        //初步邮箱验证
        if (empty($email)) {
            return response()->json([
                'msg' => '请填写邮箱信息',
            ]);
        }

        //入库查询是否存在该email
        $emailSql = '';
        if (empty($emailSql)) {
            return response()->json([
                'msg' => '该邮箱不存在',
            ]);
        }

        $schedule = $basesWork->handleSchedule($emailSql);

        return response()->json($schedule);
    }
}
