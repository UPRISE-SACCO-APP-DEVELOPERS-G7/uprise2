@extends('layouts.app', ['activePage' => 'dashboard', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION', 'navName' => 'Dashboard', 'activeButton' => 'laravel'])

<!-- @section('summary')
    <div class="container" display: flex;>
            <aside class="sidebar" width: 250px;  background-color: #f2f2f2 padding: 20px>
                <h2>Dashboard Summary</h2>
                <p>Some summary information...</p>
            </aside>
            <main class="content"  flex: 1;  padding: 20px;>  
                <h1>Welcome to the Dashboard</h1>
                <p>Main content goes here...</p>
            </main>
    </div>
 @endsection -->

@section('content')
    <div class="content" >

    <div style="display: flex; justify-content: space-around">
        <div class="rounded-rectangle" style="width:200px; height: 100px; background-color: #27a8d0; padding: 20px; border-radius: 10px;">
            <p class="white-text" style="color: white;"><strong>Members</strong></p>
            <p style="color: white;">{{$members}}</p>
        </div>
        <div class="rounded-rectangle" style="width:200px; height: 100px; background-color: #27a8d0; padding: 20px; border-radius: 10px;">
            <p class="white-text" style="color: white;"><strong>Non Members</strong></p>
            <p style="color: white;">0</p>
        </div>
        <div class="rounded-rectangle" style="width:200px; height: 100px; background-color: #27a8d0; padding: 20px; border-radius: 10px;">
            <p class="white-text" style="color: white;"><strong>Deposits</strong></p>
            <p style="color: white;">{{$deposit_count}}</p>
        </div>
        <div class="rounded-rectangle" style="width:200px; height: 100px; background-color: #27a8d0; padding: 20px; border-radius: 10px;">
            <p class="white-text" style="color: white;"><strong>Loans</strong></p>
            <p style="color: white;">{{$loans}}</p>

        </div>
    </div>

        <div class="container-fluid" style="margin-top:50px">
            <div class="row">
                <div class="col-md-4">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('Highest Deposits') }}</h4>
                           
                        </div>
                        <div class="card-body ">
                            <div class="legend">
                                <p>{{ number_format($highest_deposit,2)}}</p>
                            </div>
                            <hr>
                            <div class="stats">
                                <i class="fa fa-clock-o"></i> {{ __('Last Updated :time', ['time' => \Carbon\Carbon::parse($deposit_update)->diffForHumans()]) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('Highest Loans') }}</h4>
                           
                        </div>
                        <div class="card-body ">
                            <div class="legend">
                                <p>{{ number_format($highest_loan,2) }}</p>
                            </div>
                            <hr>
                            <div class="stats">
                                <i class="fa fa-clock-o"></i> {{ __('Last Updated :time', ['time' => \Carbon\Carbon::parse($loan_update)->diffForHumans()]) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('Account Balance') }}</h4>
                           
                        </div>
                        <div class="card-body ">
                            <div class="legend">
                                <p>{{ number_format($account_balance, 2)}}</p>
                            </div>
                            <hr>
                            <div class="stats">
                                <i class="fa fa-clock-o"></i> {{ __('Last Updated :time', ['time' => \Carbon\Carbon::parse($loan_update)->diffForHumans()]) }}
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <h3 style="color: #27a8d0; text-align: center;">LOANS DUE THIS WEEK</h3>
            <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Amount</th>
                                    <th>Due Date</th>
                                  
                                </thead>
                                <tbody>
                                    <tr>

                                      @foreach($loans as $loan)
                                            <tr>
                                                <td>{{ $loan->id }}</td>
                                                <td>{{ $loan->member_id }}</td>
                                                <td>{{ $loan->payment_period }}</td>
                                                <td>{{ number_format($loan->amount) }}</td>
                                            </tr>
                                        @endforeach
                                    
                                        
                                    </tr>
                                </tbody>
                            </table>
                        </div><div class="container-fluid" style="margin-top:50px">
            
            <div class="row">
                  <div class="col-md-6">
                      <div class="card ">
                        <div class="card-body ">
                            <div class="chart">
                            <canvas id= "loanStatusChart" style="width: 500px; height: 370px;"></canvas>
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
        </div>
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript">
        var ctx = document.getElementById('loanStatusChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                
                labels: {!! json_encode(['Loans', 'Deposits']) !!},
                datasets: [{
                    label: 'Sacco Status',
                    data: {!! json_encode([ 5000, 10000]) !!},
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
            type: 'pie',
            data: {
                labels: ['Loans', 'Depsits'],
                datasets: [{
                    data: [5000, 10000], 
                    backgroundColor: ['rgba(75, 192, 192, 0.2)', 'rgba(255, 99, 132, 0.2)'],
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

@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            demo.initDashboardPageCharts();

            demo.showNotification();

        });
    </script>
@endpush