<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function __construct () {
        //只有游客(未登录用户)除了logout不能访问，其余方法可以访问
        $this->middleware('guest',[
            'except'=>['logout'],
        ]);
    }
    //
    public function loginIndex(){
        
        return view('home.login.login');
    }
    
    
    public function login(Request $request){
        $request->validate([
            'account'=>'required',
            'password'=>'required|min:3'
        ],[
            'account.required'=> '请输入用户名',
            'password.required'=>'密码不能为空',
            'password.min'=>'密码不能少于3位'
        ]);
        if(filter_var ($request->account,FILTER_VALIDATE_EMAIL)){
            $data['email'] = $request->account;
        }else{
            $data['mobile'] = $request->account;
        }
        $data['password'] = $request->password;
        //dd($data);
        if(\Auth::attempt ($data,$request->remember)){
            return redirect ('/');
        }
        return back ()->with ('error','账号或密码不正确');
    }
    
    
    //注销登录
    public function logout(){
        \Auth::logout ();
//        return back ();
        return redirect('/');
    }
}
