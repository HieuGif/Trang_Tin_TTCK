 @extends('admin.layout.index') @section('title',"Người dùng")@section('content')

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thành viên
                            <small>Danh sách</small>
                        </h1> @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
                @endif
                 @if(session('thongbaoloi'))
        <div class="alert alert-danger">
            {{session('thongbaoloi')}}
        </div>
        @endif
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr text-align="center">
                        <th style="width: 10%;text-align: center;">STT</th>
                        <th style="width: 20%;text-align: center;">Tên người dùng</th>
                        <th style="width: 25%;text-align: center;">Email</th>
                        <th style="width: 25%;text-align: center;">Quyền</th>
                        <th style="width: 25%;text-align: center;">O/F</th>
                        <th style="width: 10%;text-align: center;">Sửa</th>
                        <th style="width: 10%;text-align: center;">Xóa</th>
                    </tr>
                </thead>
                <tbody>

                    @php $count = 1; @endphp @foreach($user as $u)
                    <tr class="odd gradeX" align="center">
                        <td>{{$count++ }}</td>
                        <td>{{$u->name}}</td>
                        <td>{{$u->email}}</td>
                        <td>
                            @if($u->quyen == 1) {{"SuperAdmin"}}
                            @elseif($u->quyen == 2) {{"Quản lý thể loại & loại tin"}}
                            @elseif($u->quyen == 3) {{"Quản lý tin tức"}}
                            @elseif($u->quyen == 4) {{"Quản lý slide"}}
                            @elseif($u->quyen == 5) {{"Nhà báo, phóng viên"}}
                            @elseif($u->quyen == 6) {{"Quản lý video"}}
                            @elseif($u->quyen == 8) {{"Quản lý bình luận"}}
                            @elseif($u->quyen == 7) {{"Thường(google or facebook)"}}
                            @else {{"Thường"}}
                            @endif
                        </td>
                         <td class="text-center">
                        @if($u->kichhoat == 1)
                        <a href="{{ url('/admin/user/kichhoat/' . $u->id) }}"><i class="fa fa-check"> Đã duyệt</i></a>
                        @else
                        <a href="{{ url('/admin/user/kichhoat/' . $u->id) }}"><i class="fa fa-ban text-danger"> Chưa duyệt</i></a>
                        </td>
                        @endif
                        @if($u->quyen == 7)
                        <td class="center"><a class="btn btn-warning" href="admin/user/sua/{{$u->id}}" disabled="disabled"><i class="fa fa-pencil-square-o fa-lg"></i> Cập nhật</a></td>
                        @else
                        <td class="center"><a class="btn btn-warning" href="admin/user/sua/{{$u->id}}"><i class="fa fa-pencil-square-o fa-lg"></i> Cập nhật</a></td>
                        @endif
                        <td class="center"><a class="btn btn-danger" href="admin/user/xoa/{{$u->id}}"onclick='return confirm("Bạn có muốn xóa thành viên này?")'><i class="fa fa-trash-o fa-lg"></i> Xóa</a> </td>

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
