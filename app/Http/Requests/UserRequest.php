<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|unique:users',
            'password'=>'required|min:3|confirmed',
            'account'=>[
                'required',
                //value 传递进来account多的值
                function($attribute, $value, $fail) {
                    if (filter_var ($value,FILTER_VALIDATE_EMAIL)) {
                        //是邮箱
                        $user = User::where('email',$value)->first();
                        if($user){
                            return $fail('该邮箱已注册');
                        }
                        return true;
                    }else{
                        //手机
                        $user = User::where('mobile',$value)->first();
                        if($user){
                            return $fail('该手机已注册');
                        }
                        return true;
                    }
                },
            ],
            'code'=>[
                'required',
                function($attribute, $value, $fail) {
                    //判断用户提交来的验证码是否跟session的一致
                    if($value != session('valid_code.code')){
                        return $fail('验证码不正确');
                    }
                    return true;
                },
            ]
        ];
    }
    
    //自定义错误消息
    public function messages ()
    {
        return [
            'name.required'=>'昵称 不能为空',
            'name.unique'=>'昵称 已经存在',
            'password.required'=>'密码 不能为空',
            'password.min'=>'密码不能少于3位',
            'password.confirmed'=>'两次输入密码不一致',
            'account.required'=>'账号 不能为空',
            'code.required'=>'验证 码不能为空'
        ];
    }
}
