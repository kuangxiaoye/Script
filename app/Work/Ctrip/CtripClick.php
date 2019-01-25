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
            6146989 => 47126308,
            8061977 => 203949172,
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
                $starttime = '2019-02-' . $c;
                $endtime = '2019-02-' . $d;
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
        $cookie = "_abtest_userid=780ee265-792d-43b5-bba8-01b4bcbef480; __utma=167964915.2052419823.1543457593.1543457593.1543457593.1; __utmz=167964915.1543457593.1.1.utmcsr=google|utmccn=(organic)|utmcmd=organic|utmctr=(not%20provided); _RSG=xx49mRbpeFBWI_7kCC5V88; _RDG=28dca87b8304e124de1263f47437f83a87; _RGUID=b3e8ce56-f024-4efb-821f-14c32e1ff4a0; _ga=GA1.2.2052419823.1543457593; __utma=208231307.2052419823.1543457593.1543457602.1543457602.1; __utmz=208231307.1543457602.1.1.utmcsr=ctrip.com|utmccn=(referral)|utmcmd=referral|utmcct=/; login_cardType=0; FlightIntl=Search=[%22SHA|%E4%B8%8A%E6%B5%B7(SHA)|2|SHA|480%22%2C%22TPE|%E5%8F%B0%E5%8C%97(TPE)|617|TPE|480%22%2C%222019-01-03%22]; login_uid=80F9BDE4073BBB691BDA4EFE55910123; AHeadUserInfo=VipGrade=0&UserName=&NoReadMessageCount=0; UUID=A38A0341E68447E88D2040C19DEE89BA; traceExt=campaign=CHNgoogle323&adid=index; HotelCityID=2split%E4%B8%8A%E6%B5%B7splitShanghaisplit2019-1-11split2019-01-12split5; MKT_Pagesource=PC; gad_city=bfc57e4d16854aac15936b76ba41619a; _RF1=218.82.18.138; Session=SmartLinkCode=U155997&SmartLinkKeyWord=&SmartLinkQuary=&SmartLinkHost=&SmartLinkLanguage=zh; Union=OUID=&AllianceID=4899&SID=155997&SourceID=&Expires=1548985837350; _gcl_aw=GCL.1548381037.~Cj0KCQiA4aXiBRCRARIsAMBZGz_k2C-RP3L8PeonrSRjkYf5ZweRVEmHnFLKx2fTug6W4eIUUNFm1S8aApdLEALw_wcB; _gcl_dc=GCL.1548381037.Cj0KCQiA4aXiBRCRARIsAMBZGz_k2C-RP3L8PeonrSRjkYf5ZweRVEmHnFLKx2fTug6W4eIUUNFm1S8aApdLEALw_wcB; _gid=GA1.2.1642122351.1548381037; _gac_UA-3748357-1=1.1548381037.Cj0KCQiA4aXiBRCRARIsAMBZGz_k2C-RP3L8PeonrSRjkYf5ZweRVEmHnFLKx2fTug6W4eIUUNFm1S8aApdLEALw_wcB; ASP.NET_SessionId=euicrljy0kbylefgsp4unkxw; OID_ForOnlineHotel=154345759099023fhi71548381105247102003; _bfa=1.1543457590990.23fhi7.1.1548242613208.1548381032397.27.148.103302; _bfs=1.5; HotelDomesticVisitedHotels1=378777=0,0,4.2,13023,/hotel/46000/45727/0BCF85B2-9802-42A6-AC1E-7D9CEC530374.jpg,&441351=0,0,4.3,595,/200q0w000000k8x9oAECB.jpg,&640572=0,0,4.5,1381,/200s050000000kkqf50EE.jpg,&713449=0,0,0,4,/hotel/91000/90458/e33a0ba72ad140e085e81698d96d3124.jpg,&8056609=0,0,4.8,293,/20080y000000m77b9780F.jpg,&811871=0,0,0,4,/200e0q000000gi5t2A8B0.jpg,; MKT_OrderClick=ASID=4899155997&CT=1548381116644&CURL=http%3A%2F%2Fhotels.ctrip.com%2Fhotel%2F378777.html%23ctm_ref%3Dhod_hp_hot_dl_n_2_3&VAL={\"pc_vid\":\"1543457590990.23fhi7\"}; Mkt_UnionRecord=%5B%7B%22aid%22%3A%2216875%22%2C%22timestamp%22%3A1546421575094%7D%2C%7B%22aid%22%3A%2213963%22%2C%22timestamp%22%3A1547178917711%7D%2C%7B%22aid%22%3A%22928435%22%2C%22timestamp%22%3A1548242615953%7D%2C%7B%22aid%22%3A%224899%22%2C%22timestamp%22%3A1548381116649%7D%5D; _bfi=p1%3D102003%26p2%3D102003%26v1%3D148%26v2%3D147; _jzqco=%7C%7C%7C%7C1548381037449%7C1.829947789.1543457593868.1548381108182.1548381116664.1548381108182.1548381116664.undefined.0.0.61.61; __zpspc=9.25.1548381037.1548381116.4%231%7Cgoogleppc%7Cgoogle%7Cpp%7C%7C%23; appFloatCnt=4; login_type=6; cticket=EA0C7F7A7F8149F60CE386FFE22A9C78C1BDF40F14D538D89D6F202C69A99F17; ticket_ctrip=bJ9RlCHVwlu1ZjyusRi+ypZ7X2r4+yoj4IXFe/V3EN95157UGz1xqqizZZ6itT+/qo572x3Rz95oPosuPOv94D5BscahRjY5yZnOXllZxLgUc+ieFWqWGZcI1XdGUneYt7P/Bm4+cQY8LXVYuwAQsn69tJZll+2cY1cYVa5GQvJtdTJJBfmyrsFzKAqvIeFMtFloFiaOUTHCn+J9FidSWm1Kcw+jnMzGEtVIyBiKDDKoNKkY78HBxyTwTeIiGeuLR6543HQ2v0GN7G2rrsJciyZuvD/75oPF4L6bYKbk/3M=; DUID=u=5C68BD2EDF0C021884FFF905F1AB3302&v=0; IsNonUser=F; IsPersonalizedLogin=F; DomesticHotelCityID=undefinedsplitundefinedsplitundefinedsplit2019-01-25split2019-01-26splitundefined";
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