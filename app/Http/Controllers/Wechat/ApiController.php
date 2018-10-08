<?php

namespace App\Http\Controllers\Wechat;

use App\Model\BaseResponse;
use App\Model\WxKeyword;
use App\Model\WxKeywordReply;
use App\Server\WechatServer;
use Houdunwang\WeChat\WeChat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    //
    public function __construct (WechatServer $wechatServer) {
        $wechatServer->config();
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
    
        //首先判断是否为文本消息,如果是,获取用户发送到文字内容,判断是否有匹配的关键词
        if ($instance->isTextMsg()){
            //获取用户发来的消息
            $message = $instance->getMessage();
            //拿用户发来的消息去关键词表找,看是否能找到
            $keyword = WxKeyword::where('keyword',$message->Content)->first();
            if ($keyword){
                //如果有匹配的关键词,用找到的关键词数据中的规则id,去回复内容表中找到对应规则id的回复内容,只取出data的值
                $reply = WxKeywordReply::where('wx_rule_id',$keyword['wx_rule_id'])->first();
                //将后去到的回复内容数据转成php的数组,然后随机取中间的一条数据中的content回复给用户
                //判断用户发来的消息所对应的回复内容是哪个类型,如果是base类型,回复文字,如果是news类,回复图文
                if ($reply['type'] == 'base'){
                    $huifu = array_random(json_decode($reply['data'],true));
                    return $instance->text($huifu['content']);
                }else if($reply['type'] == 'news'){
                    $news = json_decode($reply['data'],true);
                    return $instance->news($news);
                }
            
            }
        }
        
        
        
        
        
        return $instance->text($reply['default']);
        
    }
}
