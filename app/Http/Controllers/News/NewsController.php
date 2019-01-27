<?php

namespace App\Http\Controllers\News;

use App\Model\CustomMenu;
use App\Model\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $allNews = News::orderBy('updated_at','desc')->paginate(5);
        return view('admin.news.index',compact('allNews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CustomMenu $customMenu)
    {
        //
        $allCategories = $customMenu->getTreeCategory();
        return view('admin.news.create',compact('allCategories'));
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
        $data = $request->all();
        \Validator::make($data,[
            'title'=>'required | min:6',
            'content'=>'required | min:20',
        ],[
            'title.required' => '标题为必填',
        ])->validate();
        News::create($request->all());
        return redirect()->route('news.news.index')->with('success','发布成功');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news, CustomMenu $customMenu)
    {
        //
        $allCategories = $customMenu->getTreeCategory();
        return view('admin.news.update',compact('news','allCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        //
        $news->update($request->all());
        return redirect()->route('admin.news.index')->with('success','更新成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        //
        $news->delete();
        return redirect()->route('admin.news.index')->with('success','删除成功');
    }
}
