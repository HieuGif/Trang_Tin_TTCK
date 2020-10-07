@extends('admin.layout.index')@section('title',"Sửa video") @section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Video
                            <small>{{$video->TieuDe}}</small>
                        </h1>
            </div>
        </div>
        <!-- /.col-lg-12 -->
        <div class="col-lg-7" style="padding-bottom:120px">
            @if(count($errors) > 0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $err) {{$err}}
                <br> @endforeach
            </div>
            @endif @if(session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
            @endif
            @if(session('thongbaoloi'))
            <div class="alert alert-danger">
                {{session('thongbaoloi')}}
            </div>
            @endif

            <form action="admin/video/sua/{{$video->id}}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <div class="form-group">
                    <label>Thể loại</label>
                    <select class="form-control" name="TheLoai" id="TheLoai">
                        @foreach($theloai as $tl)
                        <option @if($video->theloai->id == $tl->id) {{"selected"}} @endif value ="{{$tl->id}}">{{$tl->Ten}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group">
                    <label>Tiêu đề</label>
                    <input class="form-control" name="TieuDe" placeholder="Vui lòng nhập tiêu đề" value="{{$video->TieuDe}}" />
                </div>

                <div class="form-group">
                    <label>Nội dung</label>
                    <textarea name="NoiDung" id="demo" class="from-control ckeditor" rows="5">{{$video->NoiDung}}</textarea>
                </div>



                <div class="form-group">
                    <label>Video
                      <br>
                           <a style="font-size: 10px; color: red;"> P/s: Các định dạng file hỗ trợ MP4,OGG,WEBM,M4V</a></label>
                    <p>
                        <video controls poster width="400px" src="public/upload/video/{{$video->Video}}"></p>
                    <input type="file" class="form-control" name="Video" placeholder="Chọn file video" />
                </div>
                <div class="form-group">
                    <label>Hình ảnh đại diện</label>
                    <br>
                           <a style="font-size: 10px; color: red;"> P/s: Các định dạng file hỗ trợ PNG,JPG,JPEG,GIF
                           </a>
                    <p>
                        <img width="400px" src="public/upload/hinhvideo/{{$video->Hinh}}"></p>
                    <input type="file" class="form-control" name="Hinh" placeholder="Chọn ảnh đại diện" />
                </div>

                <button <a class="btn btn-primary" type="submit"onclick='return confirm("Bạn có muốn cập nhật tin tức này?")'><i class="fa fa-check-circle-o fa-lg"></i> Cập nhập</a>
                </button>
                </td>
                <button <a class="btn btn-info" type="reset"><i class="fa fa-refresh fa-lg"></i> Làm mới</a>
                </button>
                </td>
            </form>

        </div>
    </div>


    @endsection @section('script')
    <script>
        $(document).ready(function() {
            $("#TheLoai").change(function() {
                var idTheLoai = $(this).val();
                $.get("admin/ajax/loaitin/" + idTheLoai, function(data) {
                    $("#LoaiTin").html(data);

                });

            });
        });
    </script>
    @endsection
