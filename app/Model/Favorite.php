<?php

namespace App\Model;

use App\Observers\FavoriteObserver;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    //
    protected $fillable =['user_id'];
    
    public static function boot ()
    {
        self::observe ( FavoriteObserver::class );
        parent::boot ();
    }
    public function belongsModel ()
    {
//      会返回  自动查询favorite_id  -> 找到favorite_type 里的模型  (Article)
        return $this->morphTo ( 'favorite' );
    }
}
