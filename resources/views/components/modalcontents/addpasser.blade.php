<div class="container">
    <form action="{{route('savePasser')}}" method="POST">
        @csrf
    
        <h6>Application Number</h6>
        <input type="text" name="appno" required class="form-control mb-3">

       
        <h6>Name</h6>
        <input type="text" name="name" required class="form-control mb-3">

        <h6>School</h6>
        <textarea name="school" required class="form-control mb-3" style="height: 100px" id="" cols="30" rows="10"></textarea>

        <button type="submit" class="form-control btn btn-danger text-danger" style="font-weight:bold">Submit</button>
    </form>
    </div>