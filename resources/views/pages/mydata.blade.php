@extends('layouts.app', ['activePage' => 'mydata', 'navName' => 'My Data ', 'activeButton' => 'laravel'])
@section('content')
<div class="container">
    <div class="mycard">
        <h3>Personal Information</h3>
        @include('components.alerts')
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

                <div class="col-md-4 mb-2">
                    <h5>
                       Religion
                    </h5>
                    <input type="text" style="text-transform:uppercase" value="{{Auth::user()->religion}}" required name="religion" class="form-control">
                </div>
                
                <div class="col-md-6 mb-2">
                    <h5>
                       Gender
                    </h5>
                    <select name="gender" readonly style="text-transform:uppercase"  required class="form-control" id="">
                        <option value="{{Auth::user()->gender}}">{{Auth::user()->gender}}</option>
                        <option value="MALE">Male</option>
                        <option value="FEMALE">Female</option>
                    </select>
                </div>
                <div class="col-md-6 mb-2">
                    <h5>
                       Civil Status
                    </h5>
                    <select name="civilstatus" style="text-transform:uppercase" required class="form-control" id="">
                        <option value="{{Auth::user()->civilstatus}}">{{Auth::user()->civilstatus}}</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Widdowed">Widdowed</option>
                    </select>
                </div>

                <div class="col-md-6 mb-2">
                    <h5>
                       Birth-Date
                    </h5>
                    <input type="date" required name="Bdate" value="{{Auth::user()->birthdate}}" class="form-control">
                </div>
             

                <div class="col-md-12">
                    <div class="card shadow">
                        <div class="card-body">
                            <h6>Login Credentials</h6>

                            <div class="row">
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
                                <input type="text"  placeholder="New Password"  name="password" class="form-control">
                                <span style="font-size:13px;color:red">Type here to change your password</span>
                                </div>
                            </div>
                        </div>
                    </div>
                
                </div>

                <div class="col-md-12 mb-2">
                    <h5>
                    Address
                    </h5>
                  <textarea name="address" readonly style="text-transform:uppercase"  required class="form-control" id="" cols="5" rows="8">{{Auth::user()->address}}</textarea>
                </div>

                
                <div class="col-md-6 mb-2">
                    <h5>
                  Contact Number
                    </h5>
                    <input type="text" required name="contactno" value="{{Auth::user()->contactno}}" class="form-control">
                </div>

                <div class="col-md-6 mb-2">
                    <h5>
                  Emergency Contact Number
                    </h5>
                    <input type="text" required name="econtactno" value="{{Auth::user()->emergencycontact}}" class="form-control">
                </div>

                <div class="col-md-12">
                    <h6>Other Information</h6>
                </div>
                <div class="col-md-4 mb-2">
                    <h5>
                   Community Tax Number
                    </h5>
                <input type="text"  name="ctn" value="{{Auth::user()->com_tax_number}}" class="form-control">
                </div>

                <div class="col-md-4 mb-2">
                    <h5>
                   TIN Number ( Tax Identification Number)
                    </h5>
                <input type="text"  name="tin" value="{{Auth::user()->tin}}" class="form-control">
                </div>

                <div class="col-md-4 mb-2">
                    <h5>
                  GSIS Number
                    </h5>
                <input type="text"  name="gsis" value="{{Auth::user()->gsis}}" class="form-control">
                </div>

                <div class="col-md-4 mb-2">
                    <h5>
                 SSS Number
                    </h5>
                <input type="text"  name="sss" value="{{Auth::user()->sss}}" class="form-control">
                </div>

                <div class="col-md-8 mb-2">
                    <h5>
               Occupation
                    </h5>
                <input type="text" style="text-transform:uppercase" value="{{Auth::user()->occupation}}"  name="occupation" class="form-control">
                </div>

              

                <div class="col-md-12">
                    <button class="btn btn-primary" type="submit" style="float:right">Save Changes<i class="fas fa-save"></i></button>
                </div>
            </div>
            
        </form>
    </div>
</div>

@endsection