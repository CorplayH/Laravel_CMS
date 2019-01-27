<?php
/**
 * Created by PhpStorm.
 * User: Will
 * Date: 7/09/18
 * Time: 21:40
 */
function hd_randomCode($len = 4){
    $str = '';
//    for ($i=0;$i<$len;$i++){
//        //substr字符串截取
//        //mt_rand (1,99999)从1-99999 随机一个数
//        $str .= substr (mt_rand (1000,9999),0,1);
//    }
    $str = rand (1000,9999);
    return $str;
}

function cms_config($name){
    static $cache =[];
    $info = explode('.',$name);
    if(!$cache){
//        $cache[$info[0]] = \App\Model\Config::where('name',$info[0])->value('value');
//        从缓存中存取数据
         $cache = Cache::get('cms_config',function (){
             return \App\Model\Config::pluck('value','name');
         });
    }
    if(count ($info) == 1)
    {
        return $cache[$info[0]]??'';
    }
//    dd($cache->toArray());die;
//    dd($cache[$info[0]][$info[1]]);die;
    return $cache[$info[0]][$info[1]]??'';
}

function cms_model(){
    $model = Request::query ('model');
    $id = Request::query ('id');
    if(!strpos ($model,'-')){
        $model = 'App-Model-' . $model;
    }
    //dump ($id);//dd($model);
    $class = str_replace('-','\\',$model);
    //dd($class);
    return $id? $class::find($id) : new $class;
}

function access($permission){
    $res =auth()->user()->can($permission);
    if(!$res){
        throw new \App\Exceptions\PermissionException('你没有权限还敢来?快走吧!!!王朝马汉在哪里');
    }
}
