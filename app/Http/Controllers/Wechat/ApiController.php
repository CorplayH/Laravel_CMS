<?php

namespace App\Http\Controllers\Wechat;

use App\Model\BaseResponse;
use Houdunwang\WeChat\WeChat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    //
    public function __construct () {
        //获取wechat配置项全部数据，注意修改了hd_config函数
        $config = cms_config ('wechat');
        //配置参数
        WeChat::config($config);
        //与微信服务器进行通信验证
        WeChat::valid();
        //file_put_contents ('b.php',1);
    }
    
    public function handler(){
        //检测用户是否关注
        $reply = BaseResponse::find(1);
//        dd($reply);
        //消息管理模块
//      开启 middleware 里 VerifyCsrfToken 白名单, 取消微信连接这个功能时候需要携带@csrf token
        $instance = WeChat::instance('message');
        //判断是否是关注事件
        if ($instance->isSubscribeEvent())
        {
            //向用户回复消息
            return $instance->text($reply['welcome']);
        }
        return $instance->text($reply['default']);
        
    }
}
