@extends('admin.layout.index') @section('title',"Đổi mật khẩu") @section('content')

<!-- Page Content -->

    <div id="page-wrapper">
    <!-- slider -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7">
                <h1 class="page-header" style="font-size: 16px">Thông tin tài khoản</h1>
                <div class="page-body">
                    <!--kiem tra loi-->
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

                    <form action="admin/doimatkhau" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <div>
                            <label >Họ tên</label>
                            <input type="text" class="form-control" placeholder="Username" name="name" aria-describedby="basic-addon1"readonly value="{{$user->name}}">
                        </div>
                        <br>
                        <div>
                            <label >Email</label>
                            <input   type="email" class="form-control" placeholder="Email" name="email" aria-describedby="basic-addon1" readonly value="{{$user->email}}">
                        </div>
                        <br>
                        <div>
                            <label >Mật khẩu cũ</label>
                            <input type="password" class="form-control password" name="old_password"   aria-describedby="basic-addon1" >
                        </div>
                        <br>
                        <div>
                            <label >Mật khẩu mới</label>
                            <input type="password" class="form-control password" name="new_password"  aria-describedby="basic-addon1" >
                        </div>
                        <br>
                        <div>
                            <label >Nhập lại mật khẩu</label>
                            <input type="password" class="form-control password" name="new_password_confirmation"  aria-describedby="basic-addon1">
                        </div>
                        <br>
                        <button <a  class="btn btn-primary" type="submit" class="btn btn-default"onclick='return confirm("Bạn chắc muốn cập nhật thông tin ?")'><i class="fa fa-check-circle-o fa-lg"></i> Cập nhật
                        </button>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2">
        </div>
    </div>
    <!-- end slide -->
</div>
<!-- end Page Content -->

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
