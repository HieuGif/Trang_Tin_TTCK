
<header>
		<div class="container-menu-desktop">
			<div class="topbar">
				<div class="content-topbar container h-100">
					
					<div class="right-topbar">
						
					</div>
					<div class="left-topbar">
						<a href="lienhe" class="left-topbar-item">
							Liên hệ
						</a>
                        @if(!Auth::check())
						<a href="dangky" class="left-topbar-item">
							Đăng ký
						</a>

						<a href="dangnhap" class="left-topbar-item">
							Đăng nhập
						</a>
                    <ul class="main-menu">

                        @elseif(Auth::user()->kichhoat == "1")

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

        <div class="wrap-logo container">
				<!-- Logo desktop -->
				<div class="logo">
					<a href="/TrangTin"><img src="public/theme/images/icons/logo-01.png" alt="LOGO"></a>
				</div>
                <div class=" container">
					<a  class="weatherwidget-io" href="https://forecast7.com/en/10d82106d63/ho-chi-minh-city/" data-label_1="HO CHI MINH CITY" data-label_2="WEATHER" data-font="Times New Roman" data-theme="pure" >HO CHI MINH CITY WEATHER</a>
                    <script>
                    !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
                    </script>
                </div>
    </div>
    </div>
				<!-- Banner -->




</header>
