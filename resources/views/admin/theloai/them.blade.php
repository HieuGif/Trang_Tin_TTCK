 @extends('admin.layout.index') @section('title',"Thêm thể loại")@section('content')
<!-- Page Content -->

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thể Loại
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

                <form action="admin/theloai/them" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />

                    <div class="form-group">
                        <label>Tên thể loại</label>
                        <input class="form-control" name="Ten" placeholder="Vui lòng nhập tên thể loại" />
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

@endsection
