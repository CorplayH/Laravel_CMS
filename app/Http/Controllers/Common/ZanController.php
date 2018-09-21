<?php

namespace App\Http\Controllers\Common;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ZanController extends Controller
{
    //
    public function make(Request $request){
        //获取模型对象
        $model = cms_model ();
        if($zan = $model->isZan(auth ()->user ())){
            //已经点赞
            $zan->delete();
        }else{
            //没有点赞
            $model->zan()->create(['user_id'=>auth ()->id ()]);
        }
        if($request->ajax ()){
            //如果是ajax请求
            return ['code'=>0,'zan_num'=>cms_model()->zan_num];
        }
        return back();
    }
}
