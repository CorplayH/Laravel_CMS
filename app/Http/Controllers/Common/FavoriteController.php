<?php

namespace App\Http\Controllers\Common;

use App\Favorite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function make(){
        $model = cms_model();
        //如果已经关注，删除用户数据
        //如果没有关注，写入数据
        if ( $favorite = $model->isFavorite ( auth ()->user () ) ) {
            $favorite->delete ();
        } else {
            $model->favorite ()->create ( [ 'user_id' => auth ()->id () ] );
        }
        return back ()->with ('success','操作成功');
    }
}
