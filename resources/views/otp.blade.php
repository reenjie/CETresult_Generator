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
        #otp {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%,-50%);
        }
    </style>
</head>


<body style="background-color:#a80404">


 <div class="container mt-5">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body p-5">
                   <h4>We have sent your OTP ( One Time Pin ) to your email {{ substr(Auth::user()->email, 0, 2) . str_repeat('*', strlen(Auth::user()->email) - 6) . substr(Auth::user()->email, -4)}} 

                </h4>
              <form action="{{route('validateOtp')}}" method="post">
                @csrf
                <input type="text" name="code" required class="form-control py-4 @if(session()->has('error')) is-invalid  @endif " style="text-align:center;font-size:40px" autofocus>
                <div class="invalid-feedback">@if(session()->has('error')) {{session()->get('error')}} @endif</div>
                <button type="submit" class="btn btn-dark bg-dark text-light px-5 form-control mt-4 fw-bold" style="font-weight: bold">VALIDATE</button>
             </form>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
 </div>




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
        $('#table1').DataTable();
        $('#table0').DataTable();
    });
</script>

</html>