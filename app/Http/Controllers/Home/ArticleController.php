<?php

namespace App\Http\Controllers\Home;

use App\Model\Article;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ArticleController extends Controller
{
    public function __construct ()
    {
        //除了index、show方法不需要登录
        $this->middleware ( 'auth' , [ 'except' => [ 'index' , 'show' ] ] );
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $articles = Article::orderBy('created_at','desc')->paginate(10);
//        dd($articles->toArray());
        return view ('home.article.index',compact ('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ( 'home.article.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //返回当前添加数据信息
        //auth()->user();返回User对象，包含当前登录用户数据
        //auth ()->user ()->article();调用User模型中article方法
//        dd($request->all());
        $article = auth ()->user ()->article ()->create ( $request->all () );
        return redirect ( route ( 'article.show' ,$article ) )->with ( 'success' , '添加成功' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article, User $user)
    {
        //判断用户是否关注了指定文章
        $isZan = $article->zan ()->get ()->contains ( auth ()->user () );
        //获得文章所有关注用户
        $users = $article->zan ()->get ();
        $fullcontent = $article->{'editormd-html-code'} ;
        return view ('home.article.show',compact ('isZan','users','article','fullcontent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
    public function toggleZan ( Article $article )
    {
        $article->zan ()->toggle ( auth ()->id () );
        
        return back ()->with ( 'success' , '操作成功' );
    }
}
