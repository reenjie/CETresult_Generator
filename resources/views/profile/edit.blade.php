@extends('layouts.app', ['activePage' => 'user', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION', 'navName' => 'User Profile', 'activeButton' => 'laravel'])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="section-image">
            <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
            <div class="mycard">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <h3>Personal Information</h3>
                        @include('components.alerts')
                        <form action="{{route('updatemyaccount')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-4 mb-2">
                                    <h5>
                                        Last Name
                                    </h5>
                                    <input type="text mb-2" style="text-transform:uppercase" value="{{Auth::user()->lname}}" required name="lname" class="form-control">
                                </div>
                                <div class="col-md-4 mb-2">
                                    <h5>
                                        First Name
                                    </h5>
                                    <input type="text" style="text-transform:uppercase" value="{{Auth::user()->fname}}" required name="fname" class="form-control">
                                </div>
                                <div class="col-md-4 mb-2">
                                    <h5>
                                        Middle Name
                                    </h5>
                                    <input type="text" style="text-transform:uppercase" value="{{Auth::user()->mname}}" required name="mname" class="form-control">
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
        
                           
        
        
                                <div class="col-md-6 mb-2 d-none">
                                    <h5>
                                        Contact Number
                                    </h5>
                                    <input type="text" name="contactno" value="xx{{Auth::user()->contactno}}" class="form-control">
                                </div>
        
        
        
                                <div class="col-md-12">
                                    <button class="btn btn-primary" type="submit" style="float:right">Save Changes<i class="fas fa-save"></i></button>
                                </div>
                            </div>
        
                        </form>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection