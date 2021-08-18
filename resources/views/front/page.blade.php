@extends('front.layouts.master')
@section('title',$page->title)
@section('bg',$page->image)
@section('content')


<div class="row gx-4 gx-lg-5 justify-content-center">
    <div class="col-md-10 col-lg-8 col-xl-7">
        {!! $page->content !!}
    </div>
</div>

@endsection
