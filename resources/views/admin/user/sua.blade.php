 @extends('admin.layout.index') @section('title',"Sửa người dùng")@section('content')

<!-- Page Content -->
<div id="page-wrapper" >
    <div class="container-fluid" style="padding-right: 0px;padding-left: 0px;">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thành viên
                            <small>{{$user->name}}</small>
                        </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7"  style="padding-right: 0px;">
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
                <form action="admin/user/sua/{{$user->id}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />

                    <div class="form-group">
                        <label>Họ tên</label>
                        <input class="form-control" name="name" placeholder="Vui lòng nhập họ tên" value="{{$user->name}}" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Vui lòng nhập địa chỉ email" value="{{$user->email}}"  />
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="changePasword" name="changePasword">
                        <label>Đổi mật khẩu</label>

                        <input type="password" class="form-control password" name="password" placeholder="Vui lòng nhập mật khẩu" value="{{$user->password}}" disabled="" />
                    </div>
                    <div class="form-group">
                        <label>Nhập lại mật khẩu</label>
                        <input type="password" class="form-control password" name="passwordAgain" placeholder="Vui lòng nhập lại mật khẩu" value="{{$user->password}}" disabled="" />
                    </div>

                    <div class="form-group">
                        <label>Quyền hạn:</label>
                        <label class="radio-inline">
                            <input name="quyen" value="1" @if($user->quyen == 1) {{"checked"}} @endif type="radio">SuperAdmin
                        </label>
                        <label class="radio-inline">
                            <input name="quyen" value="2" @if($user->quyen == 2) {{"checked"}} @endif type="radio">QL thể loại, loại tin
                        </label>
                        <label class="radio-inline">
                            <input name="quyen" value="3" @if($user->quyen == 3) {{"checked"}} @endif type="radio">QL tin tức
                        </label>
                        <label class="radio-inline">
                            <input name="quyen" value="4" @if($user->quyen == 4) {{"checked"}} @endif type="radio">QL slide
                        </label>
                        <label class="radio-inline">
                            <input name="quyen" value="5" @if($user->quyen == 5) {{"checked"}} @endif type="radio">Nhà báo, phóng viên
                        </label>
                        <label class="radio-inline">
                            <input name="quyen" value="6" @if($user->quyen == 6) {{"checked"}} @endif type="radio">QL video
                        </label>
                        <label class="radio-inline">
                            <input name="quyen" value="8" @if($user->quyen == 8) {{"checked"}} @endif type="radio">QL bình luận
                        </label>
                        <label class="radio-inline">
                            <input name="quyen" value="0" @if($user->quyen == 0) {{"checked"}} @endif type="radio">Thường
                        </label>
                    </div>


                    <button <a class="btn btn-primary" type="submit"onclick='return confirm("Bạn có muốn cập nhật người dùng này?")'><i class="fa fa-check-circle-o fa-lg"></i> Cập nhập</a>
                    </button>
                    </td>
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
@endsection @section('script')
<script>
    $(document).ready(function() {
        $("#changePasword").change(function() {
            if ($(this).is(":checked")) {
                $(".password").removeAttr('disabled');
            } else {
                $(".password").attr('disabled', '');
            }
        });
    });
</script>
@endsection
