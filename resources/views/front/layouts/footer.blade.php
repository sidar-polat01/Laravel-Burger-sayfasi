</div>
</div>
<!-- Footer-->
<style>
    footer{
        background-color: #212d4c;
        display: flex;
    }
    .fas
    {
        background-color: white;
    }
    .ilet :hover{
        color: #0d6efd;
    }
    .small
    {
        opacity: 65%;
    }
    #kategory
    {
        background-color:#212d4c;
        color: white;
        font-size: 15px;
        margin-left: 150px;
        margin-right: 150px;
    }
    .kategori
    {
        background-color:#212d4c ;
        color: white;
        margin-left: 150px;
    }

</style>
<footer class="border-top">
    <div class="col-md-4" style="background-color:#212d4c ">
        <h2 class="kategori">Kategoriler</h2>
        <hr>
        @foreach($categories as $category)
            <a href="{{route('category',$category->slug)}}" id="kategory" class="list-group-item">{{$category->name}}</a>
        @endforeach
    </div>
    <div class="col-md-4" style="margin-top: 50px">
        <!--<img src="front/assets/img/icon.png" id="small" style="width: 30%; margin-left: 175px">-->
        <h1 style="color: white; text-align: center; justify-content: center; margin-top: 80px; opacity: 50%">Bi BURGER</h1>

        <div class="small text-center fst-italic text-white" style="margin-top: 200px">Copyright &copy; Sidar Polat 2021</div>
    </div>
    <div class="container col-md-4">
        <div class="row">
            <div class="text-center" style="display: flex; margin-top: 30px">
                <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
                <div class="text-white" style="margin-left: 20px; margin-top: 10px">+090 (534) 250 6263</div>
            </div>
            <div class="text-center ilet" style="display: flex; margin-top: 10px;">
                <a href="mailto:sidar.polat01@gmail.com">
                <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
                <!-- Make sure to change the email address in BOTH the anchor text and the link target below!-->

                </a>
                <div class="d-block text-white" style="margin-left: 20px; margin-top: 10px">sidar.polat01@gmail.com</div>
            </div>
            <div class="text-center sosyal" style="display: flex; margin-top: 10px">
                <a href="https://www.instagram.com/sidar_polat_swe/">
                    <i class="fab fa-instagram fa-3x mb-3 text-muted" style=": white"></i>

                </a>
                <div class="text-white" style="margin-left: 20px; margin-top: 10px">Instagram</div>
            </div>
        </div>
        </div>
    </div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="{{asset('front/')}}/js/scripts.js"></script>
</body>
</html>
