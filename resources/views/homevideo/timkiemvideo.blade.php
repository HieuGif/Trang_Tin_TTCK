 @extends('layout.indexvideo') @section('title',) @section('content')
@php use App\TheLoai; @endphp
@php use App\LoaiTin; @endphp
@php use App\User; @endphp
<!-- Page Content -->

@include('layout.menuvideo')



  <section class="catagory-area"style="padding-top: 15px;">
        <div class="container">
            <div class="row">
            <h2 class="f1-l-1 cl2">
      Tìm kiếm: "{{$tukhoa}}"
		</h2>
	</div>
                <div class="col-12 col-lg-8">

                    <div class="row">
                    @foreach( $video as $vd)
                        <!-- Single Blog Post -->
                        <div class="col-md-6">
                            <div class="single-blog-post style2 mb-50">
                                <div class="blog-thumb mb-30">
                                    <img src="public/upload/hinhvideo/{{$vd['Hinh']}}" alt="">
                                    <!-- Play Button -->
                                    <a href="public/upload/video/{{$vd['Video']}}" class="video-play-btn style2"><i class="fa fa-play"></i></a>
                                </div>
                                <div class="blog-content">
                                    <a class="post-tag">{{TheLoai::find($vd['idTheLoai'])->Ten}}</a>
                                    <a href="video/{{$vd['id']}}/{{$vd['TieuDeKhongDau']}}.html" class="post-title">{!!Str::limit($vd['TieuDe'])!!}</a>
                                    <div class="post-meta">
                                        <a href="#"><img src="img/core-img/author2.png" alt=""> By {{User::find($vd['idUser'])->name}}</a>
                                        <a href="#"><img src="img/core-img/calendar2.png" alt=""> {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $vd['created_at'])->format('H:i d/m/Y') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
 
                    <!-- Pagination -->
                    <div class="row mb-100">
                        <div class="col-12">
                            <nav aria-label="Page navigation">
                                <ul class="pagination mt-50">
                                {{ $video->appends(Request::all())->links() }}
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
          
 
                        <!-- Single Sidebar Widget -->


                        <!-- Single Sidebar Widget -->


                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
