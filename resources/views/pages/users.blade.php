@extends('layouts.app', ['activePage' => 'users', 'navName' => 'User Management ', 'activeButton' => 'laravel'])
@section('content')
<div class="container-fluid">




    <div class="mycard">
        <button class="btn btn-danger  px-3" data-toggle="modal" data-target="#addaccount">Add <i class="fas fa-plus-circle"></i></button>
        <div class="table-responsive">
            <table class="table" id="table0" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $user = DB::select('select * from users where roles=0 ');
                    @endphp
                    @foreach ($user as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->fname }}</td>
                        <td>{{ $item->lname }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                            @if (Auth::user()->id == $item->id)
                            <i class="fas fa-id-badge text-primary" style="font-size:20px;"></i>
                            @else
                            <div class="btn-group">
                                <button class="btn btn-light btnedit text-success" data-fname="{{ $item->fname }}" data-lname="{{ $item->lname }}" data-email="{{ $item->email }}" data-id="{{ $item->id }}" data-toggle="modal" data-target="#editaccount"><i class="fas fa-pen"></i></button>
                                <button class="btn btn-light text-danger btndelete" data-id="{{ $item->id }}"><i class="fas fa-trash-can"></i></button>
                            </div>
                            @endif
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
    $(document).ready(function() {

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
                    window.location.href = '{{ route("deleteItems") }}?type=users&id=' + id;
                }
            })
        })

        $('.btnedit').click(function() {
            $('#dataid').val($(this).data('id'));
            $('#fname').val($(this).data('fname'));
            $('#lname').val($(this).data('lname'));
            $('#email').val($(this).data('email'));
        })
    })
</script>
@endsection