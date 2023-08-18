@extends('layouts.app', ['activePage' => 'dashboard', 'title' => 'Notifications', 'navName' => 'Loans', 'activeButton'
=> 'laravel'])
@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="chart-container-square">
                    <canvas id="loansPercentageDoughnutChart" style="width: 200px; height: 350px;"></canvas>
                    <div class="chart-center">
                        <span>{{ $loansPercentage }}%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="chart-container-square">
                    <canvas id="" style="width: 200px; height: 350px;"></canvas>
                    <div class="chart-center">
                        <span>{{ $loansPercentage }}%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="chart-container-square">
                    <canvas id="" style="width: 200px; height: 350px;"></canvas>
                    <div class="chart-center">
                        <span>{{ $loansPercentage }}%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="chart-container-square">
                    <canvas id="loans" style="width: 200px; height: 350px;"></canvas>
                    <div class="chart-center">
                        <span>{{ $loansPercentage }}%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card ">

            <div class="card-body ">
                <div class="chart">
                    <canvas id="myChart" style="width: 500px; height: 300px;"></canvas>
                </div>
            </div>

        </div>
    </div>
    <div class="col-md-6">
        <div class="card ">

            <div class="card-body ">
                <div class="chart">
                    <canvas id="PieChart" style="width: 400px; height:275px;"></canvas>
                </div>
            </div>

        </div>
    </div>

    <div class="col-md-6">
        <div class="card ">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Membership Type</th>
                    <th>Created</th>
                </tr>
                @foreach ($members as $loan)
                <tr>
                    <td>{{ $loan->id }}</td>
                    <td>{{ $loan->username }}</td>
                    <td>{{ $loan->phone }}</td>
                    <td>{{ $loan->email }}</td>
                    <td>{{ $loan->status }}</td>
                    <td>{{ $loan->membership_type }}</td>
                    <td>{{ $loan->created_at}}</td>




                </tr>

                @endforeach
            </table>

        </div>
    </div>
</div>
<a href="{{ route('generate_pdf') }}" class="btn btn-primary">Generate PDF Report</a>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
var ctx = document.getElementById('loansPercentageDoughnutChart').getContext('2d');
var loansPercentageDoughnutChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Loans', 'Empty'],
        datasets: [{
            data: [{
                {
                    $loansPercentage
                }
            }, {
                {
                    100 - $loansPercentage
                }
            }],
            backgroundColor: ['rgba(75, 192, 192, 0.8)', 'rgba(0, 0, 0, 0)'],
            borderWidth: 0
        }]
    },
    options: {
        cutoutPercentage: 70,
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false
            },
            tooltip: {
                enabled: false
            }
        }
    }
});
</script>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['January', 'February', 'March', 'April', 'May'],
        datasets: [{
            label: 'Monthly Deposits',
            data: [1000, 1500, 2000, 1800, 2200],
            backgroundColor: 'rgba(75, 192, 192, 0.8)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    },
    options: {
        responsive: true
    }
});
</script>
<script>
var ctx = document.getElementById('PieChart').getContext('2d');
var loanDepositPieChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Loans', 'Deposits'],
        datasets: [{
            data: [40, 60],
            backgroundColor: ['rgba(255, 99, 132, 0.8)', 'rgba(75, 192, 192, 0.8)'],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: true,
                position: 'bottom'
            }
        }
    }
});
</script>
@endsection

<style>
.chart-container {
    position: relative;
    width: 100px;
    height: 100px;
}

.chart-center {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    font-size: 16px;
    font-weight: bold;
    color: #000;
}

.chart-container-square {
    position: relative;
    width: 100px;
    height: 100px;
}

.chart-center {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    font-size: 16px;
    font-weight: bold;
    color: #000;
}
</style>
