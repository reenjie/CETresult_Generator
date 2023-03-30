@extends('layouts/app', ['activePage' => 'login', 'title' => 'ZCIBT'])

@section('content')
<div style="position: absolute;left:50%;top:50%;transform:translate(-50%,-50%);width:400px">
    <form class="form" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="card shadow " style="border-radius: 10px;">

            <div class="card-body ">

                <div class="form-group">
                    <h3 class=" text-center">
                        <img src="https://th.bing.com/th/id/R.5513cd2957a47cc316b1c8696e0bd5d6?rik=%2fnP%2bYG1kfgFycw&riu=http%3a%2f%2f3.bp.blogspot.com%2f-a1cqTunmh4M%2fTgzKp3hFl5I%2fAAAAAAAAAig%2fyCYIlCoJmj0%2fs1600%2fSlide47.JPG&ehk=6xljpsfhRuyvgvPV97CD0lkREBTUKsQvY66MWl72jsg%3d&risl=&pid=ImgRaw&r=0" style="width:100px" alt="">
                        <br>
                        <span style="font-size: 15px; font-weight:bold">WMSU CET RESULT GENERATOR</span>

                        <p style="font-size:13px;font-weight:normal">SYSTEM</p>
                    </h3>
                    <label for="email" class="col-md-6 col-form-label">{{ __('Email') }}</label>

                    <div class="col-md-14">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-md-6 col-form-label">{{ __('Password') }}</label>

                        <div class="col-md-14">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <div class="form-check">
                            <label class="form-check-label d-flex align-items-center">
                                <input class="form-check-input" type="checkbox" name="remember" checked id="remember">
                                <span class="form-check-sign"></span>
                                {{ __('Remember me') }}
                            </label>
                        </div>
                    </div> -->
                </div>

                <button type="submit" class="btn btn-danger form-control text-danger " style="float:Right;text-transform:uppercase">{{ __('Login') }} <i class="fas fa-arrow-circle-right"></i></button>
                <a class="btn btn-link" style="color:#DF2E38" href="{{ route('register') }}">
                    {{ __('No account? Click here..') }}
                </a>
            </div>
        </div>
    </form>
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