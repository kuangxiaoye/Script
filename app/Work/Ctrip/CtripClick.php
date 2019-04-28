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
                $starttime = '2019-05-' . $c;
                $endtime = '2019-05-' . $d;
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
        $cookie = "_abtest_userid=84eb893d-8967-4e28-913e-1e907875c09f; _RF1=180.169.137.172; _RSG=n.4lEnswni4Yek_gv69ST8; _RDG=2824715eb9ba7925941720c4d973192405; _RGUID=4b31eb6c-4ebc-4fb1-875c-246e6afeea22; _ga=GA1.2.1451852317.1553063223; HotelCityID=2split%E4%B8%8A%E6%B5%B7splitShanghaisplit2019-03-29split2019-03-30split0; magicid=iLhyN3KNBhO6tR6i0X9ybQxwv8uYt+gz4qpxyP6H8oLBaLSQv4yIN4/TI76Mhhde; login_type=0; UUID=DE23BED24F4F42C886EEEEADED5DF9EA; clientid=51482096110049753685; hoteluuid=UMQpuH9z9Fp0VDXF; _HGUID=T%02SQ%05%02V%03MT%05%02%03MT%06%02QMXWU%03MRTV%05V%01%06%05%05%01RR; FlightIntl=Search=[%22SHA|%E4%B8%8A%E6%B5%B7(SHA)|2|SHA|480%22%2C%22SIN|%E6%96%B0%E5%8A%A0%E5%9D%A1(SIN)|73|SIN|480%22%2C%222019-04-14%22%2C%222019-04-21%22]; Mkt_UnionRecord=%5B%7B%22aid%22%3A%2213963%22%2C%22timestamp%22%3A1554973329858%7D%2C%7B%22aid%22%3A%224899%22%2C%22timestamp%22%3A1555054557694%7D%5D; Session=SmartLinkCode=U996977&SmartLinkKeyWord=&SmartLinkQuary=&SmartLinkHost=&SmartLinkLanguage=zh; MKT_Pagesource=PC; gad_city=bfc57e4d16854aac15936b76ba41619a; _gid=GA1.2.1214177473.1556417692; _gac_UA-3748357-1=1.1556417692.CjwKCAjw-4_mBRBuEiwA5xnFIH8tvueB2pfq95kayZzIxlUsl4qHqf4zyFnr0fDs2HpB4yBfrIhcYRoCmG0QAvD_BwE; Union=OUID=&AllianceID=4899&SID=996977&SourceID=&Expires=1557022492581; MKT_OrderClick=ASID=4899996977&CT=1556417692583&CURL=https%3A%2F%2Fhotels.ctrip.com%2F%3Fallianceid%3D4899%26sid%3D996977%26gclsrc%3Daw.ds%26%26gclid%3DCjwKCAjw-4_mBRBuEiwA5xnFIH8tvueB2pfq95kayZzIxlUsl4qHqf4zyFnr0fDs2HpB4yBfrIhcYRoCmG0QAvD_BwE&VAL={\"pc_vid\":\"1553063220274.29lse3\"}; _gcl_aw=GCL.1556417693.~CjwKCAjw-4_mBRBuEiwA5xnFIH8tvueB2pfq95kayZzIxlUsl4qHqf4zyFnr0fDs2HpB4yBfrIhcYRoCmG0QAvD_BwE; _gcl_dc=GCL.1556417693.CjwKCAjw-4_mBRBuEiwA5xnFIH8tvueB2pfq95kayZzIxlUsl4qHqf4zyFnr0fDs2HpB4yBfrIhcYRoCmG0QAvD_BwE; login_uid=76742A0B61853785829C07709CB9ECF9; cticket=0E279021D759F394765B3A870C243E3328C88BE1BD1F4AFAA80C8C873A377253; AHeadUserInfo=VipGrade=0&UserName=&NoReadMessageCount=1; ticket_ctrip=bJ9RlCHVwlu1ZjyusRi+ypZ7X2r4+yojEP6PC48qrQQJJAo1/hQBbAa1irkV9drwMH01JFMD1VzAAHIdMoTxW8uQmhj5DSiELztiM8lWllNxor9Xk6pIBwBN/dFmambCfHluimTk+6h6Of2AZA1dn+YYYrau0JUDxq+c3gp++DEAjsAbgukN1ubA6a9Nw3Khstr5ABy8POJvXeAXz2RXVB3p1Wb2wHKw9RZRabehn5wOcEywqbIUe5Q2k6SLo47njZXfGDbY2X9LaA5h3ztYh61RBizplRAidle+/QZRP+c=; DUID=u=2284EB7DB8BF4A0CB707F97B2DBC42D0&v=0; IsNonUser=F; IsPersonalizedLogin=F; _gat=1; ASP.NET_SessionId=p05ddc1mevlazu3pk1yjz2so; fcerror=150222769; _zQdjfing=1336fad5c0864ea0843365ac3365ac3365ac3165bb275ad065b02e; _hotelnewguid=1d309472ab1b66684e21e2683ded88f390751664a5183bba1664a5183bba; OID_ForOnlineHotel=155306322027429lse31556417794701102003; _jzqco=%7C%7C%7C%7C%7C1.74272828.1553063223443.1556417794185.1556417797939.1556417794185.1556417797939.0.0.0.40.40; __zpspc=9.11.1556417692.1556417797.3%233%7Cwww.google.com%7C%7C%7C%7C%23; appFloatCnt=6; utc=1556389020929; htltmp=bebde6ffdd46f; htlstmp=0005abab0500050505ab892424; DomesticHotelCityID=undefinedsplitundefinedsplitundefinedsplit2019-04-28split2019-04-29splitundefined; _bfa=1.1553063220274.29lse3.1.1556001090090.1556417689491.12.84; _bfs=1.13; _bfi=p1%3D102005%26p2%3D102003%26v1%3D84%26v2%3D83";
        $rmsToken = "fp=4t3dxy-wjezno-1rh55uc&vid=1553063220274.29lse3&pageId=&r=4b31eb6c4ebc4fb1875c246e6afeea22&ip=180.169.137.172&rg=fin&kpData=0_0_0&kpControl=0_0_0-0_0_0&kpEmp=0_0_0_0_0_0_0_0_0_0-0_0_0_0_0_0_0_0_0_0-0_0_0_0_0_0_0_0_0_0&screen=1920x1080&tz=+8&blang=zh-CN&oslang=zh-CN&ua=Mozilla%2F5.0%20(Macintosh%3B%20Intel%20Mac%20OS%20X%2010_14_2)%20AppleWebKit%2F537.36%20(KHTML%2C%20like%20Gecko)%20Chrome%2F74.0.3729.108%20Safari%2F537.36&d=hotels.ctrip.com&v=22";
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