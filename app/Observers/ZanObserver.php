<?php

namespace App\Observers;

use App\Model\Zan;

class ZanObserver
{
    
    //添加之后执行
    public function created(Zan $zan){
        $zan->belongModel()->increment('zan_num');
    }
    
    //删除之后执行
    public function deleted(Zan $zan){
        $zan->belongModel()->decrement('zan_num');
    }
}
