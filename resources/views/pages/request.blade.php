@extends('layouts.app', ['activePage' => 'request', 'navName' => 'My Request ', 'activeButton' => 'laravel'])
@section('content')
<div class="container">
    @include('components.alerts')
    <div class="mycard">
        <div class="row">
            <div class="col-md-8">

           @php
                $alluserRequest = DB::select('SELECT * FROM `u_requests` where userid = '.Auth::user()->id.' ');     
                $barangayid   = DB::select('SELECT * FROM `u_requests` where userid = '.Auth::user()->id.' and request= 1 and status in (0,1) ');
                $certificate   = DB::select('SELECT * FROM `u_requests` where userid = '.Auth::user()->id.' and request= 2 ');
            @endphp

                @if(count($alluserRequest)>=1)
            @foreach ($alluserRequest as $item)
                    <div class="card shadow mb-2">
                        <div class="card-body">
                            <h5 style="">
                                <span style="font-weight:bold" class="text-secondary">
                                    @switch($item->request)
                                        @case(0)
                                            Barangay Clearance
                                            @break
                                        @case(1)
                                            Barangay ID
                                            @break
                                            @case(2)
                                            Barangay Certification
                                            @break
                                            
                                    @endswitch
                                </span>
                                <span style="float:right;font-size:13px" class="text-secondary">Date Requested : {{date('F j,Y',strtotime($item->created_at))}}</span>
                                <br>
                                @if($item->purpose)
                               <span style="font-size:13px;color:gray"> Purpose</span>
                                <p style="font-size:15px">
                                {{$item->purpose}}
                                </p>
                                @endif
                                
                            </h5>
                            @if($item->request == 0 || $item->request== 2 )
                                @if($item->status == 1)
                                <form action="{{route('downloadfile')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="type" value="{{$item->request}}">
                                    <input type="hidden" name="issued_date" value="{{$item->updated_at}}">
                                    <input type="hidden" name="purpose" value="{{$item->purpose}}">
                                   
                                  
                                <button type="submit" style="float:left" class="btn btn-primary">Download <i class="fas fa-download"></i></button>
                                </form>
                                @endif
                            @endif
                            @if($item->status == 0)
                            <button class="btn btn-light btn-sm text-danger cancelrequest" data-id ="{{$item->id}}">Cancel Request <i class="fas fa-times-circle"></i></button>
                            @endif
                        <h6 class="mt-3" style="float: right;">
                            Status: 
                            @if($item->status == 0)
                            <span style="" class="badge bg-primary">Pending</span>
                            @elseif($item->status == 1)
                           
                            <span style="" class="badge bg-success">Approved</span>
                            @elseif($item->status == 2)
                            <span style="" class="badge bg-danger">Declined</span>

                            <br><br>
                            <button class="btn btn-light btn-sm text-danger cancelrequest" data-id ="{{$item->id}}">Delete <i class="fas fa-times-circle"></i></button>
                            @endif

                         </h6>
                        </div>
                    </div>
            @endforeach
            @else 
            <h6 style="text-align: center">
                <img style="width: 140px;" class="mt-4" src="{{asset('images/nodatafound.svg')}}" alt="">
                <br><br>
               <h6 style="text-align: center" class="text-secondary"> No Request Yet..</h6>
               </h6> 

            @endif

         
               
            </div>

            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h5>Request For :</h5>
                        <button class="btn btn-primary form-control mb-3" data-toggle="modal" data-target="#clearance">Barangay Clearance <i class="fas fa-arrow-right"></i> </button>
                        <button class="btn btn-primary form-control mb-3" @if(count($barangayid)>=1) @disabled(true) @endif data-toggle="modal" data-target="#barangayid">Barangay ID <i class="fas fa-arrow-right"></i></button>
                        <button class="btn btn-primary form-control mb-3" data-toggle="modal" data-target="#certificate">Barangay Certificate <i class="fas fa-arrow-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('.cancelrequest').click(function(){
      var id = $(this).data('id');
      Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, cancel it!'
}).then((result) => {
  if (result.isConfirmed) {
    window.location.href = '{{ route('deleteItems') }}?type=request&id=' + id;
  }
})
     
    })
</script>

@endsection