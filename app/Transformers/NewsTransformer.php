<?php
/**
 * Created by PhpStorm.
 * User: Will
 * Date: 14/10/18
 * Time: 22:18
 */

namespace App\Transformers;


use App\Model\News;
use League\Fractal\TransformerAbstract;

class NewsTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['category', 'user'];
    
    public function transform(News $news)
    {
        return [
            'id' => $news['id'],
            'title' => $news['title'],
            'miaoshu' => $news['description'],
            'thumb' => $news['thumb'],
            'content' => $news['content'],
        ];
    }
    //名字是上面$availableIncludes:  include + Category 命名方式
    public function includeCategory(News $news)
    {
        //第一个参数是返回的关联数据
        return $this->item($news->category, new NewsCategoryTransformer());
    }
    
    public function includeUser(News $news)
    {
        return $this->item($news->user, new AuthorTransformer());
    }
}
