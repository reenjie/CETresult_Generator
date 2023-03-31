@extends('layouts.app', ['activePage' => 'dashboard', 'title' => 'ZCIBT', 'navName' => 'Dashboard', 'activeButton' => 'laravel'])

@section('content')
<div class="content">
    @if(Auth::user()->roles == 1)
    <script>
        //window.location.href = "{{route('page.index', 'request')}}";
    </script>
    @endif

    <div class="container-fluid">

        <div class="mycard">


        </div>
    </div>
</div>


@endsection