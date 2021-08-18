<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Sepet;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function index(){
        $articles=Article::orderBy('created_at','ASC')->get();
        $sepets=Sepet::all();
        $categories=Category::all();
        return view('front.info',compact('articles','sepets','categories'));
    }
}
