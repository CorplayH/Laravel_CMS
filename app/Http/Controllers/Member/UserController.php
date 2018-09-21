<?php

namespace App\Http\Controllers\Member;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
//        dd(auth()->user()->toArray());
        return view('member.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        return view ('member.user.show',compact ('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user,Request $request)
    {
        $this->authorize ('update',$user);
        //dd($user->toArray ());
        //dump($request->all ());
        //dump ($request->type);
        //dump ($request->query('type'));
        $type = $request->query('type');
        return view ('member.user.edit_' . $type,compact ('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->authorize ('update',$user);
        //dd($user->toArray ());
        //sometimes,当提交的数据中有某个字段时候才对进行验证
        $request->validate([
            'name'=>'sometimes|required',
            'password'=>'sometimes|required|min:5|confirmed'
        ],[
            'name.required'=>'请输入用户名',
            'password.required'=>'请输入密码',
            'password.min'=>'密码不得小于5位',
            'password.confirmed'=>'两次输入密码不一致'
        ]);
        $data = $request->all ();
        //当前登录用户信息
        //dd($user->toArray ());
        //使用create、update批量写入/更新数据,关注模型fillable属性
        
        if(isset($data['password'])){
            //echo 111;
            $data['password'] = bcrypt ($data['password']);
        }
//        dd($data);
        $user->update ($data);
        
        return back ()->with ('success','操作成功');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
    
    //用户关注或者取消关注
    public function toggleFollow(User $user){
        auth ()->user ()->follower()->toggle([$user->id]);
        return back ()->with ('success','操作成功');
    }
    
    //获取所有粉丝
    public function getFans(User $user){
        $fans = $user->fans ()->paginate(10);
        return view ('member.user.getFans',compact ('user','fans'));
    }
    
    //获取关注的人
    public function getFollower(User $user){
        $followers = $user->follower  ()->paginate(10);
        return view ('member.user.getFollower',compact ('user','followers'));
    }
}
