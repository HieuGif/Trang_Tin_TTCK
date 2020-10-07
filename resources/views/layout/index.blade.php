<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MAGNEWS | @yield('title') </title>

    <!-- Bootstrap Core CSS -->

    <base href="{{asset('')}}">
  <!--===============================================================================================-->
	<link rel="icon" type="image/png" href="public/theme/images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public/theme/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="public/theme/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="public/theme/fonts/fontawesome-5.0.8/css/fontawesome-all.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public/theme/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public/theme/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public/theme/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public/theme/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public/theme/css/util.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public/theme/css/main.css">
</head>
<!-- Load Facebook SDK for JavaScript -->
<!-- Load Facebook SDK for JavaScript -->
<body class="animsition">


@include('layout.header')


    @yield('content')


    <!-- Footer -->
    @include('layout.footer')

<!--===============================================================================================-->
    <script src="public/theme/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="public/theme/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="public/theme/vendor/bootstrap/js/popper.js"></script>
	<script src="public/theme/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="public/theme/js/main.js"></script>


    <script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5e9c585f69e9320caac53883/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>


    @yield('script')
</body>

</html>
