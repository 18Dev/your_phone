<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layouts.head')
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('admin.layouts.side-bar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('admin.layouts.top-bar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                @yield('content-page')
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('admin.layouts.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

</body>
    @include('admin.layouts.scripts')

    <script>
        $(function () {
            $("#accordionSidebar").on('click','li',function(){
                // remove classname 'active' from all li who already has classname 'active'
                $("#accordionSidebar li.active").removeClass("active");
                // adding classname 'active' to current click li
                $(this).addClass("active");
            });
        })
    </script>
</html>

