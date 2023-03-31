@extends('layouts.app', ['activePage' => 'myrequest', 'title' => '', 'navName' => 'My Request', 'activeButton' => 'laravel'])

@section('content')
<div class="container-fluid">

    <div class="mycard">
        <div class="row">
            <div class="col-md-5">
                <div class="card border border-danger">
                    <div class="card-body">
                        <form action="{{route('saverequest')}}" method="post">
                            @csrf

                            <h3>Request your result</h3>
                            <h6>Application Number</h6>
                            <input type="text" name="appno" required class="form-control mb-3">

                            <h6>Year</h6>
                            <select name="year" class="form-control mb-3" required name="status" id="">
                                @php
                                $currentYear = date('Y');
                                @endphp

                                @for($i = $currentYear; $i > 2012 ; $i--) <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>

                            <button type="submit" class="btn btn-danger bg-danger text-light  py-3" style="width: 100%;">Submit Request <i class="fas fa-send"></i></button>
                        </form>

                    </div>
                </div>
            </div>

            <div class="col-md-7">
                @php
                $request = DB::select('SELECT * FROM `urequests` where userID = '.Auth::user()->id.' and status in (0,1) order by created_at desc ');
                @endphp
                @if(count($request))
                @foreach($request as $item)
                <div class="card">
                    <div class="card-body">
                        <h6 style=" float:right;font-weight:normal">{{date('F j,Y',strtotime($item->created_at))}}

                            <br>
                            @if($item->status == 0)
                            <span class="badge badge-warning">pending</span>
                            @else
                            <span class="badge badge-success">Approved</span>
                            @endif

                        </h6>
                        <h6>Application No.</h6>
                        <span style="font-weight:bold;font-size:20px" class="text-primary">{{$item->application}}</span>
                        <br><br>
                        <h6>Year</h6>
                        <span style="font-weight:normal;font-size:17px"> {{ $item->year }} - {{ $item->year + 1 }}</span>

                        <div style="float:right">
                            @if($item->status == 0)
                            <button class="btn btn-danger btndelete btn-sm" data-id="{{$item->id}}">Cancel <i class="fas fa-times-circle"></i></button>
                            @endif

                            @if($item->status == 1)
                            <button class="btn btn-success btn-sm" onclick="window.location.href='/myresult' ">View Result <i class="fas fa-list"></i></button>
                            @endif


                        </div>

                    </div>
                </div>
                @endforeach
                @else

                <h6 style="text-align:center" class="mt-4">
                    <img style="width:200px" src="{{asset('images/nodatafound.svg')}}" alt="">
                    <br><br>
                    NO REQUEST YET ...
                </h6>

                @endif

            </div>
        </div>


    </div>


</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('.btndelete').click(function() {
        var id = $(this).data('id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '{{ route("deleteItems") }}?type=myrequest&id=' + id;
            }
        })
    })
</script>


@endsection