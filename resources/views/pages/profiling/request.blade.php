<div class="container mt-2">
<div class="table-responsive">
  <table class="table" id="table4">
    <thead>
      <tr class="table-danger">
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Address</th>
        <th scope="col">Request</th>
        <th scope="col">Date Requested</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
    @php
        $pending = DB::select('SELECT * FROM `u_requests` where status = 0');
    @endphp
  
    @foreach ($pending as $key =>$item)
          @php
              $user = DB::select('Select * from users where id = '.$item->userid.' ')
          @endphp
      <tr>
        <td >{{$key + 1}}</td>
        <td><h5 style="font-size: 12px">
          {{$user[0]->fname.' '.$user[0]->lname}}</h5></td>
        <td>{{$user[0]->address}}</td>
        <td>
          @switch($item->request)
              @case(0)
                  <h6 style="font-size:13px">Barangay Clearance</h6>
                  @break
              @case(1)
                  <h6 style="font-size:13px">Barangay ID</h6>
                  @break
                  @case(2)
                  <h6 style="font-size:13px">Barangay Identification</h6>  
                  @break
             
                  
          @endswitch
        </td>
        <td>
          {{date('F j,Y',strtotime($item->created_at))}}
        </td>
        <td>
          <div class="btn-group">
            <button class="btn btn-success btn-sm text-success btnapprove" data-id="{{$item->id}}">approve</button>
            <button class="btn btn-danger btn-sm text-danger btndecline" data-id="{{$item->id}}" style="margin-left: 3px">decline</button>
          </div>
        </td>
      </tr>
    
    @endforeach
  
    </tbody>
  </table>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
  $('.btnapprove').click(function(){
    var id = $(this).data('id');
    Swal.fire({
  title: 'Are you sure?',
  text: "to approve this?, You won't be able to revert this!",
  icon: 'question',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, approve it!'
}).then((result) => {
  if (result.isConfirmed) {
   window.location.href='{{route("changestatus")}}?status=approve&id='+id;
  }
})
   
  })
  $('.btndecline').click(function(){
    var id = $(this).data('id');

  Swal.fire({
  title: 'Are you sure?',
  text: "to decline this?, You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, decline it!'
}).then((result) => {
  if (result.isConfirmed) {
   window.location.href='{{route("changestatus")}}?status=decline&id='+id;
  }
})
   
   
  })
  
</script>