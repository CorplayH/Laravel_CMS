<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Lesson extends Model
{
    //
    use Searchable;
    protected $fillable = ['title','description', 'thumb'];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function video(){
        return $this->hasMany(Video::class);
    }
}
