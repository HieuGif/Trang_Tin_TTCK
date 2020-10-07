<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu" >
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="admin/dashboard"><i class="fa fa-database"></i> Dashboard</a>
            </li>
             @if(Auth::user()->quyen == "1" || Auth::user()->quyen == "2")
            <li>
                <a href="admin/theloai/danhsach"><i class="fa fa-indent"></i> Thể loại<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="admin/theloai/danhsach" class="fa fa-list-ol "> Danh sách</a>
                    </li>
                    <li>
                        <a href="admin/theloai/them" class="fa fa-plus-circle "> Thêm</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            @endif

            @if(Auth::user()->quyen == "1" || Auth::user()->quyen == "2")
            <li>
                <a href="admin/loaitin/danhsach"><i class="fa fa-tasks"></i> Loại tin<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="admin/loaitin/danhsach" class="fa fa-list-ol "> Danh sách</a>
                    </li>
                    <li>
                        <a href="admin/loaitin/them" class="fa fa-plus-circle "> Thêm</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            @endif

            @if(Auth::user()->quyen == "1" || Auth::user()->quyen == "3"|| Auth::user()->quyen == "5")
            <li>
                <a href="admin/tintuc/danhsach"><i class="fa fa-file"></i> Tin tức<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="admin/tintuc/danhsach" class="fa fa-list-ol "> Danh sách</a>
                    </li>
                    <li>
                        <a href="admin/tintuc/them" class="fa fa-plus-circle "> Thêm</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            @endif
              @if(Auth::user()->quyen == "1" || Auth::user()->quyen == "5"|| Auth::user()->quyen == "6")
            <li>
                <a href="admin/video/danhsach"><i class="fa fa-file-video-o"></i> Video<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="admin/video/danhsach" class="fa fa-list-ol "> Danh sách</a>
                    </li>
                    <li>
                        <a href="admin/video/them" class="fa fa-plus-circle "> Thêm</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            @endif



            @if(Auth::user()->quyen == "1")
            <li>
                <a href="admin/user/danhsach"><i class="fa fa-user-circle-o"></i> Thành viên<span class="fa arrow"></span></a>

                <ul class="nav nav-second-level">
                    <li>
                        <a href="admin/user/danhsach" class="fa fa-list-ol "> Danh sách</a>
                    </li>
                    <li>

                        <a href="admin/user/them" class="fa fa-plus-circle "> Thêm</a>
                    </li>
                </ul>

            </li>
            @endif

            @if(Auth::user()->quyen == "1" || Auth::user()->quyen == "8")
            <li>
                <a href="admin/binhluan/danhsach"><i class="fa fa-commenting"></i> Bình luận<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">

                    <li>
                        <a href="admin/binhluan/danhsach" class="fa fa-list-ol "> Danh sách bình luận bài viết</a>
                    </li>
               
                    <li>
                        <a href="admin/binhluanvideo/danhsach" class="fa fa-list-ol "> Danh sách bình luận video</a>
                    </li>
               
                </ul>
            </li>
            @endif

            @if(Auth::user()->quyen == "1" || Auth::user()->quyen == "4")
            <li>
                <a href="admin/slide/danhsach"><i class="fa fa-slideshare "></i> Slide<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="admin/slide/danhsach" class="fa fa-list-ol "> Danh sách</a>
                    </li>
                    <li>
                        <a href="admin/slide/them" class="fa fa-plus-circle "> Thêm</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            @endif
            @if(Auth::user()->quyen == "1" )
            <li>
                <a href="admin/lienhe/danhsach"><i class="fa fa-slideshare "></i> Ý kiến<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="admin/lienhe/danhsach" class="fa fa-list-ol "> Danh sách</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            @endif
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
