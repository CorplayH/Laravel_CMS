<?php

namespace App;

use App\Model\Article;
use App\Model\Lesson;
use App\Model\Topic;
use App\Model\Attachment;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable{
        notify as protected systemNotify;
    }
    use HasRoles;
    
    public function notify ( $instance )
    {
        //文章作者id不等于登入用户
        if ( $this->id != auth ()->id () ) {
            $this->systemNotify ( $instance );
        }
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','icon',
    ];
//    protected $guarded = [];//不允许被批量填充的数据

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function attachment ()
    {
        return $this->hasMany ( Attachment::class );
    }
    public function getIconAttribute ( $value )
    {
        return empty( $value ) ? asset ( 'images/default.png' ) : $value;
    }
    
    //粉丝
    public function fans(){
        return $this->belongsToMany (User::class,'followers','user_id','follower_id');
    }
    
    //关注人
    public function follower(){
        
        return $this->belongsToMany (User::class,'followers','follower_id','user_id');
    }
    
    //检测某个用户是否关注我当前用户
    public function isFollower ( $id )
    {
        return $this->follower()->wherePivot('follower_id',$id)->first();
    }
    //contains 方法判断集合是否包含给定的项目
    //手册参考：综合话题-->集合
    public function isfollowing(User $user){
        return $this->follower->contains($user);
    }
    //是否是我的粉丝
    public function MineFans(User $user){
        return $this->fans ()->contains($user);
    }
    
    //一对多模型关联，获取用户发表的文章
    public function article ()
    {
        return $this->hasMany ( Article::class );
    }
    public function topic ()
    {
        return $this->hasMany ( Topic::class );
    }
    
    public function lesson(){
        return $this->hasMany(Lesson::class);
    }
}
