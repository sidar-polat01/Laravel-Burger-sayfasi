@extends('front.layouts.master')
@section('title','sepetim')
@section('bg',asset('front/assets/img/header_bg.jpg'))
@section('content')
    <style>
        #dataTable
        {
            background-color: white;
        }
    </style>
    <div class="col-md-12" id="row" style="margin-top: 100px">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><a>Ürünler</a></h6>


                    <div class="card-body tablo">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Ürün fotoğrafı</th>
                                    <th>Ürün adı</th>
                                    <th>Adet</th>
                                    <th>Fiyat</th>
                                    <th>İşlemler</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $total=0;
                                @endphp
                                @foreach($sepets as $sepet)
                                    <tr>
                                        <td>
                                            <img src="{{asset($sepet->getArticle->image)}}" class="img-thumbnail rounded" width="150">
                                        </td>
                                        <td>
                                            {{$sepet->getArticle->title}}
                                        </td>
                                        <td>
                                            <form method="post" action="{{route('sepet.update',['id'=>$sepet->id])}}" enctype="multipart/form-data">
                                                @csrf
                                            <input class="input" type="number" name="urunAdet" value="{{$sepet->urunAdet}}" placeholder="{{$sepet->urunAdet}}" max="10" min="1"/>
                                                @if($sepet->urunAdet<10)
                                                <button type="submit" class="btn-success fa-edit">Güncelle</button>
                                                @endif
                                            </form>
                                        </td>
                                        <td>{{$sepet->getArticle->hit * $sepet->urunAdet}}</td>
                                        <td>
                                            <a href="{{route('sepet.delete',$sepet->id)}}" title="Sil" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                    @php
                                        $total += $sepet->getArticle->hit * $sepet->urunAdet;
                                    @endphp
                                @endforeach
                                </tbody>
                            </table>
                            <div style="margin-left: 700px">Toplam Fiyat : {{$total}} TL</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="alt" style="display: flex; margin-bottom: 200px; margin-left: 120px; overflow-x: hidden">
        <div class="col-md-3">
            <a href="{{route('urun')}}">
                <button class="btn-block" style="background-color: #3b5998;color: white">Alışverişe Devam</button>
            </a>
        </div>
        <div class="col-md-4" style="margin-left: 600px">

                @if($total>10)
                    <a href="{{route('info')}}">
                    @endif
                        <button class="btn-success">Alışverişi Tamamla</button>
            </a>
        </div>
    </div>

@endsection



