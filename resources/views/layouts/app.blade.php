<!doctype html>
{{-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> --}}
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$mainsettingAll->name}}</title>
    <link rel="shortcut icon" href="/images/logoicon.ico">
    <!-- Scripts -->
    <script src="{{ asset('/js/admin/jquery.min.js') }}" defer></script>
    <script src="{{ asset('/js/admin/bootstrap.bundle.min.js') }}" defer></script>
    <!-- DataTables -->
    <script src="{{ asset('/js/admin/jquery.dataTables.min.js') }}" defer></script>
    <script src="{{ asset('/js/admin/dataTables.bootstrap4.js') }}" defer></script>
    <!-- SlimScroll -->
    {{-- <script src="{{ asset('/js/admin/jquery.slimscroll.min.js') }}" defer></script> --}}
    <!-- FastClick -->
    {{-- <script src="{{ asset('/js/admin/jquery.fastclick.js') }}" defer></script> --}}
    <script src="{{ asset('/js/admin/adminlte.min.js') }}" defer></script>
    <!-- AdminLTE for demo purposes -->
    {{-- <script src="{{ asset('/js/admin/demo.js') }}" defer></script> --}}
    <script src="{{ asset('/js/admin/dropzone.js') }}" defer></script>
    <script src="{{ asset('/js/admin/lity.min.js') }}" defer></script>
    <script src="{{ asset('/js/admin/scriptadmin.js') }}" defer></script>
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('/css/admin/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/admin/adminlte.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    {{-- <link href="{{ asset('/css/admin/bootstrap-rtl.min.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('/css/admin/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/admin/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/admin/custom-style.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/admin/dropzone.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/admin/lity.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/admin/style_admin.css') }}" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">

        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ '/dsadmin/user/' . auth()->user()->id . '/edit' }}">
                                    <i class="far fa-user"></i>
                                    <span>My Profile</span>
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                    LogOut
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>


                    <!-- Right navbar links -->
                    <ul class="navbar-nav mr-auto">
                       
                            <li class="nav-item">
                                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
                                        class="fa fa-th-large"></i></a>
                            </li>
                        </ul>
                    </nav>
                    <!-- /.navbar -->

                    <!-- Main Sidebar Container -->
                    <aside class="main-sidebar sidebar-dark-primary elevation-4">
                        <!-- Brand Logo -->
                        <a href="/dsadmin" class="brand-link">
                            <img src="/images/logo.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                            <span class="brand-text font-weight-light">Home</span>
                        </a>

                        <!-- Sidebar -->
                        <div class="sidebar">
                            <div>
                                <!-- Sidebar Menu -->
                                <nav class="mt-2">
                                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                                        data-accordion="false">

                                            <li class="nav-item">
                                                <a target="_blank" href="/" class="nav-link active">
                                                    <p>
                                                        View website
                                                    </p>
                                                    <i class="nav-icon fa fa-dashboard"></i>
                                                </a>
                                            </li>
                                                <li class="nav-item">
                                                    <a href="/dsadmin/user" class="nav-link">
                                                        <p>
                                                            Admin
                                                            {{-- <span class="right badge badge-danger">جدید</span> --}}
                                                        </p>
                                                        <i class="nav-icon fa fa-user"></i>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="/dsadmin/user/indexw" class="nav-link">
                                                        <p>
                                                            Workers
                                                            {{-- <span class="right badge badge-danger">جدید</span> --}}
                                                        </p>
                                                        <i class="nav-icon fa fa-users"></i>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="/dsadmin/user/indexc" class="nav-link">
                                                        <p>
                                                            Clients
                                                            {{-- <span class="right badge badge-danger">جدید</span> --}}
                                                        </p>
                                                        <i class="nav-icon fa fa-users"></i>
                                                    </a>
                                                </li>
                                                
                                                <li class="nav-item">
                                                    <a href="/dsadmin/mainsetting/1/edit" class="nav-link">
                                                        <p>
                                                            Settings
                                                        </p>
                                                        <i class="nav-icon fa fa-shield"></i>
                                                    </a>
                                                </li>
                                                
                                                <li class="nav-item">
                                                    <a href="/dsadmin/type_jobs" class="nav-link">
                                                    <p>
                                                        Services Sections
                                                    </p>
                                                    <i class="nav-icon fa fa-th"></i>
                                                    </a>
                                                </li>


                                            </ul>
                                        </nav>
                                        <!-- /.sidebar-menu -->
                                    </div>
                                </div>
                                <!-- /.sidebar -->
                            </aside>




                        {{-- محتوى الصفحات --}}
                        <main class="py-4">
                            @include('includes.messages'){{-- عرض التنبيهات --}}
                            @yield('content')
                        </main>
                            <!-- Main Footer -->
                            <footer class="main-footer">
                                <!-- To the right -->
                                <div class="float-right d-none d-sm-inline">
                                    C Panal
                                </div>
                                <!-- Default to the left -->
                                <strong> &copy; <a target="_blank" href="#">All rights reserved to Khidmah </a></strong>
                            </footer>
                        </div>
                        <!-- ./wrapper -->
                </body>

                </html>
