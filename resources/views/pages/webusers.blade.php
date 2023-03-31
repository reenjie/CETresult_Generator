@extends('layouts.app', ['activePage' => 'webusers', 'title' => '', 'navName' => 'Web Users', 'activeButton' => 'laravel'])

@section('content')
<div class="container-fluid">

    <div class="mycard">
        <button class="btn btn-danger btn-sm px-4" data-toggle="modal" data-target="#approved">View Request <i class="fas fa-list"></i></button>
        <div class="table-responsive">
            <table class="table" id="table0" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Application & Status</th>
                        <th>Requested</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $request = DB::select('SELECT * FROM `urequests` where status = 0 ');

                    @endphp
                    @foreach ($request as $key => $item)
                    @php
                    $user = DB::select('select * from users where roles=1 and id = '.$item->userID.' ');
                    @endphp
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $user[0]->fname }}</td>
                        <td>{{ $user[0]->lname }}</td>
                        <td>{{ $user[0]->email }}</td>
                        <td style="display:flex">
                            <h6>{{$item->application}} | </h6>

                            @php
                            $validate = DB::select('SELECT * FROM `listpassers` where appno = "'.$item->application.'" and year = "'.$item->year.'" and name like "%'.$user[0]->fname.'%" or name like "%'.$user[0]->lname.'%" ');
                            @endphp

                            @if(count($validate))
                            <span style="margin-left:5px" class="badge bg-success">Verified <i class="fas fa-check-circle"></i></span>
                            @else
                            <span style="margin-left:5px" class="badge bg-danger">No match application</span>
                            @endif

                        </td>
                        <td>
                            {{date('F j,Y',strtotime($item->updated_at))}}
                        </td>
                        <td>
                            <div class="container btn-group">
                                @if(count($validate) == 0)
                                <button class="btn btn-light bg-secondary text-light btn-sm px-3" disabled style="cursor:not-allowed">approve</button>
                                @else
                                <button data-id="{{$item->id}}" class="btn btn-light bg-success btnapprove text-light btn-sm px-3">approve</button>
                                @endif

                                <button data-id="{{$item->id}}" class="btn btn-light bg-danger text-light btn-sm px-3 btndecline" style="margin-left:5px">Decline</button>
                            </div>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>


</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('.btnapprove').click(function() {
        var id = $(this).data('id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to approve this request?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Approve it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '{{ route("changestatus") }}?type=approve&id=' + id;
            }
        })


    })

    $('.btndecline').click(function() {
        var id = $(this).data('id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to cancel this request?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, decline it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '{{ route("changestatus") }}?type=decline&id=' + id;
            }
        })

    })
</script>


@endsection