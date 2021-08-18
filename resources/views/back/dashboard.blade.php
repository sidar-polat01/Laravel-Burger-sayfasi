@extends('back.layouts.master')
@section('title','Panel')
@section('content')
                <div class="row">

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Ürün Sayısı
                                            </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$articles->count()}}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-edit fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Kategori Sayısı
                                          </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$categories->count()}}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-list fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                            Sipariş Sayısı
                                        </div>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-auto">
                                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$sipariss->count()}}</div>
                                            </div>
                                            <div class="col">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pending Requests Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                            Yorum Sayısı
                                        </div>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-auto">
                                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$contacts->count()}}</div>
                                            </div>
                                            <div class="col">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Content Row -->

                <div class="row">
                    <!-- Area Chart -->
                    <div class="col-xl-8 col-lg-7">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div
                                class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary"><a href="{{route('admin.makaleler.index')}}">Ürünler</a></h6>


                                <div class="card-body kategori">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                            <tr>
                                                <th>Fotoğraf</th>
                                                <th>Ürün Başlığı</th>
                                                <th>Kategori</th>
                                                <th>Fiyat</th>
                                                <th>Oluşturma Tarihi</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($articles as $article)
                                                <tr>
                                                    <td>
                                                        <img src="{{asset($article->image)}}" class="img-thumbnail rounded" width="100">
                                                    </td>
                                                    <td>{{$article->title}}</td>
                                                    <td>{{$article->getCategory->name}}</td>
                                                    <td>{{$article->hit}}</td>
                                                    <td>{{$article->created_at->diffforHumans()}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>


                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- Card Body -->

                        </div>
                    </div>
                    <style>
                        .kategori{
                            background-color: white;
                        }
                    </style>
                    <div class="col-xl-4 col-lg-5">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary"><a href="{{route('admin.category.index')}}">Kategoriler</a></h6>
                            </div>
                            <div class="card-body kategori">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>Kategori adı</th>
                                            <th>Ürün sayısı</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($categories as $category)
                                            <tr>
                                                <td>{{$category->name}}</td>
                                                <td>{{$category->articleCount()}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                </div>
                    <div class="col-xl-12 col-lg-7">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div
                                class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary"><a href="{{route('admin.siparis.index')}}">Siparişler</a></h6>


                                <div class="card-body kategori">
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
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($sipariss as $siparis)
                                                <tr>
                                                    <td>{{$siparis->name}}</td>
                                                    <td>{{$siparis->title}}</td>
                                                    <td>{{$siparis->piece}} TL</td>
                                                    <td>{{$siparis->topic}}</td>
                                                    <td>{{$siparis->message}}</td>
                                                    <td>{{$siparis->created_at->diffforHumans()}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- Card Body -->

                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-7">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div
                                class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary"><a href="{{route('admin.contact.index')}}">Yorumlar</a></h6>


                                <div class="card-body kategori">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                            <tr>
                                                <th>Ad Soyad</th>
                                                <th>E-Mail</th>
                                                <th>Konu</th>
                                                <th>Mesaj</th>
                                                <th>Gönderim vakti</th>
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
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- Card Body -->

                        </div>
                    </div>
@endsection


