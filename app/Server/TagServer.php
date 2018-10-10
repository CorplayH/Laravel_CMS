<?php
/**
 * Created by PhpStorm.
 * User: Will
 * Date: 10/10/18
 * Time: 07:39
 */

namespace App\Server;
use Blade;

class TagServer
{
    public function make(){
        //调用自定义分类标签方法
        $this->category();
        //调用自定义新闻标签
        $this->news();
    }
    public function news(){
        //定义新闻标签开始
        Blade::directive('news',function ($param){
            $param = $param ? $param : '[]';
            //定义一个定界符
            $php = <<<php
        <?php
        \$canshu = $param;
        \$db = new \App\Model\News();
        //判断参数中是否存在新闻分类id,如果存在,应该只获取某个分类下的新闻数据
        if(isset(\$canshu['category_id'])){
            \$db = \$db->where('news_category_id',\$canshu['category_id']);
        }
        \$news = \$db->get();
        foreach(\$news as \$k => \$new){
        ?>
php;
            return $php;
        });
        
        //定义新闻标签结束
        Blade::directive('endnews',function (){
            $php = <<<php
        <?php
        }
        ?>
php;
            return $php;
            
        });
    }
    
    
    
    public function category(){
        //使用框架所提供的一个Blade类里面的 directive() 方法来自定义标签
        //方法的第一个参数就是你想自定义的标签的名称,注意的是:自定义的标签不要和框架系统标签冲突重名
        //第二个参数是这个自定义标签会去执行的回调函数
        //使用的时候就可以直接使用@标签名称, @category
        //自定义标签的回调方法会自动接收到使用标签时候传递的参数
        Blade::directive('category',function ($param){
            //判断是否调用标签的时候传递了数据
            $param = $param ? $param : '[]';
            //最终我们应该返回的数据是获取到分类数据,然后循环的字符串代码
            $php = <<<php
            <?php
            //定义接到的参数数据
            \$canshu = $param;
            \$db = new \App\Model\NewsCategory();
            //判断参数中是否存在pid的值,如果存在,就加上where条件取某个pid的分类数据
            if(isset(\$canshu['pid'])){
                \$db = \$db->where('parentId',\$canshu['pid']);
            }
            //判断参数中是否存在limit,如果存在limit,就使用limit方法截取对应个数的数据
            if(isset(\$canshu['limit'])){
                \$db = \$db->limit(\$canshu['limit']);
            }
            \$category = \$db->get();
           //循环获取到的分类数据
           foreach(\$category as \$k => \$v){
        ?>
php;
            return $php;
            
        });
        
        //定义分类标签的结束标签
        Blade::directive('endcategory',function(){
            $php = <<<php
        <?php
        }
        ?>
php;
            return $php;
        });
    }
    
}
