<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">

    <title>Đăng nhập</title>
    <base href="{{asset('')}}">

    <!-- Bootstrap Core CSS -->
    <link href="public/admin_layout/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="public/admin_layout/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="public/admin_layout/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="public/admin_layout/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="public/shopwise/assets/css/animate.css" />
    <link rel="stylesheet" href="public/shopwise/assets/css/animate.css" />
    <link rel="stylesheet" href="public/shopwise/assets/bootstrap/css/bootstrap.min.css" />
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


</head>

<body>

<div class="login_register_wrap section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-md-10">
                        <div class="login_wrap">
                            <div class="padding_eight_all bg-white">
                                <div class="heading_s1">
                        <h3>Đăng nhập</h3>
                    </div>

                        @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err) {{$err}}
                            <br> @endforeach
                        </div>
                        @endif @if(session('thongbao'))
                        <div class="alert alert-danger">
                            {{session('thongbao')}}
                        </div>
                        @endif

                        <form role="form" action="admin" method="POST">
                            <fieldset>
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                <div class="form-group">
                                    <input type="text" style="font-size:16px" required=""class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" style="font-size:16px" required="" placeholder="Password" name="password" type="password" value="">
                                </div>
                            </fieldset>
                            <div class="form-action">
                                <p class="lost_password"> <a href="{{url('password/reset')}}" target="_blank">Quên mật khẩu</a></p>
                                <div class="form-group">
                                <button type="submit" style="font-size:16px" class="btn btn-lg btn-success btn-block">Đăng nhập</button>
                                </div>
                                </fieldset>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="public/admin_layout/bower_components/jquery/dist/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="public/admin_layout/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="public/admin_layout/bower_components/metisMenu/dist/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="public/admin_layout/dist/js/sb-admin-2.js"></script>

</body>

</html>
