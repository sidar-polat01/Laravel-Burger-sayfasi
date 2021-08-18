@extends('back.layouts.master')
@section('title','Tüm Sayfalar')
@section('content')
    <div class="container-fluid">


        <!-- DataTales Example -->
        <div class="card shadow mb-4">

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Fotoğraf</th>
                            <th>Makale Başlığı</th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pages as $page)
                        <tr>
                            <td>
                                <img src="{{asset($page->image)}}" class="img-thumbnail rounded" width="150">
                            </td>
                            <td>{{$page->title}}</td>
                            <td>
                                <a href="{{route('admin.page.edit',$page->id)}}" title="Düzenle" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                                <a href="{{route('admin.page.delete',$page->id)}}" title="Sil" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>


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

