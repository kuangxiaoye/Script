<?php

namespace App\Http\Controllers;

class ReceiveController extends Controller
{
    public function CtripClickHandle()
    {
        $ctrip = new \App\Work\Ctrip\CtripClick();
        $ctrip->clickHandle();
    }

}
