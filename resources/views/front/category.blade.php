@extends('front.layouts.master')
@section('title',$category->name)
@section('content')
@include('front.widget.widget')
<style>
    .cate{
        display: flex;
        overflow-x: hidden;
    }
    #title{
        font-size: 1em;
    }
    h2{
        font-size: 1em;
        justify-content: center;
        text-align: center;
    }
</style>
        <div class="col-md-12 col-xl-10 row cate">
            <hr>
            @if(count($articles)>0)
           @foreach($articles as $article)
            <div class="post-preview col-md-3">
                <a href="{{route('single',[$article->getCategory->slug,$article->slug])}}">
                    <img src="{{asset($article->image)}}" width="200">
                    <h2 id="title" class="post-title">{{$article->title}}</h2>
                    <h2>{{$article->hit}} TL</h2>
                </a>
            </div>
        @endforeach
               <hr>
        @else
                <div class="alert alert-danger">
                    <h1>Bu kategoriye ait ürün bulunamadı</h1>
                </div>
        @endif
            <!-- Divider-->
            <hr>
        </div>

@endsection
