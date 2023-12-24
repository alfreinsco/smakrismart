<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>{{ config('app.name') }}</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    <!-- Meta -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Mega Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
    <meta name="author" content="codedthemes" />
    <!-- Jquery -->
    <script type="text/javascript" src="{{asset('/')}}/assets/js/jquery/jquery.min.js"></script>
    <!-- Jquery Barcode -->
    <script type="text/javascript" src="{{asset('/')}}/assets/js/jquery-barcode.js"></script>
    <!-- Favicon icon -->
    <link rel="icon" href="{{asset('/')}}/assets/images/logo.png" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}/assets/css/bootstrap/css/bootstrap.min.css">
    <!-- waves.css -->
    <link rel="stylesheet" href="{{asset('/')}}/assets/pages/waves/css/waves.min.css" type="text/css" media="all">
    <!-- themify icon -->
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}/assets/icon/themify-icons/themify-icons.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}/assets/icon/font-awesome/css/font-awesome.min.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}/assets/icon/icofont/css/icofont.css">
    <!-- Notification.css -->
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}/assets/pages/notification/notification.css">
    <!-- Animate.css -->
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}/assets/css/animate.css/css/animate.css">
    <!-- scrollbar.css -->
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}/assets/css/jquery.mCustomScrollbar.css">
    <!-- am chart export.css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- Data Table -->
    <link href="{{asset('/')}}/assets/DataTables/datatables.min.css" rel="stylesheet">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}/assets/css/style.css">
</head>

<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="preloader-wrapper">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">
                    <div class="navbar-logo">
                        <a class="mobile-menu waves-effect waves-ligh" id="mobile-collapse" href="#!">
                            <i class="ti-menu"></i>
                        </a>
                        <div class="mobile-search waves-effect waves-light">
                            <div class="header-search">
                                <div class="main-search morphsearch-search">
                                    <div class="input-group">
                                        <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                        <input type="text" class="form-control" placeholder="Enter Keyword">
                                        <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('/')}}" class="d-flex justify-content-center align-items-center">
                            <img width="40" class="img-fluid mr-2" src="{{asset('/')}}/assets/images/logo.png" alt="Theme-Logo" />
                            <span class="font-weight-bold h6 mt-2">{{config('app.name')}}</span>
                        </a>
                        <a class="mobile-options waves-effect waves-light">
                            <i class="ti-more"></i>
                        </a>
                    </div>

                    <div class="navbar-container container-fluid">
                        <ul class="nav-left ml-3">
                            <li>
                                <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                            </li>
                            <li class="header-search">
                                <div class="main-search morphsearch-search">
                                    <div class="input-group">
                                        <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                        <input type="text" class="form-control">
                                        <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                                    <i class="ti-fullscreen"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            <li class="header-notification">
                                <a href="#!" class="waves-effect waves-light">
                                    <i class="ti-bell"></i>
                                    <span class="badge bg-c-red"></span>
                                </a>
                                <ul class="show-notification">
                                    <li>
                                        <h6>Notifications</h6>
                                        <label class="label label-danger">New</label>
                                    </li>
                                    <li class="waves-effect waves-light">
                                        <div class="media">
                                            <img class="d-flex align-self-center img-radius" src="{{asset('/')}}/assets/images/avatar-2.jpg" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="notification-user">{{@Auth::user()->nama}}</h5>
                                                <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                                <span class="notification-time">30 minutes ago</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="waves-effect waves-light">
                                        <div class="media">
                                            <img class="d-flex align-self-center img-radius" src="{{asset('/')}}/assets/images/user.png" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="notification-user">Joseph William</h5>
                                                <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                                <span class="notification-time">30 minutes ago</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="waves-effect waves-light">
                                        <div class="media">
                                            <img class="d-flex align-self-center img-radius" src="{{asset('/')}}/assets/images/avatar-3.jpg" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="notification-user">Sara Soudein</h5>
                                                <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                                <span class="notification-time">30 minutes ago</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="user-profile header-notification">
                                <a href="#!" class="waves-effect waves-light">
                                    <img src="{{asset('/')}}/assets/images/user.png" class="img-radius" alt="User-Profile-Image">
                                    <span>{{@Auth::user()->nama}}</span>
                                    <i class="ti-angle-down"></i>
                                </a>
                                <ul class="show-notification profile-notification">
                                    <li class="waves-effect waves-light">
                                        <a href="{{url('/')}}">
                                            <i class="ti-user"></i> Profil
                                        </a>
                                    </li>
                                    <li class="waves-effect waves-light">
                                        <a href="{{route('logout')}}">
                                            <i class="ti-layout-sidebar-left"></i> Logout
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="">
                                <div class="main-menu-header">
                                    <img class="img-80 img-radius" src="{{asset('/')}}/assets/images/user.png" alt="User-Profile-Image">
                                    <div class="user-details">
                                        <span id="more-details">{{@Auth::user()->nama}} <i class="fa fa-caret-down"></i></span>
                                    </div>
                                </div>

                                <div class="main-menu-content">
                                    <ul>
                                        <li class="more-details">
                                            <a href="{{url('/')}}"><i class="ti-user"></i>Profil</a>
                                            <a href="{{route('logout')}}"><i class="ti-layout-sidebar-left"></i>Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="p-15 p-b-0">
                                <form class="form-material">
                                    <div class="form-group form-primary">
                                        <input type="text" name="nama" class="form-control" required="">
                                        <span class="form-bar"></span>
                                        <label class="float-label"><i class="fa fa-search m-r-10"></i>Cari Buku</label>
                                    </div>
                                </form>
                            </div>
                            <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Layout</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                                    <a href="{{url('/')}}" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="icofont icofont-home"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="{{ request()->routeIs('peminjaman.*') ? 'active' : '' }}">
                                    <a href="{{route('peminjaman.index')}}" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="icofont icofont-university"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Pinjam</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="{{ request()->routeIs('anggota.*') || request()->routeIs('kategori.*') || request()->routeIs('buku.*') ? 'active  pcoded-trigger' : '' }} pcoded-hasmenu">
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Master Data</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="{{ request()->routeIs('anggota.*') ? 'active' : '' }}">
                                            <a href="{{ route('anggota.index') }}" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Anggota</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="{{ request()->routeIs('kategori.*') ? 'active' : '' }}">
                                            <a href="{{route('kategori.index')}}" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Kategori</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="{{ request()->routeIs('buku.*') ? 'active' : '' }}">
                                            <a href="{{route('buku.index')}}" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Buku</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>                                
                                <li>
                                    <a href="{{url('/')}}" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="icofont icofont-book"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Kunjungan</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('/')}}" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="icofont icofont-exchange"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Usulan Koleksi</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="{{ request()->routeIs('pengguna.*') ? 'active' : '' }}">
                                    <a href="{{route('pengguna.index')}}" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="icofont icofont-users"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Data Pengguna</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <div class="pcoded-content">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Required Jquery -->
    <script type="text/javascript" src="{{asset('/')}}/assets/js/jquery-ui/jquery-ui.min.js "></script>
    <script type="text/javascript" src="{{asset('/')}}/assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="{{asset('/')}}/assets/js/bootstrap/js/bootstrap.min.js "></script>
    <script type="text/javascript" src="{{asset('/')}}/assets/pages/widget/excanvas.js "></script>
    <!-- waves js -->
    <script src="{{asset('/')}}/assets/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="{{asset('/')}}/assets/js/jquery-slimscroll/jquery.slimscroll.js "></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="{{asset('/')}}/assets/js/modernizr/modernizr.js "></script>
    <!-- slimscroll js -->
    <script type="text/javascript" src="{{asset('/')}}/assets/js/SmoothScroll.js"></script>
    <script src="{{asset('/')}}/assets/js/jquery.mCustomScrollbar.concat.min.js "></script>
    <!-- Chart js -->
    <script type="text/javascript" src="{{asset('/')}}/assets/js/chart.js/Chart.js"></script>
    <!-- amchart js -->
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="{{asset('/')}}/assets/pages/widget/amchart/gauge.js"></script>
    <script src="{{asset('/')}}/assets/pages/widget/amchart/serial.js"></script>
    <script src="{{asset('/')}}/assets/pages/widget/amchart/light.js"></script>
    <script src="{{asset('/')}}/assets/pages/widget/amchart/pie.min.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <!-- menu js -->
    <script src="{{asset('/')}}/assets/js/pcoded.min.js"></script>
    <script src="{{asset('/')}}/assets/js/vertical-layout.min.js "></script>
    <!-- notification js -->
    <script type="text/javascript" src="{{asset('/')}}/assets/js/bootstrap-growl.min.js"></script>
    <script>
        var successMessage = "{{ session('success') }}"; // Mendapatkan pesan sukses dari sesi Laravel
        var errorMessage = "{{ session('error') }}"; // Mendapatkan pesan sukses dari sesi Laravel
        var failedMessage = "{{ session('failed') }}"; // Mendapatkan pesan sukses dari sesi Laravel
    </script>
    <script type="text/javascript" src="{{asset('/')}}/assets/pages/notification/notification.js"></script>
    <!-- Data Table -->
    <script src="{{asset('/')}}/assets/DataTables/datatables.min.js"></script>
    <script>
        new DataTable('#example');
    </script>
    <!-- custom js -->
    <script type="text/javascript" src="{{asset('/')}}/assets/pages/dashboard/custom-dashboard.js"></script>
    <script>
        $(document).ready(function() {
            $('[data-toggle="popover"]').popover({
                html: true,
                content: function() {
                    return $('#primary-popover-content').html();
                }
            });
        });
    </script>
    <script src="{{asset('/assets/html2canvas/dist/html2canvas.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/')}}/assets/js/script.js"></script>
</body>

</html>