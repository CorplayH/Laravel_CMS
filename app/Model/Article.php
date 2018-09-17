<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $fillable = ['title','content','editormd-html-code'];
//    protected $guarded =[];
    //定义user模型关联
    public function user(){
        return $this->belongsTo (User::class);
    }
    /**
     * 获得当前文章所有点赞用户
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function zan(){
        return $this->morphToMany (User::class,'zan');
    }
    
}

