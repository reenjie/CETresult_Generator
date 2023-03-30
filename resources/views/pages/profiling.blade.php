@extends('layouts.app', ['activePage' => 'profiling', 'navName' => 'Barangay Profiling', 'activeButton' => 'laravel'])
@section('content')
    <div class="container">
        @include('components.alerts')
        <div class="mycard">
            <h6>BARANGAY TALISAYAN | USER PROFILING</h6>
       

          
                    <h4 class="text-danger">Pending Request <i class="fas fa-sync"></i></h4>
                    <hr>
                    @include('pages.profiling.request')
                    <hr>
                    <h4 class="text-primary">Clearance <i class="fas fa-clipboard"></i></h4>
                    @include('pages.profiling.clearance')
                    <hr>
                    <h4 class="text-info">Identification ( ID ) <i class="fas fa-id-card"></i></h4>
                    @include('pages.profiling.identification')
                    <hr>
                    <h4 class="text-primary">Certification <i class="fas fa-clipboard-list"></i></h4>
                    @include('pages.profiling.certification')

        </div>
    </div>
@endsection
