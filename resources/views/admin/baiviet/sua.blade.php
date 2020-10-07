@extends('admin.layout.index')@section('title',"Sửa tin tức") @section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin tức
                            <small>{{$tintuc->TieuDe}}</small>
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

            <form action="admin/tintuc/sua/{{$tintuc->id}}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <div class="form-group">
                    <label>Thể loại</label>
                    <select class="form-control" name="TheLoai" id="TheLoai">
                        @foreach($theloai as $tl)
                        <option @if($tintuc->loaitin->theloai->id == $tl->id) {{"selected"}} @endif value ="{{$tl->id}}">{{$tl->Ten}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group">
                
                    <label>Loại tin</label>
                    <select class="form-control" name="LoaiTin" id="LoaiTin">
                        @foreach($loaitin as $lt)
                        <option @if($tintuc->loaitin->id == $lt->id) {{"selected"}} @endif value ="{{$lt->id}}">{{$lt->Ten}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Tiêu đề</label>
                    <input class="form-control" name="TieuDe" placeholder="Vui lòng nhập tiêu đề" value="{{$tintuc->TieuDe}}" />
                </div>
                <div class="form-group">
                    <label>Tóm tắt</label>
                    <textarea name="TomTat"  class="from-control ckeditor" rows="3">{{$tintuc->TomTat}}</textarea>
                </div>
                <div class="form-group">
                    <label>Nội dung</label>
                    <textarea name="NoiDung" id="editor1" class="from-control ckeditor" rows="5">{{$tintuc->NoiDung}}</textarea>
                </div>

                <div class="form-group">
                    <label>Hình ảnh</label>
                    <br>
                           <a style="font-size: 10px; color: red;"> P/s: Các định dạng file hỗ trợ PNG,JPG,JPEG,GIF
                           </a>
                    <p>
                        <img width="400px" src="public/upload/tintuc/{{$tintuc->Hinh}}"></p>
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

    <!-- /.row
                     <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Bình luận
                            <small>Danh sách</small>
                        </h1>
                    </div>
                </div>
                    /.col-lg-12
                     @if(session('thongbao'))
                        <div class = "alert alert-success">
                             {{session('thongbao')}}
                         </div>
                     @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Người dùng</th>
                                <th>Nội dung</th>
                                <th>Ngày đăng</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tintuc->binhluan as $cm)
                            <tr class="odd gradeX" align="center">
                                <td>{{$cm->id}}</td>
                                <td>{{$cm->user->name}}</td>
                                <td>{{$cm->NoiDung}}</td>
                                 <td>{{$cm->created_at}}</td>
                                <td class="center"><a class="btn btn-danger" href="admin/comment/xoa/{{$cm->id}}/{{$tintuc->id}}"><i class="fa fa-trash-o fa-lg"></i> Xóa</a> </td>

                            </tr>
                       @endforeach
                        </tbody>
                    </table>
             <!--   </div>
            </div>
            /.container-fluid
        </div>
        /#page-wrapper

    </div> -->

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
