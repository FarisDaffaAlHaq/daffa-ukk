<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
<link rel="icon" href="{{asset('gambarhotel/insitu.png')}}">
<title>
Login
</title>
<!--     Fonts and icons     -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
<!-- Nucleo Icons -->
<link href="{{asset('soft-ui-dashboard-main/assets/css/nucleo-icons.css')}}" rel="stylesheet" />
<link href="{{asset('soft-ui-dashboard-main/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
<link href="{{asset('soft-ui-dashboard-main/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
<!-- CSS Files -->
<link id="pagestyle" href="{{asset('soft-ui-dashboard-main/assets/css/soft-ui-dashboard.css?v=1.0.3')}}" rel="stylesheet" />
</head>

<body class="">
<div class="container position-sticky z-index-sticky top-0">
<div class="row">
    <div class="col-12">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
        <div class="container-fluid">
        <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="/">
            Hotel Hebat Insitu
        </a>
        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon mt-2">
            <span class="navbar-toggler-bar bar1"></span>
            <span class="navbar-toggler-bar bar2"></span>
            <span class="navbar-toggler-bar bar3"></span>
            </span>
        </button>
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav mx-auto">
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="/">
                <i class="fa fa-chart-pie opacity-6 text-dark me-1"></i>
                Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link me-2" href="/register/">
                <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                Sign Up
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link me-2" href="/login/">
                <i class="fas fa-key opacity-6 text-dark me-1"></i>
                Sign In
                </a>
            </li>
            </ul>
        </div>
        </div>
    </nav>
    <!-- End Navbar -->
    </div>
</div>
</div>
<main class="main-content  mt-0">
<section>
    <div class="page-header min-vh-100">
    <div class="container">
        <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 d-flex flex-column mx-auto">
            <div class="card card-plain mt-8">
            <div class="card-header pb-0 text-left bg-transparent">
                <h3 class="font-weight-bolder" style="color: #4b0082;">Welcome back Guys🤗</h3>
                <p class="mb-0">Enter your email and password to sign in</p>
            </div>
            <div class="card-body">
                <form role="form" method="POST" action="{{ route('login') }}">
                    @csrf
                <label>Email</label>
                <div class="mb-3">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" required autocomplete="username">
                </div>
                <label>Password</label>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">Remember me</label>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn text-white w-100 mt-4 mb-0" style="background-color:#4b0082;">Sign in</button>
                </div>
                </form>
            </div>
            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                <p class="mb-4 text-sm mx-auto">
                Don't have an account?
                <a href="/register/" class="text-info text-gradient font-weight-bold">Sign up</a>
                </p>
            </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
            <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('../assets/img/curved-images/curved6.jpg')"></div>
            </div>
        </div>
        </div>
    </div>
    </div>
</section>
</main>
<!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
<footer class="footer py-5">
<div class="container">
    <div class="row">
    <div class="col-8 mx-auto text-center mt-1">
        <p class="mb-0 text-secondary">
        Copyright © <script>
            document.write(new Date().getFullYear())
        </script> by IndigoShine - Hotel.
        </p>
    </div>
    </div>
</div>
</footer>
<!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
<!--   Core JS Files   -->
<script src="{{asset('soft-ui-dashboard-main/assets/js/core/popper.min.js')}}"></script>
<script src="{{asset('soft-ui-dashboard-main/assets/js/core/bootstrap.min.js')}}"></script>
<script src="{{asset('soft-ui-dashboard-main/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('soft-ui-dashboard-main/assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
<script>
var win = navigator.platform.indexOf('Win') > -1;
if (win && document.querySelector('#sidenav-scrollbar')) {
    var options = {
    damping: '0.5'
    }
    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
}
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{asset('soft-ui-dashboard-main/assets/js/soft-ui-dashboard.min.js?v=1.0.3')}}"></script>
</body>

</html>