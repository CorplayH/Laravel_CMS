<?php

namespace App\Http\Controllers\Wechat;

use App\Model\WxMenu;
use App\Server\WechatServer;
use Houdunwang\WeChat\WeChat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WxMenuController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $menus = WxMenu::get();
        return view('wechat.wxMenu.index',compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('wechat.wxMenu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, WxMenu $wxMenu)
    {
//        dd($request->all());
        $wxMenu->name = $request->name;
        $wxMenu->data = json_decode($request->data);
        $wxMenu->save ();
        return redirect()->route ('wechat.wxMenu.index')->with('success','操作成功');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\WxMenu  $wxMenu
     * @return \Illuminate\Http\Response
     */
    public function show(WxMenu $wxMenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\WxMenu  $wxMenu
     * @return \Illuminate\Http\Response
     */
    public function edit(WxMenu $wxMenu)
    {
        //
        return view('wechat.wxMenu.edit',compact('wxMenu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\WxMenu  $wxMenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WxMenu $wxMenu)
    {
        //
        $wxMenu->name = $request->name;
        $wxMenu->data = json_decode($request->data);
        $wxMenu->save ();
        return redirect ()->route ('wechat.wxMenu.index')->with('success','操作成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\WxMenu  $wxMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy(WxMenu $wxMenu)
    {
        //
        $wxMenu->delete();
        return back()->with('success','删除成功');
    }
    
    public function push(WxMenu $wxMenu, WechatServer $wechatServer)
    {
        $wechatServer->config();
        $res = WeChat::instance('button')->create($wxMenu['data']);
//        dd($res);
        if($res['errcode'] == 0 ){
            return back ()->with ('success','操作成功');
        }
        return back ()->with ('error',$res['errmsg']);
    
    }
}
