@extends('layout.index') @section('title',"Đổi mật khẩu")@section('content')

<link rel="stylesheet" href="public/shopwise/assets/css/animate.css" />
    <link rel="stylesheet" href="public/shopwise/ssets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" />
    <link rel="stylesheet" href="public/shopwise/assets/css/all.min.css" />
    <link rel="stylesheet" href="public/shopwise/assets/css/ionicons.min.css" />
    <link rel="stylesheet" href="public/shopwise/assets/css/themify-icons.css" />
    <link rel="stylesheet" href="public/shopwise/assets/css/linearicons.css" />
    <link rel="stylesheet" href="public/shopwise/assets/css/flaticon.css" />
    <link rel="stylesheet" href="public/shopwise/assets/css/simple-line-icons.css" />
    <link rel="stylesheet" href="public/shopwise/assets/owlcarousel/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="public/shopwise/assets/owlcarousel/css/owl.theme.css" />
    <link rel="stylesheet" href="public/shopwise/assets/owlcarousel/css/owl.theme.default.min.css" />
    <link rel="stylesheet" href="public/shopwise/assets/css/magnific-popup.css" />
    <link rel="stylesheet" href="public/shopwise/assets/css/jquery-ui.css" />
    <link rel="stylesheet" href="public/shopwise/assets/css/slick.css" />
    <link rel="stylesheet" href="public/shopwise/assets/css/slick-theme.css" />
    <link rel="stylesheet" href="public/shopwise/assets/css/style.css" />
    <link rel="stylesheet" href="public/shopwise/assets/css/responsive.css" />

    <!-- slider -->
    <div class="row justify-content-center" style="padding-top: 15px;margin-right: 0px;">
                    <div class="col-xl-6 col-md-10" style="padding-bottom: 15px;">
                    <div class="login_wrap">
                            <div class="padding_eight_all bg-white">
                            <div class="heading_s1">
                <h3>Thông tin tài khoản</h3>

                    <!--kiem tra loi-->
                    @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err) {{$err}}
                        <br> @endforeach
                    </div>
                    @endif @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                    @endif
                    @if(session('thongbaoloi'))
                    <div class="alert alert-danger">
                        {{session('thongbaoloi')}}
                    </div>
                    @endif

                    <form action="doimatkhau" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <div class="form-group">
                            <label style="font-size: 16px">Họ tên</label>
                            <input style="font-size: 12px" type="text" class="form-control" placeholder="Username" name="name" aria-describedby="basic-addon1" readonly value="{{$user->name}}">
                        </div>
                        <div class="form-group">
                            <label style="font-size: 16px">Email</label>
                            <input  style="font-size: 12px" type="email" class="form-control" placeholder="Email" name="email" aria-describedby="basic-addon1" readonly value="{{$user->email}}">
                        </div>
                        <div class="form-group">
                            <label style="font-size: 16px">Mật khẩu cũ</label>
                            <input type="password" class="form-control password" name="old_password"  aria-describedby="basic-addon1" >
                        </div>
                        <div class="form-group">
                            <label style="font-size: 16px">Mật khẩu mới</label>
                            <input type="password" class="form-control password" name="password"  aria-describedby="basic-addon1" >
                        </div>
                        <div class="form-group">
                            <label style="font-size: 16px">Nhập lại mật khẩu</label>
                            <input style="font-size: 12px" type="password" class="form-control password" name="passwordAgain" aria-describedby="basic-addon1">
                        </div>
                        <div class="form-group">
                                        <button type="submit" class="btn btn-fill-out btn-block" name="login" style="font-size: 16px" onclick='return confirm("Bạn chắc muốn đổi mật khẩu ?")'>Xác nhận</button>
                            </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- end slide -->
</div>
<script src="public/shopwise/assets/js/jquery-1.12.4.min.js"></script>
    <script src="public/shopwise/assets/js/jquery-ui.js"></script>
    <script src="public/shopwise/assets/js/popper.min.js"></script>
	<script src="public/shopwise/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="public/shopwise/assets/owlcarousel/js/owl.carousel.min.js"></script>
	<script src="public/shopwise/assets/js/magnific-popup.min.js"></script>
    <script src="public/shopwise/assets/js/waypoints.min.js"></script>
    <script src="public/shopwise/assets/js/parallax.js"></script>
    <script src="public/shopwise/assets/js/jquery.countdown.min.js"></script>
    <script src="public/shopwise/assets/js/Hoverparallax.min.js"></script>
    <script src="public/shopwise/assets/js/jquery.countTo.js"></script>
    <script src="public/shopwise/assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="public/shopwise/assets/js/isotope.min.js"></script>
    <script src="public/shopwise/assets/js/jquery.appear.js"></script>
    <script src="public/shopwise/assets/js/jquery.parallax-scroll.js"></script>
    <script src="public/shopwise/assets/js/jquery.dd.min.js"></script>
    <script src="public/shopwise/assets/js/slick.min.js"></script>
    <script src="public/shopwise/assets/js/jquery.elevatezoom.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7TypZFTl4Z3gVtikNOdGSfNTpnmq-ahQ&amp;callback=initMap"></script>
    <script src="public/shopwise/assets/js/scripts.js"></script>

@endsection
