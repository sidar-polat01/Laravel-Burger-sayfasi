@extends('back.layouts.master')
@section('title','Sayfa Oluştur')
@section('content')
    <style>
        .note-icon-picture {
            display: none;
        }
        .note-icon-video {
            display: none;
        }
        .note-insert {
            display: none
        }
    </style>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
            </div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </div>
                @endif
                <form method="post" action="{{route('admin.page.create.post')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Sayfa Başlığı</label>
                        <input type="text" name="title" class="form-control" required></input>
                    </div>

                    <div class="form-group">
                        <label>Sayfa Fotoğrafı</label>
                        <input type="file" name="image" class="form-control" required></input>
                    </div>
                    <div class="form-group">
                        <label>Sayfa İçeriği</label>
                        <textarea id="editor" name="contents" class="form-control" cols="30" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Sayfayı Oluştur</button>
                    </div>
                </form>
            </div>
            </div>

@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#editor').summernote(
                {
                    'height':300
                }
            );
        });
    </script>
@endsection
