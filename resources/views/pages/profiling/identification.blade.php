<div class="container mt-2">
    <div class="table-responsive">
        <table class="table" id="table3">
            <thead>
              <tr class="table-info">
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Occupation</th>
                <th scope="col">Gender</th>
                <th scope="col">BirthDay</th>
                <th scope="col">TIN</th>
                <th scope="col">GSIS</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
            @php
                $ident = DB::select('SELECT * FROM `u_requests` where status = 1 and request= 1 ');
            @endphp
          
          
            @foreach ($ident as $key => $item)
            @php
            $user = DB::select('Select * from users where id = '.$item->userid.' ');
        @endphp   
              <tr>
                <td >1</td>
                <td><h5 style="font-size: 12px">
                  {{$user[0]->fname.' '.$user[0]->lname}}</h5></td>
                <td>{{$user[0]->address}}</td>
                <td>{{$user[0]->occupation}}</td>
                <td>{{$user[0]->gender}}</td>
                <td>{{date('F j,Y',strtotime($user[0]->birthdate))}}</td>
                <td>{{$user[0]->tin}}</td>
                <td>{{$user[0]->gsis}}</td>
                <td>
                  <span class="badge bg-success">Issued</span>
                </td>
              </tr>
            
            @endforeach
          
            </tbody>
          </table>
    </div>
</div>