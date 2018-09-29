<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class WxMenu extends Model
{
    //
    protected $casts = [
        'data'=>'array',
    ];
    protected $fillable=['name','data'];
}
