 @extends('admin.layout.index')@section('title',"Thể loại") @section('content')

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thể loại
                            <small>Danh sách</small>
                        </h1>
            </div>
        </div>
        <!-- /.col-lg-12 -->
        @if(session('thongbao'))
        <div class="alert alert-success">
            {{session('thongbao')}}
        </div>
        @endif
         @if(session('thongbaoloi'))
        <div class="alert alert-danger">
            {{session('thongbaoloi')}}
        </div>
        @endif

        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr align="center">
                    <th style="width: 10%;text-align: center;">Số thứ tự</th>
                    <th style="width: 30%;text-align: center;">Tên thể loại</th>
                    <th style="width: 30%;text-align: center;">Tên khong dau</th>
                    <th style="width: 10%;text-align: center;">Sửa</th>
                    <th style="width: 10%;text-align: center;">Xóa</th>
                </tr>
            </thead>
            <tbody>
                @php $count = 1; @endphp

                 @foreach($theloai as $tl)
                <tr class="odd gradeX" align="center">
                    <td>{{$count++ }}</td>
                    <td>{{$tl->Ten}}</td>
                    <td>{{$tl->TenKhongDau}}</td>
                    <td class="center"><a class="btn btn-warning" href="admin/theloai/sua/{{$tl->id}}"><i class="fa fa-pencil-square-o fa-lg"></i> Cập nhật</a></td>
                    <td class="center"><a class="btn btn-danger" href="admin/theloai/xoa/{{$tl->id}}"onclick='return confirm("Bạn có muốn xóa thể loại này?")'><i class="fa fa-trash-o fa-lg"></i> Xóa</a> </td>
                </tr>
                @endforeach

            </tbody>
        </table>

    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
