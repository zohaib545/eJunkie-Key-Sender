<!DOCTYPE html>
<html>

@include('common.head')

<body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        @include('common.header')

        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        @include('common.sidebar')

        <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    @yield('page_heading')
                    <small>@yield('page_subheading')</small>
                </h1>
                @yield('breadcrumbs')
            </section>

            <!-- Main content -->
            <section class="content">
                @yield('content')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        @include('common.footer')
    </div>
    <!-- ./wrapper -->

    <script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('bower_components/fastclick/lib/fastclick.js')}}"></script>
    <script src="{{asset('dist/js/adminlte.min.js')}}"></script>
    <script src="{{asset('dist/js/demo.js')}}"></script>
    <script src="{{asset('js/custom/custom.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.sidebar-menu').tree()
        })
    </script>
    @yield('page_scripts')
</body>

</html>