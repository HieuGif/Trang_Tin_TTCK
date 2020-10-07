@php use App\LoaiTin;
$loaitin = LoaiTin::all() @endphp
@php use App\TheLoai;
$theloai = TheLoai::all() @endphp
<footer>
		<div class="bg2 p-t-40 p-b-25">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 p-b-20">
						<div class="size-h-3 flex-s-c">
							<a href="/TrangTin">
								<img class="max-s-full" src="public/theme/images/icons/logo-02.png" alt="LOGO">
							</a>
						</div>

						<div>
							<p class="f1-s-1 cl11 p-b-16">
							Địa chỉ: 18 Ung Văn Khiêm, Phường Đông Xuyên, Thành phố Long Xuyên, An Giang
							</p>
							<p class="f1-s-1 cl11 p-b-16">
							Email: tothenow999@gmail.com
							</p>

							<p class="f1-s-1 cl11 p-b-16">
								Thắc mắc? Gọi (+84) 359668554
							</p>

							<div class="p-t-15">
								<a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
									<span class="fab fa-facebook-f"></span>
								</a>

								<a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
									<span class="fab fa-instagram"></span>
								</a>

								<a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
									<span class="fab fa-pinterest-p"></span>
								</a>

								<a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
									<span class="fab fa-vimeo-v"></span>
								</a>

								<a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
									<span class="fab fa-youtube"></span>
								</a>
							</div>
						</div>
					</div>

					<div class="col-sm-6 col-lg-4 p-b-20">
						<div class="size-h-3 flex-s-c">
							<h5 class="f1-m-7 cl0">
								HOT
							</h5>
						</div>

						<ul>
                        @foreach($tintuctop as $tttop)
							<li class="flex-wr-sb-s p-b-20">
								<a href="tintuc/{{$tttop['id']}}/{{$tttop['TieuDeKhongDau']}}.html" class="size-w-4 wrap-pic-w hov1 trans-03">
									<img src="public/upload/tintuc/{{$tttop['Hinh']}}" alt="IMG">
								</a>

								<div class="size-w-5">
									<h6 class="p-b-5">
										<a href="tintuc/{{$tttop['id']}}/{{$tttop['TieuDeKhongDau']}}.html" class="f1-s-5 cl11 hov-cl10 trans-03">
                                        {!!Str::limit($tttop['TieuDe'])!!}
										</a>
									</h6>

									<span class="f1-s-3 cl6">
                                    {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $tttop['created_at'])->format('H:i d/m/Y') }}
									</span>
								</div>
							</li>
                        @endforeach



						</ul>
					</div>

					<div class="col-sm-6 col-lg-4 p-b-20">
						<div class="size-h-3 flex-s-c">
							<h5 class="f1-m-7 cl0">
								THỂ LOẠI
							</h5>
						</div>

						<ul class="m-t--12">
                        @foreach($theloai as $tl)

                        @if(count($tl->tintuc) > 1)
							<li class="how-bor1 p-rl-5 p-tb-10">
								<a href="theloai/{{$tl->id}}/{{$tl->TenKhongDau}}.html" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
                                {{$tl->Ten}}
								</a>
							</li>
                            @endif @endforeach

						</ul>
					</div>
				</div>
			</div>
		</div>

		<div class="bg11">
			<div class="container size-h-4 flex-c-c p-tb-15">
				<span class="f1-s-1 cl0 txt-center">
					Copyright © 2018 

					<a href="#" class="f1-s-1 cl10 hov-link1"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				</span>
			</div>
		</div>
		</div>
	</footer>

	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<span class="fas fa-angle-up"></span>
		</span>
	</div>

	<!-- Modal Video 01-->
	<div class="modal fade" id="modal-video-01" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document" data-dismiss="modal">
			<div class="close-mo-video-01 trans-0-4" data-dismiss="modal" aria-label="Close">&times;</div>


		</div>
	</div>
<!-- Load Facebook SDK for JavaScript -->

