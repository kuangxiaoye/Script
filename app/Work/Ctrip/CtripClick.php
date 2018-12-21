<?php
/**
 * Created by PhpStorm.
 * User: wangye
 * Date: 2018/12/10
 * Time: 2:43 PM
 */

namespace App\Work\Ctrip;


use App\Work\BasesWork;

class CtripClick extends BasesWork
{

    public function clickHandle()
    {
        $kz = [
            5607564 => 151331113, 11348692 => 97288712, 6337500 => 50316026,
            8545410 => 134905759, 6460683 => 52869112, 28036942 => 274484587,
            6530260 => 151335258, 6260594 => 48704644, 6146989 => 47126281,
        ];
        $c = date("d");
        $d = date("d") + 1;

        for ($i = 20; $i >= 20; $i++) {
            foreach ($kz as $key => $item) {
                $c++;
                $d++;
                if ($c >= 30 && $d >= 31) {
                    $c = date("d");
                    $d = date("d") + 1;
                }
                $starttime = '2018-12-' . $c;
                $endtime = '2018-12-' . $d;
                $this->toClick($key, $item, $starttime, $endtime);
                sleep($i / 20);
                print_r($i . ":" . time() . "--hotelid:" . $key . "--starttime:" . $starttime . "--endtime:" . $endtime);
            }

            if ($i == 50) {
                $i = 20;
            }
        }
    }

    public function toClick($hotelId, $roomId, $starTime, $endTime)
    {
//        $universModel = new \App\Models\University\Univers();

        $cookieBefore = fopen(__DIR__ . '/cookie.txt', 'r');
        $tokenBefore = fopen(__DIR__ . '/token.txt', 'r');
        $cookie = fgets($cookieBefore);
        $rmsToken = fgets($tokenBefore);

//        $universModel->cookie = $cookie;
//        $universModel->save();
        $query = [
            'startdate'          => $starTime,
            'depdate'            => $endTime,
            'hotel'              => $hotelId,
            'room'               => $roomId,
            'operationType'      => 'NEWHOTELORDER',
            'UseFG'              => 'F',
            'paymentterm'        => 'PP',
            'swid'               => 0,
            'sctx'               => '',
            'From'               => 'detail',
            'cityId'             => '',
            'defaultcoupon'      => '',
            'returnurl'          => '',
            'ishotsale'          => '',
            'PriceCX'            => 162,
            'isLowestRoom'       => 0,
            'roomNumber'         => 0,
            'PPDSingleVal'       => 5,
            'isTonightPromotion' => 0,
            'rmsTokenSearch'     => $rmsToken,
            'ismemberlogin'      => true,
            'isPTXK'             => 'T',
            'traceAdContextId'   => '',
        ];

        $curl = curl_init();
        $user_agent = 'Safari Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_1) AppleWebKit/537.73.11 (KHTML, like Gecko) Version/7.0.1 Safari/5';
        curl_setopt($curl, CURLOPT_USERAGENT, $user_agent);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('X-FORWARDED-FOR:142.93.251.113	', 'CLIENT-IP:142.93.251.113'));  //构造IP
        curl_setopt($curl, CURLOPT_REFERER, "http://www.baidu.com/");
        curl_setopt_array($curl, array(
            CURLOPT_URL            => "http://hotels.ctrip.com/DomesticBook/DomeInputNewOrderCS.aspx",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => "",
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => "POST",
            CURLOPT_POSTFIELDS     => http_build_query($query),
            CURLOPT_HTTPHEADER     => array(
                "Cookie: {$cookie}",
            ),
        ));
        $res = curl_exec($curl);
        print_r($res);
        curl_error($curl);
        curl_getinfo($curl);
    }
}