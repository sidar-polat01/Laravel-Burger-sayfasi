<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Siparis;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index(){
        $articles=Article::orderBy('created_at','ASC')->get();
        $categories=Category::all();
        $contacts=Contact::orderBy('created_at','ASC')->get();
        $sipariss=Siparis::all();
        return view('back.dashboard',compact('articles','categories','contacts','sipariss'));
    }
}
