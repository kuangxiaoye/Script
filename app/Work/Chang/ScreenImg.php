<?php
/**
 * Created by PhpStorm.
 * User: wangye
 * Date: 2018/11/21
 * Time: 下午3:09
 */

namespace App\Work\Chang;


use App\Work\BasesWork;
use CAPTCHAReader\src\App\IndexController;

class ScreenImg extends BasesWork
{
    public function curlPage()
    {
//        $mainPageUrl = "https://cygsso.changyou.com/loginpage?s=http://tl.cyg.changyou.com/ticketValidation";
//        $mainPageJsRule = "/JSESSIONID=(.*?);/";
//        $mainPageSidRule = "/CYGSSOSID=(.*?);/";
//        $imgUrl = "https://auth.changyou.com/servlet/ImageCode";
//        $imgUrlRule = '/IMGCODE=(.*?);/';
//        $ImgCode = $this->getCurlPageInfo($imgUrl, "", "", false, $imgUrlRule);
//        $JsSessionCode = $this->getCurlPageInfo($mainPageUrl, "", "", true, $mainPageJsRule);
//        $CygSsosSid = $this->getCurlPageInfo($mainPageUrl, "", "", true, $mainPageSidRule);
//        //这里准备用百度智能AI平台实现
//        $vaildCode = $this->getImgCode();

        $vaildCode2 = $this->getImgCode2();
        print_r($vaildCode2);
//        $mainPageCookieInfo = [
//            'img' => $ImgCode,
//            'js'  => $JsSessionCode,
//            'sid' => $CygSsosSid,
//        ];
//        print_r($mainPageCookieInfo);
    }

    public function getUserInfo()
    {
        $loginData = [
            'username' => 'w258765@gmail.com',
            'password' => 'w258765*#',
        ];

        return $loginData;
    }

    public function curlLogin($mainPageCookieInfo, $userInfo, $vailCode)
    {
        return 123;
    }

    private function getImgCode()
    {
        $path_parts = dirname(__FILE__);
        $image_file = $path_parts . '/img/tempimg.JPEG';
        $image_data = fread(fopen($image_file, 'r'), filesize($image_file));
        $base64_image = base64_encode($image_data);
        $imgInfo = urlencode($base64_image);
        print_r($imgInfo);
        $baidu = new baiduai();
        $baidu->aiGo($base64_image);
//        return $base64_image;
    }

    public function getImgCode2()
    {
        $index = new IndexController();
        $res = $index->entrance("http://121.248.63.113/image", 'online');
        print_r($res);
    }

    private function getCurlPageInfo($url_, $params_, $referer_, $isPost, $rule)
    {
        if ($url_ == null) {
            echo "get_cookie_url_null";
            exit;
        }
        $this_header = array("content-type: application/x-www-form-urlencoded; charset=UTF-8");//访问链接时要发送的头信息
        $ch = curl_init($url_);//这里是初始化一个访问对话，并且传入url，这要个必须有
        //curl_setopt就是设置一些选项为以后发起请求服务的
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this_header);//一个用来设置HTTP头字段的数组。使用如下的形式的数组进行设置： array('Content-type: text/plain', 'Content-length: 100')
        curl_setopt($ch, CURLOPT_HEADER, 1);//如果你想把一个头包含在输出中，设置这个选项为一个非零值，我这里是要输出，所以为 1
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//将 curl_exec()获取的信息以文件流的形式返回，而不是直接输出。设置为0是直接输出
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);//设置跟踪页面的跳转，有时候你打开一个链接，在它内部又会跳到另外一个，就是这样理解
        if ($isPost) {
            curl_setopt($ch, CURLOPT_POST, 1);//开启post数据的功能，这个是为了在访问链接的同时向网页发送数据，一般数urlencode码
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params_); //把你要提交的数据放这
        }
        curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');//获取的cookie 保存到指定的 文件路径，我这里是相对路径，可以是$变量
        //curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');//要发送的cookie文件，注意这里是文件，还一个是变量形式发送
        //curl_setopt($curl, CURLOPT_COOKIE, $this->cookies);//例如这句就是设置以变量的形式发送cookie，注意，这里的cookie变量是要先获取的，见下面获取方式
        curl_setopt($ch, CURLOPT_REFERER, $referer_); //在HTTP请求中包含一个'referer'头的字符串。告诉服务器我是从哪个页面链接过来的，服务器籍此可以获得一些信息用于处理。
        $content = curl_exec($ch);     //重点来了，上面的众多设置都是为了这个，进行url访问，带着上面的所有设置
        if (curl_errno($ch)) {
            echo 'Curl error: ' . curl_error($ch);
            exit(); //这里是设置个错误信息的反馈
        }
        if ($content == false) {
            echo "get_content_null";
            exit();
        }
        preg_match($rule, $content, $str); //这里采用正则匹配来获取cookie并且保存它到变量$str里，这就是为什么上面可以发送cookie变量的原因
        $ImgCode = $str[0]; //获得COOKIE（SESSIONID）
        curl_close($ch);//关闭会话

        if ($rule == "/IMGCODE=(.*?);/") {
            $path_parts = dirname(__FILE__);
            $tempImg = file_get_contents('https://auth.changyou.com/servlet/ImageCode');
            file_put_contents($path_parts . '/img/tempimg.JPEG', $tempImg);
        }

        return $ImgCode;//返回cookie
    }
}