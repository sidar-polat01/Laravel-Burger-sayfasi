<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    function getCategory(){
        return $this->hasOne('App\Models\Category','id','category_id');
    }
    function getSepet(){
        return $this->hasOne('App\Models\Sepet','urunid','id');
    }
    use HasFactory;
}
