<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Video extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['title','path'];
    
    public function lesson(){
        $this->belongsTo(Lesson::class);
    }
}
