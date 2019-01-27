<?php

namespace App\Http\Controllers\Api;

use App\Model\CustomMenu;
use App\Transformers\NewsCategoryTransformer;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     *
     * 获取所有分类数据接口
     *
     * @return \Dingo\Api\Http\Response
     */
    public function index(){
        //获取当前项目所有新闻分类数据
        $categorys = CustomMenu::orderBy('parentId')->get();
        //返回分类数据
        return $this->response->collection($categorys,new NewsCategoryTransformer());
    }
}
