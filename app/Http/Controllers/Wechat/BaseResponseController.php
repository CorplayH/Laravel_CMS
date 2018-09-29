<?php

namespace App\Http\Controllers\Wechat;

use App\Http\Controllers\Controller;
use App\Model\BaseResponse;
use Illuminate\Http\Request;

class BaseResponseController extends Controller
{
    public function create(){
        $field = BaseResponse::find(1);
        return view ('wechat.create',compact ('field'));
    }
    
    public function store(Request $request,BaseResponse $baseResponse){
        //数据验证
        $this->validate ($request,['welcome'=>'required','default'=>'required']);
        //执行数据更新或添加
        $baseResponse->updateOrCreate(['id'=>1],$request->all ());
        return back ()->with ('success','保存成功');
    }
}
