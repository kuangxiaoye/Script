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

        do {
            try {

                $numInfo = $numberPlatform->getNumberCrulTenc();
                $numInfo = array_unique($numInfo);
                if (is_array($numInfo)) {
                    foreach ($numInfo as $item) {
                        $phoneNumber = $item;
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
                            print_r($phoneNumber);
                            $phoneNumber = null;
                            echo "\n";
                        }
                    }
                }
            } catch (\Exception $exception) {
                print_r($exception);
            }

        } while (!empty($item));
    }
}