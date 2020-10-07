 @extends('admin.layout.index') @section('title',"Thên người dùng")@section('content')

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thành viên
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

                <form action="admin/user/them" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />

                    <div class="form-group">
                        <label>Họ tên</label>
                        <input class="form-control" name="name" placeholder="Vui lòng nhập họ tên" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Vui lòng nhập địa chỉ email" />
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input type="password" class="form-control" name="password" placeholder="Vui lòng nhập mật khẩu" />
                    </div>
                    <div class="form-group">
                        <label>Nhập lại mật khẩu</label>
                        <input type="password" class="form-control" name="passwordAgain" placeholder="Vui lòng nhập lại mật khẩu" />
                    </div>

                    <div class="form-group">
                        <label>Quyền hạn </label>
                        <label class="radio-inline" >
                            <input name="quyen" value="0" checked="" type="radio">Thường
                        </label>

                        <label class="radio-inline">
                            <input name="quyen" value="1" type="radio">Admin
                        </label>

                         <label class="radio-inline">
                            <input name="quyen" value="2" type="radio">QL thể loại & loại tin
                        </label>

                        <label class="radio-inline">
                            <input name="quyen" value="3" type="radio">QL tin tức
                        </label>
                        <label class="radio-inline">
                            <input name="quyen" value="6" type="radio">QL video
                        </label>
                        <label class="radio-inline">
                            <input name="quyen" value="8" type="radio">QL bình luận
                        </label>
                         <label class="radio-inline">
                            <input name="quyen" value="4" type="radio">QL slide
                        </label>
                         <label class="radio-inline">
                            <input name="quyen" value="5" type="radio">Nhà báo, phóng viên
                        </label>
                    </div>

                    <button <a class="btn btn-success" type="submit"><i class="fa fa-plus-circle fa-lg"></i> Thêm</a>
                    </button>
                    <td>
                    <button <a class="btn btn-info" type="reset"><i class="fa fa-refresh fa-lg"></i> Làm mới</a>
                    </button>
                    </td>

                    <form>

            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
