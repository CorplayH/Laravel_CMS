<?php

namespace App\Model;

use App\Model\Traits\common;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    //
    use common;
    protected $fillable = ['title','content','category_id'];
    
    public function getMarkdownAttribute ()
    {
        $Parsedown = new \Parsedown();
        return $Parsedown->text ( $this->content );
    }
}
