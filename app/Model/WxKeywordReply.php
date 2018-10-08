<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class WxKeywordReply extends Model
{
    //
    protected $guarded = [];
    
    public function rule()
    {
        return $this->hasOne(WxRule::class, 'id', 'wx_rule_id');
    }
}
