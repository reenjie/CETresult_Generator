<div class="container mt-2">
    <div class="table-responsive">
        <table class="table" id="table2">
            <thead>
              <tr class="table-info">
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Community Tax Number</th>
                <th scope="col">Issued Date</th>
                <th scope="col">Purpose</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
            @php
                $clearance = DB::select('SELECT * FROM `u_requests` where status = 1 and request = 0  ');
            @endphp

            @foreach ($clearance as $key => $item)
                  @php
                  $user = DB::select('Select * from users where id = '.$item->userid.' ')
              @endphp 
              <tr>
                <td >{{$key+1}}</td>
                <td><h5 style="font-size: 12px">
                  {{$user[0]->fname.' '.$user[0]->lname}}</h5></td>
                <td>{{$user[0]->address}}</td>
                <td>{{$user[0]->com_tax_number}}</td>
                <td>{{date('F j,Y',strtotime($item->updated_at))}}</td>
                <td>{{$item->purpose}}</td>
                <td><span class="badge bg-success">Issued</span></td>
              </tr>
            
            @endforeach
          
            </tbody>
          </table>
    </div>
</div>