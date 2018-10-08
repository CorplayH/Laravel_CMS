<?php
/**
 * Created by PhpStorm.
 * User: Will
 * Date: 30/09/18
 * Time: 06:24
 */

namespace App\Server;


use App\Model\WxRule;
use Houdunwang\WeChat\WeChat;

class WechatServer
{
    
    public function config()
    {
        //获取wechat配置项全部数据，注意修改了hd_config函数
        $config = cms_config('wechat');
        //配置参数
        WeChat::config($config);
        //与微信服务器进行通信验证
        WeChat::valid();
    }
    
    public function ruleView($id = 0)
    {
        $rule = WxRule::findOrNew($id);
        if (old('rule')){
            $oldRule = json_decode(old('rule'),true);
        }else{
            $oldRule = [
                'id' => $id,
                'name' => $rule['name'],
                'keywords' => $rule->keyword
            ];
        }
        $newRule = [
            'id' => $oldRule['id'],
            'name' => $oldRule['name'],
            'keywords' => $oldRule['keywords'],
        ];
        return view('layout.wechat.ruleView',compact('newRule'));
    }
    
    public function saveRule($ruleArray)
    {
        
        //检测规则名与关键词是否为空
        \Validator::make(
            $ruleArray,
            [
                'name'    => 'required',
                'keywords' => 'required',
            ],
            [
                'name.required'    => '规则名不能为空',
                'keywords.required' => '关键词不能为空',
            ]
        )->validate();
        $rule = WxRule::findOrNew($ruleArray['id']);
        $rule->name = $ruleArray['name'];
        //保存规则数据
        $rule->save();
        //将关键词的数据存入关键词表
        //首先,我们这个方法是考虑到了添加和编辑,先将原来的当前规则下的关键词数据删除
        $rule->keyword()->delete();
        //循环新来的关键词数据,存入关键词表
        foreach ($ruleArray['keywords'] as $keyword){
            $rule->keyword()->create([
                'keyword' => $keyword['keyword'],
            ]);
        }
        //到此为止,规则和关键词数据处理完毕
        //将规则数据返回
        return $rule;
    }
}
