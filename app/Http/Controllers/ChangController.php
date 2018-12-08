<?php

namespace App\Http\Controllers;


class ChangController extends Controller
{
    function haha()
    {
        $chang = new \App\Work\Chang\ScreenImg();
        $chang->curlPage();
    }
}
