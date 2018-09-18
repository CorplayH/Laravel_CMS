<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = ['content','user_id' ];
    
    public function user(){
        return $this->belongsTo (User::class);
    }
}
