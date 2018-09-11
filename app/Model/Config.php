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
    protected  $casts = [
        'value'=>'array'
    ];
}
