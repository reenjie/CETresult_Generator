<div class="container">
    <form action="{{route('savePasser')}}" method="POST">
        @csrf

        <h6>Application Number</h6>
        <input type="text" name="appno" required class="form-control mb-3">

        <div class="row">
            <div class="col-md-4">
                <h6>First Name</h6>
                <input type="text" name="fname" required class="form-control mb-3">
            </div>

            <div class="col-md-4">
                <h6>Middle Name</h6>
                <input type="text" name="mname" required class="form-control mb-3">
            </div>

            <div class="col-md-4">
                <h6>Last Name</h6>
                <input type="text" name="lname" required class="form-control mb-3">
            </div>

            <div class="col-md-12">
                <h6>School</h6>
                <textarea name="school" required class="form-control mb-3" style="height: 100px" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="col-md-12">
                <h6 >Ratings  <span style="font-weight: normal;font-siz"> </span></h6>
            </div>
            <div class="col-md-4">
                <h6 style="font-weight: normal">English Proficiency
                </h6>
                <input type="number" name="ep" required class="form-control mb-3 ">
            </div>
            <div class="col-md-4">
                <h6 style="font-weight: normal">Reading Comprehension
                </h6>
                <input type="number" name="rc" required class="form-control mb-3 ">
            </div>
            <div class="col-md-4">
                <h6 style="font-weight: normal"> Science Process Skills
                </h6>
                <input type="number" name="sps" required class="form-control mb-3 ">
            </div>
            <div class="col-md-4">
                <h6 style="font-weight: normal"> Qualitative Skills
                </h6>
                <input type="number" name="qs" required class="form-control mb-3">
            </div>
            <div class="col-md-4">
                <h6 style="font-weight: normal"> Abstract Thinking Skills
                </h6>
                <input type="number" name="ats" required class="form-control mb-3 ">
            </div>

            <div class="col-md-4">
                <h6 style="font-weight: normal"> OverAll Ratings
                </h6>
                <input type="number" name="oar" required class="form-control mb-3 ">
            </div>
        </div>

    

      

       

        <h6>Status</h6>

        <select class="form-control mb-3" name="status" id="">
            <option value="passed">PASSED</option>
            <option value="failed">FAILED</option>
        </select>


        <h6>Year</h6>

        <select name="year" class="form-control mb-3" id="">
            @php
            $currentYear = date('Y');
            @endphp

            @for($i = $currentYear; $i > 2012 ; $i--) <option value="{{$i}}">{{$i}}</option>
            @endfor
        </select>


        <button type="submit" class="form-control btn btn-danger text-danger" style="font-weight:bold">Submit</button>
    </form>
</div>