<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Approved</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Declined</a>
    </li>

</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="table-responsive">
            <table class="table table-striped" id="table0" style="width:100%">
                <thead>
                    <tr class="table-success">
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Approved and Emailed At</th>
                        <th>Application No</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $request = DB::select('SELECT * FROM `urequests` where status = 1 ');

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
                        <td>
                            <h6 class="text-success">{{date('F j,Y',strtotime($item->updated_at))}}</h6>
                        </td>
                        <td>
                            {{$item->application}}
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

        <div class="table-responsive">
            <table class="table table-striped" id="table0" style="width:100%">
                <thead>
                    <tr class="table-danger">
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Declined at</th>
                        <th>Application No</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $request = DB::select('SELECT * FROM `urequests` where status = 2');

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
                        <td>
                            <h6 class="text-danger">{{date('F j,Y',strtotime($item->updated_at))}}</h6>
                        </td>
                        <td>
                            {{$item->application}}
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

</div>