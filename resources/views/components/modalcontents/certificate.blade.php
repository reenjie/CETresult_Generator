<h6>Please make sure all fields are filled</h6>
<form action="{{route('savecertificateRequest')}}" method="post">@csrf


<div class="row">
    <div class="col-md-4 mb-2">
        <h5>
            Last Name
        </h5>
        <input type="text mb-2" style="text-transform:uppercase" value="{{ Auth::user()->lname }}" required name="lname"
            class="form-control">
    </div>
    <div class="col-md-4 mb-2">
        <h5>
            First Name
        </h5>
        <input type="text" style="text-transform:uppercase" value="{{ Auth::user()->fname }}" required name="fname"
            class="form-control">
    </div>
    <div class="col-md-4 mb-2">
        <h5>
            Middle Name
        </h5>
        <input type="text" style="text-transform:uppercase" value="{{ Auth::user()->mname }}" required name="mname"
            class="form-control">
    </div>

    <div class="col-md-4 mb-2">
        <h5>
            Age
        </h5>
        <input type="text" style="text-transform:uppercase" disabled  value="{{ date('Y') - date('Y',strtotime(Auth::user()->birthdate)) }}" required 
            class="form-control">
    </div>
   

    <div class="col-md-12 mb-2">
        <h5>
            Address
        </h5>
        <textarea name="address" style="text-transform:uppercase" required class="form-control" id="" cols="5"
            rows="8">{{ Auth::user()->address }}</textarea>
    </div>



  

    

    <div class="col-md-12">
        <button type="submit" class="btn btn-primary " style="float: right;"> Submit Request <i class="fas fa-paper-plane"></i></button>
    </div>
</div>

</form>
