<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //
    public function index ()
    {
//        echo asset('org/Dashkit/dist/assets');
//        session()->flash('error','添加成功');
        return view ( 'admin.home.index' );
    }
}
