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

        //入库查询是否存在该email
        $emailSql = '';
        if (empty($emailSql)) {
            return response()->json([
                'msg' => '该邮箱不存在',
            ]);
        }

        $schedule = $basesWork->handleSchedule();

        return response()->json($schedule);
    }

//    /**
//    //     * 接收有赞消息推送
//    //     * @param Request $request
//    //     */
//    public function getpush(Request $request)
//    {
//        $logModel = new \App\Models\log\log();
//        $pushInfo = $request->all();
//        $logModel->logtype = 'push';
//        $logModel->content = json_encode($pushInfo);
//        $logModel->save();
//        print_r($pushInfo);
//        echo "\n";
//    }
//
//    /**
//     * 查询二维码支付状态
//     */
//    public function getpaystatus()
//    {
//        $payServer = new \App\Work\Gsx\Pay();
//        $payServer->getPayStatus();
//    }
//
//    /**
//     * 获取支付二维码
//     */
//    public function getqrcode()
//    {
//        $payServer = new \App\Work\Gsx\Pay();
//        $qrCodeMsg = $payServer->qrcodeCreate();
//
//        return response()->json($qrCodeMsg);
//    }

}
