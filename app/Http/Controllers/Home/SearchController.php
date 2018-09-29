<?php

namespace App\Http\Controllers\Home;

use App\Model\Article;
use App\Model\Topic;
use App\Model\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    //
    public function lists(Request $request){
    
        $keyword = $request->query('keyword');
        $type = $request->query('type');
        switch($type){
            case 'article':
                $data = Article::search($keyword)->get();
                break;
            case 'topic':
                $data = Topic::search($keyword)->get();
                break;
            case 'video':
                $data = Video::search($keyword)->get();
                break;
            default:
                return back ()->with ('error','没有对应数据');
                break;
        }
        return view('home.search.lists',compact('data','type'));
    }
}
