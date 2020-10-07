@extends('layout.indexvideo') @section('title',"Video")
@section('content')
@php use App\TinTuc; @endphp
@php use App\User; @endphp
@php use App\TheLoai; @endphp
@php use App\LoaiTin; @endphp
@php use App\Video; @endphp
@include('layout.menuvideo')
<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
  
    <!-- ##### Header Area End ##### -->

    <!-- ##### Hero Area Start ##### -->
    <div class="hero-area d-flex flex-wrap">
    @foreach($videoall1 as $vd)
    
        <div class="hero-single-section">
            <!-- Single Welcome Post -->
            <div class="single-welcome-post bg-img item1 wow fadeInUp" data-wow-delay="600ms" style="background-image: url(public/upload/hinhvideo/{{$vd['Hinh']}});">
                <!-- Play Button -->
                <a href="video/{{$vd['id']}}/{{$vd['TieuDeKhongDau']}}.html" class="video-play-btn style2"><i class="fa fa-play"></i></a>
                <!-- Content -->
                <div class="welcome-post-content">
                    <!-- Single Blog Post -->
                    <div class="single-blog-post white">
                        <div class="blog-content">
                            <a href="#" class="post-tag">{{TheLoai::find($vd['idTheLoai'])->Ten}}</a>
                            <a href="video/{{$vd['id']}}/{{$vd['TieuDeKhongDau']}}.html" class="post-title"> {!!Str::limit($vd['TieuDe'],160)!!}</a>
                            <div class="post-meta">
                                <a> <img src="public/videomag/img/core-img/author.png" alt=""> By {{User::find($vd['idUser'])->name}}
</a>
                                <a> <img src="public/videomag/img/core-img/calender.png" alt=""> {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $vd['created_at'])->format('H:i d/m/Y') }}</a>
                                <a><img src="public/videomag/img/core-img/chat.png" alt=""> {{$binhluanvideo->count()}}</a>
                                <a>{{$vd['SoLuotXem']}} view</a>
             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @foreach($videoall2 as $vd)
        <div class="hero-single-section">
            <!-- Single Welcome Post -->
            <div class="single-welcome-post bg-img item2 wow fadeInUp" data-wow-delay="400ms" style="background-image: url(public/upload/hinhvideo/{{$vd['Hinh']}});">
                <!-- Content -->
                <div class="welcome-post-content">
                    <!-- Single Blog Post -->

                    <div class="single-blog-post white">
                        <div class="blog-content">
                            <acos class="post-tag">{{TheLoai::find($vd['idTheLoai'])->Ten}}</a>
                            <a href="video/{{$vd['id']}}/{{$vd['TieuDeKhongDau']}}.html" class="post-title">{!!Str::limit($vd['TieuDe'],160)!!}</a>
                            <div class="post-meta">
                                <a><img src="public/videomag/img/core-img/author.png" alt=""> {{User::find($vd['idUser'])->name}}</a>
                                <a><img src="public/videomag/img/core-img/calender.png" alt="">  {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $vd['created_at'])->format('H:i d/m/Y') }} </a>
                                <a><img src="public/videomag/img/core-img/chat.png" alt=""> {{$binhluanvideo->count()}}</a>
                                <a>{{$vd['SoLuotXem']}} view</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="hero-second-section d-flex flex-wrap">
                <!-- Single Welcome Post -->
                @foreach($videoall3 as $vd)
                <div class="single-welcome-post bg-img item3 wow fadeInUp" data-wow-delay="500ms" style="background-image: url(public/upload/hinhvideo/{{$vd['Hinh']}});">
                    <!-- Content -->
                    <div class="welcome-post-content">
                        <!-- Single Blog Post -->
                        <div class="single-blog-post style2 white">
                            <div class="blog-content">
                                <a href="#" class="post-tag">{{TheLoai::find($vd['idTheLoai'])->Ten}}</a>
                                <a href="video/{{$vd['id']}}/{{$vd['TieuDeKhongDau']}}.html" class="post-title">{!!Str::limit($vd['TieuDe'],160)!!}</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- Single Welcome Post -->
            </div>

        </div>
    </div>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Tabs Area Start ##### -->
    <div class="video-mag-tabs-area mt-50 wow fadeInUp" data-wow-delay="200ms">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="latest-tab" data-toggle="tab" href="#latest" role="tab" aria-controls="latest" aria-selected="true">MỚI NHẤT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="top-viewed-tab" data-toggle="tab" href="#top-viewed" role="tab" aria-controls="top-viewed" aria-selected="false">XEM NHIỀU</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="videos-tab" data-toggle="tab" href="#videos" role="tab" aria-controls="videos" aria-selected="false">TẤT CẢ</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="latest" role="tabpanel" aria-labelledby="latest-tab">
                            <div class="latest-videos-slide owl-carousel">

                            @foreach($videomoinhat as $vd)
                                <div class="single-blog-post style2">
                                    <div class="blog-thumb mb-30">
                                        <img style=" height:300px;" src="public/upload/hinhvideo/{{$vd['Hinh']}}" alt="">
                                        <!-- Play Button -->
                                        <a href="video/{{$vd['id']}}/{{$vd['TieuDeKhongDau']}}.html" class="video-play-btn style2"><i class="fa fa-play"></i></a>
                                    </div>
                                    <div class="blog-content">
                                        <a href="#" class="post-tag">{{TheLoai::find($vd['idTheLoai'])->Ten}}</a>
                                        <a href="video/{{$vd['id']}}/{{$vd['TieuDeKhongDau']}}.html" class="post-title">{!!Str::limit($vd['TieuDe'],160)!!}</a>
                                        <div class="post-meta">
                                            <a href="#"><img src="public/videomag/img/core-img/author2.png" alt=""> By {{User::find($vd['idUser'])->name}}</a>
                                            <a href="#"><img src="public/videomag/img/core-img/calendar2.png" alt=""> {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $vd['created_at'])->format('H:i d/m/Y') }} </a>
                                      
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                                <!-- Single Blog Post -->
                         

                            </div>
                        </div>
                        <div class="tab-pane fade" id="top-viewed" role="tabpanel" aria-labelledby="top-viewed-tab">
                            <div class="top-viewed-slide owl-carousel">
                            @foreach($videotop as $vd)
                                <!-- Single Blog Post -->
                                <div class="single-blog-post style2">
                                    <div class="blog-thumb mb-30">
                                        <img  style=" height:300px;" src="public/upload/hinhvideo/{{$vd['Hinh']}}" alt="">
                                        <!-- Play Button -->
                                        <a href="video/{{$vd['id']}}/{{$vd['TieuDeKhongDau']}}.html" class="video-play-btn style2"><i class="fa fa-play"></i></a>
                                    </div>
                                    <div class="blog-content">
                                        <a href="#" class="post-tag">{{TheLoai::find($vd['idTheLoai'])->Ten}}</a>
                                        <a href="video/{{$vd['id']}}/{{$vd['TieuDeKhongDau']}}.html" class="post-title">{!!Str::limit($vd['TieuDe'],160)!!}</a>
                                        <div class="post-meta">
                                            <a href="#"><img src="public/videomag/img/core-img/author2.png" alt=""> By {{User::find($vd['idUser'])->name}}</a>
                                            <a href="#"><img src="public/videomag/img/core-img/calendar2.png" alt=""> {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $vd['created_at'])->format('H:i d/m/Y') }}</a>
                                           
                                            <a href="#"><img src="public/videomag/img/core-img/like2.png" alt=""> {{$vd->SoLuotXem}}</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                                <!-- Single Blog Post -->
                            

                            </div>
                        </div>
                        <div class="tab-pane fade" id="videos" role="tabpanel" aria-labelledby="videos-tab">
                            <div class="videos-slide owl-carousel">
                            @foreach($videoall as $vd)
                                <!-- Single Blog Post -->
                                <div class="single-blog-post style2">
                                    <div class="blog-thumb mb-30">
                                        <img  style=" height:300px;" src="public/upload/hinhvideo/{{$vd['Hinh']}}" alt="">
                                        <!-- Play Button -->
                                        <a href="public/upload/video/{{$vd['Video']}}" class="video-play-btn style2"><i class="fa fa-play"></i></a>
                                    </div>
                                    <div class="blog-content">
                                        <a href="#" class="post-tag">{{TheLoai::find($vd['idTheLoai'])->Ten}}</a>
                                        <a href="video/{{$vd['id']}}/{{$vd['TieuDeKhongDau']}}.html" class="post-title">{!!Str::limit($vd['TieuDe'],160)!!}</a>
                                        <div class="post-meta">
                                            <a><img src="public/videomag/img/core-img/author2.png" alt=""> By {{User::find($vd['idUser'])->name}}</a>
                                            <a ><img src="public/videomag/img/core-img/calendar2.png" alt=""> {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $vd['created_at'])->format('H:i d/m/Y') }}</a>
    
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <!-- Single Blog Post -->
                            

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Tabs Area End ##### -->

    <!-- ##### Travel Videos Area Start ##### -->
  
    <!-- ##### Big Add Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    
</body>

@endsection
