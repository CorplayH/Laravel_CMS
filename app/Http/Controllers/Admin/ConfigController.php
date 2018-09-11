<?php

namespace App\Http\Controllers\Admin;

use App\Model\Config;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfigController extends Controller
{
    //
    public function edit($name){
    
        //dd($name);
        //$data = Config::where('name',$name)->first();
        $data = Config::firstOrNew(['name'=>$name]);
        //dd($data->toArray());
        return view ('admin.config.edit_' . $name,compact ('name','data'));
    
    }
    
    public function store($name,Request $request){
    
        //dd($name);
        //dd($request->all ());
        $res = Config::updateOrCreate(
            ['name'=>$name],//查找条件
            ['name'=>$name,'value'=>$request->all ()]//添加更新的数据
        );
        //报错：Array to string
        //dd($res->toArray());
        return back ()->with ('success','数据更新成功');
    
    }
    
    
}
