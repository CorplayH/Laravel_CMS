<?php

namespace App\Http\Controllers\Api;

use App\Model\News;
use App\Transformers\NewsTransformer;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    //
    public function index($category =0)
    {
        //判断调用该方法是否传递了分类id,如果有,就根据分类id获取对应分类下的新闻数据,如果没有,就获取所有的
        if ($category){
            $news = News::where('news_category_id',$category)->get();
        }else{
            //返回所有的新闻数据
            $news = News::get();
        }
        //collection方法是要返回的数据
        //第二个参数是实例化数据转换类
        //如果使用array方法返回数据,不用数据转换
        //collection,item,paginator方法需要结合数据转换返回数据
        return $this->response->collection($news, new NewsTransformer());
    }
    /**
     * 获取单个文章数据接口
     */
    public function news($id)
    {
        //找到对应$news这个id的新闻数据并返回
        $news = News::find($id);
        
        return $this->response->item($news, new NewsTransformer());
    }
    
}
