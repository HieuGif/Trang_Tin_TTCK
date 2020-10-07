 @extends('admin.layout.index') @section('title',"Tổng Quan")
@section('content')
@php
 use App\TinTuc;
 use App\TheLoai;
 use App\LoaiTin;
use App\Video;
use App\BinhLuan;
use App\BinhLuanVideo;
use App\User;
use App\Slide;@endphp
<div id="page-wrapper">
@if(Auth::user()->quyen != "5")
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header" style="margin-top: 20px;color:blue;">Tổng hợp
            </div>
        </div>
        <!-- /.col-lg-12 -->
        @php  $theloai = TheLoai::all();  @endphp
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="panel panel-primary">

                <div class="panel-header ">
                  <div class="panel-icon">
                    <i class="material-icons">Số lượng</i>
                  </div>
                  <p class="panel-category" style="text-align: center;">{{$theloai->count()}}</p>
                </div>
                <div class="panel-footer">
                  <div class="stats">
                  <a href="admin/theloai/danhsach">  <i class="material-icons text-danger">Thể Loại</i></a>

                  </div>
                </div>
              </div>
            </div>
            @php  $loaitin = LoaiTin::all();  @endphp
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="panel panel-primary">
                <div class="panel-header ">
                  <div class="panel-icon">
                    <i class="material-icons">Số lượng</i>
                  </div>
                  <p class="panel-category" style="text-align: center;">{{$loaitin->count()}}</p>
                  <h3 style="text-align: center;" class="panel-title"></h3>
                </div>
                <div class="panel-footer">
                  <div class="stats">
                  <a href="admin/loaitin/danhsach">   <i class="material-icons text-danger">Loại Tin</i></a>
                  </div>
                </div>
              </div>
            </div>
            @php  $tintuc = TinTuc::all();  @endphp
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="panel panel-primary">
                <div class="panel-header ">
                  <div class="panel-icon">
                    <i class="material-icons">Số lượng</i>
                  </div>
                  <p class="panel-category" style="text-align: center;">{{$tintuc->count()}}</p>
                  <h3 style="text-align: center;" class="panel-title"></h3>
                </div>
                <div class="panel-footer">
                  <div class="stats">
                  <a href="admin/tintuc/danhsach">  <i class="material-icons text-danger">Bài viết</i></a>
                  </div>
                </div>
              </div>
            </div>
            @php  $video = Video::all();  @endphp
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="panel panel-primary">
                <div class="panel-header">
                  <div class="panel-icon">Số lượng


                  <p class="panel-category" style="text-align: center;">{{$video->count()}}</p>
                 
                </div>
                <div class="panel-footer">
                  <div class="stats">
                  <a href="admin/video/danhsach">  <i class="material-icons text-danger">Video</i></a>
                  </div>
                </div>
              </div>
            </div>




    </div>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

        </div>
        <!-- /.col-lg-12 -->
        @php  $thanhvien = User::all();  @endphp
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="panel panel-primary">

                <div class="panel-header ">
                  <div class="panel-icon">
                    <i class="material-icons">Số lượng</i>
                  </div>
                  <p class="panel-category" style="text-align: center;">{{$thanhvien->count()}}</p>
                 
                  </h3>
                </div>
                <div class="panel-footer">
                  <div class="stats">
                  <a href="admin/thanhvien/danhsach">   <i class="material-icons text-danger">Thành viên</i></a>

                  </div>
                </div>
              </div>
            </div>
            @php  $binhluan = BinhLuan::all();  @endphp
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="panel panel-primary">
                <div class="panel-header ">
                  <div class="panel-icon">
                    <i class="material-icons">Số lượng</i>
                  </div>
                  <p class="panel-category" style="text-align: center;">{{$binhluan->count()}}</p>
                </div>
                <div class="panel-footer">
                  <div class="stats">
                  <a href="admin/binhluan/danhsach"><i class="material-icons text-danger">Bình luận bài viết</i></a>
                  </div>
                </div>
              </div>
            </div>
            @php  $binhluanvideo = BinhLuanVideo::all();  @endphp
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="panel panel-primary">
                <div class="panel-header ">
                  <div class="panel-icon">
                    <i class="material-icons">Số lượng</i>
                  </div>
                  <p style="text-align: center;" class="panel-category">{{$binhluanvideo->count()}}</p>
                  <h3 class="panel-title"></h3>
                </div>
                <div class="panel-footer">
                  <div class="stats">
                  <a href="admin/binhluanvideo/danhsach">  <i class="material-icons text-danger">Bình luận video</i></a>
                  </div>
                </div>
              </div>
            </div>
            @php  $slide = Slide::all();  @endphp
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="panel panel-primary">
                <div class="panel-header">
                  <div class="panel-icon">Số lượng


                  <p class="panel-category" style="text-align: center;">{{$slide->count()}}</p>
                </div>
                <div class="panel-footer">
                  <div class="stats">
                  <a href="admin/slide/danhsach">  <i class="material-icons text-danger">Slide quảng cáo</i></a>
                  </div>
                </div>
              </div>
            </div>




    </div>
    @endif
    @if(Auth::user()->quyen != "5")
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12"style="padding-left: 0px;">
                <h1 class="page-header" style="margin-top: 10px; color:red">Thông báo
            </div>
        <!-- /.col-lg-12 -->
        @php  $tintuc = TinTuc::where('KichHoat',0)->get();  @endphp
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="panel panel-danger">

                <div class="panel-header ">
                  <div class="panel-icon">
                    <i class="material-icons">Số lượng</i>
                  </div>
                  <p class="panel-category" style="text-align: center;">{{$tintuc->count()}}</p>
                </div>
                <div class="panel-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">Bài viết chưa duyệt</i>

                  </div>
                </div>
              </div>
            </div>
            @php  $video = Video::where('KichHoat',0)->get();  @endphp
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="panel panel-danger">
                <div class="panel-header ">
                  <div class="panel-icon">
                    <i class="material-icons">Số lượng</i>
                  </div>
                  <p class="panel-category" style="text-align: center;">{{$video->count()}}</p>
             
                </div>
                <div class="panel-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">Video chưa duyệt</i>
                  </div>
                </div>
              </div>
            </div>
            @php  $thanhvien = User::where('KichHoat',0)->get();  @endphp
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="panel panel-danger">
                <div class="panel-header ">
                  <div class="panel-icon">
                    <i class="material-icons">Số lượng</i>
                  </div>
                  <p style="text-align: center;" class="panel-category">{{$thanhvien->count()}}</p>
                </div>
                <div class="panel-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">Thành viên chưa duyệt</i>
                  </div>
                </div>
              </div>
            </div>
                  @php  $binhluan = BinhLuan::where('KichHoat',1)->get();  @endphp

            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="panel panel-danger">
                <div class="panel-header">
                  <div class="panel-icon">Số lượng

                  <p class="panel-category" style="text-align: center;">{{$binhluan->count()}}</p>

                </div>
                <div class="panel-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">Bình luận bài viết chưa duyệt</i>

                  </div>
                </div>
              </div>
            </div>
    </div>
  
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

        </div>
        <!-- /.col-lg-12 -->
        @php  $binhluanvideo = BinhLuanVideo::where('KichHoat',1)->get();  @endphp
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="panel panel-primary">

                <div class="panel-header ">
                  <div class="panel-icon">
                    <i class="material-icons">Số lượng</i>
                  </div>
                  <p class="panel-category" style="text-align: center;">{{$binhluanvideo->count()}}</p>

                  </h3>
                </div>
                <div class="panel-footer">
                  <div class="stats">
                  <a href="admin/thanhvien/danhsach">   <i class="material-icons text-danger">Bình luận video chưa duyệt</i></a>

                  </div>
                </div>
              </div>
            </div>
            





    </div>
    @endif
    

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12"style="padding-left: 0px;">
                <h1 class="page-header" style="margin-top: 20px;color:green;">Thống kê cá nhân
            </div>
        <!-- /.col-lg-12 -->
        @php  $tintuc = TinTuc::where('idUser', '=', Auth::id())->with('User')->get();  @endphp
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="panel panel-success">

                <div class="panel-header ">
                  <div class="panel-icon">
                    <i class="material-icons">Số lượng</i>
                  </div>
                  <p class="panel-category" style="text-align: center;">{{$tintuc->count()}}</p>
                  
                </div>
                <div class="panel-footer">
                  <div class="stats">
                  <a href="admin/tintuc/danhsach">   <i class="material-icons text-danger">Bài viết {{Auth::user()->name}} đã đăng</i></a>

                  </div>
                </div>
              </div>
            </div>
            @php  $video = Video::where('idUser', '=', Auth::id())->with('User')->get();  @endphp
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="panel panel-success">
                <div class="panel-header ">
                  <div class="panel-icon">
                    <i class="material-icons">Số lượng</i>
                  </div>
                  <p class="panel-category" style="text-align: center;">{{$video->count()}}</p>
                  
                </div>
                <div class="panel-footer">
                  <div class="stats">
                  <a href="admin/video/danhsach">   <i class="material-icons text-danger">Video {{Auth::user()->name}} đã đăng</i></a>
                  </div>
                </div>
              </div>
            </div>
            @php  $tintuc = TinTuc::where('idUser', '=', Auth::id())->with('User')->where('KichHoat',0)->get();  @endphp
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="panel panel-success">
                <div class="panel-header ">
                  <div class="panel-icon">
                    <i class="material-icons">Số lượng</i>
                  </div>
                  <p class="panel-category" style="text-align: center;">{{$tintuc->count()}}</p>
                  
                </div>
                <div class="panel-footer">
                  <div class="stats">
                  <a href="admin/tintuc/danhsach">   <i class="material-icons text-danger">Bài viết {{Auth::user()->name}} chưa duyệt</i></a>
                  </div>
                </div>
              </div>
            </div>
            @php  $video = Video::where('idUser', '=', Auth::id())->with('User')->where('KichHoat',0)->get();  @endphp
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="panel panel-success">
                <div class="panel-header ">
                  <div class="panel-icon">
                    <i class="material-icons">Số lượng</i>
                  </div>
                  <p class="panel-category" style="text-align: center;">{{$video->count()}}</p>
                  
                </div>
                <div class="panel-footer">
                  <div class="stats">
                  <a href="admin/tintuc/danhsach">   <i class="material-icons text-danger">Video {{Auth::user()->name}} chưa duyệt</i></a>
                  </div>
                </div>
              </div>
            </div>
    </div>
</div>


    <!-- /.row -->

<!-- /.container-fluid -->

@endsection

