<form action="{{route('edit')}}" method="post">
    @csrf
    <input type="hidden" name="type" value="user">
    <input type="hidden" name="id" id="dataid">
    <h5>
        First Name
    </h5>
    <input type="text" name="fname" id="fname" required class="form-control mb-2">

    <h5>
        Last Name
    </h5>
    <input type="text" name="lname" id="lname" required class="form-control mb-2">
    <h5>
        Email
    </h5>
    <input type="text" name="email" id="email" required disabled class="form-control mb-2">

    <h5>
        Password
    </h5>
    <input type="text" name="pass" class="form-control ">
    <span style="font-size:11px">Type new password here to update.</span>
    <br><br>
    <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save changes</button>
</form>