<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Model\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取全部评论
        $model = cms_model ();//获取Article模型对象
        $comments = $model->comment()->with(['user'])->orderBy('created_at','desc')->get();
        //dd($comments->toArray());
        return ['code'=>0,'comments'=>$comments];
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
        //获取Article模型实例，包含评论文章数据
        $model = cms_model ();
        //接受请求数据中的content
        $data = $request->only(['content']);
        $data['user_id'] = auth ()->id ();
        //添加成功之后，返回当前数据模型对象
        $comment = $model->comment()->create($data);
        //dd($comment->toArray());
        //dd($comment->user->toArray());
        //返回数据
        //$comment['user'] = $comment->user;
        //return ['code'=>0,'comment'=>$comment];
        //或者使用以下方式返回数据
        //dd($comment->with(['user'])->get()->toArray());
        return ['code'=>0,'comment'=>$comment->with(['user'])->find($comment['id'])];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
