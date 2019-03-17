<?php
/**
 * Created by PhpStorm.
 * User: wangye
 * Date: 2018/12/9
 * Time: 8:42 PM
 */

namespace App\Models\translate;


use Illuminate\Database\Eloquent\Model;

class Translate extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'translate';
    protected $fillable = [
        'id',
        'type',
        'req_body',
        'created_at',
        'content',
    ];
}