@extends('layouts.app', ['activePage' => 'webusers', 'title' => '', 'navName' => 'Web Users', 'activeButton' => 'laravel'])

@section('content')
<div class="container-fluid">

    <div class="mycard">
        <button class="btn btn-danger btn-sm px-4" data-toggle="modal" data-target="#approved">Approved Request <i class="fas fa-list"></i></button>
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
                    $user = DB::select('select * from users where roles=1 and request = 1 ');
                    @endphp
                    @foreach ($user as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->fname }}</td>
                        <td>{{ $item->lname }}</td>
                        <td>{{ $item->email }}</td>
                        <td style="display:flex">
                            <h6>{{$item->application}} | </h6>

                            @php
                            $validate = DB::select('SELECT * FROM `listpassers` where appno = "'.$item->application.'" ');
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

                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>


</div>


@endsection