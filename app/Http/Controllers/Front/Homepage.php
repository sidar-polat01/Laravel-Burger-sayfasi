<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Database\Seeders\ArticleSeeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\Page;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class Homepage extends Controller
{
    public function __construct(){
        view()->share('pages',Page::orderBy('order','ASC')->get());
        view()->share('categories',Category::orderBy("name",'desc')->get());
}
    public function index()
    {
        $category=Category::orderBy('created_at','DESC')->get();
        $articles=Article::orderBy('created_at','ASC')->paginate(3);
        $menu = Article::where('category_id',12)->orderBy('created_at')->limit(4)->get();
        $burger = Article::where('category_id',8)->orderBy('created_at')->limit(4)->get();
        return view('front.homepage',compact('category','articles','menu','burger'));
    }
    public function urun(){
        $articles=Article::all();
        return view('front.urun',compact('articles'));
    }
    public function onay(){
        return view('front.onay');
    }

    public function single($category,$slug){
        $category=Category::whereSlug($category)->first()??abort(403,'Böyle bir kategori bulunamadı');
        $article= Article::whereSlug($slug)->whereCategoryId($category->id)->first()??abort(404,'Böyle bir sayfa bulunamadı');
        $data['article'] = $article;
        return view('front.single',$data);
    }

    public function category($slug)
    {
        $category=Category::whereSlug($slug)->first()??abort(403,'Böyle bir kategori bulunamadı');
        $data['category']=$category;
        $data['articles']=Article::where('category_id',$category->id)->orderBy('created_at','ASC')->get();
        return view('front.category',$data);
    }
    public function page($slug){
        $page=Page::whereSlug($slug)->first()??abort(403,'Böyle bir kategori bulunamadı');
        $data['page']=$page;
        return view('front.page',$data);
    }

    public function contact(){
        return view('front.contact');
    }

    public function contactpost(Request $request)
    {
        $contact=new Contact;
        $contact->name=$request->name;
        $contact->email=$request->email;
        $contact->topic=$request->topic;
        $contact->message=$request->message;
        $contact->save();
        return redirect()->route('contact')->with('success','Mesajınız bize iletildi');

    }


}
