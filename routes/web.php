<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/haha', "ChangController@haha");

$router->post('/heihei', "UniversityController@doReserve");

$router->post('/userinfo', "GsxController@receiveuserinfo");

$router->get('/getqrcode', "GsxController@getqrcode");

$router->get('/getpaystatus', "GsxController@getpaystatus");

$router->post('/schedule', "GsxController@searchschedule");

$router->get('/getpush', "GsxController@getpush");