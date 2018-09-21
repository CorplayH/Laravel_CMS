<?php

namespace App\Observers;

use App\Model\Favorite;

class FavoriteObserver
{
    
    public function created(Favorite $favorite)
    {
        //
        $favorite->belongsModel()->increment('favorite_num');
    }
    
    public function deleted(Favorite $favorite)
    {
        //
        $favorite->belongsModel()->decrement('favorite_num');
    }
    
}
