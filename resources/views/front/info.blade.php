@extends('front.layouts.master')
@section('title','sipariş detay')
@section('bg',asset('front/assets/img/header_bg.jpg'))
@section('content')
    <style>
        #dataTable
        {
            background-color: white;
        }
    </style>
    <div class="col-md-12" id="row" style="display: flex; margin-top: 100px; margin-bottom: 100px">
        <div class="col-md-5">
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
                                        <td>{{$sepet->urunAdet}}</td>
                                        <td>{{$sepet->getArticle->hit * $sepet->urunAdet}}</td>

                                    </tr>
                                    @php
                                        $total += $sepet->getArticle->hit * $sepet->urunAdet;
                                    @endphp


                                @endforeach
                                </tbody>
                            </table>
                            Toplam Fiyat : {{$total}} TL
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5" style="margin-left: 150px; margin-top: -50px">
            <div class="my-5">
                <form method="post" action="{{route('siparis.create')}}">
                    @csrf
                    <div class="form-floating">
                        <input type="text" name="urunFiyat" value="{{$total}}" placeholder="{{$total}}" style="display: none"/>
                        <input type="text" name="urunad" value="@foreach($sepets as $sepet){{$sepet->getArticle->title}}*[{{$sepet->urunAdet.']<br>'}}@endforeach" placeholder="{{$sepet->getArticle->title}}" style="display: none"/>
                        <input class="form-control" name="name" placeholder="Ad Soyad" required />
                        <label for="name">Ad Soyad</label>
                        <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                    </div>
                    <br>
                    <div class="form-floating">
                        <input class="form-control" name="email" type="email" placeholder="Email" required/>
                        <label for="email">Email veya Telefon numarası</label>
                        <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                        <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                    </div>
                    <br>
                    <div class="form-floating">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label for="phone">Ödeme Seçeneği</label>
                            <select class="form-control" name="topic">
                                <option>Kapıda Kredi Kartı</option>
                                <option>Kapıda Nakit</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="form-floating">
                        <textarea class="form-control" name="message" placeholder="Mesajınız" required></textarea>
                        <label for="message">Adres</label>
                        <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                    </div>
                    <br />
                    <div class="d-none" id="submitSuccessMessage">
                        <div class="text-center mb-3">
                            <div class="fw-bolder">Form submission successful!</div>
                            To activate this form, sign up at
                            <br />
                            <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                        </div>
                    </div>
                    <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                    <!-- Submit Button-->
                    <div class="form-group">
                        <button class="btn btn-primary" id="sendMessageButton" type="submit">Gönder</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection



