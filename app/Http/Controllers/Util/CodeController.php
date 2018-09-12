<?php

namespace App\Http\Controllers\Util;

use App\Exceptions\ValidException;
use App\Notifications\RegisterNotify;
use App\User;
use Houdunwang\Aliyun\Aliyun;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CodeController extends Controller
{
    protected $expire =30;
    
    public function send(Request $request){
        $this->expireCheck();
    	//接收随机出来的验证码
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
            $data = [
                //短信签名
                'sign'     => 'Corplay的小屋',
                //短信模板
                'template' => 'SMS_144151336',
                //手机号
                'mobile'   => $request->username,
                //模板变量
                'vars'     => ["code" => $code],
            ];
            //发送手机验证码
            $res = Aliyun::instance('Sms')->send($data);
        }
        $this->saveToSession($code, $type, $request->username);
        return ['code' => 1, 'message' => '验证码发送成功'];
	}
    
    /**
     * 将生成的验证码存入到session
     * @param $code		验证码
     * @param $type		数据类型(email/mobile)
     * @param $username	具体邮箱/手机号
     */
	public function saveToSession($code, $type, $username){
        session()->put('valid_code',[
            'code' => $code,
            'type' => $type,
            'account' => $username,
            'expired' => time() + $this->expire,
        ]);
    }
    
    /**
     * 检测验证码是否过期
     */
    protected function expireCheck(){
	    $expired = session('valid_code.expired');
	    if($expired && time()< $expired){
            throw new ValidException('验证码发送过于频繁，请稍后再试');
        }
    }
}
