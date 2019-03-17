<?php
/**
 * Created by PhpStorm.
 * User: wangye
 * Date: 2019/1/5
 * Time: 9:19 PM
 */

namespace App\Work\Gsx;


use App\Work\BasesWork;

class Bases extends BasesWork
{
    public function handleUserInfo($input)
    {
        //将设备信息插入数据库 status0;
        return [
            'msg'  => '提交成功,请耐心等待.您也可以通过邮箱地址实时查询鉴定过程哦',
            'code' => 200,
        ];
    }

    public function handleSchedule()
    {
        //在这里查库 如果status为1 ,那么就是已经鉴定完毕,如果是0.就返回鉴定中 ,后续可能存在更多状态码.
        $status = 0;
        switch ($status) {
            case 0:
                $return = [
                    'msg'  => '努力查询中..嘿咻..',
                    'code' => 40004,
                ];
                break;
            case 1:
                $return = [
                    'msg'  => '查询成功啦,为了您的信息安全,请您登录邮箱查看Gsx鉴定结果呢!',
                    'code' => 40004,
                ];
                break;
            default:
                $return = [
                    'msg'  => '啊呀,进度失常了呢,好怕会不会翻车,请联系客服处理呢',
                    'code' => 40004,
                ];
                break;
        }

        return $return;
    }
}