<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('light-bootstrap/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="https://th.bing.com/th/id/R.5513cd2957a47cc316b1c8696e0bd5d6?rik=%2fnP%2bYG1kfgFycw&riu=http%3a%2f%2f3.bp.blogspot.com%2f-a1cqTunmh4M%2fTgzKp3hFl5I%2fAAAAAAAAAig%2fyCYIlCoJmj0%2fs1600%2fSlide47.JPG&ehk=6xljpsfhRuyvgvPV97CD0lkREBTUKsQvY66MWl72jsg%3d&risl=&pid=ImgRaw&r=0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>WMSU CET</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
  <!-- CSS Files -->
  <link href="{{ asset('light-bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('light-bootstrap/css/light-bootstrap-dashboard.css?v=2.0.0') }} " rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('light-bootstrap/css/demo.css') }}" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300&display=swap');

    .mycard {
      padding: 20px;
      margin-top: 10px;
      border-radius: 2px;
      background-color: white
    }
  </style>
</head>


<body style="background-color:#F7F1E5">

  <div class="wrapper @if (!auth()->check() || request()->route()->getName() == "") wrapper-full-page @endif">

    @if (auth()->check() && request()->route()->getName() != "")
    @include('layouts.navbars.sidebar')

    @endif

    <div class="@if (auth()->check() && request()->route()->getName() != "") main-panel @endif">
      @include('layouts.navbars.navbar')
      @yield('content')
    </div>

  </div>

  @include('components.modal', [
  'id' =>"addaccount",
  'modalsize' => '',
  'modaltitle' => 'Add User',
  'type' => 'adduser',
  ])


  @include('components.modal', [
  'id' =>"editaccount",
  'modalsize' => '',
  'modaltitle' => 'Edit User',
  'type' => 'edituser',
  ])

  @include('components.modal', [
  'id' =>"clearance",
  'modalsize' => 'modal-lg',
  'modaltitle' => 'Make a Request | Barangay Clearance',
  'type' => 'clearance',
  ])

  @include('components.modal', [
  'id' =>"barangayid",
  'modalsize' => 'modal-lg',
  'modaltitle' => 'Make a Request | Barangay ID',
  'type' => 'barangayid',
  ])

  @include('components.modal', [
  'id' =>"certificate",
  'modalsize' => 'modal-lg',
  'modaltitle' => 'Make a Request | Barangay Certificate',
  'type' => 'certificate',
  ])
</body>
<!--   Core JS Files   -->
<script src="{{ asset('light-bootstrap/js/core/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('light-bootstrap/js/core/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('light-bootstrap/js/core/bootstrap.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('light-bootstrap/js/plugins/jquery.sharrre.js') }}"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="{{ asset('light-bootstrap/js/plugins/bootstrap-switch.js') }}"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Chartist Plugin  -->
<script src="{{ asset('light-bootstrap/js/plugins/chartist.min.js') }}"></script>
<!--  Notifications Plugin    -->
<script src="{{ asset('light-bootstrap/js/plugins/bootstrap-notify.js') }}"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="{{ asset('light-bootstrap/js/light-bootstrap-dashboard.js?v=2.0.0') }}" type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ asset('light-bootstrap/js/demo.js') }}"></script>

<link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css" rel="stylesheet" />
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.js"></script>

@stack('js')


<script>
  $(document).ready(function() {

    // $('.table').DataTable();
    $('#table0').DataTable();
    $('#table1').DataTable();
    $('#table2').DataTable();
    $('#table3').DataTable();
    $('#table4').DataTable();


    $('#facebook').sharrre({
      share: {
        facebook: true
      },
      enableHover: false,
      enableTracking: false,
      enableCounter: false,
      click: function(api, options) {
        api.simulateClick();
        api.openPopup('facebook');
      },
      template: '<i class="fab fa-facebook-f"></i> Facebook',
      url: 'https://light-bootstrap-dashboard-laravel.creative-tim.com/login'
    });

    $('#google').sharrre({
      share: {
        googlePlus: true
      },
      enableCounter: false,
      enableHover: false,
      enableTracking: true,
      click: function(api, options) {
        api.simulateClick();
        api.openPopup('googlePlus');
      },
      template: '<i class="fab fa-google-plus"></i> Google',
      url: 'https://light-bootstrap-dashboard-laravel.creative-tim.com/login'
    });

    $('#twitter').sharrre({
      share: {
        twitter: true
      },
      enableHover: false,
      enableTracking: false,
      enableCounter: false,
      buttons: {
        twitter: {
          via: 'CreativeTim'
        }
      },
      click: function(api, options) {
        api.simulateClick();
        api.openPopup('twitter');
      },
      template: '<i class="fab fa-twitter"></i> Twitter',
      url: 'https://light-bootstrap-dashboard-laravel.creative-tim.com/login'
    });
  });
</script>

</html>