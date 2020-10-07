
@php use App\LoaiTin;
$loaitin = LoaiTin::orderBy('created_at','desc')->get();
 @endphp
@php use App\TheLoai;
$theloai = TheLoai::orderBy('Ten','desc')->get();
 @endphp


			<!-- Header Mobile -->
			<header>
	<div class="container-menu-desktop">

			<div class="wrap-main-nav">
				<div class="main-nav">
					<!-- Menu desktop -->
					<nav class="menu-desktop">
						<a class="logo-stick" href="/TrangTin">
							<img src="public/theme/images/icons/logo-01.png" alt="LOGO">
						</a>

						<ul class="main-menu">
						@foreach($theloai as $tl)
                 <!--kiem tra the loai co loai tin hay khong -->
                 @if((count($tl->tintuc) > 4 ))
							<li>
								<a href="theloai/{{$tl->id}}/{{$tl->TenKhongDau}}.html">{{$tl->Ten}}</a>
								<ul class="sub-menu">
								@foreach($tl->loaitin as $lt)
                                @if(count($lt->tintuc) > 4)

									<li><a href="loaitin/{{$lt->id}}/{{$lt->TenKhongDau}}.html">{{$lt->Ten}}</a></li>
									@endif @endforeach
								</ul>
							</li>
							@endif  @endforeach

						</ul>
					</nav>
				</div>
			</div>
		</div>
	</header>