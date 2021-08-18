@extends('back.layouts.master')
@section('title','Tüm Yorumlar')
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
                            <th>E-Mail</th>
                            <th>Konu</th>
                            <th>Mesaj</th>
                            <th>Gönderim vakti</th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contacts as $contact)
                            <tr>
                                <td>{{$contact->name}}</td>
                                <td>{{$contact->email}}</td>
                                <td>{{$contact->topic}}</td>
                                <td>{{$contact->message}}</td>
                                <td>{{$contact->created_at->diffforHumans()}}</td>
                                <td>
                                    <a href="{{route('admin.contact.delete',$contact->id)}}" title="Sil" class="btn btn-primary btn-danger"><i class="fa fa-times"></i></a><br>
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


