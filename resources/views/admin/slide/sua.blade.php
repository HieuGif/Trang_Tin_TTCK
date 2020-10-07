 @extends('admin.layout.index') @section('title',"Sửa slide")@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Slide
                            <small>{{$slide->Ten}}</small>
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

                <form action="admin/slide/sua/{{$slide->id}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />

                    <div class="form-group">
                        <label>Tên</label>
                        <input class="form-control" name="Ten" placeholder="Vui lòng điền tiêu đề" value="{{$slide->Ten}}" />
                    </div>
                    <div class="form-group">
                    <label>Hình dạng:</label>
                    <label class="radio-inline">
                            <input name="HinhDang" value="1" @if($slide->HinhDang == 1) {{"checked"}} @endif type="radio">Đứng
                        </label>
                        <label class="radio-inline">
                            <input name="HinhDang" value="0" @if($slide->HinhDang == 2) {{"checked"}} @endif type="radio">Nằm ngang
                        </label>
                        </div>
                        <div class="form-group">
                            <label>Link</label>
                            <input class="form-control" name="Link" placeholder="Vui lòng điền tiêu đề" value="{{$slide->Link}}" />
                        </div>

                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <p><img style="width:675px; height:100px" src="public/upload/slide/{{$slide->Hinh}}"></p>
                            <input type="file" class="form-control" name="Hinh" placeholder="Please Enter Category Keywords" />
                        </div>

                        <button <a class="btn btn-primary" type="submit"onclick='return confirm("Bạn có muốn cập nhật slide này?")'><i class="fa fa-check-circle-o fa-lg"></i> Cập nhập</a>
                        </button>
                        </td>
                        <button <a class="btn btn-info" type="reset"><i class="fa fa-refresh fa-lg"></i> Làm mới</a>
                        </button>
                        </td>
                    </div>
                </form>

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
