<?php
/**
 * Created by PhpStorm.
 * User: wangye
 * Date: 2019/1/5
 * Time: 9:19 PM
 */

namespace App\Work\Number;


use App\Work\BasesWork;

class Bases extends BasesWork
{

    public function doSelectNum()
    {
        $universityModel = new \App\Models\University\Univers();
        $numberPlatform = new NumberPlatform();
        $page = 1;
        do {
            $numInfo = $numberPlatform->getNumberCurl($page);
            if (is_array($numInfo['data']['numbers'])) {
                foreach ($numInfo['data']['numbers'] as $item) {
                    $phoneNumber = $item['numberName'];
                    if (
                        strstr($phoneNumber, '111') ||
                        strstr($phoneNumber, '222') ||
                        strstr($phoneNumber, '333') ||
                        strstr($phoneNumber, '444') ||
                        strstr($phoneNumber, '555') ||
                        strstr($phoneNumber, '666') ||
                        strstr($phoneNumber, '777') ||
                        strstr($phoneNumber, '888') ||
                        strstr($phoneNumber, '999') ||
                        strstr($phoneNumber, '000')) {
                        $universityModel->type = "number";
                        $universityModel->req_body = "豹子";
                        $universityModel->content = $phoneNumber;
                        $universityModel->created_at=time();
                        $universityModel->save();
                    }
                    if (
                        strstr($phoneNumber, '5220') ||
                        strstr($phoneNumber, '5221') ||
                        strstr($phoneNumber, '1996')
                    ) {
                        $universityModel->type = "number";
                        $universityModel->req_body = "个人";
                        $universityModel->content = $phoneNumber;
                        $universityModel->created_at=time();
                        $universityModel->save();
                    }
                    $page++;
                }
            }

        } while (!empty($item['numberName']));
    }
}