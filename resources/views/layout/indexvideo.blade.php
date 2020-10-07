@php use App\User; @endphp
@php use App\TheLoai; @endphp
@php use App\LoaiTin; @endphp
@php use App\Video; @endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>MAGNEWS | @yield('title') </title>
    <base href="{{asset('')}}">
    <!-- Favicon -->
   
    <link rel="icon" type="image/png" href="public/theme/images/icons/favicon.png"/>
    <!-- Stylesheet -->
    <link rel="stylesheet" href="public/videomag/style.css">

</head>

<!-- Load Facebook SDK for JavaScript -->
<!-- Load Facebook SDK for JavaScript -->
<body>

@include('layout.headervideo')


    @yield('content')


    <!-- Footer -->
    @include('layout.footervideo')

<!--===============================================================================================-->
<script src="public/videomag/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="public/videomag/js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="public/videomag/js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="public/videomag/js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="public/videomag/js/active.js"></script>


   

    @yield('script')
</body>

</html>
