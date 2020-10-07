 @extends('layout.index') @section('title',"$theloai->TieuDe") @section('content')
@php use App\TheLoai; @endphp
@php use App\LoaiTin; @endphp
@php use App\User; @endphp
<!-- Page Content -->
  @include('layout.menu')
  <div class="container">
		<div class="bg0 flex-wr-sb-c p-rl-20 p-tb-8">
			<div class="f2-s-1 p-r-30 m-tb-6">
				<a href="index.html" class="breadcrumb-item f1-s-3 cl9">
					Home
				</a>

				<a  class="breadcrumb-item f1-s-3 cl9">
					Thể loại
				</a>

				<a href="theloai/{{TheLoai::find($theloai['id'])->id}}/{{TheLoai::find($theloai['id'])->TenKhongDau}}.html" class="breadcrumb-item f1-s-3 cl9">
                {{TheLoai::find($theloai['id'])->Ten}}
				</a>
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
        {{TheLoai::find($theloai['id'])->Ten}}
		</h2>
	</div>

  <section class="bg0">
		<div class="container">
			<div class="row m-rl--1">
            @foreach($tintuc1 as $tt)
				<div class="col-12 p-rl-1 p-b-2">
					<div class="bg-img1 size-a-3 how1 pos-relative" style="background-image: url(public/upload/tintuc/{{$tt['Hinh']}});">
						<a href="tintuc/{{$tt['id']}}/{{$tt['TieuDeKhongDau']}}.html" class="dis-block how1-child1 trans-03"></a>

						<div class="flex-col-e-s s-full p-rl-25 p-tb-20">
							<a href="loaitin/{{LoaiTin::find($tt['idLoaiTin'])->id}}/{{LoaiTin::find($tt['idLoaiTin'])->TenKhongDau}}.html" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                            {{LoaiTin::find($tt['idLoaiTin'])->Ten}}
							</a>


							<h3 class="how1-child2 m-t-14 m-b-10">
								<a href="tintuc/{{$tt['id']}}/{{$tt['TieuDeKhongDau']}}.html" class="how-txt1 size-a-6 f1-l-1 cl0 hov-cl10 trans-03">
                                {!!Str::limit($tt['TieuDe'],100)!!}
								</a>
							</h3>

							<span class="how1-child2">
								<span class="f1-s-4 cl11">
                                {{User::find($tt['idUser'])->name}}
								</span>

								<span class="f1-s-3 cl11 m-rl-3">
									-
								</span>

								<span class="f1-s-3 cl11">
                                {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $tt['created_at'])->format('H:i d/m/Y') }}
								</span>
							</span>
						</div>
					</div>
				</div>
            @endforeach
            @foreach($tintuc2 as $tt)
				<div class="col-sm-6 col-md-3 p-rl-1 p-b-2">
					<div class="bg-img1 size-a-14 how1 pos-relative" style="background-image: url(public/upload/tintuc/{{$tt['Hinh']}});">
						<a href="tintuc/{{$tt['id']}}/{{$tt['TieuDeKhongDau']}}.html" class="dis-block how1-child1 trans-03"></a>

						<div class="flex-col-e-s s-full p-rl-25 p-tb-20">
							<a href="loaitin/{{LoaiTin::find($tt['idLoaiTin'])->id}}/{{LoaiTin::find($tt['idLoaiTin'])->TenKhongDau}}.html" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                            {{LoaiTin::find($tt['idLoaiTin'])->Ten}}
							</a>

							<h3 class="how1-child2 m-t-14">
								<a href="tintuc/{{$tt['id']}}/{{$tt['TieuDeKhongDau']}}.html" class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
                                {!!Str::limit($tt['TieuDe'],100)!!}
								</a>
							</h3>
						</div>
					</div>
				</div>

				@endforeach
			</div>
		</div>
	</section>


  <section class="bg0 p-t-110 p-b-25">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-10 col-lg-8 p-b-80">
					<div class="row">
                    @foreach($tintuc3 as $ttmn1)
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
							<!-- Item -->

						</div>

                        <div class="flex-wr-c-c m-rl--7 p-t-28">
							{{ $tintuc3->links() }}
					</div>


					<!-- Pagination -->



				</div>

				<div class="col-md-10 col-lg-4 p-b-80">
					<div class="p-l-10 p-rl-0-sr991">
						@foreach($slidetheloai as $sltl)
						<div class="flex-c-s">
							<a href="{{$sltl['Link']}}" target="_blank">
								<img class="max-w-full" src="public/upload/slide/{{$sltl['Hinh']}}" alt="IMG">
							</a>
						</div>
                        @endforeach
					</div>
				</div>
			</div>
		</div>
	</section>

    <!-- end Page Content -->
    @endsection
