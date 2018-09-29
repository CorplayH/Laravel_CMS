<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Video extends Model
{
    //
    use SoftDeletes,Searchable;
    protected $fillable = ['title','path'];
    
    public function lesson(){
        $this->belongsTo(Lesson::class);
    }
}
