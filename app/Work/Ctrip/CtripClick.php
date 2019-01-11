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
            6146989 => 47126308, 18068132 => 175050603, 19590369 => 183278418,
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
                $starttime = '2019-01-' . $c;
                $endtime = '2018-01-' . $d;
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
        $cookie = "_abtest_userid=780ee265-792d-43b5-bba8-01b4bcbef480; __utma=167964915.2052419823.1543457593.1543457593.1543457593.1; __utmz=167964915.1543457593.1.1.utmcsr=google|utmccn=(organic)|utmcmd=organic|utmctr=(not%20provided); _RSG=xx49mRbpeFBWI_7kCC5V88; _RDG=28dca87b8304e124de1263f47437f83a87; _RGUID=b3e8ce56-f024-4efb-821f-14c32e1ff4a0; _ga=GA1.2.2052419823.1543457593; __utma=208231307.2052419823.1543457593.1543457602.1543457602.1; __utmz=208231307.1543457602.1.1.utmcsr=ctrip.com|utmccn=(referral)|utmcmd=referral|utmcct=/; HotelDomesticVisitedHotels1=640572=0,0,4.5,1381,/200s050000000kkqf50EE.jpg,&713449=0,0,0,4,/hotel/91000/90458/e33a0ba72ad140e085e81698d96d3124.jpg,&8056609=0,0,4.8,293,/20080y000000m77b9780F.jpg,&811871=0,0,0,4,/200e0q000000gi5t2A8B0.jpg,&345001=0,0,4.4,8795,/fd/hotel/g5/M02/BA/FD/CggYsFcFQyOAc1UNAAPZPFRilXU736.jpg,; login_type=0; login_cardType=0; FD_SearchHistorty={\"type\":\"S\",\"data\":\"S%24%u4E0A%u6D77%28SHA%29%24SHA%242019-01-03%24%u53F0%u5317%28TPE%29%24TPE\"}; FlightIntl=Search=[%22SHA|%E4%B8%8A%E6%B5%B7(SHA)|2|SHA|480%22%2C%22TPE|%E5%8F%B0%E5%8C%97(TPE)|617|TPE|480%22%2C%222019-01-03%22]; appFloatCnt=6; login_uid=80F9BDE4073BBB691BDA4EFE55910123; cticket=EA0C7F7A7F8149F60CE386FFE22A9C7811AABB967E62E6949F50EF84F854B24E; ticket_ctrip=bJ9RlCHVwlu1ZjyusRi+ypZ7X2r4+yoj4IXFe/V3EN95157UGz1xqqizZZ6itT+/qo572x3Rz95oPosuPOv94D5BscahRjY51lFjE+jYa7g03F3Vab2j6vPtxECCkRW/Hr1jH0UfVNN/I26xzQ0AOl3X0pGcn8XHeIsAATem6cowq9oOTYSA/OIrRUzTcuXd2fgRyuJ6PjVLJP4GR3kYb7DHVl3J4uO9H7Ofb7pqAdoWLZC2hfh6WcNWPG4+d3mIv2UYxE99PEChmNZLqVVxn0cUR9DJat0RvRayM047PnA=; AHeadUserInfo=VipGrade=0&UserName=&NoReadMessageCount=0; DUID=u=5C68BD2EDF0C021884FFF905F1AB3302&v=0; IsNonUser=F; UUID=A38A0341E68447E88D2040C19DEE89BA; IsPersonalizedLogin=T; _RF1=180.169.137.172; gad_city=bfc57e4d16854aac15936b76ba41619a; _gid=GA1.2.2052219780.1547178879; MKT_Pagesource=PC; ASP.NET_SessionId=xwwob2mh5i1faiobgcko42dy; OID_ForOnlineHotel=154345759099023fhi71547178899578102003; Union=SID=155989&AllianceID=4899&OUID=google323|index|||; Session=SmartLinkCode=U155989&SmartLinkKeyWord=&SmartLinkQuary=&SmartLinkHost=&SmartLinkLanguage=zh; _gat=1; traceExt=campaign=CHNgoogle323&adid=index; HotelCityID=2split%E4%B8%8A%E6%B5%B7splitShanghaisplit2019-1-11split2019-01-12split5; _bfa=1.1543457590990.23fhi7.1.1547178876548.1547187866562.25.141.103302; _bfs=1.4; _gac_UA-3748357-1=1.1547187880.EAIaIQobChMIg4Sl94vl3wIVywMqCh3ZbwYbEAAYASAAEgJQJfD_BwE; _gcl_aw=GCL.1547187880.~EAIaIQobChMIg4Sl94vl3wIVywMqCh3ZbwYbEAAYASAAEgJQJfD_BwE; _bfi=p1%3D102003%26p2%3D100101991%26v1%3D141%26v2%3D138; Mkt_UnionRecord=%5B%7B%22aid%22%3A%2216875%22%2C%22timestamp%22%3A1546421575094%7D%2C%7B%22aid%22%3A%2213963%22%2C%22timestamp%22%3A1547178917711%7D%2C%7B%22aid%22%3A%224899%22%2C%22timestamp%22%3A1547187881733%7D%5D; MKT_OrderClick=ASID=13963457771&CT=1547187881739&CURL=http%3A%2F%2Fhotels.ctrip.com%2Fhotel%2F387238.html%23ctm_ref%3Dwww_hp_his_lst&VAL={\"pc_vid\":\"1543457590990.23fhi7\"}; _jzqco=%7C%7C%7C%7C1547178880420%7C1.829947789.1543457593868.1547187880037.1547187881783.1547187880037.1547187881783.undefined.0.0.56.56; __zpspc=9.23.1547187880.1547187881.2%231%7C%7C%7C%7C%7C%23; DomesticHotelCityID=undefinedsplitundefinedsplitundefinedsplit2019-01-11split2019-01-12splitundefined";
        $rmsToken = "fp=4t3dxy-1w2vmrx-gea2qr&vid=1543457590990.23fhi7&pageId=&r=b3e8ce56f0244efb821f14c32e1ff4a0&ip=180.169.137.172&rg=fin&kpData=0_0_0&kpControl=0_0_0-0_0_0&kpEmp=0_0_0_0_0_0_0_0_0_0-0_0_0_0_0_0_0_0_0_0-0_0_0_0_0_0_0_0_0_0&screen=1920x1080&tz=+8&blang=zh-CN&oslang=zh-CN&ua=Mozilla%2F5.0%20(Macintosh%3B%20Intel%20Mac%20OS%20X%2010_14_2)%20AppleWebKit%2F537.36%20(KHTML%2C%20like%20Gecko)%20Chrome%2F71.0.3578.98%20Safari%2F537.36&d=hotels.ctrip.com&v=22";
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