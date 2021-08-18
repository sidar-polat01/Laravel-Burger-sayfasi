@extends('back.layouts.master')
@section('title','Tüm Ürünler')
@section('content')
    <div class="container-fluid">

        <style>
            .tablo{
                background-color: white;
            }
        </style>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><strong>{{$articles->count()}}</strong> ürün bulundu</h6>
            </div>
            <div class="card-body tablo">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Fotoğraf</th>
                            <th>Ürün Başlığı</th>
                            <th>Kategori</th>
                            <th>Fiyat</th>
                            <th>Oluşturma Tarihi</th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($articles as $article)
                        <tr>
                            <td>
                                <img src="{{asset($article->image)}}" class="img-thumbnail rounded" width="150">
                            </td>
                            <td>{{$article->title}}</td>
                            <td>{{$article->getCategory->name}}</td>
                            <td>{{$article->hit}}</td>
                            <td>{{$article->created_at->diffforHumans()}}</td>
                            <td>
                                <a href="{{route('admin.makaleler.edit',$article->id)}}" title="Düzenle" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                                <a href="{{route('admin.delete.article',$article->id)}}" title="Sil" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
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

