<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>{{config('app.name')}} | @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset("") }}logo.png">
    <link href="{{ asset("") }}admin/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset("") }}admin/assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/
css" />
    <link href="{{ asset("") }}admin/assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset("") }}admin/assets/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <!-- plugin css -->
    <link href="{{ asset("") }}admin/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />


    <!-- Plugins css -->
    <link href="{{ asset("") }}admin/assets/libs/quill/quill.core.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset("") }}admin/assets/libs/quill/quill.bubble.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset("") }}admin/assets/libs/quill/quill.snow.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap css -->
    <link href="{{ asset("") }}admin/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- App css -->
    <link href="{{ asset("") }}admin/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />
    <!-- icons -->
    <link href="{{ asset("") }}admin/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- Head js -->
    <script src="{{ asset("") }}admin/assets/js/head.js"></script>
    @yield('css')


    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
</head>

<!-- body start -->

<body data-layout-mode="default" data-theme="light" data-topbar-color="dark" data-menu-position="fixed" data-leftbar-color="light" data-leftbar-size='default' data-sidebar-user='false'>

    <!-- Begin page -->
    <div id="wrapper">


        <!-- Topbar Start -->
        @include('admin.layouts.navbar')
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        @include('admin.layouts.sidebar')
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title">@yield('title')</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    @yield('admin')


                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            @include('admin.layouts.footer')
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->



    <!-- Vendor js -->
    <script src="{{ asset("") }}admin/assets/js/vendor.min.js"></script>

    <!-- Plugins js-->
    <script src="{{ asset("") }}admin/assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="{{ asset("") }}admin/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js">
    </script>
    <script src="{{ asset("") }}admin/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js">
    </script>

    <!-- Dashboard 2 init -->
    <script src="{{ asset("") }}admin/assets/js/pages/dashboard-2.init.js"></script>

      <!-- Plugin js-->
      <script src="{{ asset("") }}admin/assets/libs/parsleyjs/parsley.min.js"></script>

      <!-- Validation init js-->
      <script src="{{ asset("") }}admin/assets/js/pages/form-validation.init.js"></script>

    <!-- Plugins js -->
    <script src="{{ asset("") }}admin/assets/libs/quill/quill.min.js"></script>

    <!-- Init js-->
    <script src="{{ asset("") }}admin/assets/js/pages/form-quilljs.init.js"></script>

    <!-- third party js -->
    <script src="{{ asset("") }}admin/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset("") }}admin/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset("") }}admin/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset("") }}admin/assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
    <script src="{{ asset("") }}admin/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset("") }}admin/assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
    <script src="{{ asset("") }}admin/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset("") }}admin/assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="{{ asset("") }}admin/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset("") }}admin/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="{{ asset("") }}admin/assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
    <script src="{{ asset("") }}admin/assets/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="{{ asset("") }}admin/assets/libs/pdfmake/build/vfs_fonts.js"></script>
    <!-- third party js ends -->

    <!-- Datatables init -->
    <script src="{{ asset("") }}admin/assets/js/pages/datatables.init.js"></script>
    <!-- App js -->
    <script src="{{ asset("") }}admin/assets/js/app.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        @if(Session::has('message'))
        let type = "{{ Session::get('alert-type','info') }}"
        switch (type) {
            case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;

            case 'success':
                toastr.success(" {{ Session::get('message') }} ");
                break;

            case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");
                break;

            case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break;
        }
        @endif

    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

{{--    <script src="{{ asset('backend/assets/js/code.js') }}"></script>--}}
    <script>
        $(function() {
            $(document).on('click', '#delete', function(e) {
                e.preventDefault();
                var link = $(this).attr("href");


                Swal.fire({
                    title: 'Are you sure?'
                    , text: "Delete This Data?"
                    , icon: 'warning'
                    , showCancelButton: true
                    , confirmButtonColor: '#3085d6'
                    , cancelButtonColor: '#d33'
                    , confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link
                        Swal.fire(
                            'Deleted!'
                            , 'Your file has been deleted.'
                            , 'success'
                        )
                    }
                })


            });

        });

    </script>




    @yield('script')
</body>

</html>
