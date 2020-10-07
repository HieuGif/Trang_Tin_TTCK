@extends('layout.indexvideo') @section('title',"$video->TieuDe") @section('content')
@php use App\user; @endphp
@php use App\TheLoai; @endphp

@include('layout.menuvideo')
<link rel="icon" href="img/core-img/favicon.ico">

<!-- Stylesheet -->
<link rel="stylesheet" href="public/videomag/style.css">


<section class="post-news-area">
        <!-- Video Content -->
        <div class="video-content-area mb-100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="single-blog-post style2">
                            <div class="blog-thumb mb-30">
                                <video controls style="width:1060px;">
                                <source src="public/upload/video/{{$video['Video']}}" type="video/mp4" type="video/ogg" type="video/webm">{{$video->Video}}</source>
                        </video>
                            </div>
                            <div class="blog-content d-flex justify-content-between align-items-end flex-wrap">
                                <div class="post--meta- mb-70">
                                    <a href="#" class="post-tag">{{TheLoai::find($video['idTheLoai'])->Ten}}</a>
                                    <h4 class="text-white">{{$video->TieuDe}}</h4>
                                    <div class="post-meta">
                                        <a href="#"><img src="public/videomag/img/core-img/author2.png" alt=""> By {{User::find($video['idUser'])->name}}</a>
                                        <a href="#"><img src="public/videomag/img/core-img/calendar2.png" alt="">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $video['created_at'])->format('H:i d/m/Y') }}</a>
                                        <a><img src="public/videomag/img/core-img/chat.png" alt=""> {{$binhluanvideo->count()}}</a>
                                <a><img src="public/videomag/img/core-img/view.png" alt="">{{$video['SoLuotXem']}} view</a>
                                    </div>
                                </div>
                                <!-- Like Dislike Share -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add Banner Area -->

        </div>

        <div class="container">
            <div class="row">
                <!-- Post Details Content Area -->
                <div class="col-12 col-lg-8">
                    <div class="post-details-content mb-100">
                        <div class="single-blog-post style2 mb-50">
                            <div class="blog-content">
                                <p>{!!$video->NoiDung!!}</p>

                            </div>
                        </div>
                    </div>

                    <div class="post-a-comment-area mb-100 clearfix">
                        <h3 class="mb-50">Đăng bình luận tại đây</h3>
                        @if(!Auth::user())
                            <a href="dangnhap" class="f1-s-13 cl8 p-b-40">
								 Hãy đăng nhập tài khoản trước khi bình luận  *
</a>
                            @endif
                        <!-- Reply Form -->
                        <div class="contact-form-area">
                        <form action="binhluanvideo/{{$video->id}}" method="post" role="form">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                <div class="row">
                                    <div class="col-12">
                                        <textarea name="NoiDung" class="form-control" id="message" cols="30" rows="10" placeholder="Message*" required></textarea>
                                    </div>
                                    <div class="col-12">
                                    @if(!Auth::user())
                                        <button class="btn videomag-btn mt-30" disabled="disabled" type="submit">Gửi bình luận</button>
                                        @else
                                        <button class="btn videomag-btn mt-30" type="submit">Gửi bình luận</button>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Comment Area Start -->
                    <div class="comment_area clearfix mb-100">
                        <h3 class="mb-50">Danh sách bình luận</h3>

                        <ol>
                            <!-- Single Comment Area -->

                            @foreach($video->binhluanvideo as $cm)

                            <!-- Single Comment Area -->
                            <li class="single_comment_area">
                                <!-- Comment Content -->
                                <div class="comment-content d-flex">
                                    <!-- Comment Author -->
                                    <div class="comment-author">
                                        <img src="public/videomag/img/bg-img/40.jpg" alt="author">
                                    </div>
                                    <!-- Comment Meta -->
                                    <div class="comment-meta">
                                        <div class="d-flex">
                                            <a  class="post-author">{{$cm->user->name}}</a>
                                            <a class="post-date">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $cm->created_at)->format('H:i d/m/Y')}}</a>

                                        </div>
                                        <p> {{$cm->NoiDung}}.</p>
                                    </div>
                                </div>
                            </li>@endforeach
                        </ol>
                    </div>
                </div>

                <!-- Sidebar Widget -->
                <div class="col-12 col-sm-9 col-md-6 col-lg-4">
                    <div class="sidebar-area mb-100">
                        <!-- Single Sidebar Widget -->

                        <!-- Single Sidebar Widget -->

                        <div class="single-widget-area mb-50">
                            <h2 class="widget-title">Phổ biến</h2>
                            @foreach($videoxemnhieunhat as $vd)
                            <!-- Single Blog Post -->
                            <div class="single-blog-post style4 d-flex mb-30">
                                <div class="blog-thumb">
                                    <img src="public/upload/hinhvideo/{{$vd['Hinh']}}" alt="">
                                    <!-- Play Button -->
                                    <a href="public/upload/video/{{$vd['Video']}}" class="video-play-btn style2"><i class="fa fa-play"></i></a>
                                </div>
                                <div class="blog-content">
                                    <a href="theloaivideo/{{$vd['id']}}/{{$vd['TieuDeKhongDau']}}.html" class="post-tag">{{TheLoai::find($vd['idTheLoai'])->Ten}}</a>
                                    <a href="video/{{$vd['id']}}/{{$vd['TieuDeKhongDau']}}.html" class="post-title">{!!Str::limit($vd['TieuDe'])!!}</a>
                                </div>
                            </div>
                            <!-- Single Blog Post -->
                            @endforeach
                            <!-- Single Blog Post -->
                        </div>
                        <!-- Single Sidebar Widget -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end Page Content -->@endsection
