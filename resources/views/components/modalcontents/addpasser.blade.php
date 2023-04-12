<div class="container">
    <form action="{{route('savePasser')}}" method="POST">
        @csrf

        <h6>Application Number</h6>
        <input type="text" name="appno" required class="form-control mb-3">


        <h6>Name</h6>
        <input type="text" name="name" required class="form-control mb-3">

        <h6>School</h6>
        <textarea name="school" required class="form-control mb-3" style="height: 100px" id="" cols="30" rows="10"></textarea>

        <h6>Rating</h6>
        <input type="text" class="form-control mb-3" name="rating" value="">

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