 @extends('layout.indexvideo') @section('title',) @section('content')
@php use App\TheLoai; @endphp
@php use App\LoaiTin; @endphp
@php use App\User; @endphp
<!-- Page Content -->

@include('layout.menuvideo')



  <section class="catagory-area"style="padding-top: 15px;">
        <div class="container">
            <div class="row">
          
                <div class="col-12 col-lg-8">
               
                    <div class="row">
                    @foreach( $video as $vd)
                        <!-- Single Blog Post -->
                        <div class="col-md-6">
                            <div class="single-blog-post style2 mb-50">
                                <div class="blog-thumb mb-30">
                                    <img style=" height:300px;"  src="public/upload/hinhvideo/{{$vd['Hinh']}}" alt="">
                                    <!-- Play Button -->
                                    <a href="video/{{$vd['id']}}/{{$vd['TieuDeKhongDau']}}.html" class="video-play-btn style2"><i class="fa fa-play"></i></a>
                                </div>
                                <div class="blog-content">
                                    <a class="post-tag">{{TheLoai::find($vd['idTheLoai'])->Ten}}</a>
                                    <a href="video/{{$vd['id']}}/{{$vd['TieuDeKhongDau']}}.html" class="post-title">{!!Str::limit($vd['TieuDe'])!!}</a>
                                    <div class="post-meta">
                                        <a><img src="public/videomag/img/core-img/author2.png" alt=""> By {{User::find($vd['idUser'])->name}}</a>
                                        <a><img src="public/videomag/img/core-img/calendar2.png" alt=""> {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $vd['created_at'])->format('d/m/Y') }}</a>
                                        <a><img src="public/videomag/img/core-img/chat2.png" alt=""> {{$binhluanvideo->count()}}</a>
                                 <a><img src="public/videomag/img/core-img/view.png" alt="">{{$vd['SoLuotXem']}} view</a>
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
                                   {{$video->links()}}
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
          
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="sidebar-area mb-100">
                        <!-- Single Sidebar Widget -->
                        <div class="single-widget-area border-style mb-50">
                            <h2 class="widget-title">  {{TheLoai::find($theloai['id'])->Ten}}</h2>
                        </div>
                        <!-- Single Sidebar Widget -->
                        <div class="single-widget-area mb-50">
                            <h2 class="widget-title">XEM NHIỀU</h2>

                            @foreach( $videoxemnhieu as $vd)
                            <div class="single-blog-post style4 d-flex mb-30">
                                <div class="blog-thumb">
                                <img style="height:150px;"src="public/upload/hinhvideo/{{$vd['Hinh']}}" alt="">
                                    <!-- Play Button -->
                                    <a href="public/upload/video/{{$vd['Video']}}" class="video-play-btn style2"><i class="fa fa-play"></i></a>
                                </div>
                                <div class="blog-content">
                                    <a href="theloaivideo/{{$vd['id']}}/{{$vd['TieuDeKhongDau']}}.html" class="post-tag">{{TheLoai::find($vd['idTheLoai'])->Ten}}</a>
                                    <a href="video/{{$vd['id']}}/{{$vd['TieuDeKhongDau']}}.html" class="post-title">{!!Str::limit($vd['TieuDe'])!!}</a>
                                </div>
                            </div>
                            @endforeach

                            <!-- Single Blog Post -->

                        </div>

                        <!-- Single Sidebar Widget -->


                        <!-- Single Sidebar Widget -->


                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
