<?php
/**
 * Created by PhpStorm.
 * User: wangye
 * Date: 2018/12/9
 * Time: 8:42 PM
 */

namespace App\Models\gsx;

class user extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'user';
    protected $fillable = [
        'id',
        'email',
        'model',
        'tel',
        'serial',
        'imei',
        'iccid',
        'ordernum',
        'payinfo',
        'payway',
        'status',
        'create_at',
        'update_at',
    ];
}