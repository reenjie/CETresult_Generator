@extends('layouts.app', ['activePage' => 'dashboard', 'title' => 'ZCIBT', 'navName' => 'Dashboard', 'activeButton' => 'laravel'])

@section('content')
<div class="content">
    @if(Auth::user()->roles == 1)
    <script>
        //window.location.href = "{{route('page.index', 'request')}}";
    </script>
    @endif
    @php
    $res = DB::select('select * from users where roles = 1');
    $clearance = DB::select('select * from u_requests where request= 0');
    $id = DB::select('select * from u_requests where request= 1');
    $certificate = DB::select('select * from u_requests where request= 2');
    @endphp
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card h-100 shadow d-block d-flex" style="border-top: 20px solid #BBD6B8 ">
                    <div class="card-body ">
                        <h1>{{count($res)}}<br> <span style="font-size: 15px">Residents</span></h1>

                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 shadow d-flex" style="border-top: 20px solid #97DEFF ">
                    <div class="card-body  ">
                        <h1>{{count($clearance)}} <br> <span style="font-size: 15px">Clearance Request</span></h1>

                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 shadow d-flex" style="border-top: 20px solid #FFACAC ">
                    <div class="card-body  ">
                        <h1>{{count($id)}}<br> <span style="font-size: 15px">ID Request</span></h1>

                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow h-100 d-flex" style="border-top: 20px solid #FDD36A ">
                    <div class="card-body  ">
                        <h1>{{count($certificate)}} <br> <span style="font-size: 15px">Certificate Request</span></h1>

                    </div>
                </div>
            </div>
        </div>
        <div class="mycard">


        </div>
    </div>
</div>


@endsection