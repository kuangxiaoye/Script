<?php
/**
 * Created by PhpStorm.
 * User: wangye
 * Date: 2019/1/5
 * Time: 9:19 PM
 */

namespace App\Work\Gsx;


use App\Work\BasesWork;

require_once __DIR__ . '/lib/YZTokenClient.php';

class Pay extends BasesWork
{
    public function qrcodeCreate()
    {
        $tokenServer = new GetToken();
        try {
            $token = $tokenServer->getToken();
            $client = new \YZTokenClient($token);
            $method = 'youzan.pay.qrcode.create'; //要调用的api名称
            $api_version = '3.0.0'; //要调用的api版本号
            $my_params = [
                'qr_name'  => 'GSX鉴定',
                'qr_price' => '1',
                'qr_type'  => 'QR_TYPE_DYNAMIC',
            ];
            $my_files = [
            ];
            $payQrcode = $client->get($method, $api_version, $my_params);
        } catch (\Exception $exception) {
            print_r($exception);
        }
        return $payQrcode;
    }

    public function getPayStatus()
    {
        $tokenServer = new GetToken();
        $token = $tokenServer->getToken();
        $client = new \YZTokenClient($token);
        $method = 'youzan.trades.qr.get'; //要调用的api名称
        $api_version = '3.0.0'; //要调用的api版本号
        $my_params = [
            'qr_id'     => '11792508',
            'page_size' => '10000',
            'page_no'   => '1',
        ];

        $my_files = [
        ];
        $payResultInfo = $client->get($method, $api_version, $my_params, $my_files);

        return $payResultInfo;
    }

}