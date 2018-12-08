<?php
/**
 * Created by PhpStorm.
 * User: wangye
 * Date: 2018/12/4
 * Time: 9:38 PM
 */

namespace App\Work;


use App\Work\Tool\baiduai;

class BasesWork
{
    public function doImgCode($imgInfo)
    {
        $baidu = new baiduai();
        $imgInfo = $baidu->aiGo($imgInfo);
        return $imgInfo;
    }

    public function getUnImg($cookie)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL            => "http://dxyq.njust.edu.cn/image",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => "",
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => "GET",
            CURLOPT_POSTFIELDS     => "",
            CURLOPT_HTTPHEADER     => array(
                "Cookie: " . $cookie,
                "cache-control: no-cache",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        return $response;
    }
}