<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    //
    protected $fillable = [
        'name','value'
    ];
    //手册搜索：$casts
//    $casts 名字不能改, 把字段 value 以数组存入数据库
    protected  $casts = [
        'value'=>'array'
    ];
}
