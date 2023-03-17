
@extends('layouts.app')
@section('content')


<div class="container">
<div class="container-fluid">
<div class="row">
     <nav   style="padding-top: 30px;" class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column nav-pills">
        <li class="nav-item active">
            <a class="nav-link bg-dark text-white"  href="{{ url('/statistique') }}">Statistiques</a>
        </li>
        <li class="nav-item">
            
            <a  class="nav-link bg-light text-dark"   href="/machine">Machine</a>
        </li>
        <li class="nav-item">
            <a class="nav-link bg-light text-dark" href="/classe">Classes</a>
        </li>
        </ul>
    </div>
    </nav>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2" >Statistiques</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            
            <button onclick=type="button" class="btn btn-sm btn-outline-secondary">Export</button>
        </div>
        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
        </button>
        </div>
    </div>
    <h1></h1>
    <canvas class="my-4 w-100" id="myChart" width="900" height="380">

    <title>Chart.js Example</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <canvas id="myChart"></canvas>
    <script>
            var x = @json($x);
            var y = @json($y);


        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: x,
                datasets: [{
                    label: 'Machine par Classe',
                    data: y,
                    backgroundColor: [
                        '#3B3B3B',
                        'gray',
                        '#B6AEAC',
                    ],

                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            
                            beginAtZero: true,
                            stepSize :1
                        }
                    }]
                }
            }
        });
    </script>
    
    </canvas>
    <div style="width: 500px;margin-top: 200px;" >
        <canvas  width="900" height="380" id="pie-chart" ></canvas>
    </div>

    <script>
                    var x = @json($x);
            var y = @json($y);
        var ctx = document.getElementById('pie-chart').getContext('2d');
        var data = {
            datasets: [{
                data: y,
                backgroundColor: [
                    'red',
                    'blue',
                    'green'
                ]
            }],
            labels: x
        };
        var options = {
            responsive: false
        };
        var pieChart = new Chart(ctx, {
            type: 'pie',
            data: data,
            options: options
        });
    </script>
    </main>
</div>
</div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
            </div>
        </div>
    </div>
</div>

@endsection
