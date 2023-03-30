@extends('layouts.app', ['activePage' => 'residents', 'navName' => 'User Management ', 'activeButton' => 'laravel'])
@section('content')
    <div class="container">


        @include('components.alerts')

        <div class="mycard">
           
            <div class="table-responsive">
                <table class="table" id="table" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Address</th>
                          
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $user = DB::select('select * from users where roles=1 ');
                        @endphp
                        @foreach ($user as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->fname }}</td>
                                <td>{{ $item->lname }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->address }}</td>
                              
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
                        window.location.href = '{{ route('deleteItems') }}?type=users&id=' + id;
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
