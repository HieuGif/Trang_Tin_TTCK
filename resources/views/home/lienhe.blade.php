 @extends('layout.index')@section('title',"Liên hệ") @section('content')
 @php use App\TinTuc; @endphp
@php use App\User; @endphp
@php use App\TheLoai; @endphp
@php use App\LoaiTin; @endphp
@php use App\Video; @endphp
<!-- Page Content -->
<div class="container">
		<div class="headline bg0 flex-wr-sb-c p-rl-20 p-tb-8">
			<div class="f2-s-1 p-r-30 m-tb-6">
				<a href="/TrangTin" class="breadcrumb-item f1-s-3 cl9">
					Home
				</a>

				<span class="breadcrumb-item f1-s-3 cl9">
					Liên hệ
				</span>
			</div>

			<form class="form-inline my-2 my-lg-0" action="timkiem" method="get"role="search">
			<div class="pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6" action="timkiem" method="get" role="search">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
				<input class="f1-s-1 cl6 plh9 s-full p-l-25 p-r-45" type="text" name="tukhoa"name="search" placeholder="Search">
				<button class="flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03" type="submit">
					<i class="zmdi zmdi-search"></i>
				</button>
			</div>
            </form>
		</div>
	</div>

	<!-- Page heading -->
	<div class="container p-t-4 p-b-40">
		<h2 class="f1-l-1 cl2">
			Phản Hồi Ý Kiến
		</h2>
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
	</div>


	<!-- Content -->
	
	<section class="bg0 p-b-60">
		<div class="container">
			<div class="row justify-content-center">
			@if(Auth::user())
				<div class="col-md-7 col-lg-8 p-b-80">
					<div class="p-r-10 p-r-0-sr991">
						<form action="lienhe" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
							<input class="bo-1-rad-3 bocl13 size-a-19 f1-s-13 cl5 plh6 p-rl-18 m-b-20" type="text" name="name"   value="{{Auth::user()->name}}">

							<input class="bo-1-rad-3 bocl13 size-a-19 f1-s-13 cl5 plh6 p-rl-18 m-b-20" type="text" name="email"  value="{{Auth::user()->email}}">

							<textarea class="bo-1-rad-3 bocl13 size-a-15 f1-s-13 cl5 plh6 p-rl-18 p-tb-14 m-b-20" name="NoiDung" placeholder="Your Message"></textarea>

							<button type="submit" class="size-a-20 bg2 borad-3 f1-s-12 cl0 hov-btn1 trans-03 p-rl-15 m-t-20">
								Send
							</button>
						</form>
					</div>
				</div>
				@elseif(!Auth::user())
				<div class="col-md-7 col-lg-8 p-b-80">
					<div class="p-r-10 p-r-0-sr991">
						<form action="lienhe" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
							<input class="bo-1-rad-3 bocl13 size-a-19 f1-s-13 cl5 plh6 p-rl-18 m-b-20" type="text" name="name" placeholder="Tên*">

							<input class="bo-1-rad-3 bocl13 size-a-19 f1-s-13 cl5 plh6 p-rl-18 m-b-20" type="text" name="email" placeholder="Email*"  >

							<textarea class="bo-1-rad-3 bocl13 size-a-15 f1-s-13 cl5 plh6 p-rl-18 p-tb-14 m-b-20" name="NoiDung" placeholder="Nội Dung"></textarea>

							<button type="submit" class="size-a-20 bg2 borad-3 f1-s-12 cl0 hov-btn1 trans-03 p-rl-15 m-t-20">
								Send
							</button>
						</form>
					</div>
				</div>
@endif

				<!-- Sidebar -->
				<div class="col-md-5 col-lg-4 p-b-80">
					<div class="p-l-10 p-rl-0-sr991">
						<!-- Popular Posts -->
						<div>
							<div class="how2 how2-cl4 flex-s-c">
								<h3 class="f1-m-2 cl3 tab01-title">
									Recent Post
								</h3>
							</div>
 							@foreach($vuaqua as $vq)
							<ul class="p-t-35">
								<li class="flex-wr-sb-s p-b-30">
									<a href="#" class="size-w-10 wrap-pic-w hov1 trans-03">
										<img src="public/upload/tintuc/{{$vq['Hinh']}}" alt="IMG">
									</a>

									<div class="size-w-11">
										<h6 class="p-b-4">
											<a href="blog-detail-02.html" class="f1-s-5 cl3 hov-cl10 trans-03">
											{!!Str::limit($vq['TieuDe'])!!}
											</a>
										</h6>

										<span class="cl8 txt-center p-b-24">
											<a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
											{{User::find($vq['idUser'])->name}}
											</a>

											<span class="f1-s-3 m-rl-3">
												-
											</span>

											<span class="f1-s-3">
											{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $vq['created_at'])->format('H:i d/m/Y') }}
											</span>
										</span>
									</div>
								</li>
							</ul>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	else
	
@endsection
