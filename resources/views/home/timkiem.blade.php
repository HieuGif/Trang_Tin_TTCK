 @extends('layout.index')@section('title',"$tukhoa") @section('content')
 @php use App\LoaiTin; @endphp
@php use App\TheLoai; @endphp
@php use App\TinTuc; @endphp
@php use App\User; @endphp


@include('layout.menu')
<div class="container">
		<div class="bg0 flex-wr-sb-c p-rl-20 p-tb-8">
			<div class="f2-s-1 p-r-30 m-tb-6">
				<a class="breadcrumb-item f1-s-3 cl9">
					Tìm kiếm
				</a>

				<span class="breadcrumb-item f1-s-3 cl9">
            {{$tukhoa}}
				</span>
			</div>

	
         <form class="form-inline my-2 my-lg-0" action="timkiem" method="get"role="search">
			<div class="pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6" action="timkiem" method="get" role="search">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
				<input class="f1-s-1 cl6 plh9 s-full p-l-25 p-r-45" type="text" name="tukhoa" name="search" placeholder="Search">
				<button class="flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03" type="submit">
					<i class="zmdi zmdi-search"></i>
				</button>
			</div>
            </form>
		
		</div>
	</div>

<!-- Page Content -->
<div class="container p-t-4 p-b-40" style="padding-bottom: 0px;">
		<h2 class="f1-l-1 cl2">
      Tìm kiếm: "{{$tukhoa}}"
		</h2>
	</div>

	<!-- Post -->
	<section class="bg0 p-t-70 p-b-55">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-10 col-lg-8 p-b-80">
            
					<div class="row">
               @foreach($tintuc as $tt)
						<div class="col-sm-6 p-r-25 p-r-15-sr991">
							<!-- Item latest -->	
							<div class="m-b-45">
								<a href="tintuc/{{$tt['id']}}/{{$tt['TieuDeKhongDau']}}.html" class="wrap-pic-w hov1 trans-03">
									<img style = "height:250px;"src="public/upload/tintuc/{{$tt['Hinh']}}" alt="IMG">
								</a>

								<div class="p-t-16">
									<h5 class="p-b-5">
										<a href="tintuc/{{$tt['id']}}/{{$tt['TieuDeKhongDau']}}.html" class="f1-m-3 cl2 hov-cl10 trans-03">
                              {!!Str::limit($tt['TieuDe'],100)!!}
										</a>
									</h5>

									<span class="cl8">
										<a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
										{{User::find($tt['idUser'])->name}}
										</a>

										<span class="f1-s-3 m-rl-3">
											-
										</span>

										<span class="f1-s-3">
                              {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $tt['created_at'])->format('H:i d/m/Y') }}
										</span>
									</span>
								</div>
							</div>

						</div>
                  @endforeach
					
					</div>
             

					<!-- Pagination -->
					<div class="pagination justify-content-center">
				
					{{ $tintuc->appends(Request::all())->links() }}
					</div>
				</div>

				<div class="col-md-10 col-lg-4 p-b-80">
					<div class="p-l-10 p-rl-0-sr991">							
						<!-- Subscribe -->
						<div class="bg10 p-rl-35 p-t-28 p-b-35 m-b-50">
							<h5 class="f1-m-5 cl0 p-b-10">
								Phản Hồi Ý Kiến
							</h5>

							<a href="lienhe" target="_blank" class="f1-s-1 cl0 p-b-25">
								Ý kiến của bạn sẽ giúp chúng tôi cải thiện trải nghiệm người dùng hơn.
							</a>

						</div>


						<!-- Tag -->
						<div>
							<div class="how2 how2-cl4 flex-s-c m-b-30">
								<h3 class="f1-m-2 cl3 tab01-title">
									Tags
								</h3>
							</div>

							<div class="flex-wr-s-s m-rl--5">
							@foreach($tintuc as $tt)
								<a href="loaitin/{{LoaiTin::find($tt['idLoaiTin'])->id}}/{{LoaiTin::find($tt['idLoaiTin'])->TenKhongDau}}.html" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
								{{LoaiTin::find($tt['idLoaiTin'])->Ten}}
								</a>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

    @endsection
