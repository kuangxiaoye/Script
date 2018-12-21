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
            5607564 => 151331113, 11348692 => 97288712, 12603270 => 114582087,
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
//        $cookieBefore = fopen(__DIR__ . '/cookie.txt', 'r');
//        $tokenBefore = fopen(__DIR__ . '/token.txt', 'r');
        $cookie = "_abtest_userid=780ee265-792d-43b5-bba8-01b4bcbef480; __utma=167964915.2052419823.1543457593.1543457593.1543457593.1; __utmz=167964915.1543457593.1.1.utmcsr=google|utmccn=(organic)|utmcmd=organic|utmctr=(not%20provided); _RSG=xx49mRbpeFBWI_7kCC5V88; _RDG=28dca87b8304e124de1263f47437f83a87; _RGUID=b3e8ce56-f024-4efb-821f-14c32e1ff4a0; _ga=GA1.2.2052419823.1543457593; __utma=208231307.2052419823.1543457593.1543457602.1543457602.1; __utmz=208231307.1543457602.1.1.utmcsr=ctrip.com|utmccn=(referral)|utmcmd=referral|utmcct=/; HotelDomesticVisitedHotels1=640572=0,0,4.5,1381,/200s050000000kkqf50EE.jpg,&713449=0,0,0,4,/hotel/91000/90458/e33a0ba72ad140e085e81698d96d3124.jpg,&8056609=0,0,4.8,293,/20080y000000m77b9780F.jpg,&811871=0,0,0,4,/200e0q000000gi5t2A8B0.jpg,&345001=0,0,4.4,8795,/fd/hotel/g5/M02/BA/FD/CggYsFcFQyOAc1UNAAPZPFRilXU736.jpg,; corpid=; corpname=; DUID=u=5C68BD2EDF0C021884FFF905F1AB3302&v=0; IsNonUser=F; login_type=0; login_cardType=0; AHeadUserInfo=VipGrade=0&UserName=&NoReadMessageCount=0&U=5CD38354EE9D79E24CF045D0B38989FD; cticket=EA0C7F7A7F8149F60CE386FFE22A9C785AD866FEF1B3630C3874F7A66E75E447; ticket_ctrip=uoeOwviAJ6VQEgTNwLuTqSV9j/bS+aOP3Riia1P+kyQbgkQZsD2giaFxMPxFrD+o9vHFGmxGwJN6cqdbFKol4wmHwamzcK6NbSwMF0FcUrPf0hjxwhIwj+cs0h+Idl75eSfSjvSnoj5E8TnLtjy0ohpxQUYUel1cYxZDf7xy9do1AYDYXYjBKoh6woXr9AF/otsav8tWd9rmaBhjAPwqrZ4NlqFIquNwU50F3/1I0hY6pA3A8hskL/bdqTWnJIolLrk4dz2m121DgS+ZWdVAgSenyFxVo3uvpliNukOH8J6C7bW7l+XGtX/DSE4zlEtQ; login_uid=92A218CE73D96EAA6BCA93ACD91C2798; HotelCityID=2split%E4%B8%8A%E6%B5%B7splitShanghaisplit2018-12-17split2018-12-18split5; MKT_Pagesource=PC; FD_SearchHistorty={\"type\":\"S\",\"data\":\"S%24%u4E0A%u6D77%28SHA%29%24SHA%242019-01-03%24%u53F0%u5317%28TPE%29%24TPE\"}; FlightIntl=Search=[%22SHA|%E4%B8%8A%E6%B5%B7(SHA)|2|SHA|480%22%2C%22TPE|%E5%8F%B0%E5%8C%97(TPE)|617|TPE|480%22%2C%222019-01-03%22]; appFloatCnt=6; _gid=GA1.2.236391260.1545277412; Session=SmartLinkCode=U457771&SmartLinkKeyWord=&SmartLinkQuary=&SmartLinkHost=&SmartLinkLanguage=zh; _RF1=180.169.137.172; gad_city=bfc57e4d16854aac15936b76ba41619a; _gat=1; ASP.NET_SessionId=3am1tqlkzbqehxkx4sp41vvm; OID_ForOnlineHotel=154345759099023fhi71545383051762102003; Union=SID=457771&AllianceID=13963&OUID=; _bfa=1.1543457590990.23fhi7.1.1545357479339.1545383044617.16.89; _bfs=1.6; MKT_OrderClick=ASID=13963457771&CT=1545383078943&CURL=http%3A%2F%2Fhotels.ctrip.com%2Fhotel%2F640572.html%23ctm_ref%3Dwww_hp_his_lst&VAL={\"pc_vid\":\"1543457590990.23fhi7\"}; Mkt_UnionRecord=%5B%7B%22aid%22%3A%2216875%22%2C%22timestamp%22%3A1544424235087%7D%2C%7B%22aid%22%3A%224899%22%2C%22timestamp%22%3A1545314070861%7D%2C%7B%22aid%22%3A%2213963%22%2C%22timestamp%22%3A1545383078944%7D%5D; _jzqco=%7C%7C%7C%7C1545383052376%7C1.829947789.1543457593868.1545383069149.1545383078953.1545383069149.1545383078953.undefined.0.0.40.40; __zpspc=9.16.1545383049.1545383078.4%233%7Cwww.google.com%7C%7C%7C%7C%23; _bfi=p1%3D102003%26p2%3D102003%26v1%3D89%26v2%3D88; DomesticHotelCityID=undefinedsplitundefinedsplitundefinedsplit2018-12-21split2018-12-22splitundefined";
//        $rmsToken = "fp=4t3dxy-1w2vmrx-gea2qr&vid=1543457590990.23fhi7&pageId=&r=b3e8ce56f0244efb821f14c32e1ff4a0&ip=180.169.137.172&rg=fin&kpData=0_0_0&kpControl=0_0_0-0_0_0&kpEmp=0_0_0_0_0_0_0_0_0_0-0_0_0_0_0_0_0_0_0_0-0_0_0_0_0_0_0_0_0_0&screen=1920x1080&tz=+8&blang=zh-CN&oslang=zh-CN&ua=Mozilla%2F5.0%20(Macintosh%3B%20Intel%20Mac%20OS%20X%2010_14_2)%20AppleWebKit%2F537.36%20(KHTML%2C%20like%20Gecko)%20Chrome%2F71.0.3578.98%20Safari%2F537.36&d=hotels.ctrip.com&v=22";
        $rmsToken="";
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
        curl_exec($curl);
        curl_error($curl);
        curl_getinfo($curl);
    }
}