<?php
/**
 * Created by PhpStorm.
 * User: liyalong
 * Date: 2018/10/12
 * Time: 上午11:24
 */

namespace App\Transformers;

use App\Model\News;
use App\Model\NewsCategory;
use App\User;
use League\Fractal\TransformerAbstract;

class AuthorTransformer extends TransformerAbstract
{
    public function transform(User $user)
    {
        //需要当前新闻数据的哪些字段,就在这里return数组里面写上就可以了
        return [
            'id' => $user['id'],
            'name' => $user['name'],
        ];
    }

}
