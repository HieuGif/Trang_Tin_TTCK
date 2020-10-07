<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="News24H">
    <meta name="author" content="">
    <title>Quản lý | @yield('title') </title>
    <base href="{{asset('')}}" <!-- Bootstrap Core CSS -->




    <link href="public/admin_layout/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"  type="text/css">


    <!-- MetisMenu CSS -->
    <link href="public/admin_layout/bower_components/metisMenu/dist/metisMenu.min.css"  type="text/css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="public/admin_layout/dist/css/sb-admin-2.css" rel="stylesheet"  type="text/css">

    <!-- Custom Fonts -->
    <link href="public/admin_layout/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" href="public/admin_layout/bower_components/font-awesome-4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="icon/css/fontawesome-all.css">

    <!-- DataTables CSS -->
    <link href="public/admin_layout/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css"  type="text/css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link type="text/css" href="public/admin_layout/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    <link type="text/css" href="public/bootstrap-4.4/css/bootstrap.min.css')}}" rel="stylesheet">

    <script src="public/ckeditor/ckeditor.js"></script>

</head>

<body>

    <div id="wrapper">

        @include('admin.layout.header') @yield('content')

    </div>

    <!-- /#wrapper -->

    <script type="text/javascript" language="javascript" src="{{asset('public/admin_layout/bower_components/jquery/dist/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script type="text/javascript" language="javascript" src="{{asset('public/admin_layout/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script type="text/javascript" language="javascript" src="{{asset('public/admin_layout/bower_components/metisMenu/dist/metisMenu.min.js')}}"></script>

    <!-- Custom Theme JavaScript -->



    <!-- DataTables JavaScript -->
    <script type="text/javascript" language="javascript" src="public/admin_layout/bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="public/admin_layout/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" language="javascript" src="public/admin_layout/dist/js/sb-admin-2.js"></script>

            

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });
    </script>

    <script type="text/javascript" language="javascript" src="{{ asset('public/ckeditor/ckeditor.js') }}"></script>
     <script type="text/javascript" language="javascript" src="{{ asset('public/ckfinder/ckfinder.js') }}"></script>
     <script>
      CKEDITOR.replace( 'editor1', {
        filebrowserBrowseUrl: '{{ asset('public/ckfinder/ckfinder.html') }}',
        filebrowserImageBrowseUrl: '{{ asset('public/ckfinder/ckfinder.html?type=Images') }}',
        filebrowserFlashBrowseUrl: '{{ asset('public/ckfinder/ckfinder.html?type=Flash') }}',
        filebrowserUploadUrl: '{{ asset('public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
        filebrowserImageUploadUrl: '{{ asset('public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
        filebrowserFlashUploadUrl: '{{ asset('public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
    } );
    </script>
    @yield('script')

</body>

</html>
