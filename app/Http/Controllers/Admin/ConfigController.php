<?php

namespace App\Http\Controllers\Admin;

use App\Model\Config;
use App\Server\TemplateServer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfigController extends Controller
{
    
    //
    public function edit($name)
    {
        access('Admin-config');
        //        dd($name);
        //$data = Config::where('name',$name)->first();
        $data = Config::firstOrNew(['name' => $name]);
        
        //dd($data->toArray());
        return view('admin.config.edit_'.$name, compact('name', 'data'));
    }
    
    public function store($name, Request $request)
    {
        access('Admin-config');
        //dd($name);
        //dd($request->all ());
        Config::updateOrCreate(
            ['name' => $name],//查找条件
            ['name' => $name, 'value' => $request->all()]//添加更新的数据
        );
        //报错：Array to string
        //dd($res->toArray());
        //只会更新env文件中有的配置项
        hd_edit_env($request->all());
        
        return back()->with('success', '数据更新成功');
    }
    
    public function edit_template(TemplateServer $templateServer)
    {
        access('Admin-config');
        //获取当前项目中的所有前台新闻站可用模板数据,分配到模板循环,供选择使用
        $configs = $templateServer->config();
//        dd($configs);
        return view('admin.config.edit_template',compact('configs'));
    
    }
    
    public function set_template($name){
        access('Admin-config');
        //使用修改env文件的方法,修改默认模板的值
        hd_edit_env(['HD_TEMPLATE' => $name]);
        //提示信息并返回
        return back()->with('success','默认模板设置成功');
    }
    
}
