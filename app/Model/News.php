<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    protected $guarded = ['editormd-html-code'];
    
    public function category(){
        return $this->belongsTo(CustomMenu::class,'news_category_id','id');
    }
    
    public function user(){
        return $this->belongsTo(User::class,'author','id');
    }
}
