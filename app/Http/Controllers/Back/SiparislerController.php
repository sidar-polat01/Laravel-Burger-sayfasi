<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Sepet;
use App\Models\Siparis;
use Illuminate\Http\Request;

class SiparislerController extends Controller
{
    public function index(){
        $articles=Article::orderBy('created_at','ASC')->get();
        $categories=Category::all();
        $sepets=Sepet::all();
        $sipariss=Siparis::all();
        return view('back.siparis.index',compact('articles','categories','sepets','sipariss'));
    }
    public function delete($id)
    {
        Siparis::find($id)->delete();
        toastr()->success('Siparis tamamlandı');
        return redirect()->route('admin.siparis.index');
    }
}
