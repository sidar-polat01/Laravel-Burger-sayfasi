<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Sepet;
use App\Models\Siparis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiparisController extends Controller
{
    public function index(){
        $articles=Article::orderBy('created_at','ASC')->get();
        $categories=Category::all();
        $sepets=Sepet::all();
        $siparis=Siparis::all();
        return view('front.info',compact('articles','categories','sepets','siparis'));
    }
    public function create(Request $request)
    {
            $siparis = new Siparis;
            $siparis->title = $request->urunad;
            $siparis->piece = $request->urunFiyat;
            $siparis->name = $request->name;
            $siparis->email = $request->email;
            $siparis->topic = $request->topic;
            $siparis->message = $request->message;
            $siparis->save();
            Sepet::query()->delete();
            toastr()->success('Ürün','Sepete eklendi');
            return redirect()->route('onay')->with('success','Ürün sepete iletildi');
    }
}
