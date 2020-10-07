@extends('admin.layout.index')@section('title',"Liên hệ") @section('content')

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Liên hệ
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
                    <th style="width: 30%;text-align: center;">Tên người gửi</th>
                    <th style="width: 30%;text-align: center;">Email</th>
                    <th style="width: 30%;text-align: center;">Nội Dung</th>
                    <th style="width: 10%;text-align: center;">Xóa</th>
                </tr>
            </thead>
            <tbody>
                @php $count = 1; @endphp

                 @foreach($lienhe as $lh)
                <tr class="odd gradeX" align="center">
                    <td>{{$count++ }}</td>
                    <td>{{$lh->Ten}}</td>
                    <td>{{$lh->Email}}</td>
                    <td>{{$lh->NoiDung}}</td>
        
                    <td class="center"><a class="btn btn-danger" href="admin/lienhe/xoa/{{$lh->id}}"onclick='return confirm("Bạn có muốn xóa ý kiến này?")'><i class="fa fa-trash-o fa-lg"></i> Xóa</a> </td>
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
