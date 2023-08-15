@extends('layouts.app', ['activePage' => 'dashboard', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION', 'navName' => 'Loans', 'activeButton' => 'laravel'])
@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <canvas id="doughnutChart1" width="100" height="100"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <canvas id="doughnutChart2" width="100" height="100"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <canvas id="doughnutChart3" width="100" height="100"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <canvas id="doughnutChart4" width="100" height="100"></canvas>
            </div>
        </div>
    </div>
</div>

<script>
    var options = {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
            display: true,
            position: 'bottom',
        },
        tooltips: {
            enabled: true,
        },
        // Add more options if needed
    };
    var ctx1 = document.getElementById('doughnutChart1').getContext('2d');
    var doughnutChart1 = new Chart(ctx1, {
        type: 'doughnut',
        data: {
            labels: ['Label 1', 'Label 2'],
            datasets: [{
                data: [value1, value2], // Replace with your data
                backgroundColor: ['rgba(75, 192, 192, 0.2)', 'rgba(255, 99, 132, 0.2)'],
                borderColor: ['rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)'],
                borderWidth: 1
            }]
        },
        options: options
    }); 

</script>
<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <canvas id="doughnutChart1" width="100" height="100"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <canvas id="doughnutChart2" width="100" height="100"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <canvas id="doughnutChart3" width="100" height="100"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <canvas id="doughnutChart4" width="100" height="100"></canvas>
            </div>
        </div>
    </div>
</div>

<script>
    var options = {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
            display: true,
            position: 'bottom',
        },
        tooltips: {
            enabled: true,
        },
        // Add more options if needed
    };

    // Create doughnut charts
    var ctx1 = document.getElementById('doughnutChart2').getContext('2d');
    var doughnutChart1 = new Chart(ctx1, {
        type: 'doughnut',
        data: {
            labels: ['Label 1', 'Label 2'],
            datasets: [{
                data: [value1, value2], // Replace with your data
                backgroundColor: ['rgba(75, 192, 192, 0.2)', 'rgba(255, 99, 132, 0.2)'],
                borderColor: ['rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)'],
                borderWidth: 1
            }]
        },
        options: options
    });

</script>



@endsection

@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            demo.initDashboardPageCharts();

            demo.showNotification();

        });
    </script>
@endpush  

