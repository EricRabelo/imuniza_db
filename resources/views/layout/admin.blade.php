<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/sistema/images/favicon.ico') }}">

    <!-- App css -->
    <link href="{{ asset('assets/sistema/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/sistema/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/sistema/css/metismenu.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/sistema/css/style.css') }}" rel="stylesheet" type="text/css" />

    <script src="{{ asset('assets/sistema/js/modernizr.min.js') }}"></script>

</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <div class="topbar">

            <!-- LOGO -->
            <div class="topbar-left">
                <a href="/" class="logo">
                    <span>
                        <img src="{{ asset('assets/sistema/images/logo.png') }}" alt="" height="16">
                    </span>
                    <i>
                        <img src="{{ asset('assets/sistema/images/logo_sm.png') }}" alt="" height="28">
                    </i>
                </a>
            </div>

            <nav class="navbar-custom">

                <ul class="list-unstyled topbar-right-menu float-right mb-0">
                    
                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown"
                            href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            
                            <span class="ml-1">{{ Auth::user()->name }}<i class="mdi mdi-chevron-down"></i> </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <a href="{{ route('admin.logout') }}" class="dropdown-item notify-item">
                                <i class="fi-power"></i> <span>Sair</span>
                            </a>

                        </div>
                    </li>

                </ul>

                <ul class="list-inline menu-left mb-0">
                    <li class="float-left">
                        <button class="button-menu-mobile open-left waves-light waves-effect">
                            <i class="dripicons-menu"></i>
                        </button>
                    </li>
                </ul>

            </nav>

        </div>
        <!-- Top Bar End -->


        <!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu">
            <div class="slimscroll-menu" id="remove-scroll">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu" id="side-menu">
                        <li class="menu-title">Menu</li>
                        <li>
                            <a href="{{ route('admin.home') }}">
                                <i class="fi-air-play"></i> <span> Dashboard </span>
                            </a>
                        </li>

                        <li>
                            <a href="#"><i class="fi-layout"></i> <span> Informações </span> <span
                                    class="menu-arrow"></span></a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <!---<li><a href="{{ route('admin.aboutus.edit', 1) }}">Sobre Nós</a></li>-->
                                <!---<li><a href="{{ route('admin.contact.edit', 1) }}">Contato</a></li>-->
                                <!---<li><a href="{{ route('admin.banner.index') }}">Banner</a></li>-->
                                <li><a href="{{ route('admin.pessoa.index') }}">Pessoa</a></li>
                                <li><a href="{{ route('admin.vacina.index') }}">Vacina</a></li>
                                <li><a href="{{ route('admin.registrovacinacao.index') }}">Registros</a></li>
                                <li><a href="{{ route('admin.fabricante.index') }}">Fabricante</a></li>
                                <li><a href="{{ route('admin.doenca.index') }}">Doença</a></li>
                                <li><a href="{{ route('admin.lote.index') }}">Lote</a></li>
                            </ul>
                        </li>

                        <!---<li>
                            <a href="#"><i class="fi-briefcase"></i><span> Portfólio </span> <span
                                    class="menu-arrow"></span></a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="/">Serviço</a></li>
                                <li><a href="/">Galeria</a></li>
                            </ul>
                        </li>

                        <li class="menu-title">Mais</li>

                        <li>
                            <a href="#"><i class="fi-paper"></i> <span> Post </span> <span
                                    class="menu-arrow"></span></a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{ route('admin.postcategorie.index') }}">Categoria</a></li>
                                <li><a href="/">Postagem</a></li>
                            </ul>
                        </li>-->

                    </ul>

                </div>
                <!-- Sidebar -->
                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title float-left">@yield('sub_title')</h4>

                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">@yield('sub_title')</li>
                                </ol>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    @include('components.alerts')

                    @yield('content')


                </div> <!-- container -->

            </div> <!-- content -->

            <footer class="footer text-right">
                Imuniza Database - 2022
            </footer>

        </div>

        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- jQuery  -->
    <script src="{{ asset('assets/sistema/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/sistema/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/sistema/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/sistema/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/sistema/js/waves.js') }}"></script>
    <script src="{{ asset('assets/sistema/js/jquery.slimscroll.js') }}"></script>

    <!-- script do feedback -->
    <script src="{{ asset('assets/sistema/js/feedback.js') }}"></script>

    <!-- init dashboard -->
    <script src="{{ asset('assets/sistema/pages/jquery.dashboard.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/sistema/js/jquery.core.js') }}"></script>
    <script src="{{ asset('assets/sistema/js/jquery.app.js') }}"></script>

    @yield('script')

</body>

</html>
