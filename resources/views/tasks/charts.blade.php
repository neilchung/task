@extends('layouts.app')
@section('content')
    <div class="container col-md-4">
        <canvas id="pieChart" width="300" height="300"></canvas>
    </div>

    <div class="container col-md-4">
        <canvas id="barChart" width="300" height="300"></canvas>
    </div>
@endsection

@section('customJS')
    <script src="{{ asset('js/Chart.js') }}"></script>
    <script>
        $(document).ready(function () {
            var ctxPie = $('#pieChart');
            // For a pie chart
            var dataPie = {
                labels: [
                    "未完成",
                    "已完成",
                ],
                datasets: [
                    {
                        data: [{{ $toDoCount }}, {{ $doneCount }}],
                        backgroundColor: [
                            "#FF6384",
                            "#36A2EB",
                        ],
                        hoverBackgroundColor: [
                            "#FF6384",
                            "#36A2EB",
                        ]
                    }]
            };
            var myPieChart = new Chart(ctxPie, {
                type: 'pie',
                data: dataPie,
                options: {
                    responsive: true,
                    title: {
                        display: true,
                        text: '所有任务的完成比例(总数:{{ $total }})'
                    }
                }
            });


//-----------------------------------------------------------------------------------------


            var dataBar = {
                labels:{!! $names !!},
                datasets: [
                    {
//                        label: "My First dataset",
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1,
                        data: {!! json_encode(TaskCountArray($projects)) !!},
                    }
                ]
            };
            var barChart = $('#barChart');
            var myBarChart = new Chart(barChart, {
                type: 'bar',
                data: dataBar,
//                options: options
                options: {
                    responsive: true,   //响应式
                    title: {
                        display: true,
                        text: "项目之间的任务总数对比"
                    },
                    legend: {
                        display: false
                    }
                }
            });

        })
    </script>
@endsection