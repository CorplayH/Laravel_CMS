<?php
/**
 * Created by PhpStorm.
 * User: Will
 * Date: 21/09/18
 * Time: 16:05
 */

namespace App\Model\Traits;


use App\Model\Comment;
use App\Model\Favorite;
use App\Model\Zan;
use App\User;

trait common
{
    //定义user模型关联
    public function user(){
        return $this->belongsTo (User::class);
    }
    
    public function comment(){
        return $this->morphMany (Comment::class,'comment');
    }
    
    public function favorite(){
        return $this->morphMany(Favorite::class,'favorite');
    }
    //    用户是否收藏了文章
    public function isFavorite(User $user){
        return $this->favorite()->where('user_id',$user['id'])->first();
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function zan(){
        return $this->morphMany (Zan::class,'zan');
    }
    public function isZan(User $user){
        return $this->zan ()->where('user_id',$user['id'])->first();
    }
}
