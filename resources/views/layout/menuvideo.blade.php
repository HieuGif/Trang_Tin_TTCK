@php use App\TheLoai;
$theloai = TheLoai::all();
 @endphp
@php use App\Video;
$video = Video::all();
 @endphp

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
    <link rel="icon" href="public/videomag/img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="public/videomag/style.css">

    <header class="header-area">

<div class="videomag-main-menu" id="sticker">
	<div class="classy-nav-container breakpoint-off">
		<div class="container-fluid">
			<!-- Menu -->
			<nav class="classy-navbar justify-content-between" id="videomagNav">

				<!-- Navbar Toggler -->
				<div class="classy-navbar-toggler">
					<span class="navbarToggler"><span></span><span></span><span></span></span>
				</div>

				<!-- Menu -->
				<div class="classy-menu">

					<!-- Close Button -->
					<div class="classycloseIcon">
						<div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
					</div>

					<!-- Nav Start -->
					
					<div class="classynav">
						<ul>
							<li class="active"><a href="trangchuvideo">Home</a></li>
							@foreach($theloai as $tl)
                 <!--kiem tra the loai co loai tin hay khong -->
                 @if(count($tl->video) > 3)
							<li><a href="theloaivideo/{{$tl->id}}/{{$tl->TenKhongDau}}.html">{{$tl->Ten}}</a></li>
							@endif @endforeach
						</ul>
					</div>
					
					<!-- Nav End -->
				</div>

				<!-- Top Search Area -->
				<div class="top-search-area" action="timkiem" method="get" role="search">
					<form action="timkiemvideo" method="get">
					<input type="hidden" name="_token" value="{{csrf_token()}}" />
						<input type="text" name="tukhoa" id="topSearch" name="tukhoa" placeholder="Search">
						<button type="submit" class="btn"><i class="fa fa-search" aria-hidden="true"></i></button>
					</form>
				</div>
			</nav>
		</div>
	</div>
</div>
</header>