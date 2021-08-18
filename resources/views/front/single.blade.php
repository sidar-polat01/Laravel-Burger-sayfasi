@extends('front.layouts.master')
@section('title',$article->title)
@section('content')
@include('front.widget.widget')

<style>
    #genel{
        display: flex;
        margin-top: 50px;
        margin-bottom: 150px;
    }
    #sag{
        margin-top: 100px;
    }
    button
    {
        color: white;
        background-color: #b02a37;
        margin-top: 50px;
        margin-left: 100px;
        width: 65%;
        height: 22%;
        border-radius: 10px;
    }

    button:hover{
        background-color:#dda20a;
    }
</style>
            <div class="col-md-9 col-xl-7" id="genel">
                <hr>
                <div class="col-md-8" id="sol">
                    <h2>{{$article->title}}</h2>
                    <img src="{{asset($article->image)}}" id="feature">
                    <br>
                    <h2>{{$article->hit}} TL</h2>
                </div>
                <div class="col-md-4" id="sag">
                    <h2>{!!$article->content!!}</h2>
                    <br>
                    <form method="post" action="{{route('sepet.create')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="number" name="urunAdet" value="1" placeholder="Adet" max="10" min="1" required/>
                        <input type="hidden" name="urunid" value="{{$article->id}}" placeholder="{{$article->id}}"/>
                        <button type="submit" id="sepeteEkle">Sepete Ekle</button>
                    </form>
                </div>

                <br><br>
                <hr>
        </div>

@endsection


