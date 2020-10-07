<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
          @if(Auth::user()->quyen == 1)
          <a class="navbar-brand">Xin chào: {{Auth::user()->name}} </a>
            @elseif(Auth::user()->quyen == 2)
            <a class="navbar-brand">Xin chào: {{Auth::user()->name}} </a>
            @elseif(Auth::user()->quyen == 3)
            <a class="navbar-brand">Xin chào: {{Auth::user()->name}} </a>
            @elseif(Auth::user()->quyen == 4)
            <a class="navbar-brand">Xin chào: {{Auth::user()->name}} </a>
            @elseif (Auth::user()->quyen == 6)
            <a class="navbar-brand">Xin chào: {{Auth::user()->name}} </a>
            @else (Auth::user()->quyen == 5)
            <a class="navbar-brand">Xin chào: {{Auth::user()->name}} </a>
            @endif

    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>

            <ul class="dropdown-menu dropdown-user">
                @if(Auth::check())

                <li><i class="fa fa-user fa-fw"></i> {{Auth::user()->name}}</a>
                </li>

                <li><a href="admin/doimatkhau" target="_blank"><i class="fa fa-gear fa-fw"></i>Đổi mật khẩu</a>
                </li>

                <li class="divider"></li>
                <li><a href="admin/logout"><i class="fa fa-sign-out fa-fw"></i> Đăng xuất</a>
                </li>
                @endif
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    @include('admin.layout.menu')
    <!-- /.navbar-static-side -->
</nav>
