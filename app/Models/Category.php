<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $fillable = [
        'cate_name', 'cate_slug', 'cate_parent',
    ];
    public function pc(){
        return $this->hasMany('app\Models\PC', 'id','category_id');
    }
}
