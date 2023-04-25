<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('materialpro/images/favicon.png') }}">
    <title>Login</title>
	<link rel="canonical" href="https://www.wrappixel.com/templates/monsteradmin/" />
    <!-- Custom CSS -->
    <link href="{{ asset('materialpro/css/style.min.css') }}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="main-wrapper">
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
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url({{ asset('materialpro/images/background/login-register.jpg')}}) no-repeat center center; background-size: cover;">
            <div class="shadow auth-box p-4 bg-white rounded">
                <div id="loginform">
                    @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Welcome to the club!</strong> {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <div class="logo">
                        <img src="{{ asset('materialpro/images/logo_secapaad.png') }}" class="mx-auto d-block">
                    </div>
                    <!-- Form -->
                    <div class="row">
                        <div class="col-12">
                            <form class="form-horizontal mt-3 form-material" id="loginform" action="{{ url('login') }}" method="POST">@csrf
                                <div class="form-group mb-3">
                                    <div class="">
                                        <input class="form-control" type="text" placeholder="Username" name="username" autofocus @required(true) value="{{old('username')}}"></div>
                                </div>
                                <div class="form-group mb-4">
                                    <div class="">
                                        <input class="form-control" type="password" placeholder="Password" name="password" @required(true)></div>
                                </div>
                                <div class="form-group">
                                    <div class="d-flex">
                                        <div class="checkbox checkbox-info pt-0">
                                            <input id="checkbox-signup" type="checkbox" class="material-inputs chk-col-indigo" name="remember_token">
                                            <label for="checkbox-signup"> Remember me </label>
                                        </div> 
                                    </div>
                                </div>
                                <div class="form-group text-center mt-4">
                                    <div class="col-xs-12">
                                        <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                                    </div>
                                </div>
                                <div class="form-group mb-0 mt-4">
                                    <div class="col-sm-12 justify-content-center d-flex">
                                        <p>Don't have an account? <a href="{{ url('register') }}" class="text-info font-weight-normal ml-1">Sign Up</a></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="{{ asset('materialpro/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('materialpro/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('materialpro/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
    </script>
</body>

</html>