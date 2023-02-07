<!doctype html>
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Admin Dashboard') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    {{--    <link href="{{ asset('css/iziToast.css') }}" rel="stylesheet">--}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.css"/>
    @vite(['resources/sass/admin/admin.scss', 'resources/js/admin/admin.js'])
</head>
<body>
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
     data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar" data-navbarbg="skin6">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
            <div class="navbar-header" data-logobg="skin6">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <a class="navbar-brand ms-4" href="index.html">
                    <!-- Logo icon -->
                    <b class="logo-icon">
                        <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                        <!-- Dark Logo icon -->
                        {{--                        <img src="../assets/images/logo-light-icon.png" alt="homepage" class="dark-logo" />--}}
                        Laravel
                    </b>
                    <!--End Logo icon -->
                    <!-- Logo text -->
                    <span class="logo-text">
                            <!-- dark Logo text -->
{{--                            <img src="../assets/images/logo-light-text.png" alt="homepage" class="dark-logo" />--}}

                        </span>
                </a>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- toggle and nav items -->
                <!-- ============================================================== -->
                <a class="nav-toggler waves-effect waves-light text-white d-block d-md-none"
                   href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                <ul class="navbar-nav d-lg-none d-md-block ">
                    <li class="nav-item">
                        <a class="nav-toggler nav-link waves-effect waves-light text-white "
                           href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    </li>
                </ul>
                <!-- ============================================================== -->
                <!-- toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav me-auto mt-md-0 ">
                    <!-- ============================================================== -->
                    <!-- Search -->
                    <!-- ============================================================== -->

                    <li class="nav-item search-box">
                        <a class="nav-link text-muted" href="javascript:void(0)"><i class="ti-search"></i></a>
                        <form class="app-search" style="display: none;">
                            <input type="text" class="form-control" placeholder="Search &amp; enter"> <a
                                class="srh-btn"><i class="ti-close"></i></a></form>
                    </li>
                </ul>

                <!-- ============================================================== -->
                <!-- Right side toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav">
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#"
                           id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{--                            <img src="../assets/images/users/1.jpg" alt="user" class="profile-pic me-2">Admin--}}
                            {{ auth()->user()->full_name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown"></ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <aside class="left-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <!-- User Profile-->
                    <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                href="{{ route('admin.dashboard') }}" aria-expanded="false"><i
                                class="mdi me-2 mdi-gauge"></i><span
                                class="hide-menu">Dashboard</span></a></li>
                    {{--                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"--}}
                    {{--                                                 href="pages-profile.html" aria-expanded="false">--}}
                    {{--                            <i class="mdi me-2 mdi-account-check"></i><span class="hide-menu">Profile</span></a>--}}
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                href="{{ route('admin.categories.index') }}" aria-expanded="false"><i
                                class="mdi me-2 mdi-table"></i><span
                                class="hide-menu">Categories</span></a></li>

                    <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                href="{{ route('admin.categories.create') }}" aria-expanded="false"><i
                                class="mdi me-2 mdi-emoticon"></i><span class="hide-menu">Category create</span></a>
                    </li>

                    <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                href="{{ route('admin.products.index') }}" aria-expanded="false"><i
                                class="mdi me-2 mdi-table"></i><span
                                class="hide-menu">Products</span></a></li>

                    <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                href="{{ route('admin.products.create') }}" aria-expanded="false"><i
                                class="mdi me-2 mdi-emoticon"></i><span class="hide-menu">Product create</span></a></li>
                </ul>

            </nav>
            <!-- End Sidebar navigation -->
        </div>

        <!-- End Sidebar scroll-->
        <div class="sidebar-footer">
            <div class="row">
                {{--                <div class="col-4 link-wrap">--}}
                {{--                    <!-- item-->--}}
                {{--                    <a href="" class="link" data-toggle="tooltip" title="" data-original-title="Settings"><i--}}
                {{--                            class="ti-settings"></i></a>--}}
                {{--                </div>--}}
                <div class="col-4 link-wrap">
                    <!-- item-->
                    <a href="{{ route('home') }}" class="link" data-toggle="tooltip" title=""
                       data-original-title="Email"><i
                            class="mdi mdi-earth"></i></a>
                </div>
                <div class="col-4 link-wrap">
                    <!-- item-->
                    <a href="{{ route('logout') }}" class="link" data-toggle="tooltip" title=""
                       data-original-title="Logout"><i
                            class="mdi mdi-power"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        ></i></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </aside>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        {{--        <div class="page-breadcrumb">--}}
        {{--            <div class="row align-items-center">--}}
        {{--                <div class="col-md-6 col-8 align-self-center">--}}
        {{--                    <h3 class="page-title mb-0 p-0">Dashboard</h3>--}}
        {{--                    <div class="d-flex align-items-center">--}}
        {{--                        <nav aria-label="breadcrumb">--}}
        {{--                            <ol class="breadcrumb">--}}
        {{--                                <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
        {{--                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>--}}
        {{--                            </ol>--}}
        {{--                        </nav>--}}
        {{--                    </div>--}}
        {{--                </div>--}}

        {{--            </div>--}}
        {{--        </div>--}}
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Sales chart -->
            <!-- ============================================================== -->
            <div class="row">
                <!-- Column -->
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{--    @include('vendor.lara-izitoast.toast')--}}
@stack('footer-scripts')
</body>
</html>
