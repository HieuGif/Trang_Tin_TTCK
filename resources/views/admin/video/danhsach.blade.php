 @extends('admin.layout.index')@section('title',"Video") @section('content')

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Video
                            <small>Danh sách</small>
                        </h1>
            </div>
        </div>
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
                <tr>
                    <th style="width: 6%;text-align: center;" aria-sort="descending">STT</th>
                    <th style="width: 14%;text-align: center;">Video</th>
                    <th style="width: 10%;text-align: center;">Tác giả</th>
                    <th style="width: 10%;text-align: center;">Thể loại</th>

                    <th style="width: 9%;text-align: center;">View</th>
                    <th style="width: 9%;text-align: center;">HOT</th>
                    <th style="width: 9%;text-align: center;">O/F</th>
                    <th style="width: 5%;text-align: center;">Sửa</th>
                    <th style="width: 5%;text-align: center;">Xóa</th>
                </tr>
            </thead>
            <tbody>
                @php $count = 1; @endphp @foreach($video as $vd)
                <tr class="odd gradeX" align="center">
                    <td>{{$count++ }}</td>
                    <td> {{$vd->TieuDe}}
                        <video controls  poster width="300px" height="200px" src="public/upload/video/{{$vd->Video}}">{{$vd->Video}}</video></td>
                    <td>{{$vd->user->name}}</td>
                    <td>{{$vd->theloai->Ten}}</td>


                    <td>{{$vd->SoLuotXem}}</td>
                @if(Auth::user()->quyen == "1" || Auth::user()->quyen == "6"  )
                    <td class="text-center">
                        @if($vd->NoiBat == 1)
                        <a href="{{ url('/admin/video/noibat/' . $vd->id) }}"><i class="fa fa-check"> Đã duyệt</i></a> @else
                        <a href="{{ url('/admin/video/noibat/' . $vd->id) }}"><i class="fa fa-ban text-danger"> Chưa duyệt</i></a> @endif
                    </td>
                    <td class="text-center">
                        @if($vd->KichHoat == 1)
                        <a href="{{ url('/admin/video/kichhoat/' . $vd->id) }}"><i class="fa fa-check" > Đã duyệt</i></a> @else
                        <a href="{{ url('/admin/video/kichhoat/' . $vd->id) }}"><i class="fa fa-ban text-danger"> Chưa duyệt</i></a> @endif

                    </td>
                    @endif
                     @if(Auth::user()->quyen == "5")
                      <td class="text-center">
                        @if($vd->NoiBat == 1)

                        <a ><i class="fa fa-check"> Đã duyệt</i></a> @else
                        <a ><i class="fa fa-ban text-danger"> Đang duyêt</i></a> @endif
                    </td>
                    <td class="text-center">
                        @if($vd->KichHoat == 1)
                        <a ><i class="fa fa-check" > Đã duyệt</i></a> @else
                        <a><i class="fa fa-ban text-danger"> Đang duyêt</i></a> @endif

                    </td>
                    @endif
                    <td class="center"><a class="btn btn-warning" href="admin/video/sua/{{$vd->id}}"><i class="fa fa-pencil-square-o fa-lg"></i> Cập nhật</a></td>
                    <td class="center"><a class="btn btn-danger" href="admin/video/xoa/{{$vd->id}}" onclick='return confirm("Bạn có muốn xóa tin tức này?")'><i class="fa fa-trash-o fa-lg"></i> Xóa</a> </td>
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
