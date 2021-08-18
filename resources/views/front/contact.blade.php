@extends('front.layouts.master')
@section('title','iletişim')
@section('bg','https://wallpaperaccess.com/full/656693.jpg')
@section('content')
<div class="col-md-10 col-lg-8 col-xl-7">
    @if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif
    <p>Bizimle iletişime geçebilirsiniz.</p>
    <div class="my-5">
        <form method="post" action="{{route('contact.post')}}">
            @csrf
            <div class="form-floating">
                <input class="form-control" name="name" placeholder="Ad Soyad" required />
                <label for="name">Ad Soyad</label>
                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
            </div>
            <br>
            <div class="form-floating">
                <input class="form-control" name="email" type="email" placeholder="Email" required/>
                <label for="email">Email</label>
                <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
            </div>
            <br>
            <div class="form-floating">
                <div class="form-group col-xs-12 floating-label-form-group controls">
                <label for="phone">Konu</label>
                <select class="form-control" name="topic">
                    <option>Bilgi</option>
                    <option>Destek</option>
                    <option>Genel</option>
                </select>
                </div>
            </div>
            <br>
            <div class="form-floating">
                <textarea class="form-control" name="message" placeholder="Mesajınız" required></textarea>
                <label for="message">Mesaj</label>
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

@endsection



