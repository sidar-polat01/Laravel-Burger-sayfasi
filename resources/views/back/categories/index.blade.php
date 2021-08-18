@extends('back.layouts.master')
@section('title','Tüm Kategoriler')
@section('content')
    <div class="row">
        <div class="col-md-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Yeni Kategori Oluştur</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('admin.category.create')}}">
                        @csrf
                        <div class="form-group">
                            <label>Kategori Adı</label>
                            <input type="text" class="form-control" name="category" required />
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Ekle</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Kategori adı</th>
                                <th>Makale sayısı</th>
                                <th>İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->articleCount()}}</td>
                                    <td>
                                        <a category-id="{{$category->id}}" title="Düzenle" class="btn btn-sm btn-primary edit-click"><i class="fa fa-edit text-white"></i></a>
                                        <a category-id="{{$category->id}}" category-name="{{$category->name}}" title="Sil" category-count="{{$category->articleCount()}}" class="btn btn-sm btn-danger remove-click"><i class="fa fa-times text-white"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="deleteModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Kategoriyi Sil</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div id="Body" class="model-body">
                    <div class="alert alert-danger" id="articleAlert"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>
                    <form action="{{route('admin.category.delete')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" id="deleteId"/>
                        <button id="deleteButton" type="submit" class="btn btn-success" >Sil</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal" id="editModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Kategoriyi Düzenle</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="{{route('admin.category.update')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Kategory Adı</label>
                            <input type="text" id="category" class="form-control" name="category"/>
                            <input type="hidden" id="category_id" name="id"/>
                        </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>
                    <button type="submit" class="btn btn-success" >Kaydet</button>
                </div>
                    </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script>
    $(function (){
        $('.remove-click').click(function (){
            id=$(this)[0].getAttribute('category-id');
            count=$(this)[0].getAttribute('category-count');
            name=$(this)[0].getAttribute('category-name');
            if (id==1){
                $('#articleAlert').html(name+' kategorisi silinemez.');
                $('#deleteButton').hide();
                $('#Body').show();
                $('#deleteModal').modal();
                return;
            }
            $('#Body').hide();
            $('#deleteButton').show();
            $('#deleteId').val(id);
            if(count>0){
                $('#articleAlert').html('bu kategoriye ait '+count+' makale bulunmaktadır. Silmek istediğinizden emin misiniz ? ');
                $('#Body').show();
            }
            $('#deleteModal').modal();


        });


        $('.edit-click').click(function (){
           id=$(this)[0].getAttribute('category-id');
           $.ajax({
              type:'GET',
              url:'{{route('admin.category.getdata')}}',
              data:{id:id},
              success:function (data){
                  console.log(data);
                  $('#category').val(data.name);
                  $('#category_id').val(data.id);
                  $('#editModal').modal();

              }
           });
        });
    })
</script>
@endsection
