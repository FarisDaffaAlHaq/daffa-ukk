<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="apple-touch-icon" sizes="76x76" href="{{asset('soft-ui-dashboard-main/assets/img/apple-icon.png')}}">
<link rel="icon" href="{{asset('gambarhotel/insitu.png')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<title>@yield('title')</title>
<!--     Fonts and icons     -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Nucleo Icons -->
<link href="{{asset('soft-ui-dashboard-main/assets/css/nucleo-icons.css')}}" rel="stylesheet" />
<link href="{{asset('soft-ui-dashboard-main/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
<link href="{{asset('soft-ui-dashboard-main/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
<!-- datatabels -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<!-- CSS Files -->
<link id="pagestyle" href="{{asset('soft-ui-dashboard-main/assets/css/soft-ui-dashboard.css?v=1.0.3')}}" rel="stylesheet" />
</head>
@include('template.sidebar')
<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
<!-- Navbar -->
@include('template.navbar')
<!-- End Navbar -->
<div class="container py-4">
    @yield('content')
</div>
@include('template.footer')
<!--   Core JS Files   -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@stack('select2')
<script src="{{asset('soft-ui-dashboard-main/assets/js/core/popper.min.js')}}"></script>
<script src="{{asset('soft-ui-dashboard-main/assets/js/core/bootstrap.min.js')}}"></script>
<script src="{{asset('soft-ui-dashboard-main/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('soft-ui-dashboard-main/assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
<script src="{{asset('soft-ui-dashboard-main/assets/js/plugins/chartjs.min.js')}}"></script>
<script>
var win = navigator.platform.indexOf('Win') > -1;
if (win && document.querySelector('#sidenav-scrollbar')) {
    var options = {
    damping: '0.5'
    }
    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
}
</script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
@stack('datatables')
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{asset('soft-ui-dashboard-main/assets/img/logo-ct.png/assets/js/soft-ui-dashboard.min.js?v=1.0.3')}}"></script>
</body>
</html>