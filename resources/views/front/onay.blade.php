@extends('front.layouts.master')
@section('title','Bi BURGER')
@section('content')
    @include('front.widget.widget')

    <div class="col-md-12 col-xl-10" style="margin-top: 50px; margin-bottom: 100px">
        <span class="alert-success" style="margin-left: 350px; font-size: 28px;">Siparişiniz iletildi</span>
        <h2 style="margin-left: 100px; margin-top: 100px; font-family: cursive">Bi BURGERİ SEÇTİĞİNİZ İÇİN TEŞEKKÜR EDERİZ.</h2>
        <hr width="550" style="background-color: #dda20a; height: 3px">
        <hr width="350" style="background-color: #dda20a; height: 3px">
    </div>

@endsection
