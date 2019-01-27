<?php
/**
 * Created by PhpStorm.
 * User: liyalong
 * Date: 2018/10/12
 * Time: 上午11:24
 */

namespace App\Transformers;

use App\Model\CustomMenu;
use App\Model\News;
use Composer\Util\Silencer;
use League\Fractal\TransformerAbstract;

class NewsCategoryTransformer extends TransformerAbstract
{
    public function transform(CustomMenu $newsCategory)
    {
        //需要当前新闻数据的哪些字段,就在这里return数组里面写上就可以了
        return [
            'id' => $newsCategory['id'],
            'cname' => $newsCategory['cname'],
        ];
    }

}
