<div class="container mt-2">
    <div class="table-responsive">
        <table class="table" id="table1">
            <thead>
              <tr class="table-info">
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Birthdate</th>
                <th scope="col">Age</th>
                <th scope="col">Address</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
            @php
                $cert = DB::select('SELECT * FROM `u_requests` where status = 1 and request=2 ');
            @endphp
          
            @foreach ($cert as $key => $item)
            @php
            $user = DB::select('Select * from users where id = '.$item->userid.' ');
        @endphp 
              <tr>
                <td >{{$key + 1}}</td>
                <td><h5 style="font-size: 12px">
                  {{$user[0]->fname.' '.$user[0]->lname}}</h5></td>
                  <td>{{date('F j,Y',strtotime($user[0]->birthdate))}}</td>
                  <td>{{date('Y') - date('Y',strtotime($user[0]->birthdate))}} years old</td>
                <td>{{$user[0]->address}}</td>
                <td>
                  <span class="badge bg-success">Issued</span>
                </td>
              </tr>
            
            @endforeach
          
            </tbody>
          </table>
    </div>
</div>