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
//    dd($info);
    if(!$cache){
//        $cache[$info[0]] = \App\Model\Config::where('name',$info[0])->value('value');
//        从缓存中存取数据
        $cache = Cache::get('cms_config');
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
