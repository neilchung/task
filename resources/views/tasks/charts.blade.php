@extends('layouts.app')
@section('content')
    <div class="container col-md-4">
        <canvas id="pieChart" width="300" height="300"></canvas>
        <div id="pie-data" data-todo="{{ $toDoCount }}" data-done="{{ $doneCount }}" data-total="{{ $total }}"></div>
    </div>

    <div class="container col-md-4">
        <canvas id="barChart" width="300" height="300"></canvas>
        <div id="bar-data"
             data-names={!! json_encode($names,JSON_UNESCAPED_UNICODE) !!}
             data-counts={!! json_encode(TaskCountArray($projects)) !!}>
        </div>
    </div>

    <div class="container col-md-4">
        <canvas id="redarChart" width="300" height="300"></canvas>
    </div>
@endsection

@section('customJS')
    <script src="{{ asset('js/charts.js') }}"></script>
    <script>
        var ctxRedar=$('#redarChart')
        var data = {
            labels: ["任务总数", "已完成", "未完成"],
            datasets: [
                {
                    label: "$name",
                    backgroundColor: "rgba(179,181,198,0.2)",
                    borderColor: "rgba(179,181,198,1)",
                    pointBackgroundColor: "rgba(179,181,198,1)",
                    pointBorderColor: "#fff",
                    pointHoverBackgroundColor: "#fff",
                    pointHoverBorderColor: "rgba(179,181,198,1)",
                    data: [$totalPP, $toDoPP, $donePP]
                },
            ]
        };


        var myRadarChart = new Chart(ctxRedar, {
            type: 'radar',
            data: data,
//            options: options
        });
    </script>
@endsection