<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    //
    protected $fillable = ['title','description', 'thumb'];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function video(){
        return $this->hasMany(Video::class);
    }
}
