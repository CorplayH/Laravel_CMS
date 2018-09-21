<?php

namespace App\Model;

use App\Model\Traits\common;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Article extends Model
{
    use common;
    use LogsActivity;
    //设置记录动态的属性
    protected static $logFillable = true;
    //记录事件
    protected static $recordEvents = ['created','updated'];
    //自定义日志名称
    protected static $logName = 'article';
    
    
    protected $fillable = ['title','content'];
//    protected $fillable = ['title','content','editormd-html-code'];
//    protected $guarded =[];
    
    /**
     * 返回文章详情页链接
     * @return string
     */
    public function getLink($param){
        return route ('article.show',$this) . $param;
    }
    //获取文章标题
    public function getTitle()
    {
        return $this->title;
    }
    
    public function getMarkdownAttribute ()
    {
        $Parsedown = new \Parsedown();
        return $Parsedown->text ( $this->content );
    }
}

