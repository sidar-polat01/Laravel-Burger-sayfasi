<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Sepet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SepetController extends Controller
{
    public function index(){
        $articles=Article::orderBy('created_at','ASC')->get();
        $categories=Category::all();
        $sepets=Sepet::all();
        $menu=DB::select("SELECT * FROM articles WHERE category_id=12 ORDER BY created_at");
        return view('front.sepet',compact('articles','categories','sepets','menu'));
    }
    public function create(Request $request){
        $sepet = Sepet::where('urunid',$request->urunid)->first();
        if($sepet)
        {
            $sepet->urunAdet = $sepet->urunAdet+$request->urunAdet;
        }
        else{
            $sepet=new Sepet;
            $sepet->urunid=$request->urunid;
            $sepet->urunAdet=$request->urunAdet;
        }

        $sepet->save();
        toastr()->success('Ürün','Sepete eklendi');
        return redirect('/sepet');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request){
        $sepet = Sepet::find($request->id);
        $sepet->urunAdet=$request->input('urunAdet');
        $sepet->save();
        return redirect()->back();

    }

    public function delete(Request $request)
    {
        $sepet=Sepet::find($request->id);
        $sepet->delete();
        toastr()->success('Sepetten başarıyla silindi');
        return redirect()->back();
    }

}
