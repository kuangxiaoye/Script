<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

use Illuminate\Http\Request;

class GsxController extends BaseController
{
    /**
     * 用户信息保存
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
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

    /**
     * 鉴定结果查询
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
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
        //入库查询是否存在该email,serial(序列号)
        $emailSql = '';
        if (empty($emailSql)) {
            return response()->json([
                'msg' => '该邮箱不存在',
            ]);
        }
        $schedule = $basesWork->handleSchedule();

        return response()->json($schedule);
    }

    public function getqrcode(Request $request)
    {
        $basesWork = new \App\Work\Gsx\Bases();
        $email = $request->input(['email']);
        $payWay = $request->input(['payway']);
        $serial = $request->input(['serial']);
        $payInfo = $basesWork->qrcodeLogic($serial, $email, $payWay);

        return response()->json([
            'payinfo' => $payInfo,
        ]);
    }

    /**
     * 查询支付状态
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getorderstatus(Request $request)
    {
        $orderNumber = $request->input(['ordernum']);
        $basesWork = new \App\Work\Gsx\Bases();
        $result = $basesWork->getOrderStatus($orderNumber);
        return response()->json([
            'status' => $result,
        ]);
    }

}
