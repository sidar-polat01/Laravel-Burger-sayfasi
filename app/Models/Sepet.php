<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sepet extends Model
{
    public function getArticle(){
        return $this->hasOne('App\Models\Article','id','urunid');
    }
    use HasFactory;
}
