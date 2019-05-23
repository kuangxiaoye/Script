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
            9066086  => 364434012,
            17914983 => 331342043,
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
                $starttime = '2019-06-' . $c;
                $endtime = '2019-06-' . $d;
                $this->toClick($key, $item, $starttime, $endtime);
                sleep($i / 2);
                print_r($i . ":" . time() . "--hotelid:" . $key . "--starttime:" . $starttime . "--endtime:" . $endtime);
            }

            if ($i == 50) {
                $i = 20;
            }
        }
    }

    public function     toClick($hotelId, $roomId, $starTime, $endTime)
    {
        $cookie ="_abtest_userid=d3ccbf2e-be72-49cf-a679-e9969b726459; gad_city=bfc57e4d16854aac15936b76ba41619a; magicid=y95IRbXVKq5X0JjjQQ0p4r20oV+qGyVTks2/lU3jc5zBaLSQv4yIN4/TI76Mhhde; _RF1=180.169.137.172; _RSG=n.4lEnswni4Yek_gv69ST8; _RDG=2824715eb9ba7925941720c4d973192405; _RGUID=4b31eb6c-4ebc-4fb1-875c-246e6afeea22; login_uid=17F8AB174EDBD429505571CBE4D79552; login_type=0; cticket=0E279021D759F394765B3A870C243E33A21B03B9C17649F8D9D039DEB6D967A9; AHeadUserInfo=VipGrade=0&UserName=&NoReadMessageCount=1; ticket_ctrip=bJ9RlCHVwlu1ZjyusRi+ypZ7X2r4+yojEP6PC48qrQQJJAo1/hQBbAa1irkV9drwMH01JFMD1VzAAHIdMoTxW8uQmhj5DSiEOhFl7N8lfFmjxgHIZ5zfr4oIEKlOQdeZ2ElIFF9K3Z4aCfzcuIeokg3TLM1lwVkxHLyhKgPWJTq42Hr1kp4gUPOHhDsKb5ROV9/Zh55peu6Kqk5l5+61JXCjtJoEK382L6vLxIIkTruCwec6zXOjAzssHJhWS2fKajJWVg6ePjy8geHQSXHobIhKPJbZti6eHz0FrHtbioY=; DUID=u=2284EB7DB8BF4A0CB707F97B2DBC42D0&v=0; IsNonUser=F; UUID=E7093ABC850049EC984831C37D69A542; IsPersonalizedLogin=F; MKT_Pagesource=PC; _ga=GA1.2.1742359767.1558580451; _gid=GA1.2.1642183068.1558580451; ASP.NET_SessionId=fklimkgvnad51air52j2fv50; clientid=51482056110192225044; hoteluuid=UMQpuH9z9Fp0VDXF; _HGUID=T%02SQ%05%02V%03MT%05%02%03MT%06%02QMXWU%03MRTV%05V%01%06%05%05%01RR; OID_ForOnlineHotel=15585803072683tm3fs1558580459634102003; HotelCityID=2split%E4%B8%8A%E6%B5%B7splitShanghaisplit2019-05-23split2019-05-24split0; fcerror=999359002; _zQdjfing=65b02e65b02e65b02e5fa4ccd5c08665b02e4ea0844ea0843365ac; _hotelnewguid=3ded8872ab1bf3907521e268f3907575a27af39075183bba3ded88; hoteluuidkeys=PfXY5AYL0e98EZkW5YPYTkYf9ESY6Y4be7nEkbjmTWgYGYaorFAjcNvm8jmY0YTzwm1wH4YaFjaYPYlajSFIdfvfBjfYpYosv4LEbFyDzjSZvsDelaYgTj0Zw0YLYTUv6qIUlYPcw5FxD7edliHMYHY1YQY5Y37rNTEMcwf5x1qYXPjGtjU3WUYgYAYaYp0EHQKz7wBAi7PRhXjgr6ZYoOJlfyzrtgY5nWH4vzBxOFeq1YU8xATxcGYkhinawhDjbdEaLJ5zWTNjtrMgJaoi38wODv84R60jtsYULjorDtyHoif5wmqRpkESdjomxsnxHXEXhEZ1EBHWcteSUw3QEMUj94eOqibNYNcr8DeUHephxghiU9iSNxT5W85jakeD4w1BKSDw45iPgRz7jsaekhEHhy0tvt6i19EAnyl8v9nKd5EANKS8w9TilfR7tjhr9FYBmJ4pykrLqj0OeqXjcoKPDjB7wcGxbmxnsxgFxlaEahEh1EzqWTPecfwH7E4Njo3ebHiTnYqcr8mEgOy7Hv4UiokEsmyF1vGgKgkW0hEtdjTQeoOxDtjzr1PEHlWnAeOTjlAYk9j1fx6AxTXx65xMfE7GEPQE1BWzDeMnwsSE9kjG6eLSig6Y3qrTQeXkedcY49E6ZwPXWgniHHKmbEn4E7zEdzWc5eoHwmQEc6j5lehci3zYGZrSneLteZSE6LYoXEzTwcLWkqikYoYObY5LiGgiULi0Qj0YcYBXig1WXPiNLJA4RXdRX6JmPjmY0YpLRt5JH3Jotjg7Jhmj6lWUdjh4J4tibDvMhigXYbYMYMFyS3rc0i4bEPXv8DvlZvgfrG6vhHys8ENaWdZjPnJNNxDM; _jzqco=%7C%7C%7C%7C%7C1.485551633.1558580454574.1558580842425.1558580857794.1558580842425.1558580857794.0.0.0.9.9; __zpspc=9.1.1558580454.1558580857.9%234%7C%7C%7C%7C%7C%23; appFloatCnt=9; utc=1558552062824; htltmp=beb3631175dfb; htlstmp=05052405050005890505240524; DomesticHotelCityID=undefinedsplitundefinedsplitundefinedsplit2019-05-23split2019-05-24splitundefined; _bfa=1.1558580307268.3tm3fs.1.1558580307268.1558580307268.1.15; _bfs=1.15; _bfi=p1%3D102005%26p2%3D102003%26v1%3D15%26v2%3D14";
        $rmsToken = "fp=4t3dxy-1jbdn0u-1rh55uc&vid=1558580307268.3tm3fs&pageId=&r=4b31eb6c4ebc4fb1875c246e6afeea22&ip=180.169.137.172&rg=fin&kpData=0_0_0&kpControl=0_0_0-0_0_0&kpEmp=0_0_0_0_0_0_0_0_0_0-0_0_0_0_0_0_0_0_0_0-0_0_0_0_0_0_0_0_0_0&screen=1920x1080&tz=+8&blang=zh-CN&oslang=zh-CN&ua=Mozilla%2F5.0%20(Macintosh%3B%20Intel%20Mac%20OS%20X%2010_14_2)%20AppleWebKit%2F537.36%20(KHTML%2C%20like%20Gecko)%20Chrome%2F74.0.3729.157%20Safari%2F537.36&d=hotels.ctrip.com&v=22";
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