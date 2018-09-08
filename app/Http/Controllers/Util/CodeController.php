<?php

namespace App\Http\Controllers\Util;

use App\Notifications\RegisterNotify;
use App\User;
use Houdunwang\Aliyun\Aliyun;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CodeController extends Controller
{
    public function send(Request $request){
    	//测试打印接受数据
        $code = hd_randomCode();
        //验证提交过来的username是否为邮箱
        //$request->username为hdjs在处理发送验证码发送来的数据
        if(filter_var ($request->username,FILTER_VALIDATE_EMAIL)){
            //说明是邮箱
            $type = 'email';
            $user = User::firstOrNew(['email'=>$request->username]);
            //上面这句话相当于：
            //$user = User::where('email',$request->username)->first()?:new User();
            $user->notify(new RegisterNotify($code));
        }elseif(preg_match ('/^\d{11}$/',$request->username)){
            $type = 'mobile';
            //说明手机号
            $data = [
                //短信签名
                'sign'     => 'Corplay的小屋',
                //短信模板
                'template' => 'SMS_144146126',
                //手机号
                'mobile'   => $request->username,
                //模板变量
                'vars'     => ["code" => $code],
            ];
            //发送手机验证码
//            $res = Aliyun::instance('Sms')->send($data);
        }
        return ['code' => 1, 'message' => '验证码发送成功'];
	}
}
