<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Conference Travel') }}</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-15">
                <img src="{{ asset("img/logo.png") }}" width="50px">
            </div>
            <div class="sidebar-brand-text mx-1">Confetraform</div>
        </a>


        @if(auth()->user()->user_type_id == "2")
            <!-- Divider -->
                <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="{!! URL::to('/home') !!}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">
                <li class="nav-item">
                    <a class="nav-link" href="{!! URL::to('/form-list') !!}">
                        <i class="fas fa-file-alt"></i>
                        <span>Manage Forms</span></a>
                </li>
                <hr class="sidebar-divider">
        @endif()

        <!-- Heading -->
        <div class="sidebar-heading">
            Application Forms
        </div>

        @if(auth()->user()->user_type_id == "2" OR auth()->user()->user_type_id == "3")
            <li class="nav-item">
                <a class="nav-link" href="{!! URL::to('/submitted-application-list') !!}">
                    <i class="fab fa-wpforms"></i>
                    <span>Submitted Applications</span></a>
            </li>
        @endif()
        @if(auth()->user()->user_type_id == "4")
            <li class="nav-item">
                <a class="nav-link" href="{!! URL::to('/application-list') !!}">
                    <i class="fab fa-wpforms"></i>
                    <span>Application Forms</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{!! URL::to('/your-application') !!}">
                    <i class="fab fa-wpforms"></i>
                    <span>Your Application</span></a>
            </li>
        @endif


        @if(auth()->user()->user_type_id == "1" OR auth()->user()->user_type_id == "2")
        <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Accounts
            </div>

            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages"
                   aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-users"></i>
                    <span>User Accounts</span>
                </a>
                <div id="collapsePages" class="collapse show" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        @if(auth()->user()->user_type_id == "1")
                            <h6 class="collapse-header">Administrators:</h6>
                            <a class="collapse-item" href="{!! URL::to('/uni-admins') !!}">University Administrator</a>

                            <div class="collapse-divider"></div>
                        @endif()
                        @if(auth()->user()->user_type_id == "2")
                            <h6 class="collapse-header">University Users:</h6>
                            <a class="collapse-item" href="{!! URL::to('/uni-approvers') !!}">Approvers</a>
                            <a class="collapse-item" href="{!! URL::to('/uni-applicants') !!}">Applicants</a>
                        @endif

                    </div>
                </div>
            </li>
        @endif
        @if(auth()->user()->user_type_id == "2")
                <li class="nav-item">
                    <a class="nav-link" href="{!! URL::to('/budget-settings') !!}">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Budget Settings</span></a>
                </li>
        @endif
        @if(auth()->user()->user_type_id == "2")
                <li class="nav-item">
                    <a class="nav-link" href="{!! URL::to('/course-settings') !!}">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Course Settings</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{!! URL::to('/department-settings') !!}">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Department Settings</span></a>
                </li>
        @endif
        @if(auth()->user()->user_type_id == "1")
                <li class="nav-item">
                    <a class="nav-link" href="{!! URL::to('/university-settings') !!}">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Universities</span></a>
                </li>
        @endif

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->
{{--                <form--}}
{{--                    class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">--}}
{{--                    <div class="input-group">--}}
{{--                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."--}}
{{--                               aria-label="Search" aria-describedby="basic-addon2">--}}
{{--                        <div class="input-group-append">--}}
{{--                            <button class="btn btn-primary" type="button">--}}
{{--                                <i class="fas fa-search fa-sm"></i>--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </form>--}}

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                             aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                           placeholder="Search for..." aria-label="Search"
                                           aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>
                    @if(auth()->user()->user_type_id == "2" OR auth()->user()->user_type_id == "3" OR auth()->user()->user_type_id == "4")
                        <!-- Nav Item - Alerts -->
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-bell fa-fw"></i>
                                    <!-- Counter - Alerts -->
                                    <span class="badge badge-secondary badge-counter" id="total_unread"></span>
                                </a>
                                <!-- Dropdown - Alerts -->
                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                     aria-labelledby="alertsDropdown">
                                    <h6 class="dropdown-header">
                                        Notification
                                    </h6>
                                    <div id="notification-div">

                                    </div>

{{--                                    <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>--}}
                                </div>
                            </li>
                    @endif


                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                            </span>
{{--                            <img class="img-profile rounded-circle"--}}
{{--                                 src="img/undraw_profile.svg">--}}
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="userprofile">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                @if(auth()->check())
                    @if(!auth()->user()->email_verified_at)
{{--                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">--}}
{{--                            @csrf--}}
{{--                            <div class="alert alert-danger" role="alert">--}}
{{--                                Your account is not verified yet. <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.--}}
{{--                            </div>--}}
{{--                            .--}}
{{--                        </form>--}}

                    @endif
                @endif

                @yield('content')
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; confetraform.com 2021</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="{{ url('/logout') }}">Logout</a>
            </div>
        </div>
    </div>
</div>







<!-- Bootstrap core JavaScript-->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

<!-- Page level plugins -->
<script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

<script>
    // Call the dataTables jQuery plugin
    $(document).ready(function() {
        $.ajax({
            url: "{{ URL::to('/load-notification') }}",
            type: "GET",
            success:function(response){
                let total_unread = response.total_unread;
                if(total_unread === 0) total_unread = "";
                $("#total_unread").html(total_unread);
                let list = response.list;
                for(let x = 0; x <= list.length - 1; x++) {
                    let created_date = list[x].created_date;
                    let link = list[x].link;
                    let notification_message = list[x].notification_message;
                    let notification_sign = list[x].notification_sign;
                    let read_flag = list[x].read_flag;
                    let content = '<a class="dropdown-item d-flex align-items-center" href="{{ URL::to('/') }}'+link+'"> <div class="mr-3"> <div class="icon-circle bg-'+notification_sign+'"> <i class="fas fa-exclamation-triangle text-white"></i></div></div><div><div class="small text-gray-500">'+created_date+'</div>'+notification_message+'</div></a>';
                    $('#notification-div').append(content);
                }
            }
        });
        $('#dataTable').DataTable();


    });


</script>
</body>
</html>
