<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <!-- <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
                    <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
                </ul>
            </li> -->
            <li class="{{Request::is('games/*') || Request::is('games')? 'active': ''}}">
                <a href="{{url('games')}}">
                    <i class="fa fa-gamepad"></i> <span>Games</span>
                </a>
            </li>
            <li class="{{Request::is('bundles/*') || Request::is('bundles')? 'active': ''}}">
                <a href="{{url('bundles')}}">
                    <i class="fa fa-archive"></i> <span>Bundles</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>