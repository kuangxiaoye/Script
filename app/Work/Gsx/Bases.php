<?php
/**
 * Created by PhpStorm.
 * User: wangye
 * Date: 2019/1/5
 * Time: 9:19 PM
 */

namespace App\Work\Gsx;


use App\User;
use App\Work\BasesWork;
use App\Work\Pay\KuaiFaKa;

class Bases extends BasesWork
{
    /**
     * 操作用户提交信息
     * @param $userInfo
     * @return array|string
     */
    public function handleUserInfo($userInfo)
    {
        //将设备信息插入数据库 status0;
        $userInfoModel = new \App\Models\gsx\user();
        try {
            $msg = $this->validUserInfo($userInfo);
            if (!empty($msg)) {
                return $msg;
            }
            //TODO 这里要验证重复
            $userInfoModel->email = $userInfo['email'];
            $userInfoModel->tel = $userInfo['tel'];
            $userInfoModel->model = $userInfo['model'];
            $userInfoModel->status = 0; //0:未支付 1: 已支付,未查询 2:查询成功
            $userInfoModel->serial = $userInfo['serial'];
            $userInfoModel->save();
        } catch (\Exception $exception) {
            $logModel = new \App\Models\log\log();
            $logModel->logtype = "exception";
            $logModel->content = $exception->getMessage();
            $logModel->save();
        }

        return [
            'msg'  => '您的设备信息已提交Apple,请支付查询费用.',
            'code' => 200,
        ];
    }

    /**
     * 查询查询实时逻辑
     * @return array
     */
    public function handleSchedule()
    {
        //在这里查库 如果status为1 ,那么就是已经鉴定完毕,如果是0.就返回鉴定中 ,后续可能存在更多状态码.
        $status = 0;
        switch ($status) {
            case 0:
                $return = [
                    'msg'  => '努力验机中..嘿咻..',
                    'code' => 40011,
                ];
                break;
            case 1:
                $return = [
                    'msg'  => '验机成功啦,为了您的信息安全,请您登录邮箱查看Gsx鉴定结果呢!',
                    'code' => 40010,
                ];
                break;
            default:
                $return = [
                    'msg'  => '啊呀,进度失常了呢,好怕会不会翻车,请联系客服处理呢',
                    'code' => 40009,
                ];
                break;
        }

        return $return;
    }

    /**
     * 用户信息验证
     * @param $userInfo
     * @return array|string
     */
    public function validUserInfo($userInfo)
    {
        $msg = '';
        if (empty($userInfo['email'])) {
            $msg = [
                'msg'  => '请填写邮箱信息,不然会接收不到验机结果呢',
                'code' => 40005,
            ];
        }
        if (empty($userInfo['tel'])) {
            $msg = [
                'msg'  => '请填写手机号,不然会接收不到验机结果呢',
                'code' => 40006,
            ];
        }
        if (empty($userInfo['model'])) {
            $msg = [
                'msg'  => '请填写您的设备类型,不然无法帮您验机',
                'code' => 40007,
            ];
        }
        if (empty($userInfo['serial'])) {
            $msg = [
                'msg'  => '请填写您的设备序列号,不然无法帮您验机.',
                'code' => 40008,
            ];
        }

        return $msg;
    }

    public function qrcodeLogic($serial, $email, $payWay)
    {
        //创建订单号
        $orderNumber = $this->getOrderNum();
        if (empty($orderNumber)) {
            return [
                'msg'  => '订单号生成失败',
                'code' => 50009,
            ];
        }
        //构建订单
        $result = $this->buildOrder($orderNumber);
        if ($result['msg'] !== 'success') {
            return [
                'msg'  => '订单构建失败',
                'code' => 50010,
            ];
        }
        if ($payWay == '1') {
            $payInfo = $this->generateWxImg($orderNumber);
        } else {
            $payInfo = $this->generateAliUrl($orderNumber);
        }

        $userInfoModel = new \App\Models\gsx\user();
        try {
            $userInfoModel::where([
                'email'  => $email,
                'serial' => $serial,
            ])->update([
                'ordernum' => $orderNumber,
                'payway'   => $payWay,
                'payinfo'  => json_encode($payInfo),
            ]);
        } catch (\Exception $exception) {
            print_r($exception);
        }

        return $payInfo;
    }

    public function getOrderNum()
    {
        $paySerive = new KuaiFaKa();
        $orderNumInfo = $paySerive->createOrderNum();
        return $orderNumInfo['data'];
    }

    public function generateWxImg($orderNumber)
    {
        $kuaifaka = new KuaiFaKa();
        $data = $kuaifaka->getWxPayImg($orderNumber);

        return $data;
    }

    public function generateAliUrl($orderNumber)
    {
        $kuaifaka = new KuaiFaKa();
        $data = $kuaifaka->getAliPayUrl($orderNumber);

        return $data;
    }

    public function buildOrder($orderNumber)
    {
        $kuaifaka = new KuaiFaKa();
        $data = $kuaifaka->buildOrder($orderNumber);

        return [
            'data' => $data,
            'msg'  => 'success',
        ];
    }

    public function getOrderStatus($orderNumber)
    {
        $kuaifaka = new KuaiFaKa();
        $res = $kuaifaka->getOrderStatus($orderNumber);

        return $res;
    }
}