@extends('layouts.app', ['activePage' => 'register', 'title' => 'ZCIBT'])

@section('content')
<style>

</style>
<div class=" register-page section-image">
    <div class="content">
        <div class="container">
            <div class="card mt-5">
                <div class="card-header">
                    <button class="btn btn-light text-primary btn-sm" onclick="window.location.href='{{route('login')}}' "><i class="fas fa-arrow-left"></i> Back to Login</button>
                    <img src="{{asset('images/talisayan.png')}}" style="width:100px;float: right;" alt="">
                    <h4>Register</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('registerUser')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <h5>
                                    Last Name
                                </h5>
                                <input type="text mb-2" style="text-transform:uppercase" required name="lname" class="form-control">
                            </div>
                            <div class="col-md-4 mb-2">
                                <h5>
                                    First Name
                                </h5>
                                <input type="text" style="text-transform:uppercase" required name="fname" class="form-control">
                            </div>
                            <div class="col-md-4 mb-2">
                                <h5>
                                    Middle Name
                                </h5>
                                <input type="text" style="text-transform:uppercase" required name="mname" class="form-control">
                            </div>

                            <div class="col-md-4 mb-2">
                                <h5>
                                    Religion
                                </h5>
                                <input type="text" style="text-transform:uppercase" required name="religion" class="form-control">
                            </div>

                            <div class="col-md-6 mb-2">
                                <h5>
                                    Gender
                                </h5>
                                <select name="gender" style="text-transform:uppercase" required class="form-control" id="">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-2">
                                <h5>
                                    Civil Status
                                </h5>
                                <select name="civilstatus" style="text-transform:uppercase" required class="form-control" id="">
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Widdowed">Widdowed</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-2">
                                <h5>
                                    Birth-Date
                                </h5>
                                <input type="date" required name="Bdate" class="form-control">
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
                                                <input type="email" required name="email" class="form-control">
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <h5>
                                                    Password
                                                </h5>
                                                <input type="text" name="password" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 mb-2">
                                <h5>
                                    Address
                                </h5>
                                <textarea name="address" style="text-transform:uppercase" required class="form-control" id="" cols="5" rows="8"></textarea>
                            </div>


                            <div class="col-md-6 mb-2">
                                <h5>
                                    Contact Number
                                </h5>
                                <input type="text" required name="contactno" class="form-control">
                            </div>

                            <div class="col-md-6 mb-2">
                                <h5>
                                    Emergency Contact Number
                                </h5>
                                <input type="text" required name="econtactno" class="form-control">
                            </div>

                            <div class="col-md-12">
                                <h6>Other Information</h6>
                            </div>
                            <div class="col-md-4 mb-2">
                                <h5>
                                    Community Tax Number
                                </h5>
                                <input type="text" name="ctn" class="form-control">
                            </div>

                            <div class="col-md-4 mb-2">
                                <h5>
                                    TIN Number ( Tax Identification Number)
                                </h5>
                                <input type="text" name="tin" class="form-control">
                            </div>

                            <div class="col-md-4 mb-2">
                                <h5>
                                    GSIS Number
                                </h5>
                                <input type="text" name="gsis" class="form-control">
                            </div>

                            <div class="col-md-4 mb-2">
                                <h5>
                                    SSS Number
                                </h5>
                                <input type="text" name="sss" class="form-control">
                            </div>

                            <div class="col-md-8 mb-2">
                                <h5>
                                    Occupation
                                </h5>
                                <input type="text" style="text-transform:uppercase" name="occupation" class="form-control">
                            </div>

                            <div class="col-md-12">
                                <button class="btn btn-primary" type="submit" style="float:right">Save Records & Register <i class="fas fa-save"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    $(document).ready(function() {
        demo.checkFullPageBackgroundImage();

        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
    });
</script>
@endpush