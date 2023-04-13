@extends('layouts.app', ['activePage' => 'mydata', 'navName' => 'My Data ', 'activeButton' => 'laravel'])
@section('content')
<div class="container">
    <div class="mycard">
        <h3>Personal Information</h3>
        
        <form action="{{route('updatemyaccount')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-4 mb-2">
                    <h5>
                        Last Name
                    </h5>
                    <input type="text mb-2" style="text-transform:uppercase" readonly value="{{Auth::user()->lname}}" required name="lname" class="form-control">
                </div>
                <div class="col-md-4 mb-2">
                    <h5>
                        First Name
                    </h5>
                    <input type="text" style="text-transform:uppercase" readonly value="{{Auth::user()->fname}}" required name="fname" class="form-control">
                </div>
                <div class="col-md-4 mb-2">
                    <h5>
                        Middle Name
                    </h5>
                    <input type="text" style="text-transform:uppercase" readonly value="{{Auth::user()->mname}}" required name="mname" class="form-control">
                </div>

               


                <div class="col-md-12 mb-2">
                    <h5>
                        Contact Number
                    </h5>
                    <input type="text" required name="contactno" value="{{Auth::user()->contactno}}" class="form-control">
                </div>

                <div class="col-md-6 mb-2">
                    <h5>
                        Email
                    </h5>
                    <input type="email" required disabled value="{{Auth::user()->email}}" name="email" class="form-control">
                </div>
                <div class="col-md-6 mb-2">
                    <h5>
                        Password
                    </h5>
                    <input type="text" placeholder="New Password" name="password" class="form-control">
                    <span style="font-size:13px;color:red">Type here to change your password</span>
                </div>

                <input type="hidden" required name="college" value="{{Auth::user()->college}}" class="form-control">


                <div class="col-md-12">
                    <button class="btn btn-danger mt-4" type="submit" style="float:right">Save Changes <i class="fas fa-check-circle"></i></button>
                </div>
            </div>

        </form>
    </div>
</div>

@endsection