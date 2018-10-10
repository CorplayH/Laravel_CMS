<?php

namespace App\Http\Controllers\News;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //
    public function __construct()
    {
        $default = config('hd_template.template');
        //调用临时改变当前模板初始位置的方法,给当前新闻站的模板路径起点(初始位置)进行修改,然后面的方法不再去resrouces/views里面找模板
        app('view')->getFinder()->prependLocation(public_path('templates/'.$default));
    }
    public function index()
    {
        return view('index');
        
    }
}
