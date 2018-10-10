<?php

namespace App\Http\Controllers\Wechat;

use App\Model\WxKeywordReply;
use App\Server\WechatServer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WxNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取回复内容表中的类型等于news的数据
        $data = WxKeywordReply::where('type', 'news')->get();
    
        //加载图文消息列表模板
        return view('wechat.wxNews.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(WechatServer $wechatServer)
    {
        $ruleView = $wechatServer->ruleView();
        
        //加载添加图文消息模板
        return view('wechat.wxNews.create', compact('ruleView'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, WechatServer $wechatServer)
    {
        //调用微信服务类中的保存规则和关键词方法保存数据
        $rule = $wechatServer->saveRule(json_decode($request->rule, true));
        //将图文消息数据存入basereply表中
        $rule->keywordReply()->create(
            [
                'data' => $request->data,
                'type' => 'news',
            ]
        );
        
        //返回列表并提示
        return redirect()->route('wechat.news.index')->with('success', '添加成功');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(WxKeywordReply $news, WechatServer $wechatServer)
    {
        $ruleView = $wechatServer->ruleView($news['wx_rule_id']);
        
        //加载编辑模板
        return view('wechat.wxNews.edit', compact('ruleView', 'news'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WxKeywordReply $news, WechatServer $wechatServer)
    {
        //利用服务类将规则和关键词数据保存
        $rule = $wechatServer->saveRule(json_decode($request->rule, true));
        //将修改图文数据
        $news->update(
            [
                'data' => $request->data,
            ]
        );
        
        //返回并提示
        return redirect()->route('wechat.news.index')->with('success', '编辑成功');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(WxKeywordReply $news)
    {
        //将对应的图文数据删除
        $news->rule()->delete();
        
        return back()->with('success', '删除成功');
    }
}
