<?php
/**
 * Created by PhpStorm.
 * User: wangye
 * Date: 2018/12/9
 * Time: 8:42 PM
 */

namespace App\Models\gsx;

use Illuminate\Database\Eloquent\Model;

class user extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'user';
    protected $fillable = [
        'id',
        'email',
        'model',
        'tel',
        'status',
        'create_time',
        'update_time',
    ];
}