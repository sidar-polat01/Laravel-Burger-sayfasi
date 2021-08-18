@isset($categories)
    <style>
        .yan
        {
            padding: 0;
            margin-left: -10px;
        }
        #kate
        {
            background-image: url("https://i.pinimg.com/564x/d6/25/62/d6256221dc634a989a4e9db29f4b4e52.jpg");
        }
        #katego:hover
        {
            background-image: url("https://i.pinimg.com/564x/88/c9/89/88c9892c3c20e8dce90f845a67da3f13.jpg");
            color: white;
        }
    </style>
<div class="col-md-2 yan">
    <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action active" id="kate">
            Kategoriler
        </a>
        @foreach($categories as $category)
            <a href="{{route('category',$category->slug)}}" id="katego" class="list-group-item list-group-item-action">{{$category->name}}</a>
        @endforeach
    </div>
</div>
@endif

