<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table = "images";
    public function category(){
        return $this->belongsTo('app\Models\Category','id','images_category');
    }
}
