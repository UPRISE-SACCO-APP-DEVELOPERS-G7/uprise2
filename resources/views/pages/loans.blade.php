@extends('layouts.app', ['activePage' => 'dashboard', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION', 'navName' => 'Loans', 'activeButton' => 'laravel'])

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
            <div class="rounded-rectangle" style="width:200px; height: 100px; background-color:green; padding: 20px;border-radius: 10px;">
            <a href=""><p style = "color: white">ACCEPTED</p></a>
                <p style = "color: white">{{ $accepted }}</p>
                
            </div>
            <div class="rounded-rectangle" style="width:200px; height: 100px; background-color:green; padding: 20px;border-radius: 10px;">
                <p style = "color: white">PENDING</p>
                <p style = "color: white">{{ $pending }}</p>
            </div>
            <div class="rounded-rectangle" style="width:200px; height: 100px; background-color:green; padding: 20px; border-radius: 10px;">
                <p style = "color: white">SHORTLISTED </p>
                <p style = "color: white">{{ $shortlisted }}</p>
            </div>
            <div class="rounded-rectangle" style="width:200px; height: 100px; background-color:green; padding: 20px; border-radius: 10px;">
                <p style = "color: white">DISAPPROVED</p>
                <p style = "color: white">{{ $disapproved }}</p>
            </div>
        </div>

        <div class="container-fluid" style="margin-top:50px">
            <div class="row">
                <div class="col-md-8">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('Approved and Disapproved') }}</h4>
                            <p class="card-category">{{ __('Today') }}</p>
                        </div>
                        <div class="card-body ">
                            <!-- <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div> -->
                            <!-- <div id="chartHours" class="ct-chart"></div> -->
                            <div class="chart">
                                <canvas id= "myChart"></canvas>
                            </div>
                         </div>
                            <div class="legend">
                                <i class="fa fa-circle text-info"></i> {{ __('Approved') }}
                                <i class="fa fa-circle text-danger"></i> {{ __('Disapproved') }}
                               
                            </div>
                            <hr>
                            <div class="stats">
                                <i class="fa fa-clock-o"></i> {{ __('Last Updated 1st August') }}
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>

            <!-- Table -->
            <div class="card-body table-full-width table-responsive">
                <h3>LOAN REQUESTS</h3>
       
                    
                <table class="table table-hover table-striped" id = "myTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Amount</th>
                            <th>Start date</th>
                            <th>End date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($loans as $loan)
                            <tr>
                                <td>{{ $loan->id }}</td>
                                <td>{{ $loan->amount }}</td>
                                <td>{{ $loan->start_date }}</td>
                                <td>{{ $loan->end_date }}</td>
                                <td>{{ $loan->request_status }}</td>
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
                                <canvas id= "loanStatusChart"></canvas>
                            </div>
                         </div>
                        
                    </div>
                 </div>
                 <div class="col-md-6">
                    <div class="card ">
                        
                        <div class="card-body ">
                            <div class="chart">
                                <canvas id= "loanStatusChart"></canvas>
                            </div>
                         </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript">
        var ctx = document.getElementById('loanStatusChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode(['Approved', 'Shortlisted', 'Disapproved', 'Pending', 'Accepted', 'Rejected']) !!},
                datasets: [{
                    label: 'Loan Status',
                    data: {!! json_encode([ $approved,$shortlisted, $disapproved, $pending, $accepted, $rejected]) !!},
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




    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Calculate the past six months dynamically
        var today = new Date();
        var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        var labels = [];
    
        for (var i = 5; i >= 0; i--) {
            var pastMonth = new Date(today.getFullYear(), today.getMonth() - i, 1);
            labels.push(monthNames[pastMonth.getMonth()] + ' ' + pastMonth.getFullYear());
        }
    
        var ctx = document.getElementById('chart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels, // Use the dynamically calculated month labels
                datasets: [{
                    label: 'Performance Over Months',
                    data: [0, 0, 40, 70, 40, 5], // Assuming you passed the overall performance value
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
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
    <script type="text/javascript" src="https:////cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
  $(document).ready( function () {
    $('#myTable').DataTable();
} );
    
      
  

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
