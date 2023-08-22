@extends('layouts.app', ['activePage' => 'deposits', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION', 'navName' => 'Deposits', 'activeButton' => 'laravel'])

@section('content')





              
<div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th>ID</th>
                                    <th>Amount Deposited</th>
                                    <!-- <th>Name of Member</th> -->
                                    <th>Membership Id</th>
                                    
                                </thead>
                                <tbody>
                                    @foreach($deposits as $deposit)
                                    <tr>
                                    <td>{{ $deposit->receipt_number}}</td>
                                        <td>{{ $deposit->amount }}</td>
                                        <!-- <td>{{ $deposit->name }}</td> -->
                                        <td>{{ $deposit->member_id }}</td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>

                         
                        </div>
                        <div class="row">
                  <div class="col-md-6">
                      <div class="card ">
                        <div class="card-body ">
                            <div class="chart">
                            <canvas id= "loanStatusChart" style="width: 500px; height: 350px;"></canvas>
                            </div>
                         </div>
                        
                    </div>
                 </div>
                 <div class="col-md-6">
                    <div class="card ">
                        
                        <div class="card-body ">
                            <div class="chart">
                                <canvas id= "approvedRejectedPieChart" style="width: 500px; height: 300px;"></canvas>
                            </div>
                         </div>
                        
                    </div>
                </div>
            </div>
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>,
    <script type="text/javascript">
        var ctx = document.getElementById('loanStatusChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec']) !!},
                datasets: [{
                    label: 'Deposit status',
                    data: {!! json_encode([ $realData[0],$realData[1],$realData[2],$realData[3],$realData[4],$realData[5],$realData[6],$realData[7],$realData[8],$realData[9],$realData[10],$realData[11]]) !!},
                   // data: $realData, 
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 205, 86, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(153, 102, 255, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                    
                }
                
            }
        });
    </script>
    <script>
        var ctx = document.getElementById('approvedRejectedPieChart').getContext('2d');
        var approvedRejectedPieChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Deposits of last year','Deposits of this year'],
                datasets: [{
                    data: [{{ 200}}, {{ 900}}], 
                    
                    backgroundColor: ['rgba(0, 0, 128, 0.2)', 'rgba(255, 99, 132, 0.2)'],
                    borderColor: ['rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
            maintainAspectRatio: false
            }
        });
    </script>

    
    @endsection



       