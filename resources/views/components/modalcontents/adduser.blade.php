<form action="{{route('saveuser')}}" method="post">
    @csrf
    <h5>
        First Name
    </h5>
    <input type="text" name="fname" required class="form-control mb-2">

    <h5>
        Last Name
    </h5>
    <input type="text" name="lname" required class="form-control mb-2">
    <h5>
       Email
    </h5>
    <input type="text" name="email" required class="form-control mb-2">

    <h5>
      Password
     </h5>
     <input type="password" name="pass" required class="form-control mb-2">
     <br>
     <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
     <button type="submit" class="btn btn-primary">Save changes</button>
    </form>