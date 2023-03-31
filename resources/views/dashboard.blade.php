@extends('layouts.app', ['activePage' => 'dashboard', 'title' => 'ZCIBT', 'navName' => 'Dashboard', 'activeButton' => 'laravel'])

@section('content')
<div class="content">
    @if(Auth::user()->roles == 1)
    <script>
        window.location.href = "{{route('page.index', 'myrequest')}}";
    </script>
    @endif

    @php
    $years = DB::select('SELECT year, COUNT(appno) AS total FROM listpassers GROUP BY year ');
    $pending = DB::select('SELECT * FROM `urequests` where status = 0 ');
    $approve = DB::select('SELECT * FROM `urequests` where status = 1 ');
    @endphp
    <div class="container-fluid">
        <h6>RESULT REQUEST</h6>
        <div class="row">
            <div class="col-md-6">
                <div class="card" style="background-color: #57C5B6;color:white;border-right:20px solid #002B5B">
                    <div class="card-body">
                        <span style="float:right;font-size:65px">
                            <i class="fas fa-sync"></i>
                        </span>
                        <h1>{{count($pending)}}</h1>
                        <h5 style="font-weight:bold">PENDING REQUEST</h5>

                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card" style="background-color: #DC8449;color:white;border-right:20px solid #DF2E38">
                    <div class="card-body">
                        <span style="float:right;font-size:65px">
                            <i class="fas fa-check-circle"></i>
                        </span>
                        <h1>{{count($approve)}}</h1>
                        <h5 style="font-weight:bold">APPROVED REQUEST</h5>

                    </div>
                </div>
            </div>
        </div>
        <div class="mycard">

            <script>
                window.onload = function() {

                    var chart = new CanvasJS.Chart("chartContainer", {
                        exportEnabled: true,
                        animationEnabled: true,
                        title: {
                            text: "School Year CET Takers"
                        },
                        legend: {
                            cursor: "pointer",
                            itemclick: explodePie
                        },
                        data: [{
                            type: "pie",
                            showInLegend: true,
                            toolTipContent: "{name}: <strong>{y}%</strong>",
                            indexLabel: "Year : {name} - {y}",
                            dataPoints: [
                                @foreach($years as $item) {

                                    y: "{{$item->total}}",
                                    name: "{{$item->year}}",
                                    exploded: true
                                },
                                @endforeach


                            ]
                        }]
                    });
                    chart.render();
                }

                function explodePie(e) {
                    if (typeof(e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
                        e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
                    } else {
                        e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
                    }
                    e.chart.render();

                }
            </script>

            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>


        </div>
    </div>
</div>


@endsection