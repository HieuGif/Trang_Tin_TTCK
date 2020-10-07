 @extends('admin.layout.index')@section('title',"Slide") @section('content')

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Slide
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
        <!-- /.col-lg-12 -->

        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr align="center">
                    <th style="width: 10%;text-align: center;">STT</th>
                    <th style="width: 10%;text-align: center;">Tên</th>
                    <th style="width: 12%;text-align: center;">Tác giả</th>
                    <th style="width: 10%;text-align: center;">Hình dạng</th>
                    <th style="width: 20%;text-align: center;">Hình</th>
                    <th style="width: 9%;text-align: center;">Link</th>
                    <th style="width: 10%;text-align: center;">Sửa</th>
                    <th style="width: 10%;text-align: center;">Xóa</th>
                </tr>
            </thead>
            <tbody>
                @php $count = 1; @endphp @foreach($slide as $sd)
                <tr class="odd gradeX" align="center">
                    <td>{{$count++ }}</td>
                    <td>{{$sd->Ten}}</td>
                    <td>{{$sd->user->name}}</td>
                    <td>@if($sd->HinhDang == 1) {{"Đứng"}}
                            @elseif($sd->HinhDang == 0) {{"Nằm ngang"}}
                            @endif</td>
                    <td>
                        <img width="300px" height="100px" src="public/upload/slide/{{$sd->Hinh}}">
                    </td>
                    <td>{{Str::limit($sd['Link'],50)}}</td>
                    <td class="center"><a class="btn btn-warning" href="admin/slide/sua/{{$sd->id}}"><i class="fa fa-pencil-square-o fa-lg"></i> Cập nhật</a></td>
                    <td class="center"><a class="btn btn-danger" href="admin/slide/xoa/{{$sd->id}}"onclick='return confirm("Bạn có muốn xóa slide này?")'><i class="fa fa-trash-o fa-lg"></i> Xóa</a> </td>
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
