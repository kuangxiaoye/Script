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
        $cookie = "magicid=rx9YttlY3h3bLJ47/NedLVnsP0pA5gNHk66Ew10FR93BaLSQv4yIN4/TI76Mhhde; GUID=09031109212077321533; _RF1=180.169.137.172; _RSG=BBKDgHhA487InNpfOZdEBA; _RDG=281d449f619ef028ee32b27e81302ab275; _RGUID=72042ab4-6a35-42cb-a2ce-9e3629cd7c52; Mkt_UnionRecord=%5B%7B%22aid%22%3A%2266672%22%2C%22timestamp%22%3A1555040724583%7D%5D; _abtest_userid=2af9332b-b250-4f2f-ae2f-13e597f91e5c; gad_city=bfc57e4d16854aac15936b76ba41619a; login_uid=268F4078A1CE1B1F6E3C80817D4D948A; login_type=0; cticket=A0CA0CE3B721A990C97DC9D0A0534047DD40609FB56D3159BFDAA755B730200D; AHeadUserInfo=VipGrade=0&UserName=&NoReadMessageCount=1; ticket_ctrip=bJ9RlCHVwlu1ZjyusRi+ypZ7X2r4+yojAMmlVOmEy34PbjBGp4VauSwYbdhs1TbahOEUXy/yWs1PqHR790xwy4QfzwX1GFNhE1KrK3YdOwWkI4svtJ/h3OLdy0z7hO50K7HTpzx62Oqa4uFS4MuPOA4thkxS1aaWXO9j1DBC+1kfpEhM6IY5RFajTw0Tl3rZZ82YV2RVyLj77BsAI35mIUdETjm24QCa9yyAJ1EnIfLWdDy0lPU5kPykPC3i8/7oCNCG6p+W+5csQ/yppiSpzQ+mvJfOufFerAp9JdeVX48=; DUID=u=A45AF53FB529E010E4EB589A683BAA6F&v=0; IsNonUser=F; UUID=4ADC1432DB2A491DB5FF92C3F805DDED; IsPersonalizedLogin=F; Session=SmartLinkCode=U153507&SmartLinkKeyWord=&SmartLinkQuary=&SmartLinkHost=&SmartLinkLanguage=zh; Union=OUID=title&AllianceID=5376&SID=153507&SourceID=&Expires=1555645596378; MKT_OrderClick=ASID=5376153507&CT=1555040796406&CURL=https%3A%2F%2Fwww.ctrip.com%2F%3Fsid%3D153507%26allianceid%3D5376%26ouid%3Dtitle&VAL={\"pc_vid\":\"1555040699128.1ujss5j\"}; _ga=GA1.2.120424807.1555040797; _gid=GA1.2.463944136.1555040797; _gat=1; MKT_Pagesource=PC; ASP.NET_SessionId=pdbkcqafonel5lwqbhoi0l0a; clientid=51482024310052129094; hoteluuid=dhX4uhfM1BU4CsaD; fcerror=994101102; _zQdjfing=65b02e65b02e186ad91336fa4ea0841336fa1336fa4ea0843365ac; _HGUID=WRPTR%01%02TMV%01SUMTR%03%02M%01R%03%05MY%05SVRY%03%04W%03UR; OID_ForOnlineHotel=15550406991281ujss5j1555040807404102003; __zpspc=9.1.1555040796.1555040810.3%234%7C%7C%7C%7C%7C%23; _jzqco=%7C%7C%7C%7C1555040796977%7C1.380907991.1555040796747.1555040804926.1555040810382.1555040804926.1555040810382.undefined.0.0.3.3; DomesticHotelCityID=undefinedsplitundefinedspli";
        $rmsToken = "fp=7iyxvt-pobnn1-gny0im&vid=1555040699128.1ujss5j&pageId=&r=72042ab46a3542cba2ce9e3629cd7c52&ip=180.169.137.172&rg=fin&kpData=0_0_0&kpControl=0_0_0-0_0_0&kpEmp=0_0_0_0_0_0_0_0_0_0-0_0_0_0_0_0_0_0_0_0-0_0_0_0_0_0_0_0_0_0&screen=1920x1080&tz=+8&blang=zh-CN&oslang=zh-CN&ua=Mozilla%2F5.0%20(Windows%20NT%2010.0%3B%20WOW64)%20AppleWebKit%2F537.36%20(KHTML%2C%20like%20Gecko)%20Chrome%2F63.0.3239.132%20Safari%2F537.36&d=hotels.ctrip.com&v=22";
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