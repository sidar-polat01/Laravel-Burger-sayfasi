@extends('back.layouts.master')
@section('title','Tüm Siparişler')
@section('content')
    <div class="container-fluid">
        <style>
            .tablo{
                background-color: white;
            }
        </style>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body tablo">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Ad Soyad</th>
                            <th>Ürün</th>
                            <th>Fiyat</th>
                            <th>Ödeme türü</th>
                            <th>Adress</th>
                            <th>Gönderim vakti</th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sipariss as $siparis)
                            <tr>
                                <td>{{$siparis->name}}</td>
                                <td>{!!$siparis->title!!}</td>
                                <td>{{$siparis->piece}} TL</td>
                                <td>{{$siparis->topic}}</td>
                                <td>{{$siparis->message}}</td>
                                <td>{{$siparis->created_at->diffforHumans()}}</td>
                                <td>
                                    <a href="{{route('admin.siparis.delete',$siparis->id)}}" title="Sipariş tamamlandı" class="btn btn-primary btn-success"><i class="fa fa-book-reader"></i></a><br>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection


