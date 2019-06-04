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
            28583275 => 279365611,
            7454972  => 168309059,
        ];
        $c = date("d");
        $d = date("d") + 1;

        for ($i = 20; $i >= 20; $i++) {
            foreach ($kz as $key => $item) {
                $c++;
                $d++;
                if ($c >= 29 && $d >= 30) {
                    $c = date("d");
                    $d = date("d") + 1;
                }
                $starttime = '2019-07-' . $c;
                $endtime = '2019-07-' . $d;
                $this->toClick($key, $item, $starttime, $endtime);
                sleep($i / 2);
                print_r($i . ":" . time() . "--hotelid:" . $key . "--starttime:" . $starttime . "--endtime:" . $endtime);
            }

            if ($i == 50) {
                $i = 20;
            }
        }
    }

    public function toClick($hotelId, $roomId, $starTime, $endTime)
    {
        $cookie ="_abtest_userid=d3ccbf2e-be72-49cf-a679-e9969b726459; magicid=y95IRbXVKq5X0JjjQQ0p4r20oV+qGyVTks2/lU3jc5zBaLSQv4yIN4/TI76Mhhde; _RF1=180.169.137.172; _RSG=n.4lEnswni4Yek_gv69ST8; _RDG=2824715eb9ba7925941720c4d973192405; _RGUID=4b31eb6c-4ebc-4fb1-875c-246e6afeea22; login_type=0; UUID=E7093ABC850049EC984831C37D69A542; _ga=GA1.2.1742359767.1558580451; clientid=51482056110192225044; hoteluuid=UMQpuH9z9Fp0VDXF; _HGUID=T%02SQ%05%02V%03MT%05%02%03MT%06%02QMXWU%03MRTV%05V%01%06%05%05%01RR; HotelCityID=2split%E4%B8%8A%E6%B5%B7splitShanghaisplit2019-05-23split2019-05-24split0; Session=smartlinkcode=U135371&smartlinklanguage=zh&SmartLinkKeyWord=&SmartLinkQuary=&SmartLinkHost=; Union=AllianceID=4899&SID=135371&OUID=&Expires=1560149132191; MKT_Pagesource=PC; FD_SearchHistorty={\"type\":\"S\",\"data\":\"S%24%u4E0A%u6D77%28SHA%29%24SHA%242019-09-15%24%u9752%u5C9B%28TAO%29%24TAO\"}; gad_city=bfc57e4d16854aac15936b76ba41619a; _gid=GA1.2.1395001085.1559631847; ASP.NET_SessionId=mbwlylrkhqkrdz3rrwcobvn4; OID_ForOnlineHotel=15585803072683tm3fs1559631872298102003; login_uid=83F323A0BC28E0EDE9FEAE44E6504FCA; cticket=7701E5BA9F9A2FE86EEB8E7DAACF2706C12E5FEDAADDADB5DC1DBED252D3F3F1; AHeadUserInfo=VipGrade=0&UserName=&NoReadMessageCount=1; ticket_ctrip=bJ9RlCHVwlu1ZjyusRi+ypZ7X2r4+yojPP9JKm8/n9oniXCdEG9O5wRZMHt8KSF+q/MVv/k1G0HGH3HzPBULtT5xnRxjixKjo0K8+m2+H8npipgWZPOxppebpm3NwVbjKv9BUQxXUyLOkjf0AX8VrF72YN5v8hYuTRcF1W3Py4VX6zCHuFLavyXGxwymC0apFltWLKWTLQM9l5JUVieQwJN+O8iRk2PmqfaP/Kz3l6FC2IM0Ck3AHDyEXP4c3yZk+wl6hT8esUt0f2h+BD6AatAbN5Oi5lzmct4lCdNJN4k=; DUID=u=BCED91720FA5B56C473D68530D3E6CC7&v=0; IsNonUser=F; IsPersonalizedLogin=F; _gat=1; appFloatCnt=20; hoteluuidkeys=Bn4vDAYASeSFEP8WLY7YMXYNXEgYdYqte8fEdGj5zWUYmYOnY3cegavG0yUY1Ys8j97W0kKB5wDYHYbZj5DIohvS9jsYXYXqvGLW5bys7jN9vSpe6Ge75RhMyTYPYs3vbTvHgY1QI7DjL7eSqiAoYsYnYMYsYX6rftEUfwp6xDlYUBjs1jUzWnYmY0Y8YmdEG8KfnwboiknRHzj7rdXY7qJ64yUrHtYsgWqDvchxXMeZ5Ynhx4GxSqYLtio8w4MjFkEf8JMZWHhjUrGcJO4i39wZqvfsRqUjskYGTjbrzay5gigAwUXRBcE75j89xMsxHkEqgEZdEPkWkAepUwn4ElsjnNe7fi5NYgzr9TetlepBxzcih9iTXxqlWDBjg1ePMwMnKoZwfBidOR3Ujmleg3EOsyLlv5ni6aElFykov97KztEk3KPHwqgi31RmbjfrT1YU8JXgyPrq0jXSe9ljBfKF0jhDwpOxZSxHbxUpxstE0XEdZEoaWzfeqzwfMEM6jf8eTSiA5YzkrsDEH4yfnvlSiz6ES1y1Fv1fK9FWkzEO1jole14xg3jlrPbEGXWLQeH8jMNYUpjMoxP7x1ZxAQxgUE76EmXETmWNDePtwkoEa7jHXefbiFXYQUr71ekpe1fYohEhZwS4WlsiQQKdoEa5E8pEa7WGaeHswh0EB0jpneBUiMpYAlrB7e1qe3aEnqYMlEt3w18WdOiAY4Y4MYbHig1iXziPFjZYAYAaiOhWMBiGPJBDRhlRzUJSpjAY0YTORgMJplJflvmDwApig6ic6Yftwa4wM0jFLjsawNYQYbzym4rdmicHEXMvUZvM7vLSrasvUsygZEohWO7jLaJ77xmg; fcerror=1721138932; _zQdjfing=1336fa3165bb3365ac1336fa1336fa5fa4cc3a923a65b02e5fa4cc3365ac; utc=1559604467501; htltmp=beb2440425001; htlstmp=89000505050505898924ab0024; _hotelnewguid=1d309421e26821e2681d30941591e53ded881d3094f390751d309421e268; _bfa=1.1558580307268.3tm3fs.1.1559544329542.1559631843536.3.55; _bfs=1.33; _jzqco=%7C%7C%7C%7C%7C1.485551633.1558580454574.1559633261246.1559633271015.1559633261246.1559633271015.0.0.0.27.27; __zpspc=9.3.1559631854.1559633271.12%233%7Cwww.google.com%7C%7C%7C%7C%23; _bfi=p1%3D102003%26p2%3D102003%26v1%3D55%26v2%3D54; DomesticHotelCityID=undefinedsplitundefinedsplitundefinedsplit2019-06-04split2019-06-05splitundefined";
        $rmsToken ="fp=4t3dxy-16dlj87-1rh55uc&vid=1558580307268.3tm3fs&pageId=&r=4b31eb6c4ebc4fb1875c246e6afeea22&ip=180.169.137.172&rg=fin&kpData=0_0_0&kpControl=0_0_0-0_0_0&kpEmp=0_0_0_0_0_0_0_0_0_0-0_0_0_0_0_0_0_0_0_0-0_0_0_0_0_0_0_0_0_0&screen=1920x1080&tz=+8&blang=zh-CN&oslang=zh-CN&ua=Mozilla%2F5.0%20(Macintosh%3B%20Intel%20Mac%20OS%20X%2010_14_2)%20AppleWebKit%2F537.36%20(KHTML%2C%20like%20Gecko)%20Chrome%2F74.0.3729.169%20Safari%2F537.36&d=hotels.ctrip.com&v=22";
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
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('X-FORWARDED-FOR:142.93.251.195	', 'CLIENT-IP:142.93.251.195'));  //构造IP
        curl_setopt($curl, CURLOPT_REFERER, "http://www.baidu.com/");
        curl_setopt_array($curl, array(
            CURLOPT_URL            => "https://hotels.ctrip.com/DomesticBook/DomeInputNewOrderCS.aspx",
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