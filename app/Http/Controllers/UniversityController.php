<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class UniversityController extends Controller
{
    public function doReserve()
    {
        $university = new \App\Work\University\CookieUniversity();
        $university->bookHandle();
    }

}
