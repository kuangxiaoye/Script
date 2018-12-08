<?php
/**
 * Created by PhpStorm.
 * User: wangye
 * Date: 2018/11/20
 * Time: 下午9:15
 */

namespace App\Work\Tool;

// 你的 APPID AK SK
const APP_ID = '14881489';
const API_KEY = 'UnHkawEkxBLH6x30RC5dIpHD';
const SECRET_KEY = 'ecYm5VArrcVG4YrTOfyBLtjw794jASZ4';

class baiduai
{
    public $access_key;

    private function request_post($url = '', $param = '')
    {
        if (empty($url) || empty($param)) {
            return false;
        }
        $postUrl = $url;
        $curlPost = $param;
        $curl = curl_init();//初始化curl
        curl_setopt($curl, CURLOPT_URL, $postUrl);//抓取指定网页
        curl_setopt($curl, CURLOPT_HEADER, 0);//设置header
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
        curl_setopt($curl, CURLOPT_POST, 1);//post提交方式
        curl_setopt($curl, CURLOPT_POSTFIELDS, $curlPost);
        $data = curl_exec($curl);//运行curl
        curl_close($curl);

        return $data;
    }

    public function getRefreshToken()
    {
        $url = 'https://aip.baidubce.com/oauth/2.0/token';
        $post_data['grant_type'] = 'client_credentials';
        $post_data['client_id'] = API_KEY;
        $post_data['client_secret'] = SECRET_KEY;
        $o = "";
        foreach ($post_data as $k => $v) {
            $o .= "$k=" . urlencode($v) . "&";
        }
        $post_data = substr($o, 0, -1);
        $res = $this->request_post($url, $post_data);
        $ress = json_decode($res, true);

        $this->access_key = $ress['access_token'];
        print_r($this->access_key);
    }

    public function aiGo($imgInfo)
    {
        $params = [
            'image'           => $imgInfo,
            'detect_language' => true,
        ];
        $this->getRefreshToken();
        try {
            $content = $this->curlBaiDU("https://aip.baidubce.com/rest/2.0/ocr/v1/general_basic?access_token=" . $this->access_key, $params, '', true);

            return $content;
        } catch (\Exception $exception) {
            echo "";
        }

    }

    private function curlBaiDU($url_, $params_, $referer_, $isPost)
    {
        if ($url_ == null) {
            echo "get_cookie_url_null";
            exit;
        }
        $this_header = array("content-type: application/x-www-form-urlencoded; charset=UTF-8");//访问链接时要发送的头信息
        $ch = curl_init($url_);//这里是初始化一个访问对话，并且传入url，这要个必须有
        //curl_setopt就是设置一些选项为以后发起请求服务的
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this_header);//一个用来设置HTTP头字段的数组。使用如下的形式的数组进行设置： array('Content-type: text/plain', 'Content-length: 100')
//        curl_setopt($ch, CURLOPT_HEADER, 1);//如果你想把一个头包含在输出中，设置这个选项为一个非零值，我这里是要输出，所以为 1
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//将 curl_exec()获取的信息以文件流的形式返回，而不是直接输出。设置为0是直接输出
        if ($isPost) {
            curl_setopt($ch, CURLOPT_POST, 1);//开启post数据的功能，这个是为了在访问链接的同时向网页发送数据，一般数urlencode码
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params_); //把你要提交的数据放这
        }
        curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');//获取的cookie 保存到指定的 文件路径，我这里是相对路径，可以是$变量
        //curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');//要发送的cookie文件，注意这里是文件，还一个是变量形式发送
        //curl_setopt($curl, CURLOPT_COOKIE, $this->cookies);//例如这句就是设置以变量的形式发送cookie，注意，这里的cookie变量是要先获取的，见下面获取方式
//        curl_setopt($ch, CURLOPT_REFERER, $referer_); //在HTTP请求中包含一个'referer'头的字符串。告诉服务器我是从哪个页面链接过来的，服务器籍此可以获得一些信息用于处理。
        $content = curl_exec($ch);     //重点来了，上面的众多设置都是为了这个，进行url访问，带着上面的所有设置

        $result = json_decode($content, true);
        if (curl_errno($ch)) {
            echo 'Curl error: ' . curl_error($ch);
            exit(); //这里是设置个错误信息的反馈
        }
        curl_close($ch);//关闭会话
        return $result;//返回cookie
    }
}