<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "product";
    public function users(){
        return $this->belongsTo('app\Models\User','id','user_id');
    }
    public function pc(){
        return $this->hasMany('app\Models\PC', 'id','product_id');
    }
}
