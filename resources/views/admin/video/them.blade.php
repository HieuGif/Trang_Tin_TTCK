 @extends('admin.layout.index') @section('title',"Thêm video")@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Video
                            <small>Thêm</small>
                        </h1>
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

                <form action="admin/video/them" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label>Thể loại</label>
                        <select class="form-control" name="TheLoai" id="TheLoai">
                            <option value="">-- Chọn thể loại --</option>
                            @foreach($theloai as $tl)
                            <option value="{{$tl->id}}">{{$tl->Ten}}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="form-group">
                        <label>Tiêu đề</label>
                        <input class="form-control" name="TieuDe" placeholder="Vui lòng điền tiêu đề" />
                    </div>

                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea name="NoiDung" id="demo" class="from-control ckeditor" rows="1"></textarea>
                    </div>



                     <div class="form-group">
                        <label>Video
                            <br>
                           <a style="font-size: 10px; color: red;"> P/s: Các định dạng file hỗ trợ MP4,OGG,WEBM,M4V
                           </a>
                        </label>

                        <input type="file" class="form-control" name="Video" placeholder="Chọn file video" />
                    </div>
                    <div class="form-group">
                    <label>Hình ảnh đại diện</label>
                    <br>
                           <p style="font-size: 10px; color: red;"> P/s: Các định dạng file hỗ trợ PNG,JPG,JPEG,GIF
                           </p>
                    <input type="file" class="form-control" name="Hinh" placeholder="Chọn ảnh đại diện" />
                </div>

                    <button <a class="btn btn-success" type="submit"><i class="fa fa-plus-circle fa-lg"></i> Thêm</a>
                    </button>
                    </td>
                    <button <a class="btn btn-info" type="reset"><i class="fa fa-refresh fa-lg"></i> Làm mới</a>
                    </button>
                    </td>

                 </form>

            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

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
