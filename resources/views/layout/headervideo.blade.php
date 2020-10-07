
<link rel="icon" type="image/png" href="public/images/icons/favicon.png"/>
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

<header class="header-area">
<div class="container-menu-desktop">
			<div class="topbar">
				<div class="content-topbar container h-100">
					
					<div class="right-topbar">
						
					</div>
					<div class="left-topbar">
						<a href="lienhe" class="left-topbar-item">
							Liên hệ
						</a>
                        @if(!Auth::user())
						<a href="dangky" class="left-topbar-item">
							Đăng ký
						</a>

						<a href="dangnhap" class="left-topbar-item">
							Đăng nhập
						</a>
                    <ul class="main-menu">

                        @elseif(Auth::user())



						<ul class="main-menu">

							<li class="main-menu-active">

                                    <a style="color:white;">{{Auth::user()->name}}</a>

								<ul class="sub-menu">
								@if(Auth::user()->quyen != "7")
									<li><a href="doimatkhau">Đổi mật khẩu</a></li>
									@endif
                                    <li><a href="dangxuat">Đăng xuất</a></li>

								</ul>

							</li>

                        </ul>
                    </ul>
                        @endif

                    </div>
				</div>
			</div>
        </div>

<!-- Top Header Area -->
<div class="top-header-area" style="background-color: #ff166200;">
	<div class="container-fluid h-100">
		<div class="row h-100 align-items-center">
			<div class="col-12 col-sm-4">
				<!-- Logo Area -->
				<div class="logo-area">
					<a href="/TrangTin"><img src="public/theme/images/icons/logo-01.png" alt=""></a>
				</div>
				
			</div>
			<div class="col-12 col-sm-8">
				<!-- Top Add Area -->
			
				<a  class="weatherwidget-io" href="https://forecast7.com/en/10d82106d63/ho-chi-minh-city/" data-label_1="HO CHI MINH CITY" data-label_2="WEATHER" data-font="Times New Roman" data-theme="pure" >HO CHI MINH CITY WEATHER</a>
                    <script>
                    !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
                    </script>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Navbar Area -->

<script src="public/theme/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="public/theme/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="public/theme/vendor/bootstrap/js/popper.js"></script>
	<script src="public/theme/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="public/theme/js/main.js"></script>