<?php
/**
 * Created by PhpStorm.
 * User: wangye
 * Date: 2019/1/5
 * Time: 9:28 PM
 */

namespace App\Work\Number;


class NumberPlatform
{
    //上海young卡
    public function getNumberCurl($page)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL            => "https://fx.sh.189.cn/mininet/fusion/getDailyNumbers",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => "",
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => "POST",
            CURLOPT_POSTFIELDS     => "page={$page}&pageSize=100&undefined=",
            CURLOPT_HTTPHEADER     => array(
                "Content-Type: application/x-www-form-urlencoded",
                "Cookie: JSESSIONID=B97321835E2C33CB1498E1F3E0DDF2AA.app01; _gscu_1708861450=43917610rstjcp17; svid=2DA9062D52B5F7D5; s_fid=393BCC9ED0EBF0D9-26C05D5F032BEF05; lvid=92276579eb1776e693e95523eb96b946; nvid=1; trkId=005226B1-72E0-4D06-A1D6-3D6B8A656D54; cityCode=sd; SHOPID_COOKIEID=10016; userId=201%7C20170000000020966030; UM_distinctid=167b9b8506946-08a4db9488d2be-10306653-1fa400-167b9b8506a65f; _gscu_1518386977=46693667sftyj975; _gscbrs_1518386977=1; _gscs_1518386977=46693667e06x4775|pv:1",
                "Postman-Token: 2953293c-d09f-4cbb-9a56-0960f661b038",
                "cache-control: no-cache",
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        $res = json_decode($response,true);

        return $res;
    }

    //阿里宝宝卡
    public function getNumberCurlAli($page)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL            => "https://fx.sh.189.cn/mininet/fusion/getDailyNumbers",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => "",
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => "POST",
            CURLOPT_POSTFIELDS     => "page={$page}&pageSize=100&undefined=",
            CURLOPT_HTTPHEADER     => array(
                "Content-Type: application/x-www-form-urlencoded",
                "Cookie: JSESSIONID=B97321835E2C33CB1498E1F3E0DDF2AA.app01; _gscu_1708861450=43917610rstjcp17; svid=2DA9062D52B5F7D5; s_fid=393BCC9ED0EBF0D9-26C05D5F032BEF05; lvid=92276579eb1776e693e95523eb96b946; nvid=1; trkId=005226B1-72E0-4D06-A1D6-3D6B8A656D54; cityCode=sd; SHOPID_COOKIEID=10016; userId=201%7C20170000000020966030; UM_distinctid=167b9b8506946-08a4db9488d2be-10306653-1fa400-167b9b8506a65f; _gscu_1518386977=46693667sftyj975; _gscbrs_1518386977=1; _gscs_1518386977=46693667e06x4775|pv:1",
                "Postman-Token: 2953293c-d09f-4cbb-9a56-0960f661b038",
                "cache-control: no-cache",
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        $res = json_decode($response, true);

        return $res;
    }

    //大王卡
    public function getNumberCrulTenc()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL            => "https://m.10010.com/NumApp/NumberCenter/qryNum?provinceCode=31&cityCode=310&monthFeeLimit=0&groupKey=34236498&searchCategory=1&net=01&amounts=200&codeTypeCode=&searchValue=&qryType=02&goodsNet=4&_=1547778554404",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => "",
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => "POST",
            CURLOPT_POSTFIELDS     => "",
            CURLOPT_HTTPHEADER     => array(
                "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8",
                "Accept-Encoding: gzip, deflate, br",
                "Content-Type: application/x-www-form-urlencoded",
                "Host: m.10010.com",
                "Postman-Token: 3c6bfde3-5df0-42b6-8d07-d0b31338151c",
                "Upgrade-Insecure-Requests: 1",
                "User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36",
                "cache-control: no-cache",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $response = ltrim($response, 'jsonp_queryMoreNums(');
        $response = rtrim($response, ")");

        $res = json_decode($response, true);


        return $res['numArray'];
    }

}