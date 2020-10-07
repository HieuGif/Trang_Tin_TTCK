 @extends('admin.layout.index')@section('title',"Bình luận tin tức")
@section('content')

<!-- Page Content -->
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Bình luận tin tức
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

        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr text-align="center">
                    <th style="width: 10%;text-align: center;">STT</th>
                    <th style="width: 20%;text-align: center;">Tên người đăng</th>
                    <th style="width: 25%;text-align: center;">Tiêu đề bài viết</th>
                    <th style="width:25%;text-align: center;">Nội dung</th>
                    <th style="width:25%;text-align: center;">Kích hoạt</th>

                    <th style="width: 10%;text-align: center;">Xóa</th>
                </tr>
            </thead>
            <tbody>
                @php $count = 1; @endphp @foreach($binhluan as $cm)
                <tr class="odd gradeX" align="center">
                    <td>{{$count++ }}</td>
                    <td>{{$cm->user->name}}</td>
                    <td>{{$cm->tintuc->TieuDe}}</td>
                    <td>{{$cm->NoiDung}}</td>
                    <td class="text-center">
                        @if($cm->KichHoat == 0)
                        <a href="{{ url('/admin/binhluan/kichhoat/' . $cm->id) }}"><i class="fa fa-check"> Đã duyệt</i></a> @else
                        <a href="{{ url('/admin/binhluan/kichhoat/' . $cm->id) }}"><i class="fa fa-ban text-danger"> Chưa duyêt</i></a> @endif
                        <td class="center"><a class="btn btn-danger" href="admin/binhluan/xoa/{{$cm->id}}"onclick='return confirm("Bạn có muốn xóa bình luận này?")'><i class="fa fa-trash-o fa-lg"></i> Xóa</a> </td>

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
