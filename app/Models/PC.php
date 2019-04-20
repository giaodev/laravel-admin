<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PC extends Model
{
    protected $table = "pc";
    public $timestamps = false;
    public function product(){
        return $this->belongsTo('app\Models\Product','product_id','id');
    }
    public function category(){
        return $this->belongsTo('app\Models\Category','cate_id','id');
    }
}
