<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    //
    protected $guarded = [];
    
    protected $casts = ['permission' => 'array'];
}
