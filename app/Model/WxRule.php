<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class WxRule extends Model
{
    //
    protected $guarded = [];
    
//    protected $fillable = ['name'];
    public function keyword()
    {
        return $this->hasMany(WxKeyword::class);
    }
    
    public function keywordReply()
    {
        return $this->hasOne(WxKeywordReply::class);
    }
    
}
