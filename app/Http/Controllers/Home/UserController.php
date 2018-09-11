<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\UserRequest;
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('home.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //打印测试post提交的所有数据
        //dd($request->all ());
        if(filter_var ($request->account,FILTER_VALIDATE_EMAIL)){
            $data['email'] = $request->account;
            $data['email_valid'] = true;
        }else{
            $data['mobile'] = $request->account;
            $data['mobile_valid'] = true;
        }
        $data['name'] = $request->name;
        $data['password'] = bcrypt ($request->password);
        //dd($data);
        //批量填充数据
        //需要User模型中fillable（允许填充）属性，或者$guarded（不允许被填充）
        $res = User::create ($data);
        //dd($res);
        //session()->flash('success','注册成功');
        //return redirect('/')
        return redirect (route ('login'))->with ('success','注册成功');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
