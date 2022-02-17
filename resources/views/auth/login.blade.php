<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="{{ asset('assets/sistema/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/sistema/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/sistema/css/style.css') }}" rel="stylesheet" type="text/css" />

    <script src="{{ asset('assets/sistema/js/modernizr.min.js') }}"></script>

</head>


<body class="bg-accpunt-pages">

    <!-- HOME -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    <div class="wrapper-page">

                        <div class="account-pages">
                            <div class="account-box">
                                <div class="account-logo-box">
                                    <h2 class="text-uppercase text-center">
                                        <a href="index.html" class="text-success">
                                            <img src="" alt="" height="18">logo aq
                                        </a>
                                    </h2>
                                    <h6 class="text-uppercase text-center font-bold mt-4">Login Administrativo</h6>
                                </div>
                                <div class="account-content">
                                    <form class="form-horizontal" action="{{ route('admin.login.post') }}"
                                        method="post">
                                        @csrf
                                        <div class="form-group m-b-20 row">
                                            <div class="col-12">
                                                <label for="emailaddress">Email</label>
                                                <input class="form-control" type="email" id="email" name="email"
                                                    required="" placeholder="Digite seu email">
                                            </div>
                                        </div>

                                        <div class="form-group row m-b-20">
                                            <div class="col-12">
                                                <label for="password">Senha</label>
                                                <input class="form-control" type="password" id="password"
                                                    name="password" required="" placeholder="Digite sua senha">
                                            </div>
                                        </div>


                                        <div class="form-group row text-center m-t-10">
                                            <div class="col-12">
                                                <button class="btn btn-block btn-gradient waves-effect waves-light"
                                                    type="submit">Entrar</button>
                                            </div>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                        <!-- end card-box-->


                    </div>
                    <!-- end wrapper -->

                </div>
            </div>
        </div>
    </section>
    <!-- END HOME -->


    <!-- jQuery  -->
    <script src="{{ asset('assets/sistema/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/sistema/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/sistema/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/sistema/js/waves.js') }}"></script>
    <script src="{{ asset('assets/sistema/js/jquery.slimscroll.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/sistema/js/jquery.core.js') }}"></script>
    <script src="{{ asset('assets/sistema/js/jquery.app.js') }}"></script>

</body>

</html>
