<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\TopicRequest;
use App\Model\Category;
use App\Model\Topic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $category_id = $request->query('category_id');
        $category = Category::find($category_id);
        $topics = Topic::where('category_id',$category_id)->orderBy('created_at','desc')->paginate(1)->withPath('topic?category_id=' . $category_id);
        return view('home.topic.index',compact('category','topics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $category = Category::find($request->query('category_id'));
        return view('home.topic.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TopicRequest $request, Topic $topic)
    {
        //
        $topic = auth()->user()->topic()->create($request->all());
        return redirect()->route('topic.show',$topic)->with('success','添加成功');
    }
    
    public function show(Topic $topic)
    {
        //
        return view('home.topic.show',compact('topic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function edit(Topic $topic, Request $request)
    {
        //
        $category = Category::find($topic->category_id);
        return view('home.topic.edit',compact('topic','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function update(TopicRequest $request, Topic $topic)
    {
        //
        $this->authorize('update',$topic);
        $category = Category::find($topic->category_id);
        $topic->update($request->all());
        return view ('home.topic.show',compact('category','topic'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic)
    {
        //
        $this->authorize('delete',$topic);
        $topic -> delete();
        return back()->with('success','删除成功');
    }
}
