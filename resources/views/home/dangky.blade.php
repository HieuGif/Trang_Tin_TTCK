@extends('layout.index')@section('title',"Đăng ký") @section('content')

<!-- Css -->
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
                    <div class="col-xl-6 col-md-10"style="padding-bottom: 15px;">
                    <div class="login_wrap">
                            <div class="padding_eight_all bg-white">
                            <div class="heading_s1"><h3>Đăng ký tài khoản</h3></div>


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

                    <form action="dangky" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <div class="form-group">
                            <label style="font-size: 14px">Họ tên</label>
                            <input style="font-size: 12px" type="text" class="form-control" placeholder="Họ và tên" name="name" aria-describedby="basic-addon1">
                        </div>

                        <div class="form-group">
                            <label style="font-size: 14px">Email</label>
                            <input style="font-size: 12px" type="email" class="form-control" placeholder="Email" name="email" aria-describedby="basic-addon1">
                        </div>

                        <div class="form-group">

                            <label style="font-size: 14px">Nhập mật khẩu</label>
                            <input style="font-size: 12px" type="password" class="form-control" name="password" aria-describedby="basic-addon1">
                        </div>

                        <div class="form-group">
                            <label style="font-size: 14px">Nhập lại mật khẩu</label>
                            <input style="font-size: 12px" type="password" class="form-control" name="passwordAgain" aria-describedby="basic-addon1">
                        </div>

                        <div class="form-group">
                                        <button type="submit" class="btn btn-fill-out btn-block" name="register" style="font-size: 16px">Đăng ký</button>
                                    </div>
                                    <div class="different_login">
                                    <span> or</span>
                                </div>
                                <ul class="btn-login list_none text-center">
                                <li><a href="{{ url('/auth/redirect/facebook') }}"class="btn btn-facebook"><i class="ion-social-facebook"></i>Facebook</a></li>
                                    <li><a href="{{url('/redirect')}}" class="btn btn-google"><i class="ion-social-googleplus"></i>Google</a></li>
                                </ul>
                        <div class="form-note text-center">Bạn đã có tài khoản? <a href="{{url('/dangnhap')}}">Đăng nhập</a></div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end slide -->
</div>
 <!--js-->
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
