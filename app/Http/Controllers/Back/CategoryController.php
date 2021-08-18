<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;

class CategoryController extends Controller
{
    public function index(){
        $categories=Category::all();
        return view('back.categories.index',compact('categories'));
    }
    public function create(Request $request){
        $isExist=Category::whereName($request->category)->first();
        if($isExist){
            toastr()->error($request->category.' adında bir kategori zaten mevcut');
            return redirect()->back();
        }
        $category = new Category;
        $category->name=$request->category;
        $category->slug=$request->category;
        $category->save();
        toastr()->success('Kategori başarı ile oluşturuldu');
        return redirect()->back();

    }
    public function update(Request $request){
        $isExist=Category::whereName($request->category)->first();
        if($isExist){
            toastr()->error($request->category.' adında bir kategori zaten mevcut');
            return redirect()->back();
        }
        $category = Category::find($request->id);
        $category->name=$request->category;
        $category->slug=$request->category;
        $category->save();
        toastr()->success('Kategori başarı ile güncellendi');
        return redirect()->back();

    }

    public function delete(Request $request){
        $category=Category::findOrFail($request->id);
        if($category->id==1){
            toastr()->error('Bu kategori silinmez');
            return redirect()->back();
        }
        $message='';
        $count=$category->articleCount();
        if($count>0){
            Article::where('category_id',$category->id)->update(['category_id'=>1]);
            $defaultCategory=Category::find(1);
            $message='Bu kategoriye ait '.$count.' makale taşındı';
        }
        $category->delete();
        toastr()->success('kategori başarı ile silindi',$message);
        return redirect()->back();
    }

    public function getData(Request $request){
        $category=Category::findOrFail($request->id);
        return response()->json($category);
    }
}
