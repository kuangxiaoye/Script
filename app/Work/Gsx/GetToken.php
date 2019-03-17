<?php
/**
 * @Desc     :
 * @Date     :2019/3/17-5:06 PM
 * @Author   :wangye
 * @File     :Get.php
 * @Copyright:2015-2019 unversity
 */

namespace App\Work\Gsx;

require_once __DIR__ . '/lib/YZGetTokenClient.php';

class GetToken
{
    //todo 这里Token一周刷新一次 这里先写死
    public function getToken()
    {
        //工具型应用oauth2.0授权获取token
        $client_id = "42729acbd85d926455";//请填入有赞云控制台的应用client_id
        $client_secret = "a7af363417cf4ef0b8e4c3416edab07e";//请填入有赞云控制台的应用client_secret
        $shop_id = "42659561";
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL            => "https://open.youzan.com/oauth/token",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => "",
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => "POST",
            CURLOPT_POSTFIELDS     => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"client_id\"\r\n\r\n{$client_id}\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"client_secret\"\r\n\r\n{$client_secret}\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"grant_type\"\r\n\r\nsilent\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"kdt_id\"\r\n\r\n{$shop_id}\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
            CURLOPT_HTTPHEADER     => array(
                "Postman-Token: 4232932f-11ad-40d8-b128-2370821e92d7",
                "cache-control: no-cache",
                "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
            ),
        ));
        $response = curl_exec($curl);
        $tokenInfo = json_decode($response,true);
        $err = curl_error($curl);
        curl_close($curl);

        return $tokenInfo['access_token'];
    }


    /*
    //自用型应用获取token
    $client_id = "fill your client_id";//请填入有赞云控制台的应用client_id
    $client_secret = "fill your client_secret";//请填入有赞云控制台的应用client_secret

    $token = new YZGetTokenClient( $client_id , $client_secret );
    $type = 'self';
    $keys['kdt_id'] = '164932';

    echo '<pre>';
    var_dump(
        $token->get_token( $type , $keys )
    );
    echo '</pre>';


    //平台型应用获取初始化token
    $client_id = "fill your client_id";//请填入有赞云控制台的应用client_id
    $client_secret = "fill your client_secret";//请填入有赞云控制台的应用client_secret

    $token = new YZGetTokenClient( $client_id , $client_secret );
    $type = 'platform_init';

    echo '<pre>';
    var_dump(
        $token->get_token( $type , $keys )
    );
    echo '</pre>';


     //平台型应用获取店铺token
    $client_id = "fill your client_id";//请填入有赞云控制台的应用client_id
    $client_secret = "fill your client_secret";//请填入有赞云控制台的应用client_secret

    $token = new YZGetTokenClient( $client_id , $client_secret );
    $type = 'platform';
    $keys['kdt_id'] = '19024015';

    echo '<pre>';
    var_dump(
        $token->get_token( $type , $keys )
    );
    echo '</pre>';

     */

}