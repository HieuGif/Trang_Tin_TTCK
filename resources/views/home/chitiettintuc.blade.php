@extends('layout.index') @section('title',"$tintuc->TieuDe") @section('content')
@php use App\LoaiTin; @endphp
@php use App\TheLoai;
$theloai = TheLoai::orderBy('created_at','desc')->get(); @endphp
@php use App\BinhLuan;
 @endphp
@include('layout.menu')

<div class="container">
		<div class="headline bg0 flex-wr-sb-c p-rl-20 p-tb-8">
			<div class="f2-s-1 p-r-30 m-tb-6">
				<a href="trangchu" class="breadcrumb-item f1-s-3 cl9">
					Trang chủ
				</a>

				<a class="breadcrumb-item f1-s-3 cl9">
                Tin tức
				</a>

				<span class="breadcrumb-item f1-s-3 cl9">
                {{$tintuc->TieuDe}}
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


<section class="bg0 p-b-140 p-t-10" style="padding-bottom: 0px;">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-10 col-lg-8 p-b-30">
					<div class="p-r-10 p-r-0-sr991">
						<!-- Blog Detail -->
						<div class="p-b-70">
							<a href="loaitin/{{LoaiTin::find($tintuc['idLoaiTin'])->id}}/{{LoaiTin::find($tintuc['idLoaiTin'])->TenKhongDau}}.html" class="f1-s-10 cl2 hov-cl10 trans-03 text-uppercase">
                            {{LoaiTin::find($tintuc['idLoaiTin'])->Ten}}
							</a>

							<h3 class="f1-l-3 cl2 p-b-16 p-t-33 respon2">
                            {{$tintuc->TieuDe}}
							</h3>

							<div class="flex-wr-s-s p-b-40">
								<span class="f1-s-3 cl8 m-r-15">
									<a  class="f1-s-4 cl8 hov-cl10 trans-03">
                                    {{$tintuc->user->name}}
									</a>

									<span class="m-rl-3">-</span>

									<span>
                                    {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $tintuc->created_at)->format('H:i d/m/Y') }}
									</span>
								</span>

								<span class="f1-s-3 cl8 m-r-15">
                                {!! $tintuc->SoLuotXem !!} Views
								</span>

								<a  class="f1-s-3 cl8 hov-cl10 trans-03 m-r-15">
								{{$binhluan->count()}} Comment
								</a>
								
                                <p class="f1-s-11 cl6 p-b-25" ><b>
                                {!! $tintuc->TomTat !!}</b>
								</p>

							
							<p class="f1-s-11 cl6 p-b-25">
                           {!! $tintuc->NoiDung !!}
							</p>
							</div>


							<!-- Tag-->


							<!-- Share -->

                    <!-- Comments Form -->

                        @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                        @endif
						<!-- Leave a comment -->
						<div>
							<h4 class="f1-l-4 cl3 p-b-12">
								Bình luận tại đây
                            </h4>
                            @if(!Auth::user())
                            <a href="dangnhap" class="f1-s-13 cl8 p-b-40">
								 Hãy đăng nhập tài khoản trước khi bình luận  *
</a>
                            @endif
                            <form action="binhluan/{{$tintuc->id}}" method="post" role="form">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
								<textarea name="NoiDung" class="bo-1-rad-3 bocl13 size-a-15 f1-s-13 cl5 plh6 p-rl-18 p-tb-14 m-b-20" name="msg" placeholder="Comment..."></textarea>
                                @if(!Auth::user())
                                <button type="submit" disabled="disabled" class="size-a-17 bg2 borad-3 f1-s-12 cl0 hov-btn1 trans-03 p-rl-15 m-t-10">
									Gửi bình luận
								</button>
                                @else <button type="submit" class="size-a-17 bg2 borad-3 f1-s-12 cl0 hov-btn1 trans-03 p-rl-15 m-t-10">
									Gửi bình luận
								</button>
                                @endif
							</form>
                    <br>

                    @foreach($tintuc->binhluan as $cm)

                    <div class="media">
        <a class="pull-left " class="fa fa-user-circle-o" > 
            <span<i class="fa fa-user" aria-hidden="true"> </i> </span> 
        </a> 
        <div > 
            <h1 class="media-heading" style="font-size: 14px;"> {{ $cm->user->name}}</h1>
            <small>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $cm->created_at)->format('H:i d/m/Y')}}</small>
      			<h2 style="font-size: 14px;"> {{$cm->NoiDung}}</h2>
        </div>
        </div>
        @endforeach
						</div>


				</div>
				</div></div>





				<!-- Sidebar -->
				<div class="col-md-10 col-lg-4 p-b-30">
					<div class="p-l-10 p-rl-0-sr991 p-t-70">
						<!-- Category -->
						<div class="p-b-30">
							<div class="how2 how2-cl4 flex-s-c">
								<h3 class="f1-m-2 cl3 tab01-title">
									BẠN CÓ THỂ QUAN TÂM
								</h3>
							</div>

							<ul class="p-t-35">
                            @foreach( $tinlienquan as $tlq)
								<li class="flex-wr-sb-s p-b-30">
									<a href="tintuc/{{$tlq['id']}}/{{$tlq['TieuDeKhongDau']}}.html" class="size-w-10 wrap-pic-w hov1 trans-03">
										<img style="width:100px;height:80px;" src="public/upload/tintuc/{{$tlq['Hinh']}}" alt="IMG">
									</a>

									<div class="size-w-11">
										<h6 class="p-b-4">
											<a href="tintuc/{{$tlq['id']}}/{{$tlq['TieuDeKhongDau']}}.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                            {{Str::limit($tlq['TieuDe'],100)}}
											</a>
										</h6>

										<span class="cl8 txt-center p-b-24">
											<a class="f1-s-6 cl8 hov-cl10 trans-03">
                                            {{LoaiTin::find($tlq['idLoaiTin'])->Ten}}
											</a>

											<span class="f1-s-3 m-rl-3">
												-
											</span>

											<span class="f1-s-3">
                                            {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $tlq->created_at)->format('H:i d/m/Y') }}
											</span>
										</span>
									</div>
								</li>
                            @endforeach
							</ul>
						</div>

						<!-- Archive -->


						<!-- Popular Posts -->
						<div class="p-b-30">
							<div class="how2 how2-cl4 flex-s-c">
								<h3 class="f1-m-2 cl3 tab01-title">
									PHỔ BIẾN
								</h3>
							</div>

							<ul class="p-t-35">
                            @foreach($tinxemnhieunhat as $txn)
								<li class="flex-wr-sb-s p-b-30">
									<a href="tintuc/{{$txn['id']}}/{{$txn['TieuDeKhongDau']}}.html" class="size-w-10 wrap-pic-w hov1 trans-03">
										<img style="width:100px;height:80px;" src="public/upload/tintuc/{{$txn['Hinh']}}" alt="IMG">
									</a>

									<div class="size-w-11">
										<h6 class="p-b-4">
											<a href="tintuc/{{$txn['id']}}/{{$txn['TieuDeKhongDau']}}.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                            {{Str::limit($txn['TieuDe'],100)}}
											</a>
										</h6>

										<span class="cl8 txt-center p-b-24">
											<a  class="f1-s-6 cl8 hov-cl10 trans-03">
                                            {!!Str::limit($txn['SoLuotXem'])!!} View
											</a>

											<span class="f1-s-3 m-rl-3">
												-
											</span>

											<span class="f1-s-3">
                                            {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $txn->created_at)->format('H:i d/m/Y') }}
											</span>
										</span>
									</div>
								</li>

								@endforeach
							</ul>
						</div>

						<!-- Tag -->

					</div>
				</div>
			</div>
		</div>
	</section>


@endsection
