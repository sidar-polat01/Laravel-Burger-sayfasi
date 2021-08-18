@extends('front.layouts.master')
@section('title','Bi BURGER')
@section('content')
@include('front.widget.widget')
<style>
    #orta
    {
        display: flex;
        margin-bottom: 100px;
    }
    #feature
    {
        margin-left: -20px;
        width: 139%;
    }
    #sign
    {
        width: 100%;
        margin-left: 200px;
        border-radius: 0 20px 20px 0;
    }
    #orta1{
        display:inherit;

    }
    #orta1 h2{
        margin-top: 100px;
        margin-left: -250px;
        color: white;
        font-family: 'Luckiest Guy', cursive;
        font-weight: 800;
        text-transform: uppercase;
        font-size: 1.5em;
    }
    #orta1 p{
        margin-left: -270px;
        color: white;
        font-family: 'Luckiest Guy', cursive;
        font-weight: 400;
        font-size: 0.8em;
    }
    #orta2{
        display: inherit;
    }

    #orta2 p{
        margin-left: -320px;
        color: white;
        font-family: 'Luckiest Guy', cursive;
        font-weight: 400;
        font-size: 0.8em;
        margin-top: 120px;
    }
    #son
    {
        display: flex;
        margin-bottom: 100px;
        margin-left: 50px;
    }
    #classic
    {
        width: 100%;
        border-radius: 20px 0 0 20px;
    }
    #small
    {
        width: 100%;
        border-radius: 0 20px 20px 0;
    }
    #son1{
        display:inherit;

    }
    #son1 h2{
        margin-top: 100px;
        margin-left: -520px;
        color: white;
        font-family: 'Luckiest Guy', cursive;
        font-weight: 800;
        text-transform: uppercase;
        font-size: 1.5em;
        background-color: #dda20a;
        width: 250%;
        border-radius: 10px;
    }
    #son1 p{
        margin-left: -520px;
        margin-top: 100px;
        color: white;
        font-family: 'Luckiest Guy', cursive;
        font-weight: 400;
        background-color: #dda20a;
        font-size: 0.8em;
        width: 250%;
        border-radius: 10px;
    }
    #son2{
        display: inherit;
    }

    #son2 p{
        margin-left: -550px;
        color: white;
        font-family: 'Luckiest Guy', cursive;
        font-weight: 400;
        font-size: 0.8em;
        margin-top: 140px;
        background-color: #b02a37;
        width: 520%;
        border-radius: 10px;
    }
    #alt{
        display: flex;
        margin-bottom: 50px;
    }

    body {

    }

    .cart {
        background-color: #212121;
        color: #d1d1d5;
        margin-top: 10px;
        font-size: 12px;
        font-weight: 900;
        width: 100%;
        height: 39px;
        padding-top: 9px;
        box-shadow: 0px 5px 10px #212121
    }

    .card-body {
        width: fit-content;

    }

    .btn {
        border-radius: 0;
    }
    #btn{
        background-image: url("https://i.pinimg.com/564x/88/c9/89/88c9892c3c20e8dce90f845a67da3f13.jpg");
        width: 30%;
        margin-bottom: 50px;
        margin-left: 420px;
        color: white;
    }

    .btn:hover{
        color: white;
    }

    .img-thumbnail {
        border: none;
        border-radius: 10px;
    }

    .card {
        height: 90%;
        border-radius: 5px;
        width: 23%;
    }

</style>
        <div class="col-md-10" id="orta">
            <div class="col-md-6" id="orta1">
                <img src="front/assets/img/feature_bg.jpg" id="feature">
                <div class="col-md-3">
                    <h2>Tavuk Burger</h2>
                    <p>Amerikan peyniri, domates, marul <br> ve “Tavuk Sosu” ile süslenmiş <br> sığır köftesi,
                        ızgara patates <br> topuzunda servis edilir</p>
                </div>


            </div>
            <div class="col-md-4" id="orta2">
                <img src="front/assets/img/sign_bg.jpg" id="sign">
                <div class="col-md-1" >
                    <p>Eskiden bir Sırdı ama<br> artık değil! <br>Karşınızda Cheddar <br> Sığır Köftesi,</p>
                </div>

            </div>
        </div>
<h2><a href="http://127.0.0.1:8000/kategori/Menüler">Menüler</a></h2>
<hr style="height: 2px;color: #dda20a">
<br>

<div class='container-fluid' id="alt">
    @foreach($menu as $article)
    <div class="card mx-auto col-md-3 col-10 mt-5"> <img class='mx-auto img-thumbnail' src="{{$article->image}}" width="auto" height="auto" />
        <div class="card-body text-center mx-auto">
            <div class='cvp'>
                <h5 class="card-title font-weight-bold">{{$article->title}}</h5>
                <h2>{{$article->hit}} TL</h2>
            </div>
        </div>
    </div>
    @endforeach
</div>
<a id="a" href="http://127.0.0.1:8000/kategori/Menüler"><button id="btn"> Menülere Git</button></a>
<h2><a href="http://127.0.0.1:8000/kategori/Burgerler">Burgerler</a></h2>
<hr style="height: 2px;color: #dda20a">
<br>

<div class='container-fluid' id="alt">
    @foreach($burger as $article)
        <div class="card mx-auto col-md-3 col-10 mt-5"> <img class='mx-auto img-thumbnail' src="{{$article->image}}" width="auto" height="auto" />
            <div class="card-body text-center mx-auto">
                <div class='cvp'>
                    <h5 class="card-title font-weight-bold">{{$article->title}}</h5>
                    <h2>{{$article->hit}} TL</h2>
                </div>
            </div>
        </div>
    @endforeach
</div>
<a href="http://127.0.0.1:8000/kategori/Burgerler" id="a"><button id="btn"> Burgerlere Git</button></a>
<hr>
<div class="col-md-12" id="son">
    <div class="col-md-6" id="son1">
        <img src="front/assets/img/classic_bg.jpg" id="classic">
        <div class="col-md-3">
            <h2>EV-YAPIMI HAMBURGER</h2>
            <p>Geleneksel salatalık turşusu yerine elma sirkesi,<br> hardal tohumu ve zerdeçal ile marine edilmiş <br> ince kesilmiş kabak dilimleri ile
                <br> hamburgerlerini vurguluyor.</p>
        </div>


    </div>
    <div class="col-md-6" id="son2">
        <img src="front/assets/img/small_slider_bg.jpg" id="small">
        <div class="col-md-1" >
            <p>İki ince yığılmış köftesi, kalın <br> kesilmiş dana pastırması, kimchi <br> ve baharatlı ev yapımı sos ile yapıyor.</p>
        </div>

    </div>
</div>

@endsection
