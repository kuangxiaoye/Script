<?php

namespace App\Http\Controllers;

class UniversityController extends Controller
{
    public function doReserve()
    {
        $university = new \App\Work\University\CookieUniversity();
        $university->bookHandle();
    }

}
