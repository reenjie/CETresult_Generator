@extends('layouts.app', ['activePage' => 'myresult', 'title' => '', 'navName' => 'My Result', 'activeButton' => 'laravel'])

@section('content')
<div class="container-fluid">

    @php
    $approved = DB::select('SELECT * FROM `listpassers` where appno in (SELECT application FROM `urequests` where status = 1 and userID = '.Auth::user()->id.')');
    @endphp
    @if(count($approved))
    @foreach($approved as $item)
    <div class="mycard">


        <h4 class="p-4">Application No . <span style="font-weight:bold">{{$item->appno}}</span>
            <br>
            <span>{{$item->year}} - {{$item->year + 1}}</span>

        </h4>

        <h1 style="text-align:center">{{$item->oar}}%
            <br>
            <span style="font-size:17px">OVERALL RATING</span>
            <div id="accordion">
               
                
                    <h5 class="mb-0">
                      <button class="btn btn-primary btn-sm" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        See Ratings
                      </button>
                    </h5>
                 
              
                  <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <h6>
                         <div class="row">
                            <div class="col-md-4">
                               
                                <div class="card">
                                    <div class="card-body">
                                        I. English Proficiency
                                        <hr>
                                        {{$item->ep}}%
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                               
                                <div class="card">
                                    <div class="card-body">
                                        II. Reading Comprehension
                                        <hr>
                                        {{$item->rc}}%
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                               
                                <div class="card">
                                    <div class="card-body">
                                        III. Science Process Skills
                                        <hr>
                                        {{$item->sps}}%
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                               
                                <div class="card">
                                    <div class="card-body">
                                        IV. Qualitative Skills
                                        <hr>
                                        {{$item->qs}}%
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                               
                                <div class="card">
                                    <div class="card-body">
                                        V. Abstract Thinking Skills
                                        <hr>
                                        {{$item->ats}}%
                                    </div>
                                </div>
                            </div>
                         </div>
                        </h6>

                    </div>
                  </div>
               
              
              </div>
            <hr>
            @if($item->status == "passed")
            <h3 style="text-align: center;color:#609966">PASSED <i class="fas fa-check-circle"></i></h3>
            <h6 class="text-danger">
                Please proceed to WMSU , Choose the college of your choice!
            </h6>
            @endif

            @if($item->status == "failed")
            <h3 style="text-align: center;color:#DF2E38">FAILED</h3>
            <h6 class="text-danger">
                Better luck next time.
            </h6>
            @endif


        </h1>



    </div>

    @endforeach
    @else

    <h6 style="text-align: center; ">
        <img class="img-fluid" src="https://res.cloudinary.com/hilnmyskv/image/upload/q_auto/v1591622108/Algolia_com_Blog_assets/Featured_images/3-examples-to-help-you-transform-the-no-results-search-results-page/bhpp3ruhvjelpvts7wqn.jpg" alt="">
    </h6>
    @endif


</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>

</script>


@endsection