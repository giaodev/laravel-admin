<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = "news";
    public function users(){
        return $this->belongsTo('app\Models\User','id','user_id');
    }
    public function nc(){
        return $this->hasMany('app\Models\PC', 'id','news_id');
    }
}
