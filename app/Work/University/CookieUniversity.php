<?php
/**
 * Created by PhpStorm.
 * User: wangye
 * Date: 2018/12/4
 * Time: 10:02 PM
 */

namespace App\Work\University;

use Illuminate\Support\Facades\Mail;


class CookieUniversity
{
    public function vaildFormInfo($username, $password, $cookie)
    {
        if (empty($username)) {
            return [
                'msg'  => '你都不输入用户名的吗？？',
                'code' => 400001,
            ];
        }
        if (empty($password)) {
            return [
                'msg'  => '你都不输入密码的吗？？',
                'code' => 400002,
            ];
        }
        if (empty($cookie)) {
            return [
                'msg'  => '你都不输入密码的吗？？',
                'code' => 400002,
            ];
        }
        return [
            'msg'  => '用户名验证成功,',
            'code' => 200,
        ];
    }

    public function bookHandle()
    {
        $universModel = new \App\Models\University\Univers();
        $university = new BasesUniversity();
        $cookieBefore = fopen(__DIR__ . '/cookie.txt', 'r');
        $cookie = "JSESSIONID=F04069566FF88FC82645AA5B2B918DBE; iPlanetDirectoryPro=IYyefarCbw2Q7pzIIMgRJ3";
        $universModel->cookie = $cookie;
        do {
            //发起最终请求的curl
            $date = date('i');
            if ($date == 59 || $date == 0) {
                $imgBases = $university->downImg($cookie);
                $validNumber = $university->getImgCode($imgBases);
                $this->toCurl($cookie, $validNumber);
            }
            if ($date < 58 && $date !== '00') {
                echo "开始" . (58 - $date) . "分" . (59 - $date) * 60 . "秒的睡眠";
                sleep((58 - $date) * 60);
                echo "睡醒了";
            }
        } while (true);
    }

    public function toCurl($cookie, $validNumber)
    {
        $universModel = new \App\Models\University\Univers();
        $startTime = date("Y-m-d H:00", strtotime("+7 day  -1 hour"));
        $endTime = date("Y-m-d H:00", strtotime("+7 day"));
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL            => "http://dxyq.njust.edu.cn/ajax/orderSave.action",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => "",
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => "POST",
            CURLOPT_POSTFIELDS     => "equipId=4af7d10b44723d690144726efb330007&startDate=" . $startTime . "&endDate=" . $endTime . "&content=%E5%B8%8C%E6%9C%9B%E8%83%BD%E9%A2%84%E7%BA%A6%E5%88%B012&noMerge=false&operatorType=2&userno=317116020183&validate=" . $validNumber . "&undefined=",
            CURLOPT_HTTPHEADER     => array(
                "Content-Type: application/x-www-form-urlencoded",
                "Cookie:" . $cookie,
                "cache-control: no-cache",
            ),
        ));
        $response = curl_exec($curl);
        if (curl_errno($curl)) {
            $universModel->errorinfo = "$cookie:" . $cookie . "valinum" . $validNumber;
        }
        curl_close($curl);
        $universModel->req_body = "valinum:" . $validNumber;
        $universModel->content = $response;
        $universModel->save();
    }

}
