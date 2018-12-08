<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Qcloud\Sms\SmsSingleSender;

class Controller extends BaseController
{
    //
    public function sendVoicAlert()
    {
        $phoneNumbers = [18260088501];
        $appid='1400167150';
        $appkey='3ecf8ced8aa5f5e060be0719af9d4c5a';
        try {
            $ssender = new SmsSingleSender($appid, $appkey);
            $result = $ssender->send(0, "86", $phoneNumbers[0],
                "【腾讯云】您的验证码是: 5678", "", "");
            $rsp = json_decode($result);
            echo $result;
        } catch(\Exception $e) {
            echo var_dump($e);
        }
    }
}
