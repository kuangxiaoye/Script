<?php
/**
 * Created by PhpStorm.
 * User: wangye
 * Date: 2018/12/9
 * Time: 8:42 PM
 */

namespace App\Models\log;

use Illuminate\Database\Eloquent\Model;

class log extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'log';
    protected $fillable = [
        'id',
        'logtype',
        'content',
        'create_time',
        'update_time',
    ];
}