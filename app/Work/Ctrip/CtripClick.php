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
            6146989 => 47126229,
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
                $starttime = '2019-04-' . $c;
                $endtime = '2019-04-' . $d;
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
        $cookie = "_abtest_userid=cbe8fad2-a0d0-4aac-b6b1-fb71e4711c20; _RF1=180.169.137.172; _RSG=n.4lEnswni4Yek_gv69ST8; _RDG=2824715eb9ba7925941720c4d973192405; _RGUID=4b31eb6c-4ebc-4fb1-875c-246e6afeea22; _ga=GA1.2.1280100621.1550747628; _gac_UA-3748357-1=1.1550747628.Cj0KCQiAtbnjBRDBARIsAO3zDl_Qw4ceyB3p6Pksx4W2G-hw1CA2ami12wvXtQjde421ZIT8S5e-SCUaAsrYEALw_wcB; _gcl_aw=GCL.1550747628.~Cj0KCQiAtbnjBRDBARIsAO3zDl_Qw4ceyB3p6Pksx4W2G-hw1CA2ami12wvXtQjde421ZIT8S5e-SCUaAsrYEALw_wcB; _gcl_dc=GCL.1550747628.Cj0KCQiAtbnjBRDBARIsAO3zDl_Qw4ceyB3p6Pksx4W2G-hw1CA2ami12wvXtQjde421ZIT8S5e-SCUaAsrYEALw_wcB; MKT_Pagesource=PC; HotelDomesticVisitedHotels1=912798=0,0,0,7,/20080m000000dlr6r8954.jpg,; appFloatCnt=3; gad_city=bfc57e4d16854aac15936b76ba41619a; login_uid=80F9BDE4073BBB691BDA4EFE55910123; login_type=0; cticket=EA0C7F7A7F8149F60CE386FFE22A9C78DDE24FA48B5E10B712B4997FBEFA9442; ticket_ctrip=bJ9RlCHVwlu1ZjyusRi+ypZ7X2r4+yoj4IXFe/V3EN95157UGz1xqqizZZ6itT+/qo572x3Rz95oPosuPOv94D5BscahRjY52fd3F6mQdkH8RlV4TVpIBlZ7wJJFiTd+T3QsvEZTxdIpBm7QTeFGrwp70+HdE8J7jAjhG6zKty5CQ0nzivDVOcZHxz0erYMjR90J+AWtJX5SA1Vn1d8LI1BKq88rL0S0CHW7G8xz6Fw6DrPESyRapjU1oLyUmPnPrUiVEHg0pwflT08V7Qve5OjBoE+pIkeoU012ZyJYfQ8=; AHeadUserInfo=VipGrade=0&UserName=&NoReadMessageCount=0; DUID=u=5C68BD2EDF0C021884FFF905F1AB3302&v=0; IsNonUser=F; UUID=B0F135D55D73464D832F3449B65688F0; IsPersonalizedLogin=T; Session=SmartLinkCode=U457771&SmartLinkKeyWord=&SmartLinkQuary=&SmartLinkHost=&SmartLinkLanguage=zh; _gid=GA1.2.1366587567.1551065416; _gat=1; Union=OUID=&AllianceID=13963&SID=457771&SourceID=&Expires=1551670216016; MKT_OrderClick=ASID=13963457771&CT=1551065416019&CURL=https%3A%2F%2Fwww.ctrip.com%2F%3Fallianceid%3D13963%26sid%3D457771&VAL={\"pc_vid\":\"1550747624641.45srml\"}; ASP.NET_SessionId=1aniazznkldkwqhvasyybirg; OID_ForOnlineHotel=155074762464145srml1551065420542102002; _bfa=1.1550747624641.45srml.1.1550747624641.1551065378497.2.12; _bfs=1.5; _bfi=p1%3D102003%26p2%3D102002%26v1%3D12%26v2%3D11; Mkt_UnionRecord=%5B%7B%22aid%22%3A%224899%22%2C%22timestamp%22%3A1550747780915%7D%2C%7B%22aid%22%3A%2213963%22%2C%22timestamp%22%3A1551065432850%7D%5D; _jzqco=%7C%7C%7C%7C%7C1.1946853100.1550747627577.1551065423305.1551065432905.1551065423305.1551065432905.0.0.0.7.7; __zpspc=9.2.1551065416.1551065432.3%233%7Cwww.google.com%7C%7C%7C%7C%23; DomesticHotelCityID=undefinedsplitundefinedsplitundefinedsplit2019-02-25split2019-02-26splitundefined";
        $rmsToken = "fp=4t3dxy-me9mgx-998sce&vid=1550747624641.45srml&pageId=&r=4b31eb6c4ebc4fb1875c246e6afeea22&ip=180.169.137.172&rg=fin&kpData=0_0_0&kpControl=0_0_0-0_0_0&kpEmp=0_0_0_0_0_0_0_0_0_0-0_0_0_0_0_0_0_0_0_0-0_0_0_0_0_0_0_0_0_0&screen=1920x1080&tz=+8&blang=zh-CN&oslang=zh-CN&ua=Mozilla%2F5.0%20(Macintosh%3B%20Intel%20Mac%20OS%20X%2010_14_2)%20AppleWebKit%2F537.36%20(KHTML%2C%20like%20Gecko)%20Chrome%2F72.0.3626.109%20Safari%2F537.36&d=hotels.ctrip.com&v=22";
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