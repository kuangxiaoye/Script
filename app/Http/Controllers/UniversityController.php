<?php

namespace App\Http\Controllers;

class UniversityController extends Controller
{
    public function heihei()
    {
        //$cookie = $request->input('cookie');
        $cookie = "JSESSIONID=8A7A77AB2978618E4D7444C5380FB9E3; iPlanetDirectoryPro=74DEKx35u3PAQ2QyDNdux2";
        $startTime = date("Y-m-d H:00", strtotime("+7 day"));
        $endTime = date("Y-m-d H:00", strtotime("+7 day 1 hour"));
        $this->vaildUser($startTime, $endTime, $cookie);

    }

    public function vaildUser($startTime, $endTime, $cookie)
    {
        //自己请求就先不做验证了
        $university = new \App\Work\University\CookieUniversity();
        $university->bookHandle($startTime, $endTime, $cookie);
    }
}
