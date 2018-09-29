<?php

namespace App\Model;

use App\Model\Traits\common;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Topic extends Model
{
    //
    use common;
    use Searchable;
    protected $fillable = ['title','content','category_id'];
    
    public function getMarkdownAttribute ()
    {
        $Parsedown = new \Parsedown();
        return $Parsedown->text ( $this->content );
    }
}
