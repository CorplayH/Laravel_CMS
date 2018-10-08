<?php

namespace App\Http\Controllers\Wechat;

use App\Model\WxKeywordReply;
use App\Server\WechatServer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KeywordReplyController extends Controller
{
    public function __construct() {
        $this->middleware('auth.admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //获取回复内容表中的类型等于base的文字回复数据
        $data = WxKeywordReply::where('type','base')->get();
        return view('wechat.keywordReply.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(WechatServer $wechatServer)
    {
        //
        $ruleView = $wechatServer->ruleView();
        return view('wechat.keywordReply.create',compact('ruleView'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, WechatServer $wechatServer)
    {
        
        //接收post数据
        $post = $request->all();
        
        $ruleArray = (json_decode($request->rule,true));
        $rule = $wechatServer->saveRule($ruleArray);
        //将post中的data转成数组
        $post['data'] = json_decode($post['data'],true);
        \Validator::make($post,[
            'data' => 'required',
        ],[
            'data.required' => '回复内容 不能为空'
        ])->validate();
        //接下来应该处理回复内容数据
        $rule->keywordReply()->create([
            'data' => $request->data,
            'type' => 'base',
        ]);
        //跳转去列表页,并提示
        return redirect()->route('wechat.keywordReply.index')->with('success','添加成功');
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
    public function edit(WxKeywordReply $keywordReply,WechatServer $wechatServer)
    {
        //调用微信服务类中的规则模板方法
        $ruleView = $wechatServer->ruleView($keywordReply['wx_rule_id']);
        //加载编辑模板
        return view('wechat.keywordReply.edit',compact('keywordReply','ruleView'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WechatServer $wechatServer)
    {
        //
        //首先需要编辑规则和关键词数据
        $rule = $wechatServer->saveRule(json_decode($request->rule,true));
        //编辑回复内容数据
        $rule->keywordReply->update(['data' => $request->data]);
        //        $oldBseReply = $rule->baseReply;
        //        $oldBaseReply->data = $request->data;
        //        $oldBaseReply->save();
        //返回提示
        return redirect()->route('wechat.keywordReply.index')->with('success','编辑成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(WxKeywordReply $keywordReply)
    {
        //
        //将对应的规则数据删除就行,关键词数据,回复内容数据做了外键约束,会自动删除
        $keywordReply->rule()->delete();
        //返回提示消息
        return back()->with('success','删除成功');
    }
}
