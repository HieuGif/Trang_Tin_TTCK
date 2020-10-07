@extends('layout.index') @section('title',"Trang chủ")
@section('content')
@php use App\TinTuc; @endphp
@php use App\User; @endphp
@php use App\TheLoai; @endphp
@php use App\LoaiTin; @endphp
@php use App\Video; @endphp

<!-- Page Content -->


     @include('layout.menu')
     <div class="container">
        <div class="bg0 flex-wr-sb-c p-rl-20 p-tb-8">
            <div class="f2-s-1 p-r-30 size-w-0 m-tb-6 flex-wr-s-c">
				<span class="text-uppercase cl2 p-r-8">
					Trending Now:
				</span>

				<span class="dis-inline-block cl6 slide100-txt pos-relative size-w-0" data-in="fadeInDown" data-out="fadeOutDown">
                @foreach($trend as $trend)
					<span class="dis-inline-block slide100-txt-item animated visible-false">
                    {!!Str::limit($trend['TieuDe'],160)!!}
					</span>
                    @endforeach
				</span>
            </div>
            <div class="bg0 flex-wr-sb-c p-rl-20 p-tb-8">
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
    </div>

    <section class="bg0">
		<div class="container">
			<div class="row m-rl--1">
            @foreach($tintuc1 as $ttnb1)
				<div class="col-md-6 p-rl-1 p-b-2">
					<div class="bg-img1 size-a-3 how1 pos-relative" style="background-image: url(public/upload/tintuc/{{$ttnb1['Hinh']}});">
						<a href="tintuc/{{$ttnb1['id']}}/{{$ttnb1['TieuDeKhongDau']}}.html" class="dis-block how1-child1 trans-03"></a>

						<div class="flex-col-e-s s-full p-rl-25 p-tb-20">
							<a href="loaitin/{{LoaiTin::find($ttnb1['idLoaiTin'])->id}}/{{LoaiTin::find($ttnb1['idLoaiTin'])->TenKhongDau}}.html" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                            {{LoaiTin::find($ttnb1['idLoaiTin'])->Ten}}
							</a>

							<h3 class="how1-child2 m-t-14 m-b-10">
								<a href="tintuc/{{$ttnb1['id']}}/{{$ttnb1['TieuDeKhongDau']}}.html" class="how-txt1 size-a-6 f1-l-1 cl0 hov-cl10 trans-03">
                                {!!Str::limit($ttnb1['TieuDe'])!!}
								</a>
							</h3>

							<span class="how1-child2">
								<span class="f1-s-4 cl11">
                                {{User::find($ttnb1['idUser'])->name}}

								</span>

								<span class="f1-s-3 cl11 m-rl-3">
									-
								</span>

								<span class="f1-s-3 cl11">
                                {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $ttnb1['created_at'])->format('H:i d/m/Y') }}
								</span>
							</span>
						</div>

					</div>
				</div>
                @endforeach

                <div class="col-md-6 p-rl-1">
					<div class="row m-rl--1">
                        @foreach($tintuc2 as $ttnb2)
						<div class="col-12 p-rl-1 p-b-2">
							<div class="bg-img1 size-a-4 how1 pos-relative" style="background-image: url(public/upload/tintuc/{{$ttnb2['Hinh']}});">
								<a href="tintuc/{{$ttnb2['id']}}/{{$ttnb2['TieuDeKhongDau']}}.html" class="dis-block how1-child1 trans-03"></a>

								<div class="flex-col-e-s s-full p-rl-25 p-tb-24">
									<a href="loaitin/{{LoaiTin::find($ttnb2['idLoaiTin'])->id}}/{{LoaiTin::find($ttnb2['idLoaiTin'])->TenKhongDau}}.html" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                                    {{LoaiTin::find($ttnb2['idLoaiTin'])->Ten}}
									</a>

									<h3 class="how1-child2 m-t-14">
										<a href="tintuc/{{$ttnb2['id']}}/{{$ttnb2['TieuDeKhongDau']}}.html" class="how-txt1 size-a-7 f1-l-2 cl0 hov-cl10 trans-03">
                                        {!!Str::limit($ttnb2['TieuDe'])!!}
										</a>
									</h3>
								</div>
							</div>
						</div>
                        @endforeach
                        @foreach($tintuc3 as $ttnb3)
						<div class="col-sm-6 p-rl-1 p-b-2">
							<div class="bg-img1 size-a-5 how1 pos-relative" style="background-image: url(public/upload/tintuc/{{$ttnb3['Hinh']}});">
								<a href="tintuc/{{$ttnb3['id']}}/{{$ttnb3['TieuDeKhongDau']}}.html" class="dis-block how1-child1 trans-03"></a>

								<div class="flex-col-e-s s-full p-rl-25 p-tb-20">
									<a href="loaitin/{{LoaiTin::find($ttnb3['idLoaiTin'])->id}}/{{LoaiTin::find($ttnb3['idLoaiTin'])->TenKhongDau}}.html" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                                    {{LoaiTin::find($ttnb3['idLoaiTin'])->Ten}}
									</a>

									<h3 class="how1-child2 m-t-14">
										<a href="tintuc/{{$ttnb3['id']}}/{{$ttnb3['TieuDeKhongDau']}}.html" class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
                                        {!!Str::limit($ttnb3['TieuDe'])!!}
									</a>
										</a>
									</h3>
								</div>
							</div>
						</div>
                        @endforeach

					</div>
				</div>
			</div>
		</div>
	</section>




   <!-- slider -->
   <section class="bg0 p-t-60 p-b-35" style="padding-bottom: 0px;">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-10 col-lg-8 p-b-20">
					<div class="how2 how2-cl4 flex-s-c m-r-10 m-r-0-sr991">
						<h3 class="f1-m-2 cl3 tab01-title">
							MỚI NHẤT
						</h3>
					</div>

					<div class="row p-t-35">
                        @foreach($tintucmoinhat as $ttmn1)
						<div class="col-sm-6 p-r-25 p-r-15-sr991">
							<!-- Item latest -->
							<div class="m-b-45">
								<a href="tintuc/{{$ttmn1['id']}}/{{$ttmn1['TieuDeKhongDau']}}.html" class="wrap-pic-w hov1 trans-03">
									<img style="height:150px;" src="public/upload/tintuc/{{$ttmn1['Hinh']}}" alt="IMG">
								</a>

								<div class="p-t-16">
									<h5 class="p-b-5">
										<a href="tintuc/{{$ttmn1['id']}}/{{$ttmn1['TieuDeKhongDau']}}.html" class="f1-m-3 cl2 hov-cl10 trans-03">
                                        {!!Str::limit($ttmn1['TieuDe'],100)!!}
										</a>
									</h5>

									<span class="cl8">
										<a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                        {{User::find($ttmn1['idUser'])->name}}
										</a>

										<span class="f1-s-3 m-rl-3">
											-
										</span>

										<span class="f1-s-3">
										{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $ttmn1['created_at'])->format('H:i d/m/Y') }}
										</span>
									</span>
								</div>
							</div>
						</div>
                        @endforeach
					</div>
				</div>

				<div class="col-md-10 col-lg-4">
					<div class="p-l-10 p-rl-0-sr991 p-b-20">
						<!-- Video -->
						<div class="p-b-55">
							<div class="how2 how2-cl4 flex-s-c m-b-35">
								<h3 class="f1-m-2 cl3 tab01-title"><a href="trangchuvideo" style="color:#333;">
									 VIDEO</a>
								</h3>
							</div>
                            @foreach($video1 as $vd1)
							<div style="padding-bottom: 5px;">

								<div class="wrap-pic-w pos-relative"style="height: 184px;">
                                    <video controls class="w-100 rounded">
                                        <source src="public/upload/video/{{$vd1['Video']}}" type="video/mp4" type="video/ogg" type="video/webm" ></source>
                                    </video>
                                     <a href="video/{{$vd1['id']}}/{{$vd1['TieuDeKhongDau']}}.html">
								    </div>

								    <div class="p-tb-16 p-rl-25 bg3">
									<h5 class="p-b-5">
										<a href="video/{{$vd1['id']}}/{{$vd1['TieuDeKhongDau']}}.html" class="f1-m-3 cl0 hov-cl10 trans-03">
                                        {!!Str::limit($vd1['TieuDe'],100)!!}
										</a>
									</h5>

									<span class="cl15">
										<a href="" class="f1-s-4 cl8 hov-cl10 trans-03">
                                        {{User::find($vd1['idUser'])->name}}
										</a>

										<span class="f1-s-3 m-rl-3">
											-
										</span>

										<span class="f1-s-3">
                                        {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $vd1['created_at'])->format('H:i d/m/Y') }}
										</span>
									</span>
								</div>

							</div>
                            @endforeach
						</div>

						<!-- Tag -->
						<div class="p-b-55">
							<div class="how2 how2-cl4 flex-s-c m-b-30">
								<h3 class="f1-m-2 cl3 tab01-title">
									TAG VIDEO
								</h3>
							</div>

							<div class="flex-wr-s-s m-rl--5">
                            @foreach($theloai as $tl)
                            @if(count($tl->video) > 3 )
								<a href="theloaivideo/{{$tl->id}}/{{$tl->TenKhongDau}}.html" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                {{$tl->Ten}}
								</a>
                                @endif @endforeach
							</div>
						</div>
					</div>
				</div>

</div>
        </section >


        <div class="container" style="padding-bottom: 50px;">
    @foreach($slide1 as $sl1)
		<div class="flex-c-c">
			<a href="{{$sl1['Link']}}" target="_blank">
				<img class="max-w-full" src="public/upload/slide/{{$sl1['Hinh']}}" alt="IMG">
			</a>
		</div>
        @endforeach
	</div>

	<section>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-10 col-lg-8">
					<div class="p-b-20">

                        @foreach($theloai as $tl)

                             @if(count($tl ->tintuc) > 4)
						<div class="tab01 p-b-20">

							<div class="tab01-head how2 how2-cl1 bocl12 flex-s-c m-r-10 m-r-0-sr991">
								<!-- Brand tab -->

								<h3 class="f1-m-2 cl12 tab01-title"><a href="theloai/{{$tl->id}}/{{$tl->TenKhongDau}}.html">
									{{$tl->Ten}}
                                    </a>
								</h3>

								<!-- Nav tabs -->

								<ul class="nav nav-tabs" role="tablist">
                                 @foreach($tl->loaitin as $lt)
                                 @if(count($lt ->tintuc) > 4)
									<li class="nav-item">

										<a class="nav-link active" href="loaitin/{{$lt->id}}/{{$lt->TenKhongDau}}.html" >{{$lt->Ten}}</a>

                                    </li>
                                   @endif @endforeach

                                    <li class="nav-item-more dropdown dis-none">
										<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
											<i class="fa fa-ellipsis-h"></i>
										</a>

										<ul class="dropdown-menu">

										</ul>
									</li>
								</ul>


                                    <!--  -->
								    <a href="theloai/{{$tl->id}}/{{$tl->TenKhongDau}}.html" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
									View all
									<i class="fs-12 m-l-5 fa fa-caret-right"></i>
								    </a>

							</div>

                            <?php
                            //lay 5 tin tuc noi bat hien thi
                            $data=$tl->tintuc->where('KichHoat',1)->sortByDesc('created_at')->take(12);
                              //lay 1 tin hien thi ben phai => data con 4 tin --- ham shift tra ve kieu mang
                              $tintuc1=$data->slice(0,1);
                             $tintuc2=$data->slice(1,3);
                             ?>
							<!-- Tab panes -->
							<div class="tab-content p-t-35">
								<!-- - -->
								<div class="tab-pane fade show active" id="tab1-1" role="tabpanel">
                                @foreach($tintuc1 as $tt1)
									<div class="row">
										<div class="col-sm-6 p-r-25 p-r-15-sr991">
											<!-- Item post -->
											<div class="m-b-30">
												<a href="tintuc/{{$tt1['id']}}/{{$tt1['TieuDeKhongDau']}}.html" class="wrap-pic-w hov1 trans-03">
													<img src="public/upload/tintuc/{{$tt1['Hinh']}}" alt="IMG">
												</a>

												<div class="p-t-20">
													<h5 class="p-b-5">
														<a href="tintuc/{{$tt1['id']}}/{{$tt1['TieuDeKhongDau']}}.html" class="f1-m-3 cl2 hov-cl10 trans-03">
                                                        {!!Str::limit($tt1['TieuDe'])!!}
														</a>
													</h5>

													<span class="cl8">
														<a href="loaitin/{{LoaiTin::find($tt1['idLoaiTin'])->id}}/{{LoaiTin::find($tt1['idLoaiTin'])->TenKhongDau}}.html" class="f1-s-4 cl8 hov-cl10 trans-03">
                                                        {{LoaiTin::find($tt1['idLoaiTin'])->Ten}}
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
                                                        {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $tt1['created_at'])->format('H:i d/m/Y') }}
														</span>
													</span>
												</div>
											</div>
										</div>

										<div class="col-sm-6 p-r-25 p-r-15-sr991">
											<!-- Item post -->
                                            @foreach($tintuc2 as $tt2)
											<div class="flex-wr-sb-s m-b-30">
												<a href="tintuc/{{$tt2['id']}}/{{$tt2['TieuDeKhongDau']}}.html" class="size-w-1 wrap-pic-w hov1 trans-03">
													<img src="public/upload/tintuc/{{$tt2['Hinh']}}" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="tintuc/{{$tt2['id']}}/{{$tt2['TieuDeKhongDau']}}.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                        {!!Str::limit($tt2['TieuDe'],100)!!}
														</a>
													</h5>

													<span class="cl8">
														<a href="loaitin/{{LoaiTin::find($tt2['idLoaiTin'])->id}}/{{LoaiTin::find($tt2['idLoaiTin'])->TenKhongDau}}.html" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                        {{LoaiTin::find($tt2['idLoaiTin'])->Ten}}
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
                                                        {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $tt2['created_at'])->format('H:i d/m/Y') }}
														</span>
													</span>
												</div>
											</div>

                                            @endforeach
										</div>
                                        </div>
									</div>

								</div>
                                @endforeach

						</div>
                        @endif @endforeach
						<!-- Business -->
                        </div>
                    </div>



                <div class="col-md-10 col-lg-4">
					<div class="p-l-10 p-rl-0-sr991 p-b-20">
						<!--  -->
						<div>
							<div class="how2 how2-cl4 flex-s-c">
								<h3 class="f1-m-2 cl3 tab01-title">
									PHỔ BIẾN
								</h3>
							</div>

							<ul class="p-t-35">
                            @php $count = 1; @endphp  @foreach( $tintucphobien as $tt)
								<li class="flex-wr-sb-s p-b-22">
									<div class="size-a-8 flex-c-c borad-3 size-a-8 bg9 f1-m-4 cl0 m-b-6">
										{{$count++}}
									</div>

									<a href="tintuc/{{$tt['id']}}/{{$tt['TieuDeKhongDau']}}.html" class="size-w-3 f1-s-7 cl3 hov-cl10 trans-03">
                                    {!!Str::limit($tt['TieuDe'],100)!!}
									</a>
								</li>
                            @endforeach

							</ul>
						</div>

						<!--  -->
                        @foreach($slide2 as $sl2)
						<div class="flex-c-s p-t-8">
							<a href="{{$sl2['Link']}}" target="_blank">
								<img class="max-w-full" src="public/upload/slide/{{$sl2['Hinh']}}" alt="IMG">
							</a>
						</div>
            @endforeach
						<!--  -->
						
					</div>
				</div>


                </div>
		</div>
	</section>




@endsection
