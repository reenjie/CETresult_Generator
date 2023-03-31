<div class="table-responsive">
    <table class="table table-striped" id="table0" style="width:100%">
        <thead>
            <tr class="table-success">
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Application No</th>
            </tr>
        </thead>
        <tbody>
            @php
            $user = DB::select('select * from users where roles=1 and request = 2 ');
            @endphp
            @foreach ($user as $key => $item)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->fname }}</td>
                <td>{{ $item->lname }}</td>
                <td>{{ $item->email }}</td>
                <td>
                    xxx
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>