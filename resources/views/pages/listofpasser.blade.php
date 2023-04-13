@extends('layouts.app', ['activePage' => 'listofpasser', 'title' => '', 'navName' => 'List of Passers', 'activeButton' => 'laravel'])

@section('content')
<div class="container-fluid">
  <div class="mycard">

    <button class="btn btn-secondary btn-sm px-5" data-toggle="modal" data-target="#addpasser">Add <i class="fas fa-plus-circle"> </i></button>

    <button class="btn btn-danger btn-sm px-3" data-toggle="modal" data-target="#importdata">IMPORT <i class="fas fa-file-import"></i></button>

    <button class="btn btn-danger btn-sm px-3 btndeleteall">DELETE ALL <i class="fas fa-trash-can"></i></button>

    <h6 class="text-danger mt-2 mb-2">If you wish to update fields. just click on the fields you wish to edit</h6>
    <table class="table" id="table1">
      <thead>
        <tr>

          <th scope="col">No</th>
          <th scope="col">Application No.</th>
          <th scope="col">First Name</th>
          <th scope="col">Middle Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">School</th>
          <th scope="col">Rating</th>
          <th scope="col">Status</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @php
        $ListofPasser = DB::select('SELECT * FROM `listpassers`');
        @endphp
        @foreach ($ListofPasser as $key => $item)
        <tr>
          <td style="cursor:default">{{$key + 1}}</td>
          <td style="cursor:default">{{$item->appno}}</td>
          <td>
            <textarea name="" style="border:none;" data-table="listpassers" data-entity="fname" data-id="{{$item->id}}" class="form-control updateonmove" id="" cols="10" rows="10">{{$item->fname}}</textarea>
          </td>
          <td>
            <textarea name="" style="border:none;" data-table="listpassers" data-entity="mname" data-id="{{$item->id}}" class="form-control updateonmove" id="" cols="10" rows="10">{{$item->mname}}</textarea>
          </td>
          <td>
            <textarea name="" style="border:none;" data-table="listpassers" data-entity="lname" data-id="{{$item->id}}" class="form-control updateonmove" id="" cols="10" rows="10">{{$item->lname}}</textarea>
          </td>
          <td>
            <textarea name="" style="border:none;" data-table="listpassers" data-entity="school" data-id="{{$item->id}}" class="form-control updateonmove" id="" cols="10" rows="10">{{$item->school}}</textarea>
          </td>
         <td>

          <!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" style="float: right" data-toggle="modal" data-target="#manageratings{{$item->id}}">
 Manage Ratings
</button>

<!-- Modal -->
<div class="modal fade" id="manageratings{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Ratings</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
    
        <ul class="list-group list-group-flush">
          <li class="list-group-item"> I. English Proficiency

            <br>
            <input type="number" class="form-control updateonmove" data-table="listpassers" data-entity="ep" data-id="{{$item->id}}" value="{{$item->ep}}">
          </li>
          <li class="list-group-item">  II. Reading Comprehension
            <br>
            <input type="number" class="form-control updateonmove" data-table="listpassers" data-entity="rc" data-id="{{$item->id}}" value="{{$item->rc}}">

          </li>
          <li class="list-group-item"> III. Science Process Skills
            <br>
            <input type="number" class="form-control updateonmove" data-table="listpassers" data-entity="sps" data-id="{{$item->id}}" value="{{$item->sps}}">

          </li>
          <li class="list-group-item">IV. Qualitative Skills

            <br>
            <input type="number" class="form-control updateonmove" data-table="listpassers" data-entity="qs" data-id="{{$item->id}}" value="{{$item->qs}}">
          </li>
          <li class="list-group-item">V. Abstract Thinking Skills

            <br>
            <input type="number" class="form-control updateonmove" data-table="listpassers" data-entity="ats" data-id="{{$item->id}}" value="{{$item->ats}}">

          </li>
          <li class="list-group-item">Overall Ratings

            <br>
            <input type="number" class="form-control updateonmove" data-table="listpassers" data-entity="oar" data-id="{{$item->id}}" value="{{$item->oar}}">

          </li>
        </ul>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      
      </div>
    </div>
  </div>
</div>

         </td>
          <td>


            <select name="" id="" data-table="listpassers" data-entity="status" data-id="{{$item->id}}" class=" updateonmove">
              <option value="{{$item->status }}">{{$item->status}}</option>
              <option value="passed">passed</option>
              <option value="failed">failed</option>
            </select>
          </td>
          <td>


            <button class="btndelete" data-id="{{ $item->id }}" style="border:none;outline;none;color:#19376D;"><i class="fas fa-trash-can"></i> </button>

          </td>
        </tr>
        @endforeach


      </tbody>
    </table>
  </div>
</div>

@include('components.modal', [
'id' =>"addpasser",
'modalsize' => 'modal-lg',
'modaltitle' => 'Add Passer',
'type' => 'addpasser',
])

@include('components.modal', [
'id' =>"importdata",
'modalsize' => 'modal-sm',
'modaltitle' => 'Import List of Passer',
'type' => 'importdata',
])

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
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
        window.location.href = '{{ route("deleteItems") }}?type=passer&id=' + id;
      }
    })
  })

  $('.btndeleteall').click(function() {

    Swal.fire({
      title: 'Are you sure?',
      text: "This will delete all data and transactions. Do you still want to proceed?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = '{{ route("deleteItems") }}?type=deleteallpasser&id=' + 0;
      }
    })
  });

  $('.updateonmove').focusout(function() {
    var val = $(this).val();
    var id = $(this).data('id');
    var table = $(this).data('table');
    var entity = $(this).data('entity');
    $.ajax({
      url: "{{route('updateentities')}}",
      method: "GET",
      data: {
        id: id,
        table: table,
        entity: entity,
        value: val
      },
      success: function(response) {

      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.log(textStatus);
      }
    });

  })
</script>
@endsection