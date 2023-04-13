@extends('layouts.app', ['activePage' => 'register', 'title' => 'ZCIBT'])

@section('content')
<style>

</style>
<div class=" register-page section-image">
    <div class="content">
        <div class="container">
           <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class=" mt-5">
                    <div class="card-header" style="background-color: #DF2E38;padding:50px">
                        <button class="btn btn-light text-light border border-light btn-sm" style="float:left" onclick="window.location.href='{{route('login')}}' "> Back to Login</button>
                        <img src="https://th.bing.com/th/id/R.5513cd2957a47cc316b1c8696e0bd5d6?rik=%2fnP%2bYG1kfgFycw&riu=http%3a%2f%2f3.bp.blogspot.com%2f-a1cqTunmh4M%2fTgzKp3hFl5I%2fAAAAAAAAAig%2fyCYIlCoJmj0%2fs1600%2fSlide47.JPG&ehk=6xljpsfhRuyvgvPV97CD0lkREBTUKsQvY66MWl72jsg%3d&risl=&pid=ImgRaw&r=0" style="width:100px;float: right;" alt="">
    
                        <h4 class="text-light text-center">WMSU CET REsult Generator | Registration</h4>
    
    
    
                    </div>
                    <div class="card-body">
                        <form action="{{route('registerUser')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <h5>
                                        Last Name
                                    </h5>
                                    <input type="text mb-2" style="text-transform:uppercase" required name="lname" class="form-control">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <h5>
                                        First Name
                                    </h5>
                                    <input type="text" style="text-transform:uppercase" required name="fname" class="form-control">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <h5>
                                        Middle Name
                                    </h5>
                                    <input type="text" style="text-transform:uppercase" required name="mname" class="form-control">
                                </div>
    
                              
    
    
                                <div class="col-md-6 mb-2">
                                    <h5>
                                        Contact Number
                                    </h5>
                                    <input type="text" required name="contactno" class="form-control">
                                </div>
                                <div class="col-md-6"></div>
                                <div class="col-md-12">
                                  
                                        <h5>
                                            College
                                        </h5>
                                        <input type="text" name="college" style="text-transform:uppercase" value="" required class="form-control mb-3">
                                </div>
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
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-danger px-5 mt-4" type="submit" style="float:right">Register <i class="fas fa-check-circle"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
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