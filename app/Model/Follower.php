<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    //
    protected $fillable = ['user_id','follower_id'];
}
